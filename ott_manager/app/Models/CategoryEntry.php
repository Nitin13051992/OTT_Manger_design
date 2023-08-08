<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
// use App\Models\Carbon;
class CategoryEntry extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $connection = 'mysql';
    protected $table = 'category_entry';
    protected $primaryKey = 'cepid';
    protected $fillable = [
        'category_id',
        'status',
        'cepid',
        'priority',
        'entryid',
    ];

    public function getEntries()
    {
        return $this->belongsTo(Entry::class, 'entryid', 'entryid')->where(
            'status',
            '2'
        );
    }
    public function categorEntryData()
    {
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }
    function entrySetPriority($id, $categoryid, $catPriority)
    {
        $id;
        $current_date = Carbon::now();

        if ($categoryid == 0) {
            $catEntry = Entry::select('categoryid')
                ->where('status', '2')
                ->where('entryid', $id)
                ->get();
            $catids = $catEntry->toArray();
            $fcategory = $catids[0]['categoryid'];

            if ($fcategory != '') {
                $delcatid = explode(',', $fcategory);
                foreach ($delcatid as $delcatid) {
                    $delcatid;
                    $res = CategoryEntry::where('category_id', $delcatid)
                        ->where('entryid', $id)
                        ->delete();
                    $selectNewRows = CategoryEntry::select('*')
                        ->where('category_id', $delcatid)
                        ->orderBy('priority', 'DESC')
                        ->get();

                    $totalEntry = $selectNewRows->count();

                    $jj = 1;
                    foreach ($selectNewRows->toARray() as $entry) {
                        $entry_id = $entry['entryid'];
                        if ($jj <= $totalEntry + 100) {
                            $newcpriority = $jj;
                        }
                        if (is_int($newcpriority)) {
                            DB::enableQueryLog();

                            $entryData = CategoryEntry::where(
                                'entryid',
                                $entry_id
                            )
                                ->where('category_id', $delcatid)
                                ->update([
                                    'priority' => $newcpriority,
                                ]);
                            //print_r(DB::getQueryLog());
                        }
                        $jj++;
                    }
                }
            }
        } else {
            $catEntry = Entry::select('categoryid')
                ->where('status', '2')
                ->where('entryid', $id)
                ->get();
            $catids = $catEntry->toArray();
            $fcategory = $catids[0]['categoryid'];

            if ($fcategory != '') {
                $delcatid = explode(',', $fcategory);
                foreach ($delcatid as $delcatid) {
                    // echo $delcatid;
                    $res = CategoryEntry::where('category_id', $delcatid)
                        ->where('entryid', $id)
                        ->delete();
                    // echo $delcatid;
                    $selectNewRows = CategoryEntry::select('*')
                        ->where('category_id', $delcatid)
                        ->orderBy('priority', 'DESC')
                        ->get();

                    $totalEntry = $selectNewRows->count();
                    //echo '<br>';
                    $jj = 1;
                    foreach ($selectNewRows->toARray() as $entry) {
                        $entry_id = $entry['entryid'];
                        if ($jj <= $totalEntry + 100) {
                            $newcpriority = $jj;
                        }
                        if (is_int($newcpriority)) {
                            DB::enableQueryLog();

                            $entryData = CategoryEntry::where(
                                'entryid',
                                $entry_id
                            )
                                ->where('category_id', $delcatid)
                                ->update([
                                    'priority' => $newcpriority,
                                ]);
                        }
                        $jj++;
                    }
                }
            }
        }

        $setPriority = [];
        if ($catPriority > 0) {
            $setPriority = array_combine($categoryid, $catPriority);
        }
        //print_r($setPriority);

        if ($categoryid > 0) {
            if (count($setPriority) > 0) {
                foreach ($setPriority as $key => $value) {
                    $chk = CategoryEntry::select('*')
                        ->where('category_id', $key)
                        ->where('entryid', $id)
                        ->where('status', '<>', '3')
                        ->get();

                    $total_count = $chk->count();
                    if ($total_count == 0) {
                        $maxPrio = CategoryEntry::where(
                            'category_id',
                            $key
                        )->max('priority');
                        //echo $value.'---'.$key.'++++'.$maxPrio;
                        if ($value > $maxPrio) {
                            //echo '<br>'.'Value is greater than Maxprio'.'<br>';
                            $cpriority = $maxPrio + 1;
                            CategoryEntry::insert([
                                'entryid' => $id,
                                'category_id' => $key,
                                'priority' => $cpriority,
                                'status' => '2',
                                'created_at' => $current_date,
                            ]);
                        } elseif ($value < $maxPrio) {
                            //echo '<br>'.'Value is less than Maxprio'.'<br>';
                            $select_rows = CategoryEntry::select('*')
                                ->where('category_id', $key)
                                ->where('priority', '>=', $value)
                                ->get();
                            if ($select_rows->count() > 0) {
                                foreach (
                                    $select_rows->toArray()
                                    as $keys => $values
                                ) {
                                    $entryID = $values['entryid'];
                                    $catIDS = $values['category_id'];
                                    $priorityPlusOne = $values['priority'] + 1;
                                    CategoryEntry::where('entryid', $entryID)
                                        ->where('category_id', $key)
                                        ->update([
                                            'priority' => $priorityPlusOne,
                                        ]);
                                }
                            }
                            $cpriority = $value;
                            CategoryEntry::insert([
                                'entryid' => $id,
                                'category_id' => $key,
                                'priority' => $cpriority,
                                'status' => '2',
                                'created_at' => $current_date,
                            ]);
                        } elseif ($value == $maxPrio) {
                            //echo '<br>'.'Value is equal to  Maxprio'.'<br>';
                            $priorityPlusOne = $value + 1;
                            $select_rows = CategoryEntry::select('*')
                                ->where('category_id', $key)
                                ->where('priority', '=', $value)
                                ->orderBy('priority', 'ASC')
                                ->get();

                            $rowToUpdate = $select_rows->toArray();
                            $selectEntryId = $rowToUpdate[0]['entryid'];
                            $selectCatUpdate = $rowToUpdate[0]['category_id'];
                            //update query //
                            CategoryEntry::where('entryid', $selectEntryId)
                                ->where('category_id', $selectCatUpdate)
                                ->update([
                                    'priority' => $priorityPlusOne,
                                    'status' => 2,
                                ]);
                            //insert query//
                            CategoryEntry::insert([
                                'entryid' => $id,
                                'category_id' => $selectCatUpdate,
                                'priority' => $maxPrio,
                                'status' => '2',
                                'created_at' => $current_date,
                            ]);
                        } else {
                            $cpriority = 1;
                            CategoryEntry::insert([
                                'entryid' => $id,
                                'category_id' => $key,
                                'priority' => $cpriority,
                                'status' => '2',
                                'created_at' => $current_date,
                            ]);
                        }
                    }
                    if ($total_count == 1) {
                        $maxPriority = CategoryEntry::where(
                            'category_id',
                            $key
                        )->max('priority');
                        if ($value < $maxPriority) {
                            //echo '<br>'.'Value is less than Maxprio'.'<br>';
                            $priorityPlusOne = $value + 1;
                            $updateVal = $value + 1;

                            $rowsUpdateAtPosition = CategoryEntry::where(
                                'entryid',
                                $id
                            )
                                ->where('category_id', $key)
                                ->update([
                                    'priority' => $value,
                                    'status' => 2,
                                ]);
                            $selectNewRows = CategoryEntry::select('*')
                                ->where('category_id', $key)
                                ->orderBy('priority', 'ASC')
                                ->get();
                            $totalEntry = $selectNewRows->count();
                            $jj = 1;
                            foreach (
                                $selectNewRows->toArray()
                                as $key => $entry
                            ) {
                                $entry_id = $entry['entryid'];
                                if ($jj <= $totalEntry + 100) {
                                    $newcpriority = $jj;
                                }
                                if (is_int($newcpriority)) {
                                    DB::enableQueryLog();
                                    $entryData = CategoryEntry::where(
                                        'entryid',
                                        $entry_id
                                    )
                                        ->where('category_id', $key)
                                        ->update([
                                            'priority' => $newcpriority,
                                        ]);
                                }
                                $jj++;
                            }
                        }
                        if ($value >= $maxPriority) {
                            /*echo '<br>'.'Value is greater than Maxprio'.'<br>';
                             echo $value.'---'.$maxPriority;  */

                            $res = CategoryEntry::where(
                                'category_id',
                                $delcatid
                            )
                                ->where('entryid', $id)
                                ->delete();
                            $selectNewRows = CategoryEntry::select('*')
                                ->where('category_id', $delcatid)
                                ->orderBy('priority', 'DESC')
                                ->get();

                            $totalEntry = $selectNewRows->count();
                            $jj = 1;
                            foreach ($selectNewRows->toArray() as $entry) {
                                $entry_id = $entry['entryid'];
                                if ($jj <= $totalEntry + 100) {
                                    $newcpriority = $jj;
                                }
                                if (is_numeric($newcpriority)) {
                                    $update_greater_than_max = CategoryEntry::where(
                                        'entryid',
                                        $entry_id
                                    )
                                        ->where('category_id', $key)
                                        ->update([
                                            'priority' => $newcpriority,
                                        ]);
                                }
                                $j++;
                            }
                            $maxPrioUpdate = CategoryEntry::where(
                                'category_id',
                                $key
                            )->max('priority');
                            //print_r($maxPrioUpdate);
                            $fetchMaxpriorityUpdate =
                                $maxPrioUpdate[0]['priority'];
                            $maxPriorityUpdate = $fetchMaxpriorityUpdate + 1;
                            $rowsUpdateAtPosition = CategoryEntry::insert([
                                'entryid' => $id,
                                'category_id' => $key,
                                'priority' => $cpriority,
                                'status' => '2',
                                'created_at' => $current_date,
                            ]);
                        }
                    }
                }
            } else {
                //echo 'else__if0000';
                foreach ($categoryid as $key => $checkVal) {
                    $checkVal_chk = CategoryEntry::select('*')
                        ->where('category_id', $checkVal)
                        ->where('entryid', $id)
                        ->where('status', '<>', '3')
                        ->get();
                    $tcount_chk = $checkVal_chk->count();
                    if ($tcount_chk == 0) {
                        $cpriority = 1;
                        $cpriority = $cpriority - 1;
                        //insert into category_entry
                        CategoryEntry::insert([
                            'entryid' => $id,
                            'category_id' => $checkVal,
                            'priority' => $cpriority,
                            'status' => '2',
                            'created_at' => $current_date,
                        ]);
                        $selectNewRows = CategoryEntry::select('*')
                            ->where('category_id', $checkVal)
                            ->orderBy('priority', 'ASC')
                            ->get();

                        $totalEntry = $selectNewRows->count();
                        $jj = 1;
                        foreach ($selectNewRows->toARray() as $entry) {
                            $entry_id = $entry['entryid'];
                            $priority = $entry['priority'];
                            if ($jj <= $totalEntry + 100) {
                                $newcpriority = $jj;
                            }
                            if (is_int($newcpriority)) {
                                DB::enableQueryLog();

                                $entryData = CategoryEntry::where(
                                    'entryid',
                                    $entry_id
                                )
                                    ->where('category_id', $checkVal)
                                    ->update([
                                        'priority' => $newcpriority,
                                    ]);
                            }
                            $jj++;
                        }
                    }
                }
            }
        }
    }
}
