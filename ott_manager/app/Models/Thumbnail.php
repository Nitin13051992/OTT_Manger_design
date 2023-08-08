<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'thumbnail';
    protected $primaryKey = 'thumb_id';
    protected $fillable = ['ir_id', 'thumb_id'];

    function imageResolution()
    {
        return $this->hasOne(ImageResolution::class, 'id', 'ir_id');
        //return $this->belongsTo(ImageResolution::class);
    }
}
