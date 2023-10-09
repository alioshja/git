<?php
//cette partie est celle qui vas prendre la bdd de confirmation et lafficher dans la page html pour validation et définition du rôle.

try {
    $pdo = new PDO('mysql:host=localhost;dbname=trtconseil','root');
    $bdd = 'SELECT * FROM Usersenattente';
    $requette = $pdo->query($bdd);

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    if () {
    } else {
        echo "Aucune donnée trouvée dans la base de données.";
    }
}
catch(PDOException $e) {
echo 'une erreur est survenu impossible d\'avoir acces a la bdd';
}
$pdo->close();
?>