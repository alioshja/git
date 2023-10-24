<?php
session_start();
try {
$conect = new PDO('mysql:host=localhost;dbname=trtconseil','root');
$conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
echo 'une erreur est survenu lors de la connection a la base de donées';
}
?>