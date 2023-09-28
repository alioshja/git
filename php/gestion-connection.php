<?php

try {
    // initialisation connexion PDO à la base de données.
    $pdo = new PDO("mysql:host=localhost;dbname=trtconseil", 'root');

    // Configuration PDO pour générer des exceptions en cas d'erreur.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification si le formulaire a été soumis.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire.
        $saisi_mail = $_POST['mail'];
        $saisi_password = $_POST['password'];

        // Préparation de requête pour récupérer les données de l'utilisateur.
        $query = "SELECT id, nom, prénom, MAIL, Password FROM Users WHERE MAIL = :mail";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':mail', $saisi_mail);
        $stmt->execute();

        // Récupération des résultats de la requête.
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification si l'utilisateur existe dans la base de données et que le mot de passe est correct.
        if ($user && password_verify($saisi_password, $user['Password'])) {
            //si les informations de l'utilisateur sont correctes, on les stocke dans des variables.
            $id_utilisateur = $user['id'];
            $nom_utilisateur = $user['nom'];
            $prenom_utilisateur = $user['prénom'];

            //création et exécution d'une fonction JS qui vas modifier le dom pour créer une interface utilisateur.
            
        echo '<script>';
        echo 'function menuUser() {';
        echo 'code js';
        echo '}';
        echo 'window.onload = menuUser';
        echo '</script>';

            exit;
        } else {
            echo "Identifiants incorrects. Veuillez réessayer.";
        }
    }
} catch (PDOException $e) {
    // En cas d'erreur, on gére l'exception.
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>