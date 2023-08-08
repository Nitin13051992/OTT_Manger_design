<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FunctionSetting extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mysql';
    protected $table = 'function_setting';
    protected $primaryKey = 'id';
    protected $fillable = [
                    'function_name',
                    'data_keys',
                    'value',
                    'status',
                    'created_at',
                    'updated_at',
                ];
}
