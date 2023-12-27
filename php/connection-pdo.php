<?php
session_start();

    //local
$hostname = 'rwo5jst0d7dgy0ri.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username = 'ynosn8mgsbydc4qz';
$password = 'jg8knnts6wxd9va1';
$database = 'nfyz4op4dl8fjihn';
$port = '3306';

try {
$conect = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8", $username, $password);
$conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
echo 'une erreur est survenu lors de la connection a la base de donées' . $e->getMessage();
}
?>