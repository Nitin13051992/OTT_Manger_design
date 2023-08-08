<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class VODList extends Model
{
    use HasFactory;
    use HasApiTokens, HasFactory;
    protected $connection = 'mysql';
    protected $table = 'vod';
    // VOD view created Model
}