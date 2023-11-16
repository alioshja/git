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
    $sql = 'SELECT * FROM offres_validees';
    $stmt = $conect->query($sql);
    $role = $_SESSION['utilisateur'][3];
    //recupération de l'id du cv.
    $sql2 = 'SELECT id FROM pdf_files WHERE :user_id = user_id';
    $id_user = $_SESSION['utilisateur'][0];
    $stmt2= $conect->prepare($sql2);
    $stmt2->bindParam(':user_id', $id_user);
    if ($stmt2->execute()) {
        // Parcours des résultats pour obtenir l'ID du CV
    $cv_id = $stmt2->fetchColumn();
    }
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
            $id = $ligne['id'];
            if ($role == 'employé') {
                echo "<form method='post' action='gestion-relation-empl-ouvrier.php'>";
                echo "<input type='hidden' name='offre_id' value='" . $id . "'>";
                echo "<input type='hidden' name='cv_id' value='" . $id_user . "'>";
                echo "<button class=' postuler-button' data-offre-id='" . $id . "' data-cv-id='" . $cv_id . "'><a href='page-personelle.php'>postuler</a></button>";
                echo "</form>";
            } else {} 
            echo "<hr>";
        }
        }else {
            echo 'une erreur est survenue';
        }
    
    ?>
</main>
<script>
        // Écouteurs d'événements pour les boutons "Postuler"
        const postulerButtons = document.querySelectorAll('.postuler-button');
    postulerButtons.forEach(button => {
        button.addEventListener('click', () => {
            const offreId = button.getAttribute('data-offre-id');
            const cvId = button.getAttribute('data-cv-id');

            // Envoyer une requête AJAX pour postuler
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'gestion-relation-empl-ouvrier.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Réponse reçue avec succès
                        alert('Demande envoyée. Vous recevrez un mail si votre demande est validée et transmise à l\'employeur.');
                    } else {
                        // Erreur dans la réponse
                        alert('Erreur lors de l\'envoi de la demande.');
                    }
                }
            };

            xhr.send(`offre_id=${offreId}&cv_id=${cvId}`);
        });
    });

    // Écouteurs d'événements pour les boutons de suppression
    const supprimerButtons = document.querySelectorAll('.supprimer-button');
    supprimerButtons.forEach(button => {
        button.addEventListener('click', () => {
            const offreId = button.getAttribute('data-offre-id');

            // Envoyer une requête AJAX pour supprimer la ligne
            const xhr2 = new XMLHttpRequest();
            xhr2.open('POST', 'supprimer_offre.php', true);
            xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr2.onreadystatechange = function () {
                if (xhr2.readyState === 4) {
                    if (xhr2.status === 200) {
                        // Réponse reçue avec succès
                        alert('La ligne a été supprimée avec succès.');
                        // Vous pouvez également mettre à jour la page ou supprimer la ligne du DOM ici.
                    } else {
                        // Erreur dans la réponse
                        alert('Erreur lors de la suppression de la ligne.');
                    }
                }
            };

            xhr2.send(`offreId=${offreId}`);
        });
    });
</script>
</body>
</html>
