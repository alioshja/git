<?php
require_once 'connection-pdo.php';
//Ce code permet a un administrateur de rediriger un utilisateur qui postulle ou effacer sa candidature.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirm'])) {
        // Traitement de la confirmation
        $id = $_POST['id'];
        
        // Requête pour récupérer les données de la postulation
        $sql_confirm = 'SELECT * FROM relation_employe_ouvrier WHERE id = :id';
        $stmt_confirm = $conect->prepare($sql_confirm);
        $stmt_confirm->bindParam(':id', $id);
        $stmt_confirm->execute();
        
        // Insérer les données de la postulation dans la table "postuler"
        if ($row_confirm = $stmt_confirm->fetch(PDO::FETCH_ASSOC)) {
            $id_offre = $row_confirm['id_offre'];
            $id_cv = $row_confirm['id_cv'];
            
            //definir user id postulant et employeur.
            $sql_recup_user_id_p = 'SELECT user_id FROM pdf_files WHERE id = :cv_id';
            $sql_recup_user_id_e = 'SELECT user_id FROM offres_validees WHERE id = :id_offre';

            $stmt_recup_user_id_p = $conect->prepare($sql_recup_user_id_p);
            $stmt_recup_user_id_p->bindParam(':cv_id', $id_cv);
            $stmt_recup_user_id_p->execute();
            $user_id_postulant = $stmt_recup_user_id_p->fetchColumn();
            
            $stmt_recup_user_id_e = $conect->prepare($sql_recup_user_id_e);
            $stmt_recup_user_id_e->bindParam(':id_offre', $id_offre);
            $stmt_recup_user_id_e->execute();
            $user_id_employeur = $stmt_recup_user_id_e->fetchColumn();
            
            $sql_insert = 'INSERT INTO postuler (cv_id, offre_id) VALUES (:id_cv, :id_offre)';
            $stmt_insert = $conect->prepare($sql_insert);
            $stmt_insert->bindParam(':id_offre', $id_offre);
            $stmt_insert->bindParam(':id_cv', $id_cv);

            //recup mail employeur grace a l'id user.
            $sql_recup_mail = 'SELECT mail FROM users WHERE id = :user_id';
            $stmt_recup_email = $conect->prepare($sql_recup_mail);
            $stmt_recup_email->bindParam(':user_id', $user_id_employeur);
            $stmt_recup_email->execute();
            $email_employeur = $stmt_recup_email->fetchColumn();

            //recup mail postulant ...
            $sql_recup_mail2 = 'SELECT mail FROM users WHERE id = :user_id';
            $stmt_recup_email2 = $conect->prepare($sql_recup_mail2);
            $stmt_recup_email2->bindParam(':user_id', $user_id_postulant);
            $stmt_recup_email2->execute();
            $email_employe = $stmt_recup_email2->fetchColumn();       
            //recup mail fonctionne

             // Envoyer un e-mail

            $to = $email_employeur;
            $subject = "un utilisateur a postuler a votre offre";
            $message = "vous pouvez contacter cet utilisateur a l'adresse mail" . $email_employe . ". cet utilisateur a été aprouvé par votre conseillé";
            $header = "Content-Type: text/plain; charset=utf-8\r\n";
            $header .= "From: " . $_SESSION['utilisateur'][1];

            ini_set("SMTP", "localhost");
            ini_set("smtp_port", "25");

            if(mail($to, $subject, $message, $header)) {
                echo 'envoyé';
            }else {
                echo 'erreur l\'ors de l\'envoi du mail';
            }

            if ($stmt_insert->execute()) {
                // Après la confirmation, supprimer la ligne de la table source
                $sql_delete = 'DELETE FROM relation_employe_ouvrier WHERE id = :id';
                $stmt_delete = $conect->prepare($sql_delete);
                $stmt_delete->bindParam(':id', $id);
                $stmt_delete->execute();
            }
        }
    } elseif (isset($_POST['reject'])) {
        // Traitement du refus
        $id = $_POST['id'];
        // Supprimer la ligne de la table source en cas de refus
        $sql_delete = 'DELETE FROM relation_employe_ouvrier WHERE id = :id';
        $stmt_delete = $conect->prepare($sql_delete);
        $stmt_delete->bindParam(':id', $id);
        $stmt_delete->execute();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' lang='fr'>
    <meta content='liste des postulant en attente de validation par un responsable'>
    <link href='../Css/stylesheet.css' rel='stylesheet'>
    <script src='../JS/script.js'></script>
    <title>Gestion des Relations Employé-Ouvrier</title>
</head>
<header>
    <nav>
        <button>
        <a href='../php/page-personelle.php'>menu</a>
        </button>
    </nav>
    <h1>liste des demandes d'emplois</h1>
</header>
<body>
    <main>
        <h2>postulants:</h2>
        <?php 
        $sql = 'SELECT * FROM relation_employe_ouvrier LIMIT 3';
        $stmt = $conect->prepare($sql);
       if ($stmt->execute()) {

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<h2>id de l\'offre :</h2>';
            echo '<br>';
            echo '<p>' . $row['id_offre'] . '</p>';
            $id_offre = $row['id_offre'];
                //requette preparé pour afficher l'offre,
                $sql_offre = 'SELECT offre, competences, taches FROM offres_validees WHERE :id_offre = id';
                $stmt_offre = $conect->prepare($sql_offre);
                $stmt_offre->bindParam(':id_offre', $id_offre);
                    if ($stmt_offre->execute()) {
                        while ($row_offre = $stmt_offre->fetch(PDO::FETCH_ASSOC)) {
                            echo '<h2>Nom de l\'offre:</h2>';
                            echo '<br>';
                            echo '<p>' . $row_offre['offre'] . '</p>';
                            echo '<h2>Qualifications nécessaires:</h2>';
                            echo '<br>';
                            echo '<p>' . $row_offre['competences'] . '</p>';
                            echo '<h2>Taches a réaliser:</h2>';
                            echo '<br>';
                            echo '<p>' . $row_offre['taches'] . '</p>';
                        }
                    }else {echo'une erreur est survenu';}
            echo '<h2>id du cv du postulant</h2>';
            echo '<br>';
            echo '<p>' . $row['id_cv'] . '</p>';
            echo '<hr>';
            $id = $row['id']; // Stocke l'id de la postulation actuelle

            // Requête pour récupérer le CV depuis l'autre base de données
            $sql_cv = 'SELECT file_data FROM pdf_files WHERE id = :cv_id';
            $stmt_cv = $conect->prepare($sql_cv);
            $stmt_cv->bindParam(':cv_id', $row['id_cv']);
            $stmt_cv->execute();

           
            if ($row_cv = $stmt_cv->fetch(PDO::FETCH_ASSOC)) {
                // Affiche le CV dans un iframe
                echo '<iframe src="data:application/pdf;base64,' . base64_encode($row_cv['file_data']) . '" width="100%" height="700"></iframe>';
                
                // Formulaire pour confirmer ou refuser le postulant
                echo '<form method="post">';
                echo '<input type="hidden" name="id" value="' . $id . '">';
                echo '<button type="submit" name="confirm">Confirmer</button>';
                echo '<button type="submit" name="reject">Refuser</button>';
                echo '</form>';
            }
        }
    }
        ?>
    </main>
</body>
</html>
