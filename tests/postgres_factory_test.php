<?php

use PHPUnit\Framework\TestCase;
use  App\creators\Postgres_factory;
use App\products\Postgres;


class Postgres_factory_test extends TestCase
{

    public function test_instance_Postgres()
    {

        $postgres = new Postgres_factory();
        $this->assertInstanceOf(Postgres::class, $postgres->Create_instace_db());
    }



    //
}
