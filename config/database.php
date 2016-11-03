<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style.
    |
    */

    'fetch' => PDO::FETCH_OBJ,

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlsrv'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'MSSQL' => [
            'driver' => 'sqlsrv',
            'host' => env('MSSQL_HOST', '192.168.168.5'),
            'port' => env('MSSQL_PORT', '1433'),
            'database' => env('MSSQL_DATABASE', 'productionHistory'),
            'username' => env('MSSQL_USERNAME', 'productionHistory'),
            'password' => env('MSSQL_PASSWORD', 'productionHistory'),
            'charset' => env('MSSQL_CHARSET', 'utf8'),
            'collation' => env('MSSQL_COLLATION', 'utf8_unicode_ci'),
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],

        'DB_upgiSystem' => [
            'driver' => 'mysql',
            'host' => env('MYSQL_HOST', '192.168.168.86'),
            'port' => env('MYSQL_PORT', '3306'),
            'database' => 'upgiSystem',
            'username' => env('MYSQL_USERNAME', 'spark'),
            'password' => env('MYSQL_PASSWORD', 'pa676579'),
            'charset' => env('MYSQL_CHARSET', 'utf8'),
            'collation' => env('MYSQL_COLLATION', 'utf8_unicode_ci'),
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'cluster' => false,

        'default' => [
            'host' => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
