<?php
require_once 'connection-pdo.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" lang="fr">
        <meta content="page de modération servant a confirmer la création des comptes et a leur définir un role">
        <link href="../Css/stylesheet.css" rel="stylesheet">
    </head>
    <body>
    <header>
        <nav id='ok'>
            <button class="">
            <a href="page-personelle.php">menu</a>
            </button>
            <h1>Connecté à <?php echo $_SESSION['utilisateur'][4]; ?></h1>
        </nav>
    </header>
    <main>
        <h1>
            comptes en attente de confirmation:
        </h1>
        <br>
        <?php
        $sql= 'SELECT * FROM usersenattente';
        $stmt= $conect->prepare($sql);
        
        if($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo'<p>Nom : ' . $row['nom'] . '</p><br>';
                echo'<p>Prénom : ' . $row['prénom'] . '</p><br>';
                echo'<p>Mail : ' . $row['MAIL'] . '</p><br>';
                echo'<p>ID : ' . $row['id'] . '</p><br>';
                echo '<form action="gestion-migration-de-compte.php" method="post">';
                echo '<input type="hidden" name="password"' . $row['Password'] . '">';
                echo'<button type="submit" name="refuser" value="refuser">Refuser</button>';
                echo'<button type="submit" name="employe" value="employe">Employé</button>';
                echo'<button type="submit" name="employeur" value="recruteur">Employeur</button>';
                echo '</form>';
                $id = $row['id'];
                echo '<hr>';
        }
        }else{
            echo 'une erreur c\'est produite lors de la récupération des données.';
        }

        //gestion form
        
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
        
            if ($action === "employe") {
                // Code pour gérer l'action "employe".
                $role = 'employe';
            } elseif ($action === "employeur") {
                // Code pour gérer l'action "employeur".
                $role = 'recruteur';
            }else {echo 'erreur impossible de récupérer le role';}
        }
        if (isset($_POST['refuser'])) {
            // Code pour gérer le cas de refus de l'utilisateur (supprimer l'entrée de la base de données).
            $sql2 = "DELETE FROM usersenattente WHERE id = :id";
            $sql3 = "SELECT 1 FROM 0";
        } elseif (isset($_POST['employe']) || isset($_POST['employeur'])) {
            // Code pour gérer le cas d'ajout en tant qu'employé ou employeur.
            $sql2 = "INSERT INTO users (nom, prenom, mail, password, role) SELECT nom, prénom, MAIL, password, :role FROM usersenattente WHERE id = :id";
            $sql3 = "DELETE FROM usersenattente WHERE id = :id";
        }
        if (isset($_POST['refuser']) || isset($_POST['employe']) || isset($_POST['employeur'])) {
            $stmt2 = $conect->prepare($sql2);
            $stmt2->bindParam(':id', $id);
            $stmt2->bindParam(':role', $role);
            $stmt2->execute();

            $stmt3 = $conect->prepare($sql3);
            $stmt3->bindParam(':id', $id);
            $stmt3->execute();
        }  //a vérifier
        ?>
    </main>
    </body>
</html>