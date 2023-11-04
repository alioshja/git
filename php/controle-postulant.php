<?php 
require_once 'connection-pdo.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' lang='fr'>
    <meta content='liste des postulation en attente de validation par un responsable'>
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
        <h2>postulents:</h2>
            <?php 
            $sql = 'SELECT * FROM relation_employe_ouvrier';
            $stmt = $conect->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<h2>id de l\'offre :</h2>';
                echo '<br>';
                echo '<p>' . $row['id_offre'] . '</p>';
                echo '<h2>id du cv du postulant</h2>';
                echo '<br>';
                echo '<p>' . $row['id_cv'] . '</p>';
                $cv_ids[] = $row['id_cv']; // Stocke les id_cv dans le tableau
            }
    
            // Requête pour récupérer les CV depuis l'autre base de données
            foreach ($cv_ids as $cv_id) {
                $sql_cv = 'SELECT file_data FROM pdf_files WHERE id = :cv_id';
                $stmt_cv = $conect->prepare($sql_cv);
                $stmt_cv->bindParam(':cv_id', $cv_id);
                $stmt_cv->execute();
    
                if ($row_cv = $stmt_cv->fetch(PDO::FETCH_ASSOC)) {
                    // Afficher le CV (supposons que les données du CV sont en base64)
                    echo '<embed src="data:application/pdf;base64,' . base64_encode($row_cv['file_data']) . '" type="application/pdf" width="100%" height="700px" />';
                }
            }
            ?>
</main>
</body>
</html>
