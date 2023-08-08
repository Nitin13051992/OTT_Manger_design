<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $connection = 'mysql';
    protected $table = 'user_permission';
    protected $primaryKey = 'id';
    protected $appends = ['permission_name'];
    public function getUserPermissionAttribute()
    {
        $childs = explode(',', $this->operation_permission);
        $data = UserPermission::whereIn('id', $childs)->get();
        return $data;
    }
}