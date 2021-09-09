<?php

namespace App\products;

use App\interfaces\Database;
use PDO;
use Exception;


class Postgres implements Database
{

    protected $response = [

        'status' => false,
        'response' => 'empty'
    ];



    public function Conect_Server($server, $user, $password, $database, $port)
    {
        try {

            $conexion = new PDO("pgsql:host=" . $server . ";port=" . $port . ";dbname=" . $database, $user, $password);

            $this->response['status'] = true;
            $this->response['response'] = $conexion;

            //
        } catch (Exception $error) {

            $this->response['status'] = false;
            $this->response['response'] = $error->getMessage();
        }

        //
        return $this->response;
    }



    public function Create($query, $conexion)
    {

        return $this->Main($conexion, $query, 'return boolean');
    }

    public function Read($query, $conexion)
    {

        return $this->Main($conexion, $query, 'return data');
    }

    public function Update($query, $conexion)
    {

        return $this->Main($conexion, $query, 'return boolean');
    }

    public function Delete($query, $conexion)
    {

        return $this->Main($conexion, $query, 'return boolean');
    }





    private function Main($conexion, $query, $type)
    {

        if (!$run_query = $conexion->query($query)) {

            $this->response['status'] = false;
            $this->response['response'] = $run_query;


            //
        } else {

            $this->response['status'] = true;

            if ($type === 'return boolean') {

                $this->response['response'] = $run_query;
                //
            } else if ($type === 'return data') {

                $this->response['response'] = $run_query->fetchAll();
            }
        }

        return $this->response;
    }
}
