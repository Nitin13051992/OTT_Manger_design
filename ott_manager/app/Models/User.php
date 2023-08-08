<?php

namespace App\Models;

// use App\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    use LogsActivity;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'maindb';
    protected $table = 'users';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company',
        'acess_level',
        'partner_id',
        'parentid',
        'partnerid',
        'dbName',
        'dbHostName',
        'dbUserName',
        'dbpassword',
        'publisherID',
        'prefix_entry',
        'kalturadburl',
        'cdn_backend',
        'cdnURL',
        'pstatus',
        'addedby',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected static $logOnlyDirty = true;
    protected static $logName = 'User';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "A user has been {$eventName}";
    }
    public static function getpermissionGroups()
    {
        $permission_groups = Permission::select('group_name as name')
            ->groupBy('group_name')
            ->get();
        return $permission_groups;
    }

    public static function getpermissionsByGroupName($group_name)
    {
        $permissions = Permission::select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
        return $permissions;
    }

    public static function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
        }
        return $hasPermission;
    }

    // public function user()
    // {
    //     return $this->belongsTo('\App\Models\User', 'causer_id'); //arg1 - Model, arg2 - foreign key
    // }
}
