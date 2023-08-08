<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerImage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mysql';
    protected $table = 'banner_image_detail';
    protected $primaryKey = 'img_id';
    protected $fillable = [
        'img_id',
        'host_url',
        'img_url',
        'start_time',
        'end_time',
        'imageType',
        'category_id',
        'description',
        'ventryid',
        'banner_img_type',
        'v_type_id',
        'lang_ticker',
        'group_id',
    ];

    public function groupName()
    {
        return $this->hasOne(Group::class, 'id', 'group_id');
    }
}
