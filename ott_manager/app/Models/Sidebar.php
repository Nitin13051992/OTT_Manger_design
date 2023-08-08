<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Sidebar extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $connection = 'maindb';
    protected $table = 'menus';
    protected $appends = ['child_menu'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mid',
        'mname',
        'menu_url',
        'mparentid',
        'permission',
        'multilevel',
        'child_id',
        'icon_class',
        'mstatus',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    public function getChildMenuAttribute()
    {
        // dd($this->child_id);
        $childs = explode(',', $this->child_id);
        $data = Sidebar::whereIn('mid', $childs)->get();
        // dd($data);
        return $data;
    }
    public function getRequestUrl()
    {
        $requestUri = str_replace('/', '', \Request::getRequestUri());
        $requestUri = $requestUri . '.php';
        $db = Sidebar::select('mid')
            ->where('menu_url', $requestUri)
            ->get();
        $data = $db->toArray();
        if (isset($data[0]->mid)) {
            return $data[0]->mid;
        } else {
            return;
        }
    }
}
