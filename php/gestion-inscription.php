<?php
try {
    // Création de la connexion PDO à la base de données.
    $pdo = new PDO("mysql:host=localhost;dbname=trtconseil", 'root');

    // Configuration de PDO pour générer des exceptions en cas d'erreur.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifiez si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérez les données du formulaire et effectuez le nettoyage et la validation
        $nom = trim($_POST['nom']);
        $nom = htmlspecialchars($nom);
        $nom = strip_tags($nom);

        $prenom = trim($_POST['prenom']);
        $prenom = htmlspecialchars($prenom);
        $prenom = strip_tags($prenom);

        $mail = trim($_POST['mailC']);
        $mail = htmlspecialchars($mail);
        $mail = strip_tags($mail);

        $password = $_POST['passwordC'];
        $password = htmlspecialchars($password);
        $password = strip_tags($password);

        $passwordConfirm = $_POST['passConfirm'];
        $passwordConfirm = htmlspecialchars($passwordConfirm);
        $passwordConfirm = strip_tags($passwordConfirm);

        // Vérifiez si l'e-mail est valide
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            echo 'Une erreur s\'est produite : l\'e-mail est invalide.';
        } elseif ($password !== $passwordConfirm) {
            echo 'Vos mots de passe ne correspondent pas.';
        } elseif (!preg_match('/[A-Z]/', $password)) {
            echo 'Votre mot de passe ne contient aucune majuscule.';
        } elseif (!preg_match('/[0-9].*[0-9]/', $password)) {
            echo 'Votre mot de passe doit contenir au moins 2 chiffres.';
        } elseif (strlen($password) < 12) {
            echo 'Votre mot de passe doit contenir au moins 12 caractères.';
        } else {
            // Hash du mot de passe
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

            // Préparation de la requête d'insertion.
            $query = "INSERT INTO Usersenattente (nom, prénom, MAIL, Password) VALUES (:nom, :prenom, :mail, :password)";
            $stmt = $pdo->prepare($query);

            // Liaison des valeurs aux paramètres de la requête.
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':password', $passwordHashed);

            // Exécution de la requête.
            $stmt->execute();

            // Redirection de l'utilisateur vers une page de confirmation ou une autre page.
            header("Location:../html/index.html");
            exit;
        }
    } else {
        echo 'Merci de soumettre le formulaire.';
    }

    // Fermeture de la connexion PDO.
    $pdo = null;
} catch (PDOException $e) {
    // Gérez l'exception en cas d'erreur.
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>