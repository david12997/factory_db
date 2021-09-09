<?php


namespace App\interfaces;

interface Database
{

    public function Conect_Server($server, $user, $password, $database, $port);
    public function Create($query, $conexion);
    public function Read($query, $conexion);
    public function Update($query, $conexion);
    public function Delete($query, $conexion);
}
