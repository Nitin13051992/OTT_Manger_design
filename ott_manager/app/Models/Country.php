<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'countries_currency';
    protected $primaryKey = 'id';
}
