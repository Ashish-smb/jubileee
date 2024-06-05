<?php

require_once( __DIR__ . '/Medoo.php' );

use Medoo\Medoo;

class DB extends Medoo {

}

$db = new DB([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'jubilee',
    'username' => 'root',
    'password' => ''
]);