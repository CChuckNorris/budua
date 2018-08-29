<?php
$db = [
    "prod"=>[
        "host"=> '',
        "dbname" => '',
        "username" => '',
        "password" => ''
    ],
    "local" => [
        "host"=> 'localhost',
        "dbname" => 'budua',
        "username" => 'root',
        "password" => ''
    ],
    "dev" => [
        "host"=> 'mysql.zzz.com.ua',
        "dbname" => 'jakobx86',
        "username" => 'seostars',
        "password" => '55!X82146VJg'
    ],
];

$current_db = $db['local'];

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host='.$current_db["host"].';dbname='.$current_db["dbname"].'',
    'username' => $current_db["username"],
    'password' => $current_db["password"],
    'charset' => 'utf8',
    'enableSchemaCache' => false,
    'schemaCacheDuration' => 3600,
    'schemaCache' => 'cache',
];
