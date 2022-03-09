<?php
class Database{
    public static function Conectar(){
        define('host','localhost');
        define('db_name','vue_db');
        define('db_user','root');
        define('db_pass','root');
		
        $opciones=array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8');

        try{
            $connection = new PDO("mysql:host=".host.";dbname=".db_name, db_user, db_pass, $opciones);
            return $connection;
        }catch(Exception $e){
            die("Database connection failed: ". $e->getMessage());
        }
    }

}

?>