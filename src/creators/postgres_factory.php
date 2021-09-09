<?php

namespace App\creators;

use App\interfaces\Factory;
use App\products\Postgres;


class Postgres_factory implements Factory
{

    private $response;

    public function Create_instace_db()
    {

        $this->response = new Postgres();
        return $this->response;
    }
}
