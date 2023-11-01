<?php
require_once 'connection-pdo.php';

//reste récup grace au form de page personelle si employeur a envoyé des données.
$nameE = $_POST['nomEntreprise'];
$adress = $_POST['adresse'];
$tel = $_POST['telephone'];
$mail = $_POST['email'];

 //recupération de l'id de l'utilisateur connecté.
 $Uid = $_SESSION['utilisateur'][0];

if (!isset($_POST['nomEntreprise'], $_POST['adresse'], $_POST['telephone'], $_POST['email'])) {
echo 'erreur';
}

$requette = "INSERT INTO coordonees (user_id, nomentreprise, adresse, telephone, email) VALUES (:id, :namee, :adress, :tel, :mail)";

try {
    $a = $conect->prepare($requette);
    $a->bindParam(':id', $Uid);
    $a->bindParam(':namee', $nameE);
    $a->bindParam(':adress', $adress);
    $a->bindParam(':tel', $tel);
    $a->bindParam(':mail', $mail);

    if ($a->execute()) {
        echo 'bdd bien remplie';
    } else {
        echo 'erreur lors de l\'insertion dans la base de données';
        $errorInfo = $a->errorInfo(); // Récupérer les informations sur l'erreur
        // Afficher les détails de l'erreur, par exemple :
        echo "Code d'erreur : " . $errorInfo[0] . "<br>";
        echo "Message d'erreur : " . $errorInfo[2] . "<br>";
    }
} catch (PDOException $e) {
    echo 'Erreur PDO : ' . $e->getMessage();
}
?>