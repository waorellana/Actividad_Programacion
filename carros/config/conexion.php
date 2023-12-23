<?php
define("DB_SERVER", "localhost:3306");
define("DB_USERNAME", "root");
define('DB_PASSWORD', "");
define("DB_DATABASE", "carros");
define("BASE_URL", "http//localhost/programa/");
 

function getDB()
{
    $dbhost = DB_SERVER;
    $dbuser = DB_USERNAME;
    $dbpass = DB_PASSWORD;
    $dbname = DB_DATABASE;

    try{
        $dbConnection = new  PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $dbuser, $dbpass);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }
    catch (PDOException $e){
        echo "Conection failed: " . $e->getMessage();
    }
}
