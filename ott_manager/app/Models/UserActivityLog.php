<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserActivityLog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'maindb';
    protected $table = 'user_activity_log';
    // protected $primaryKey = 'id';
    // protected $keyType = 'string';
    // public $incrementing = false;
    protected $fillable = [
        'user_id',
        'publisher_id',
        'action',
        'module',
        'remarks',
        'ip_address',
    ];
    public function getUserActivity()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
