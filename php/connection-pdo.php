<?php
session_start();

    //local
$hostname = 'localhost';
$username = 'a6theq9v947ueil2';
$password = 'n7e6hnqxptvj4igl';
$database = 'fbo68nburz9od6in';

try {
$conect = new PDO('mysql:host=wb39lt71kvkgdmw0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=up7lwfziqqbfgpbx', $username, $password);
$conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
echo 'une erreur est survenu lors de la connection a la base de donées' . $e->getMessage();
}
// mysql -h wb39lt71kvkgdmw0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com -u c8fhliske9eu83e9 -pzf2o6e20su8f3pwy fbo68nburz9od6in < \sql\initialisation-Bdd.sql
?>