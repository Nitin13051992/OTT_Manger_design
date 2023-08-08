<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userRegistration extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $connection = 'mysql';
    protected $table = 'user_registration';
    protected $primaryKey = 'uid';
}
