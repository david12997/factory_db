<?php

namespace App\products;

use App\interfaces\Database;
use mysqli;

class Mysql implements Database
{

    protected $RESPONSE = [

        'status' => false,
        'response' => 'empty'
    ];

    public function Conect_Server($server, $user, $password, $database, $port)
    {
        return $this->Main('', '', 'conect', [$server, $user, $password, $database, $port]);
    }

    public function Create($query, $conexion)
    {
        return $this->Main($query, $conexion, 'create', '');
    }

    public function Read($query, $conexion)
    {
        return $this->Main($query, $conexion, 'read', '');
    }

    public function Update($query, $conexion)
    {
        return $this->Main($query, $conexion, 'update', '');
    }

    public function Delete($query, $conexion)
    {
        return  $this->Main($query, $conexion, 'delete', '');
    }




    //_____________________________ common functions


    private function Main($query, $conexion, $ACTION, $CREDENTIAL)
    {

        //main thread
        if ($query === '' &&  $conexion === '' && $CREDENTIAL !== '' && $ACTION === 'conect' && is_array($CREDENTIAL)  && isset($CREDENTIAL[0]) &&  isset($CREDENTIAL[1])  && isset($CREDENTIAL[2])  && isset($CREDENTIAL[3])  && isset($CREDENTIAL[4])) {

            $this->Get_conexion($CREDENTIAL);
        } else {


            if ($this->Check_parameters_crud($query, $conexion)) {

                $this->Choose_type_action_crud($query, $conexion, $ACTION);
                //
            } else {

                $this->RESPONSE['status'] = false;
                $this->RESPONSE['response'] = 'Query failed, Check if the parameters of ' . $ACTION . ' method is ok';
            }
        }

        return $this->RESPONSE;
    }




    private function Get_conexion($CONECT)
    {


        if ($this->Check_parameters_conect($CONECT[0], $CONECT[1], $CONECT[3], $CONECT[4])) {

            $this->Create_mysql_Conexion(strval($CONECT[0]), strval($CONECT[1]), strval($CONECT[2]), strval($CONECT[3]), intval($CONECT[4]));
            //
        } else {

            $this->RESPONSE['status'] = false;
            $this->RESPONSE['response'] = 'check the parameter and it types of Conect_Server';
        }
    }


    private function Create_mysql_Conexion($server, $user, $password, $database, $port)
    {
        $MYSQL_CONEXION = new mysqli($server, $user, $password, $database,  $port);


        if ($MYSQL_CONEXION->connect_errno) {

            $this->RESPONSE['status'] = false;
            $this->RESPONSE['response'] = 'Conect Failed ' . $MYSQL_CONEXION->connect_error;
        } else {

            mysqli_query($MYSQL_CONEXION, "SET NAMES 'utf8'");
            $this->RESPONSE['status'] = true;
            $this->RESPONSE['response'] =  $MYSQL_CONEXION;
        }
    }


    private function Choose_type_action_crud($query, $conexion, $ACTION)
    {

        if ($ACTION === 'create' || $ACTION === 'update' || $ACTION === 'delete') {

            $this->Run_query_boolean($query, $conexion);
        } else if ($ACTION === 'read') {

            $this->Run_query_data($query, $conexion);
        } else {

            $this->RESPONSE['status'] = false;
            $this->RESPONSE['response'] = $ACTION . ' is not a valid parameter';
        }
    }





    //_______________________ checks

    private function Check_parameters_crud($query, $conexion)
    {

        if (is_string($query) && is_object($conexion)) {

            return true;
        } else {

            return false;
        }
    }

    private function Check_parameters_conect($server, $user, $database, $port)
    {

        if (is_string($server) &&  is_string($user)  && is_string($database) && is_int($port)) {

            if ($server === ''  && $database === '') {

                return false;
            } else {

                return true;
            }
        } else {

            return false;
        }
    }




    //_______________________ Run sql query

    private function Run_query_boolean($query, $conexion)
    {
        if ($conexion->query($query)) {

            $this->RESPONSE = [

                'status' => true,
                'response' => 'query success'
            ];
        } else {

            $this->RESPONSE = [

                'status' => false,
                'response' => 'Query Failed ' . $conexion->error
            ];
        }
    }

    private function Run_query_data($query, $conexion)
    {
        if ($data = $conexion->query($query)) {

            $this->RESPONSE = [

                'status' => true,
                'response' => $data->fetch_assoc()
            ];

            //
        } else if ($data->num_rows === 0) {

            $this->RESPONSE = [

                'status' => false,
                'response' => 'query success, but response is empty'
            ];
        } else {

            $this->RESPONSE = [

                'status' => false,
                'response' => 'Query Failed ' . $conexion->error
            ];
        }
    }
}
