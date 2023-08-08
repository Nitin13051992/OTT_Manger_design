<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImgLogo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mysql';
    protected $table = 'img_logo';
    protected $fillable = [
        'name',
        'host_url_logo',
        'original_url_logo',
        'alignment',
        'opacity',
        'style',
        'logo_size',
        'bg_color',
        'bg_color_optacity',
        'text_color',
        'text_color_optacity',
    ];
}
