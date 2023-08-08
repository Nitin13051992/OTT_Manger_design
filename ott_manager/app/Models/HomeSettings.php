<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSettings extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = 'home_title_tag';
    protected $primaryKey = 'tags_id';
    protected $fillable = [
        'image_type_tag',
        'category_id',
        'title_tag_name',
        'search_tag',
        'priority',
    ];
    public function headerCategory()
    {
        return $this->belongsTo(
            Category::class,
            'category_id',
            'category_id'
        )->where('status', 2);
    }

    public function episodeEntries()
    {
        return $this->hasMany(Entry::class, 'categoryid', 'category_id');
    }

}
