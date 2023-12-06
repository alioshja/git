<?php
session_start();

    //local
$hostname = 'rwo5jst0d7dgy0ri.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username = 'ynosn8mgsbydc4qz';
$password = 'jg8knnts6wxd9va1';
$database = 'nfyz4op4dl8fjihn';

try {
$conect = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
$conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
echo 'une erreur est survenu lors de la connection a la base de donées' . $e->getMessage();
}
// mysql -h wb39lt71kvkgdmw0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com -u c8fhliske9eu83e9 -pzf2o6e20su8f3pwy fbo68nburz9od6in < \sql\initialisation-Bdd.sql
?>