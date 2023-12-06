<?php
session_start();

    //local
$hostname = 'rwo5jst0d7dgy0ri.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username = 'ynosn8mgsbydc4qz';
$password = 'jg8knnts6wxd9va1';
$database = 'nfyz4op4dl8fjihn';

try {
$conect = new PDO("mysql:host=$hostname;port=3306;dbname=$database", $username, $password);
$conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
echo 'une erreur est survenu lors de la connection a la base de donées' . $e->getMessage();
}
?>