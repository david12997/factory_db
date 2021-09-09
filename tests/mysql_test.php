<?php

use PHPUnit\Framework\TestCase;
use  App\products\Mysql;

class Mysql_test extends TestCase
{


    //CONECT

    public function test_conect_server_success()
    {
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'u418177199_lms';
        $port = 3306;

        //main 
        $mysql_conexion1 = new Mysql();

        $this->assertArrayHasKey('status', $mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port));
        $this->assertArrayHasKey('response', $mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port));

        $this->assertIsBool($mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['status']);
        $this->assertNotFalse($mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['status']);


        $this->assertIsObject($mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response']);
    }




    public function test_conect_server_failed()
    {
        $server = '';
        $user = 123;
        $password = 'test';
        $db_name = '';
        $port = 'test';

        //main 
        $mysql_conexion1 = new Mysql();

        $this->assertArrayHasKey('status', $mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port));
        $this->assertArrayHasKey('response', $mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port));


        $this->assertIsBool($mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['status']);
        $this->assertFalse($mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['status']);


        $this->assertIsString($mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response']);
    }




    //CREATE

    public function test_create_success()
    {

        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'u418177199_lms';
        $port = 3306;
        $query = "insert into estudiante values(null,'Estudiante de prueba','estudiante@prueba.com','password123')";

        //main 
        $mysql_conexion1 = new Mysql();
        $conexion = $mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $mysql_conexion1->Create($query, $conexion));
        $this->assertArrayHasKey('response', $mysql_conexion1->Create($query, $conexion));


        $this->assertIsBool($mysql_conexion1->Create($query, $conexion)['status']);
        $this->assertNotFalse($mysql_conexion1->Create($query, $conexion)['status']);


        $this->assertEquals('query success', $mysql_conexion1->Create($query, $conexion)['response']);
    }



    public function test_create_failed()
    {

        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'u418177199_lms';
        $port = 3306;
        $query = "insert into estudiantess values(null,'Estudiante de prueba','estudiante@prueba.com','password123')";

        //main 
        $mysql_conexion1 = new Mysql();
        $conexion = $mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $mysql_conexion1->Create($query, $conexion));
        $this->assertArrayHasKey('response', $mysql_conexion1->Create($query, $conexion));


        $this->assertIsBool($mysql_conexion1->Create($query, $conexion)['status']);
        $this->assertFalse($mysql_conexion1->Create($query, $conexion)['status']);
    }




    //READ

    public function test_read_success()
    {

        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'u418177199_lms';
        $port = 3306;
        $query = "select * from estudiante";


        //main 
        $mysql_conexion1 = new Mysql();
        $conexion = $mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $mysql_conexion1->Read($query, $conexion));
        $this->assertArrayHasKey('response', $mysql_conexion1->Read($query, $conexion));


        $this->assertIsBool($mysql_conexion1->Read($query, $conexion)['status']);
        $this->assertNotFalse($mysql_conexion1->Read($query, $conexion)['status']);


        $this->assertIsArray($mysql_conexion1->Read($query, $conexion)['response']);
    }



    public function test_read_failed()
    {

        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'u418177199_lms';
        $port = 3306;
        $query = "sselect  * from estudiante";

        //main 
        $mysql_conexion1 = new Mysql();
        $conexion = $mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $mysql_conexion1->Create($query, $conexion));
        $this->assertArrayHasKey('response', $mysql_conexion1->Create($query, $conexion));


        $this->assertIsBool($mysql_conexion1->Create($query, $conexion)['status']);
        $this->assertFalse($mysql_conexion1->Create($query, $conexion)['status']);


        $this->assertIsString($mysql_conexion1->Create($query, $conexion)['response']);
    }




    //UPDATE

    public function test_update_success()
    {

        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'u418177199_lms';
        $port = 3306;
        $query = "update estudiante set nombre='Pruebassss' where id_estudiante=33";


        //main 
        $mysql_conexion1 = new Mysql();
        $conexion = $mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $mysql_conexion1->Update($query, $conexion));
        $this->assertArrayHasKey('response', $mysql_conexion1->Update($query, $conexion));


        $this->assertIsBool($mysql_conexion1->Update($query, $conexion)['status']);
        $this->assertNotFalse($mysql_conexion1->Update($query, $conexion)['status']);


        $this->assertEquals('query success', $mysql_conexion1->Update($query, $conexion)['response']);
    }



    public function test_update_failed()
    {

        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'u418177199_lms';
        $port = 3306;
        $query = "esfsefdsfds";

        //main 
        $mysql_conexion1 = new Mysql();
        $conexion = $mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $mysql_conexion1->Update($query, $conexion));
        $this->assertArrayHasKey('response', $mysql_conexion1->Update($query, $conexion));


        $this->assertIsBool($mysql_conexion1->Update($query, $conexion)['status']);
        $this->assertFalse($mysql_conexion1->Update($query, $conexion)['status']);
    }



    //DELETE

    public function test_delete_success()
    {

        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'u418177199_lms';
        $port = 3306;
        $query = "delete from curso_estudiante where id_estudiante=2";


        //main 
        $mysql_conexion1 = new Mysql();
        $conexion = $mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $mysql_conexion1->Delete($query, $conexion));
        $this->assertArrayHasKey('response', $mysql_conexion1->Delete($query, $conexion));


        $this->assertIsBool($mysql_conexion1->Delete($query, $conexion)['status']);
        $this->assertNotFalse($mysql_conexion1->Delete($query, $conexion)['status']);


        $this->assertEquals('query success', $mysql_conexion1->Delete($query, $conexion)['response']);
    }



    public function test_delete_failed()
    {

        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'u418177199_lms';
        $port = 3306;
        $query = "esfsefdsfds";

        //main 
        $mysql_conexion1 = new Mysql();
        $conexion = $mysql_conexion1->Conect_Server($server, $user, $password, $db_name, $port)['response'];

        $this->assertArrayHasKey('status',  $mysql_conexion1->Delete($query, $conexion));
        $this->assertArrayHasKey('response', $mysql_conexion1->Delete($query, $conexion));


        $this->assertIsBool($mysql_conexion1->Delete($query, $conexion)['status']);
        $this->assertFalse($mysql_conexion1->Delete($query, $conexion)['status']);
    }
}
