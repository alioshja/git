<?php session_start();

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
        <form method="post" action="../php/gestion-form-offre.php">
            <label>Nom de l'offre</label>
            <br>
            <input type="text" name="offre">
                <br>
            <label>Adresse</label>
                <br>
            <input type="text" name="adresse">
                <br>
                <label>Coordonées</label>
                <br>
            <input type="text" name="coordonees">
                <br>
            <label>Compétences attendues/diplomes</label>
                <br>
            <textarea name="competences" rows='7' cols='70'></textarea>
                <br>
            <label>Taches a faire</label>
                <br>
            <textarea name="taches" rows='15' cols='70'></textarea>
                <br>
            <label>Salaire brut</label>
                <br>
            <input type="text" name="salaire">
                <br>
            <input type="submit" name="validation" value="valider">
</form>
<!--faire form horraires-->


    </main>
</body>
</html>