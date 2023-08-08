<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mysql2';
    protected $table = 'profile';
    protected $primaryKey = 'pfid';
    public $incrementing = false;

    protected $fillable = [
        'pfid',
        'partnerid',
        'vbr',
        'width',
        'height',
        'vprofile',
        'vlevel',
        'abr',
        'status',
        'type',
        'puserid',
        'template_id',
        'template_name'
    ];

    function getProfile($pid){
        return Profile::select('*')->where('partnerid', $pid)->groupBy('template_id')->get();
    }
}
