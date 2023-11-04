<?php
require_once 'connection-pdo.php';
$message = '';
//recup des données en POST.

$offre_id = $_POST['offre_id'];
$cv_id = $_POST['cv_id'];

$stmt = $conect;
$sql = 'INSERT INTO relation_employe_ouvrier(id_offre, id_cv) VALUES (:offre_id, :cv_id)';
$stmt=$stmt->prepare($sql);
$stmt->bindParam(':id_offre', $offre_id);
$stmt->bindParam(':cv_id', $cv_id);

if($stmt->execute()) {
$message = 'Vous avez confirmé la postulation';
}
else {
    $message = 'la postulation n\'a pas été confimé';
}
?>