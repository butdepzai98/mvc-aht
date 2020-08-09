<?php
namespace AHT\Config;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public function __construct() 
    {
        $capsule = new Capsule;    
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'mvc_aht',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
?>