<?php
require_once 'connection-pdo.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link href="..\Css\stylesheet.css" rel="stylesheet">
    <script src='..\JS\gestion-compte-personel.js'></script>
</head>
<body>
<header>
    <nav id='ok'>
        <button class="account button">
            <a href="page-personnelle.php">Espace personnel</a>
        </button>
        <h1>Connecté à <?php echo $_SESSION['utilisateur'][4]; ?></h1>
    </nav>
</header>
<main>
    <h1>Offres d'emploi:</h1>
    <br>
    <br>
    <?php
    $sql = 'SELECT * FROM offresemploi';
    $stmt = $conect->query($sql);

    if ($stmt) {
        while ($ligne = $stmt->fetch()) {
            $offreId = $ligne['id'];
            $sql2 = 'SELECT * FROM horaires_offres WHERE offre_id = :offreid';
            $stmt2 = $conect->prepare($sql2);
            $stmt2->bindParam(':offreid', $offreId, PDO::PARAM_INT);
            $stmt2->execute();
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
            if ($stmt2) {
        while ($ligne2 = $stmt2->fetch()) {
            echo "<h2>*Horaires:</h2>";
            echo '<br>';
            echo "<h3><u>Lundi :</u></h3>";
            echo "<p class='offres'>" . $ligne2['lundi'] . "</p><br>";
            echo "<h3><u>Mardi :</u></h3>";
            echo "<p class='offres'>" . $ligne2['mardi'] . "</p><br>";
            echo "<h3><u>Mercredi :</u></h3>";
            echo "<p class='offres'>" . $ligne2['mercredi'] . "</p><br>";
            echo "<h3><u>Jeudi :</u></h3>";
            echo "<p class='offres'>" . $ligne2['jeudi'] . "</p><br>";
            echo "<h3><u>Vendredi :</u></h3>";
            echo "<p class='offres'>" . $ligne2['vendredi'] . "</p><br>";
            echo "<h3><u>Samedi :</u></h3>";
            echo "<p class='offres'>" . $ligne2['samedi'] . "</p><br>";
            echo "<h3><u>Dimanche :</u></h3>";
            echo "<p class='offres'>" . $ligne2['dimanche'] . "</p><br>";
        }
    }
        if ($_SESSION['utilisateur'][3] == 'employé') {
            echo "<form method='post' action='connection-pdo.php'>";//mauvais fichier
            echo "<input type='hidden' name='offre_id' value='" . $ligne['id'] . "'>";
            echo "<input type='hidden' name='cv_id' value='" . $_SESSION['utilisateur'][0] . "'>";
            echo "<input type='submit' value='Postuler'>";
            echo "</form>";
            echo "<hr>";
        } else {
            echo 'erreur bouton';
        }
    }
}else {
        echo 'une erreur est survenue';
    }
    ?>
</main>
</body>
</html>
