<?php

use PHPUnit\Framework\TestCase;
use  App\creators\Mysql_factory;
use App\products\Mysql;


class Mysql_factory_test extends TestCase
{

    public function test_instance_mysql()
    {

        $mysql = new Mysql_factory();
        $this->assertInstanceOf(Mysql::class, $mysql->Create_instace_db());
    }



    //
}
