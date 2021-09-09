<?php

namespace App\creators;

use App\interfaces\Factory;
use App\products\Mysql;


class Mysql_factory implements Factory
{

    private $response;

    public function Create_instace_db()
    {

        $this->response = new Mysql();
        return $this->response;
    }
}
