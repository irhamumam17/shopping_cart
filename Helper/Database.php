<?php
namespace Helper;
class Database{
    private static $config = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'db_name' => 'shopping_cart'
    ];

    public static function getInstance(){
        return new \mysqli(
            self::$config['host'],
            self::$config['username'],
            self::$config['password'],
            self::$config['db_name']
        );
    }
}
?>