<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryThumb extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'category_thumb_icon_url';
    protected $primaryKey = 't_id';
    protected $fillable = [
        'category_id',
        'host_url_thumb',
        'host_url_icon',
        't_original_url',
        't_small_url',
        't_mediam_url',
        't_large_url',
    ];

}