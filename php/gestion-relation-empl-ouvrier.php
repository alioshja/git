<?php
require_once 'connection-pdo.php';
//Ce code permet d'inserer des données dans la bdd relation_emplye_ouvrier.

$message = '';
//recup des données en POST.

$offre_id = $_POST['offre_id'];
$cv_id = $_POST['cv_id'];

$sql = 'INSERT INTO relation_employe_ouvrier(id_offre, id_cv) VALUES (:id_offre, :cv_id)';
$stmt=$conect->prepare($sql);
$stmt->bindParam(':id_offre', $offre_id);
$stmt->bindParam(':cv_id', $cv_id);

if($stmt->execute()) {
    $message = 'Vous avez confirmé la postulation';
}else {
    $message = 'la postulation n\'a pas été confimé';
}
?>