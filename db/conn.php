<?php

require_once 'resources/Medoo.php';

use Medoo\Medoo;

/**
 * @return Medoo
 */
function connection()
{
    $db = parse_ini_file("db.conf");
    $database = new Medoo([
// required
        'database_type' => $db['type'],
        'database_name' => $db['name'],
        'server' => $db['host'],
        'username' => $db['user'],
        'password' => $db['pass'],

// [optional]
        'charset' => 'utf8',
        'port' => $db['port'],


//    // [optional] Enable logging (Logging is disabled by default for better performance)
//    'logging' => true,


    ]);
    return $database;
}
