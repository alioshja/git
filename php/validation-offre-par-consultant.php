<?php
require_once 'connection-pdo.php';
//ce code permet a un consultant de valider ou non le déploiement d'une offre d'emploi.
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" lang="fr">
    <meta content="page de modération servant a confirmer les offres d'emploi.">
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
            offres d'emploi en attente de déploiement:
        </h1>
        <br>
        <?php
        $sql = 'SELECT * FROM offresemploi';
        $stmt = $conect->prepare($sql);

        if ($stmt->execute()) {
            while ($ligne = $stmt->fetch()) {
                $offreId = $ligne['id'];
                echo "<h3><u>*Nom de l'offre :</u></h3>";
                echo "<p class='offres'>" . $ligne['offre'] . "</p><br>";
                echo "<h3><u>Adresse :</u></h3>";
                echo "<p class='offres'>" . $ligne['adresse'] . "</p><br>";
                echo "<h3><u>Coordonnées :</u></h3>";
                echo "<p class='offres'>" . $ligne['coordonees'] . "</p><br>";
                echo "<h3><u>Compétences nécessaires :</u></h3>";
                echo "<p class='offres'>" . $ligne['competences'] . "</p><br>";
                echo "<h3><u>Tâches à accomplir :</u></h3>";
                echo "<p class='offres'>" . $ligne['taches'] . "</p><br>";
                echo "<h3><u>Salaire brut par mois :</u></h3>";
                echo "<p class='offres'>" . $ligne['salaire'] . "</p><br>";
                echo "<h2>*Horraires</h2>";
                echo "<br>";
                echo "<h3><u>Lundi</u></h3>";
                echo "<p class='offres'>" . $ligne['lundi'] . "</p><br>";
                echo "<h3><u>Mardi</u></h3>";
                echo "<p class='offres'>" . $ligne['mardi'] . "</p><br>";
                echo "<h3><u>Mercredi</u></h3>";
                echo "<p class='offres'>" . $ligne['mercredi'] . "</p><br>";
                echo "<h3><u>Jeudi</u></h3>";
                echo "<p class='offres'>" . $ligne['jeudi'] . "</p><br>";
                echo "<h3><u>Vendredi</u></h3>";
                echo "<p class='offres'>" . $ligne['vendredi'] . "</p><br>";
                echo "<h3><u>Samedi</u></h3>";
                echo "<p class='offres'>" . $ligne['samedi'] . "</p><br>";
                echo "<h3><u>Dimanche</u></h3>";
                echo "<p class='offres'>" . $ligne['dimanche'] . "</p><br>";
                $offreId = $ligne['id'];
                $id = $ligne['user_id'];
                echo "<form method='post' action='validation-offre-par-consultant.php'>";
                echo "<input type='hidden' name='offreId' value='$offreId'>";
                echo "<button type='submit' name='action' value='refuser'>Refuser</button>";
                echo "<button type='submit' name='action' value='valider'>Valider</button>";
                echo '</form>';
                echo '<hr>';
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action'])) {
                $action = $_POST['action'];

                if ($action === 'refuser') {
                    // Code pour gérer l'action "refuser".
            
                    $sqlDelete = 'DELETE FROM offresemploi WHERE user_id = :user_id';
                    $stmtDelete = $conect->prepare($sqlDelete);
                    $stmtDelete->bindParam(':user_id', $id);
                    $stmtDelete->execute();
                } elseif ($action === 'valider') {
                    // Code pour gérer l'action "valider".
                    // Récupérer les données de l'offre depuis la table offresemploi
                    $sqlSelect = 'SELECT * FROM offresemploi WHERE id = :offreId';
                    $stmtSelect = $conect->prepare($sqlSelect);
                    $stmtSelect->bindParam(':offreId', $offreId);
                    $stmtSelect->execute();

                    if ($row = $stmtSelect->fetch(PDO::FETCH_ASSOC)) {
                        // Insérer les données dans la table offres_validees
                        $sqlInsert = 'INSERT INTO offres_validees (offre, adresse, coordonees, competences, taches, salaire, lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche, user_id)
                  VALUES (:offre, :adresse, :coordonees, :competences, :taches, :salaire, :lundi, :mardi, :mercredi, :jeudi, :vendredi, :samedi, :dimanche, :user_id)';
                        $stmtInsert = $conect->prepare($sqlInsert);
                        $stmtInsert->bindParam(':offre', $row['offre']);
                        $stmtInsert->bindParam(':adresse', $row['adresse']);
                        $stmtInsert->bindParam(':coordonees', $row['coordonees']);
                        $stmtInsert->bindParam(':competences', $row['competences']);
                        $stmtInsert->bindParam(':taches', $row['taches']);
                        $stmtInsert->bindParam(':salaire', $row['salaire']);
                        $stmtInsert->bindParam(':lundi', $row['lundi']);
                        $stmtInsert->bindParam(':mardi', $row['mardi']);
                        $stmtInsert->bindParam(':mercredi', $row['mercredi']);
                        $stmtInsert->bindParam(':jeudi', $row['jeudi']);
                        $stmtInsert->bindParam(':vendredi', $row['vendredi']);
                        $stmtInsert->bindParam(':samedi', $row['samedi']);
                        $stmtInsert->bindParam(':dimanche', $row['dimanche']);
                        $stmtInsert->bindParam(':user_id', $row['user_id']);
                        $user_id = $row['user_id'];
                        $stmtInsert->execute();

                        // Supprimer l'offre d'emploi de la table offresemploi
                        $sqlDelete = 'DELETE FROM offresemploi WHERE user_id = :id';
                        $stmtDelete = $conect->prepare($sqlDelete);
                        $stmtDelete->bindParam(':id', $user_id);
                        $stmtDelete->execute();

                        // Rediriger vers une autre page après l'opération
                        header('Location: validation-offre-par-consultant.php');
                        exit();
                    }
                } else {
                    echo 'Action inconnue.';
                }
            }
        }
        ?>
    </main>
</body>

</html>