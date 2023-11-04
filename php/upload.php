<?php
require_once 'connection-pdo.php';
?>
<!DOCTYPE html>
<html>
    <head>
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
        <form method="post" action="../php/upload.php" enctype="multipart/form-data">
            <label>envoyer mon cv (pdf uniquement)</label>
            <br>
            <input type="file" name="pdfFile" accept=".pdf">
                <br>
            <input type="submit" value="envoyer">
</form>

    </main>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdfFile'])) {
    $uploadDir = '../uploads/';  // Répertoire de destination pour les fichiers PDF.
    $userId = $_SESSION['utilisateur'][0];  // Obtention de l'ID de l'utilisateur connecté depuis la session.
    $allowedTypes = array('application/pdf');
    // Vérification du type de fichier.

    if (in_array($_FILES['pdfFile']['type'], $allowedTypes)) {
        $uploadedFile = $uploadDir . basename($_FILES['pdfFile']['name']);

        if (move_uploaded_file($_FILES['pdfFile']['tmp_name'], $uploadedFile)) {
            $fileData = file_get_contents($uploadedFile);

            // Encodage des données en base64 avant de les insérer dans la base de données
            $encodedFileData = base64_encode($fileData);                                    //a vérifier

            // Utilisation des requêtes préparées pour éviter les injections SQL
            $query = 'INSERT INTO pdf_files (user_id, file_name, file_data) VALUES (:user_id, :file_name, :file_data)';
            $stmt = $conect->prepare($query);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':file_name', $_FILES['pdfFile']['name']);
            $stmt->bindParam(':file_data', $fileData, PDO::PARAM_LOB);
            
            if ($stmt->execute()) {
                echo 'Le fichier PDF a été enregistré pour l\'utilisateur connecté.';
            } else {
                echo 'Une erreur est survenue lors de l\'enregistrement du fichier.';
            }
        } else {
            echo 'Une erreur est survenue lors de l\'envoi du fichier.';
        }
    } else {
        echo 'Veuillez télécharger un fichier PDF valide.';
    }
}
?>