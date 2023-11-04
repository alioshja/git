<?php

require_once 'connection-pdo.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Récupération des données POST et traitez-les
    $nom_offre = trim(htmlspecialchars(strip_tags($_POST['offre'])));
    $adresse = trim(htmlspecialchars(strip_tags($_POST['adresse'])));
    $coordonees = trim(htmlspecialchars(strip_tags($_POST['coordonees'])));
    $competences = trim(htmlspecialchars(strip_tags($_POST['competences'])));
    $taches = trim(htmlspecialchars(strip_tags($_POST['taches'])));
    $salaire = trim(htmlspecialchars(strip_tags($_POST['salaire'])));
$lundi = strip_tags(htmlspecialchars(trim($_POST['lundi'])));
$mardi = strip_tags(htmlspecialchars(trim($_POST['mardi'])));
$mercredi = strip_tags(htmlspecialchars(trim($_POST['mercredi'])));
$jeudi = strip_tags(htmlspecialchars(trim($_POST['jeudi'])));
$vendredi = strip_tags(htmlspecialchars(trim($_POST['vendredi'])));
$samedi = strip_tags(htmlspecialchars(trim($_POST['samedi'])));
$dimanche = strip_tags(htmlspecialchars(trim($_POST['dimanche'])));
$id_user = $_SESSION['utilisateur'][0];

    // Création d'un tableau associatif pour les valeurs liées.
    $objOffre = [
        ':offre' => $nom_offre,
        ':adresse' => $adresse,
        ':coordonees' => $coordonees,
        ':competence' => $competences,
        ':taches' => $taches,
        ':salaire' => $salaire
    ];

    // vérif si le fichier de connexion PDO est inclus et nommé correctement.


    // Utilisation d'une requête SQL correcte et préparée.
    $query = 'INSERT INTO offresemploi (offre, adresse, coordonees, competences, taches, salaire, lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche, user_id) 
    VALUES 
    (:offre, :adresse, :coordonees, :competence, :taches, :salaire, :lundi, :mardi, :mercredi, :jeudi, :vendredi, :samedi, :dimanche, :user_id)';

    $stmt = $conect->prepare($query);

    // Liaison des valeurs aux paramètres de la requête.
    $stmt->bindParam(':offre', $objOffre[':offre']);
    $stmt->bindParam(':adresse', $objOffre[':adresse']);
    $stmt->bindParam(':coordonees', $objOffre[':coordonees']);
    $stmt->bindParam(':competence', $objOffre[':competence']);
    $stmt->bindParam(':taches', $objOffre[':taches']);
    $stmt->bindParam(':salaire', $objOffre[':salaire']);
$stmt->bindParam(':lundi', $lundi);
$stmt->bindParam(':mardi', $mardi);
$stmt->bindParam(':mercredi', $mercredi);
$stmt->bindParam(':jeudi', $jeudi);
$stmt->bindParam(':vendredi', $vendredi);
$stmt->bindParam(':samedi', $samedi);
$stmt->bindParam(':dimanche', $dimanche);
$stmt->bindParam(':user_id', $id_user);

    // Exécution de la requête.
    if ($stmt->execute()) {
        echo 'Insertion réussie.';
    } else {
        echo 'Une erreur est survenue lors de l\'insertion.';
    }
}
?>
