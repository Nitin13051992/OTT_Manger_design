<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class QueueManagement extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mysql2';
    protected $table = 'queue_mgr';
    protected $primaryKey = 'entryid';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'entryid',
        'name',
        'publisherID',
        'puser_id',
        'video_url',
        'type',
        'file_type',
        'status',
        'duration',
        'created_at',
        'bitrate',
        'is_frame',
        'db_name',
        'template_id',

    ];

    public function makeEntryID()
    {
        $idData = '';
        $entryidPrefix = Auth::user()->prefix_entry;
        $a = "1023qwertyuiop45zxcvb67asdfghjkl89nm";
        $b = str_split($a);
        for ($i=1; $i <=8 ; $i++) {
                $idData .= $b[rand(0,strlen($a)-1)];
        }
        $pp=$entryidPrefix."_".$idData;
        $qry=  QueueManagement::where('entryid', $pp)->get();
        $totalEntrycount = 1;
        if(count($qry)>0){ 
            makeEntryID();
        } else{ 
            return $pp; 
        }
    }
}
