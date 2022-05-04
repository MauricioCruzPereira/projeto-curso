<?php

class Database{
    public static function getConnection(){
        //buscando o caminho do env
        $envPath = realpath(dirname(__FILE__) . '/../env.ini');
        //carregando o arquivo e retornando as config continadas
        // em um array associativo
        $env = parse_ini_file($envPath);

        $conn = new mysqli($env['host'],$env['username'],$env['password'], $env['database']);

        if($conn->connect_error){
           die("Error: {$conn->connect_error}"); 
        }
        return $conn;
    }

    public static function getResultFromQuery($sql){
        $conn = self::getConnection();
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
}