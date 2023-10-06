<?php
try {
    // Création de la connexion PDO à la base de données.
    $pdo = new PDO("mysql:host=localhost;dbname=trtconseil", 'root');

    // Configuration de PDO pour générer des exceptions en cas d'erreur.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire et nettoyage/validation
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

        // Vérification si l'e-mail est valide au niveau du format et si elle existe grace au DNS.
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) { 
            echo 'Une erreur s\'est produite : l\'e-mail est invalide ou n\'existe pas.';
        } elseif ($password !== $passwordConfirm) {
            echo 'Vos mots de passe ne correspondent pas.';
            
        } elseif (!preg_match('/[A-Z]/', $password)) {
            echo 'Votre mot de passe ne contient aucune majuscule.';
        } elseif (!preg_match('/[0-9].*[0-9]/', $password)) {
            echo 'Votre mot de passe doit contenir au moins 2 chiffres.';
        } elseif (strlen($password) < 12) {
            echo 'Votre mot de passe doit contenir au moins 12 caractères.';
        } else {
            // Vérification si l'e-mail est déjà utilisé sur un autre compte.
            $query = "SELECT COUNT(*) FROM Usersenattente WHERE MAIL = :mail";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':mail', $mail);
            $stmt->execute();
            $count = $stmt->fetchColumn();
        
            if ($count > 0) {
                echo 'Cet e-mail est déjà utilisé pour un autre compte.';
            }
            else {
            // Hash du mot de passe.
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

            // Préparation de la requête d'insertion.
            $query = "INSERT INTO Usersenattente (nom, prénom, MAIL, Password) VALUES (:nom, :prenom, :mail, :password)";
            $stmt = $pdo->prepare($query);

            // Liaison des valeurs aux paramètres de la requête.
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':password', $passwordHashed);
        }

            // Exécution de la requête.
            if ($stmt->execute()) {

            // Redirection de l'utilisateur vers la page du menu.
            header("Location:../html/index.html");
            exit;
            }
        }
    } else {
        echo 'Merci de soumettre le formulaire.';
    }

    // Fermeture de la connexion PDO.
    $pdo = null;
} catch (PDOException $e) {
    // exception en cas d'erreur.
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>