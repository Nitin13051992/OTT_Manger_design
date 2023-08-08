<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mysql';
    protected $table = 'entry';
    protected $primaryKey = 'id';
    protected $fillable = [
        'entryid',
        'name',
        'thumbnail',
        'longdescription',
        'type',
        'tag',
        'categoryid',
        'puser_id',
        'ispremium',
        'isfeatured',
        'status',
        'countrycode',
        'shortdescription',
        'director',
        'producer',
        'duration',
        'cast',
        'crew',
        'sub_genre',
        'language',
        'pgrating',
        'video_status',
        'country_data',
        'currency_data',
        'custom_data',
        'added_by',
        'age_limit',
        'release_date',
        'lang_code',
        'mp4URL',
        'contentType',
    ];

    public function entryThumbnail()
    {
        return $this->hasOne(Thumbnail::class, 'entryid', 'entryid')->where([
            'status' => '1',
            'ir_id' => '6',
        ]);
    }

    public function entryCategoryFullName()
    {
        return $this->hasOne(Category::class, 'category_id', 'categoryid');
    }

    public function viewEntryThumbnail()
    {
        return $this->hasOne(Thumbnail::class, 'entryid', 'entryid')->where(
            'status',
            '1'
        );
    }
    public function categoryEntry()
    {
        return $this->belongsTo(CategoryEntry::class, 'entryid', 'entryid');
    }
    function getTrailerData($vid)
    {
        return $data = Entry::select('entryid', 'status', 'type')
            ->where('status', '=', '2')
            ->where('type', '=', '12')
            ->where('entryid', 'LIKE', '%' . $vid . '%')
            ->get();
        /*->where(function ($query) {
                $query
                    ->where('direct_sub_categories_count', '=', '0')
                    ->orWhereNull('direct_sub_categories_count');
            })*/
    }
}
