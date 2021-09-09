<?php

use PHPUnit\Framework\TestCase;
use  App\products\Postgres;

class Postgres_test extends TestCase
{

    public function test_conect_server_success()
    {
        $server = 'localhost';
        $user = 'postgres';
        $password = 'david';
        $db_name = 'prueba_factorydb';
        $port = 5432;

        //main 
        $postgres_conexion1 = new Postgres();

        $this->assertArrayHasKey('status', $postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port));
        $this->assertArrayHasKey('response', $postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port));

        $this->assertIsBool($postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['status']);
        $this->assertNotFalse($postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['status']);


        $this->assertIsObject($postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response']);
    }


    public function test_conect_server_failed()
    {
        $server = '';
        $user = 123;
        $password = 'test';
        $db_name = '';
        $port = 'test';

        //main 
        $postgres_conexion1 = new Postgres();

        $this->assertArrayHasKey('status', $postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port));
        $this->assertArrayHasKey('response', $postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port));


        $this->assertIsBool($postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['status']);
        $this->assertFalse($postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['status']);


        $this->assertIsString($postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response']);
    }



    //CREATE

    public function test_create_success()
    {

        $server = 'localhost';
        $user = 'postgres';
        $password = 'david';
        $db_name = 'prueba_factorydb';
        $port = 5432;
        $query = "insert into prueba values(DEFAULT,'prueba 1','estudiante@prueba.com')";

        //main 
        $postgres_conexion1 = new Postgres();
        $conexion = $postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $postgres_conexion1->Create($query, $conexion));
        $this->assertArrayHasKey('response', $postgres_conexion1->Create($query, $conexion));


        $this->assertIsBool($postgres_conexion1->Create($query, $conexion)['status']);
        $this->assertNotFalse($postgres_conexion1->Create($query, $conexion)['status']);


        $this->assertIsObject($postgres_conexion1->Create($query, $conexion)['response']);
    }



    public function test_create_failed()
    {

        $server = 'localhost';
        $user = 'postgres';
        $password = 'david';
        $db_name = 'prueba_factorydb';
        $port = 5432;
        $query = "insert into estudiantess values(null,'Estudiante de prueba','estudiante@prueba.com','password123')";

        //main 
        $postgres_conexion1 = new Postgres();
        $conexion = $postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $postgres_conexion1->Create($query, $conexion));
        $this->assertArrayHasKey('response', $postgres_conexion1->Create($query, $conexion));


        $this->assertIsBool($postgres_conexion1->Create($query, $conexion)['status']);
        $this->assertFalse($postgres_conexion1->Create($query, $conexion)['status']);

        $this->assertFalse($postgres_conexion1->Create($query, $conexion)['response']);
    }






    //READ

    public function test_read_success()
    {

        $server = 'localhost';
        $user = 'postgres';
        $password = 'david';
        $db_name = 'prueba_factorydb';
        $port = 5432;
        $query = "select * from prueba";

        //main 
        $postgres_conexion1 = new Postgres();
        $conexion = $postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $postgres_conexion1->Read($query, $conexion));
        $this->assertArrayHasKey('response', $postgres_conexion1->Read($query, $conexion));


        $this->assertIsBool($postgres_conexion1->Read($query, $conexion)['status']);
        $this->assertNotFalse($postgres_conexion1->Read($query, $conexion)['status']);


        $this->assertIsArray($postgres_conexion1->Read($query, $conexion)['response']);
    }




    public function test_read_falied()
    {

        $server = 'localhost';
        $user = 'postgres';
        $password = 'david';
        $db_name = 'prueba_factorydb';
        $port = 5432;
        $query = "insert infueba values(DEFAULT,'prueba 1','estudiante@prueba.com')";

        //main 
        $postgres_conexion1 = new Postgres();
        $conexion = $postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $postgres_conexion1->Read($query, $conexion));
        $this->assertArrayHasKey('response', $postgres_conexion1->Read($query, $conexion));


        $this->assertIsBool($postgres_conexion1->Read($query, $conexion)['status']);
        $this->assertFalse($postgres_conexion1->Read($query, $conexion)['status']);


        $this->assertFalse($postgres_conexion1->Read($query, $conexion)['response']);
    }






    //UPDATE

    public function test_update_success()
    {

        $server = 'localhost';
        $user = 'postgres';
        $password = 'david';
        $db_name = 'prueba_factorydb';
        $port = 5432;
        $query = "update prueba set nombre='Hola soy prueba cambiada' where nombre='hola soy prueba'";

        //main 
        $postgres_conexion1 = new Postgres();
        $conexion = $postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $postgres_conexion1->Update($query, $conexion));
        $this->assertArrayHasKey('response', $postgres_conexion1->Update($query, $conexion));


        $this->assertIsBool($postgres_conexion1->Update($query, $conexion)['status']);
        $this->assertNotFalse($postgres_conexion1->Update($query, $conexion)['status']);


        $this->assertIsObject($postgres_conexion1->Update($query, $conexion)['response']);
    }



    public function test_update_failed()
    {

        $server = 'localhost';
        $user = 'postgres';
        $password = 'david';
        $db_name = 'prueba_factorydb';
        $port = 5432;
        $query = "insert into estudiaddntess values(null,'Estudiante de prueba','estudiante@prueba.com','password123')";

        //main 
        $postgres_conexion1 = new Postgres();
        $conexion = $postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $postgres_conexion1->Update($query, $conexion));
        $this->assertArrayHasKey('response', $postgres_conexion1->Update($query, $conexion));


        $this->assertIsBool($postgres_conexion1->Update($query, $conexion)['status']);
        $this->assertFalse($postgres_conexion1->Update($query, $conexion)['status']);

        $this->assertFalse($postgres_conexion1->Update($query, $conexion)['response']);
    }



    //DELETE

    public function test_delete_success()
    {

        $server = 'localhost';
        $user = 'postgres';
        $password = 'david';
        $db_name = 'prueba_factorydb';
        $port = 5432;
        $query = "delete from prueba where nombre = 'prueba 1'";

        //main 
        $postgres_conexion1 = new Postgres();
        $conexion = $postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $postgres_conexion1->Delete($query, $conexion));
        $this->assertArrayHasKey('response', $postgres_conexion1->Delete($query, $conexion));


        $this->assertIsBool($postgres_conexion1->Delete($query, $conexion)['status']);
        $this->assertNotFalse($postgres_conexion1->Delete($query, $conexion)['status']);


        $this->assertIsObject($postgres_conexion1->Delete($query, $conexion)['response']);
    }



    public function test_delete_failed()
    {

        $server = 'localhost';
        $user = 'postgres';
        $password = 'david';
        $db_name = 'prueba_factorydb';
        $port = 5432;
        $query = "insfffert into estudiaddntess values(null,'Estudiante de prueba','estudiante@prueba.com','password123')";

        //main 
        $postgres_conexion1 = new Postgres();
        $conexion = $postgres_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $postgres_conexion1->Delete($query, $conexion));
        $this->assertArrayHasKey('response', $postgres_conexion1->Delete($query, $conexion));


        $this->assertIsBool($postgres_conexion1->Delete($query, $conexion)['status']);
        $this->assertFalse($postgres_conexion1->Delete($query, $conexion)['status']);

        $this->assertFalse($postgres_conexion1->Delete($query, $conexion)['response']);
    }





    //
}
