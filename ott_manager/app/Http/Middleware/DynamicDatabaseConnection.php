<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use DB;
use Illuminate\Support\Facades\Auth;
use PDO;

class DynamicDatabaseConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()) {
            $user = Auth::user();
            /*dd($user);*/
            /*Config::set('database.connections.club.database', $user->dbName);*/
            Config::set('database.connections.mysql', [
                'driver' => 'mysql',
                'url' => env('DATABASE_URL'),
                'host' => $user->dbHostName,
                'port' => env('DB_PORT', '3306'),
                'database' => $user->dbName,
                'username' => $user->dbUserName,
                'password' => $user->dbpassword,
                'unix_socket' => env('DB_SOCKET', ''),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'prefix_indexes' => true,
                'strict' => true,
                /*'engine' => null,*/
                'engine' => 'InnoDB ROW_FORMAT=DYNAMIC',
                'options' => extension_loaded('pdo_mysql')
                    ? array_filter([
                        PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
                    ])
                    : [],
            ]);
            DB::purge('mysql');
            DB::reconnect('mysql');
            // $databaseName = \DB::connection()->getDatabaseName();
            // dd($databaseName);
            return $next($request);
        } else {
            return redirect('/login');
        }
    }
}
