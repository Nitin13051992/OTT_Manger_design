<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageAds extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'manage_ads';
    protected $fillable = ['ad_script'];
}
