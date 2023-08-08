<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeaderContent extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mysql';
    protected $table = 'header_menu';
    protected $primaryKey = 'hid ';
    protected $fillable = [
        'hid',
        'header_name',
        'sub_menu_type',
        'menu_type',
        'menu_list_type',
        'host_url',
        'img_url',
        'header_status',
        'slug',
    ];

    public function headerMenus()
    {
        return $this->hasMany(HomeSettings::class, 'header_id', 'hid');
    }

    public function headerSlider()
    {
        return $this->hasMany(SliderImage::class, 'header_id', 'hid')->where(
            'img_status',
            1
        );
    }
}
