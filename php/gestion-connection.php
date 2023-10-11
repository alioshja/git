<?php
session_start();
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
        $query = "SELECT id, nom, prenom, mail, Password, role FROM Users WHERE mail = :mail AND password = :password";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':mail', $saisi_mail);
        $stmt->bindParam(':password', $saisi_password);
        $stmt->execute();

        // Récupération des résultats de la requête.
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
                $mail = $user['mail'];
                $password = $user['Password'];
                $typeConte = $user['role'];
                $nom = $user['nom'];
                $prenom = $user['prenom'];
                $utilisateur = [$mail, $password, $typeConte, $nom, $prenom];
                $_SESSION['utilisateur'] = $utilisateur;
                header('location: page-personelle.php');
                
        }
        else{
            echo'impossible de récupérer les donées pour cet utilisateur';
        }
        
    }
} catch (PDOException $e) {
    // En cas d'erreur, on gére l'exception.
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>