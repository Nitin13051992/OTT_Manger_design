<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Flysystem.
 *
 * (c) Graham Campbell <hello@gjcampbell.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'local',

    /*
    |--------------------------------------------------------------------------
    | Flysystem Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Examples of
    | configuring each supported driver is shown below. You can of course have
    | multiple connections per driver.
    |
    */

    'connections' => [
        'awss3' => [
            'driver' => 'awss3',
            'key' => 'your-key',
            'secret' => 'your-secret',
            'bucket' => 'your-bucket',
            'region' => 'your-region',
            'version' => 'latest',
            // 'bucket_endpoint' => false,
            // 'calculate_md5'   => true,
            // 'scheme'          => 'https',
            // 'endpoint'        => 'your-url',
            // 'prefix'          => 'your-prefix',
            // 'visibility'      => 'public',
            // 'pirate'          => false,
            // 'eventable'       => true,
            // 'cache'           => 'foo'
        ],

        'azure' => [
            'driver' => 'azure',
            'account-name' => 'your-account-name',
            'api-key' => 'your-api-key',
            'container' => 'your-container',
            // 'visibility'   => 'public',
            // 'pirate'       => false,
            // 'eventable'    => true,
            // 'cache'        => 'foo'
        ],

        'dropbox' => [
            'driver' => 'dropbox',
            'token' => 'your-token',
            // 'prefix'     => 'your-prefix',
            // 'visibility' => 'public',
            // 'pirate'     => false,
            // 'eventable'  => true,
            // 'cache'      => 'foo'
        ],

        'ftp' => [
            'driver' => 'ftp',
            'host' => '192.168.161.203:1700',
            'port' => 21,
            'username' => 'amrita',
            'password' => 'amrita@123',
            'root' => '/home/amritatv/FTP/Test_Upload-amrita',
            // 'passive'    => true,
            // 'ssl'        => true,
            // 'timeout'    => 20,
            // 'visibility' => 'public',
            // 'pirate'     => false,
            // 'eventable'  => true,
            // 'cache'      => 'foo'
        ],

        'gcs' => [
            'driver' => 'gcs',
            'projectId' => 'your-project-id',
            'keyFile' => 'your-key-file',
            'bucket' => 'your-bucket',
            // 'prefix'    => 'your-prefix',
            // 'apiUri'    => 'http://your-domain.com',
        ],

        'gridfs' => [
            'driver' => 'gridfs',
            'server' => 'mongodb://localhost:27017',
            'database' => 'your-database',
            // 'visibility' => 'public',
            // 'pirate'     => false,
            // 'eventable'  => true,
            // 'cache'      => 'foo'
        ],

        'local' => [
            'driver' => 'local',
            'path' => storage_path('files'),
            // 'visibility' => 'public',
            // 'pirate'     => false,
            // 'eventable'  => true,
            // 'cache'      => 'foo'
        ],

        'null' => [
            'driver' => 'null',
            // 'eventable' => true,
            // 'cache'     => 'foo'
        ],

        'replicate' => [
            'driver' => 'replicate',
            'source' => 'your-source-adapter',
            'replica' => 'your-replica-adapter',
            // 'visibility' => 'public',
            // 'pirate'     => false,
            // 'eventable'  => true,
            // 'cache'      => 'foo'
        ],

        'sftp' => [
            'driver' => 'sftp',
            'host' => 'sftp.example.com',
            'port' => 22,
            'username' => 'your-username',
            'password' => 'your-password',
            // 'privateKey' => 'path/to/or/contents/of/privatekey',
            // 'root'       => '/path/to/root',
            // 'timeout'    => 20,
            // 'visibility' => 'public',
            // 'pirate'     => false,
            // 'eventable'  => true,
            // 'cache'      => 'foo'
        ],

        'webdav' => [
            'driver' => 'webdav',
            'baseUri' => 'http://example.org/dav/',
            'userName' => 'your-username',
            'password' => 'your-password',
            // 'visibility' => 'public',
            // 'pirate'     => false,
            // 'eventable'  => true,
            // 'cache'      => 'foo'
        ],

        'zip' => [
            'driver' => 'zip',
            'path' => storage_path('files.zip'),
            // 'visibility' => 'public',
            // 'pirate'     => false,
            // 'eventable'  => true,
            // 'cache'      => 'foo'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Flysystem Cache
    |--------------------------------------------------------------------------
    |
    | Here are each of the cache configurations setup for your application.
    | There are currently two drivers: illuminate and adapter. Examples of
    | configuration are included. You can of course have multiple connections
    | per driver as shown.
    |
    */

    'cache' => [
        'foo' => [
            'driver' => 'illuminate',
            'connector' => null, // null means use default driver
            'key' => 'foo',
            // 'ttl'       => 300
        ],

        'bar' => [
            'driver' => 'illuminate',
            'connector' => 'redis', // config/cache.php
            'key' => 'bar',
            'ttl' => 600,
        ],

        'adapter' => [
            'driver' => 'adapter',
            'adapter' => 'local', // as defined in connections
            'file' => 'flysystem.json',
            'ttl' => 600,
        ],
    ],
];
