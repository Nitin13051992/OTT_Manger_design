<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mysql';
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $appends = ['child_menu'];
    protected $fillable = [
        'category_id',
        'parent_id',
        'partner_id',
        'cat_name',
        'fullname',
        'description',
        'tags',
        'cat_type',
        'priority',
        'direct_entries_count',
        'status',
        'direct_sub_categories_count',
        'entry_count',
        'fullids',
    ];

    public function getEntriesRelation()
    {
        return $this->hasMany(Entry::class, 'categoryid', 'category_id')
            ->whereNotNull('categoryid')
            ->where('video_status', 'active');
    }

    public function thumb()
    {
        return $this->hasOne(
            CategoryThumb::class,
            'category_id',
            'category_id'
        );
    }
    public function thumbs()
    {
        return $this->hasMany(
            CategoryThumb::class,
            'category_id',
            'category_id'
        );
    }
    public function entry()
    {
        return $this->hasOne(
            CategoryEntry::class,
            'category_id',
            'category_id'
        );
    }
    public function getChildMenuAttribute()
    {
        $childs = explode(',', $this->fullids);
        $data = Category::whereIn('category_id', $childs)->get();
        // dd($data);
        return $data;
    }

    public function getParentMenuAttribute()
    {
        $fullids = explode(',', $this->fullids);
        $data = Category::whereIn('category_id', $fullids)->get();
        // dd($data);
        return $data;
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'category_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(
            Category::class,
            'parent_id',
            'category_id'
        )->with('categories');
    }
    public function getCategoryName($id)
    {
        //dd($id['term']);
        return $data = Category::select('category_id', 'fullname')
            ->where('status', '2')
            ->where('fullname', 'LIKE', '%' . $id['term'] . '%')
            ->where(function ($query) {
                $query
                    ->where('direct_sub_categories_count', '=', '0')
                    ->orWhereNull('direct_sub_categories_count');
            })
            ->get();
    }
    public function getCategoryNameId($id)
    {
        $cat_id = explode(',', $id);
        return $data = Category::select('category_id', 'fullname')
            ->whereIn('category_id', $cat_id)
            ->where('status', '2')
            ->get();
    }

    function directEntriesCount($id)
    {
        return $data = Category::select(
            'category_id',
            'direct_sub_categories_count'
        )
            ->where('category_id', $id)
            ->where('status', '2')
            ->get();
    }
    function getChildCategories($id)
    {
        //echo $id;
        return $data = Category::select('category_id', 'cat_name', 'priority')
            ->where('parent_id', $id)
            ->where('status', '2')
            ->orderBy('priority', 'ASC')
            ->get();
    }

    function updatePriority($id, $catgeoryId)
    {
        //echo $id;
        $explode_str = explode(',', $id);
        $categoryid = $catgeoryId;
        //print_r($explode_str);

        $j = 1;
        for ($i = 0; $i < count($explode_str); $i++) {
            Category::where('category_id', $explode_str[$i])->update([
                'priority' => $j,
            ]);
            $j++;
        }
        return 1;
    }

    function getCategoryFullName($ids)
    {
        $ids_explode = explode(',', $ids);
        $k = 0;
        for ($i = 0; $i < count($ids_explode); $i++) {
            $k = ++$k;
            $j = '>';
            if ($k == count($ids_explode)) {
                $j = '';
            }
            $row = Category::select('category_id', 'cat_name')
                ->where('category_id', $ids_explode[$i])
                ->first();

            $fullname[] = $row->cat_name;
        }
        return implode('>', $fullname);
        //print_r($fullname);
    }
    function getCategoryEntryName($ids)
    {
        $Cars = new Category();
        $cat_ids_entry = explode(',', $ids);
        //print_r($ids_explode);
        $full_name = [];

        for ($i = 0; $i < count($cat_ids_entry); $i++) {
            // echo $cat_ids_entry[$i] . '<br>';
            $variable = $catname = Category::select(
                'category_id',
                'cat_name',
                'parent_id',
                'full_id'
            )
                ->where('category_id', $cat_ids_entry[$i])
                ->first();
            // echo $variable->parent_id . '<br>';
            if ($variable->parent_id == 0) {
                array_push($full_name, $variable->cat_name);
            } else {
                $returndata = Category::getCategoryFullName($variable->full_id);
                array_push($full_name, $returndata);
            }
        }

        return $full_name;
    }
}
