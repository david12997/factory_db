<?php

namespace App;

use App\interfaces\Factory;
use App\creators\Mysql_factory;
use App\creators\Postgres_factory;

class Creator implements Factory
{

    public $database_factory;




    public function __construct($database_factory)
    {
        $this->database_factory = $database_factory;
    }





    public function Create_instace_db()
    {

        $instance = 'empty';

        switch ($this->database_factory) {

            case 'mysql':

                $instance = $this->Create_mysql();

                break;

            case 'postgres':

                $instance = $this->Create_postgres();

                break;

            default:

                $instance = 'database not selected';

                break;
        }

        return $instance;
    }






    private function Create_mysql()
    {

        $mysql = new Mysql_factory();
        return $mysql->Create_instace_db();
    }


    private function Create_postgres()
    {

        $mysql = new Postgres_factory();
        return $mysql->Create_instace_db();
    }
}
