<?php
//cette partie est celle qui vas prendre la bdd de confirmation et lafficher dans la page html pour validation et définition du rôle.

try {
    $pdo = new PDO('mysql:host=localhost;dbname=trtconseil','root');
    $bdd = 'SELECT * FROM Usersenattente';
    $requette = $pdo->query($bdd);

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    if ($requette->num_rows > 0) {
        while ($ligne = $pdo->fetch_assoc()) {
            //affiche les données dans le <main>.
            echo "div";
            echo "<p>" . $ligne[""] . "</p>";
            echo "<p>" . $ligne[""] . "</p>";
            echo "<p>" . $ligne[""] . "</p>";
            echo "<p>" . $ligne[""] . "</p>";
            echo "<p>" . $ligne[""] . "</p>";
            echo "<p>" . $ligne[""] . "</p>";
            //création des buttons un qui supprime la ligne dans la bdd et 2 qui ajoute la ligne dans une autre bdd en y ajoutant un role diférent.
            echo "<button id='1' data-id='1'>suprimer</button>";
            echo "<button id='2' data-id='2'>ajouter en tant que employeur</button>";
            echo "<button id='3' data-id='3'>ajouter en tant que postulant</button>";
        }
    } else {
        echo "Aucune donnée trouvée dans la base de données.";
    }
}
catch(PDOException $e) {
echo 'une erreur est survenu impossible d\'avoir acces a la bdd';
}
$pdo->close();
?>