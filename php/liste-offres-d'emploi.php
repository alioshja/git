<?php
require_once 'connection-pdo.php';
?>
<!DOCTYPE html>
<html>
        <link href="..\Css\stylesheet.css" rel="stylesheet">
        <script src='..\JS\gestion-compte-personel.js'></script>
    </head>
<header>
        <nav id='ok'>
            <button class="account button">
            <a href="page-personelle.php">Espace personnel</a>
            </button>
            <h1>Connecté à <?php echo $_SESSION['utilisateur'][4]; ?></h1>
        </nav>
</header>
<body>
    <main>
        <h1>
            Offres d'emploi:
            <br>
            <br>
            <?php
            $sql = 'SELECT * FROM offresemploi';
            
            //execution requette.
            $stmt = $conect->query($sql);

            if ($stmt) {
                //affichage des résultats
                while ($ligne = $stmt->fetch()) {
                    
                    echo "<h3><u>Nom de l'offre :</u></h3>";
                    echo "<p class='offres'>" . $ligne['offre'] . "</p><br>";
                    echo "<h3><u>Adresse :</u></h3>";
                    echo "<p class='offres'>" . $ligne['adresse'] . "</p><br>";
                    echo "<h3><u>Coordonées :</u></h3>";
                    echo "<p class='offres'>" . $ligne['coordonees'] . "</p><br>";
                    echo "<h3><u>Compétences nécessaires :</u></h3>";
                    echo "<p class='offres'>" . $ligne['competences'] . "</p><br>";
                    echo "<h3><u>Taches à accomplir :</u></h3>";
                    echo "<p class='offres'>" . $ligne['taches'] . "</p><br>";
                    echo "<h3><u>Salaire brut par mois :</u></h3>";
                    echo "<p class='offres'>". $ligne['salaire'] . "</p><br>";
                    echo "<hr>";
                }    
            }
            else {
                echo'une erreur est survenu';
            }
            ?>
        </h1>

    </main>
</body>   <head>
 
</html>