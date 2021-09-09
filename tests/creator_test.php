<?php

use PHPUnit\Framework\TestCase;

use App\Creator;
use App\products\Mysql;
use App\products\Postgres;



class Creator_test extends TestCase
{

    public function test_instance_mysql()
    {

        $instance_mysql = new Creator('mysql');
        $this->assertInstanceOf(Mysql::class, $instance_mysql->Create_instace_db());
    }


    public function test_instance_postgres()
    {

        $instance_mysql = new Creator('postgres');
        $this->assertInstanceOf(Postgres::class, $instance_mysql->Create_instace_db());
    }


    public function test_instance_db_failed()
    {

        $instance_mysql = new Creator('postgresdd');
        $this->assertEquals('database not selected', $instance_mysql->Create_instace_db());
    }



    //
}
