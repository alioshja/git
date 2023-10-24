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
    $query = 'INSERT INTO offresemploi (offre, adresse, coordonees, competences, taches, salaire) VALUES (:offre, :adresse, :coordonees, :competence, :taches, :salaire)';

    $stmt = $conect->prepare($query);

    // Liaison des valeurs aux paramètres de la requête.
    $stmt->bindParam(':offre', $objOffre[':offre']);
    $stmt->bindParam(':adresse', $objOffre[':adresse']);
    $stmt->bindParam(':coordonees', $objOffre[':coordonees']);
    $stmt->bindParam(':competence', $objOffre[':competence']);
    $stmt->bindParam(':taches', $objOffre[':taches']);
    $stmt->bindParam(':salaire', $objOffre[':salaire']);

    // Exécution de la requête.
    if ($stmt->execute()) {
        echo 'Insertion réussie.';
    } else {
        echo 'Une erreur est survenue lors de l\'insertion.';
    }
}
?>
