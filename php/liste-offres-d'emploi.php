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
        <button class="">
            <a href="page-personelle.php">menu</a>
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
            echo "<hr>";
    }
        if ($_SESSION['utilisateur'][3] == 'employé') {
            echo "<form method='post' action='gestion-relation-empl-ouvrier.php'>";
            echo "<input type='hidden' name='offre_id' value='" . $ligne['id'] . "'>";
            echo "<input type='hidden' name='cv_id' value='" . $_SESSION['utilisateur'][0] . "'>";
            echo "<input type='submit' value='Postuler'>";
            echo "</form>";
            echo "<hr>";
        } else {
            
        }
    }else {
        echo 'une erreur est survenue';
    }
    ?>
</main>
</body>
</html>
