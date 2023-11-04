<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" lang="fr">
        <link href="..\Css\stylesheet.css" rel="stylesheet">
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
        <form method="post" action="../php/gestion-form-offre.php" id="formOffre">
            <label for="1">Nom de l'offre</label>
            <br>
            <input id="1" type="text" name="offre" id='1'>
                <br>
            <label for="2">Adresse</label>
                <br>
            <input id="2" type="text" name="adresse">
                <br>
                <label for="3">Coordonées</label>
                <br>
            <input id="3" type="text" name="coordonees">
                <br>
            <label for="4">Compétences attendues/diplomes</label>
                <br>
            <textarea id="4" name="competences" rows='7' cols='70'></textarea>
                <br>
            <label for="5">Taches a faire</label>
                <br>
            <textarea id="5" name="taches" rows='15' cols='70'></textarea>
                <br>
            <label for="6">Salaire brut</label>
                <br>
            <input id="6" type="text" name="salaire">
                <br>
<!--form horraires-->
<h2>horraires</h2>
            <label for="7">Lundi</label>
            <br>
            <input id="7" type="text" name="lundi">
                <br>
            <label for="8">Mardi</label>
                <br>
            <input id="8" type="text" name="mardi">
                <br>
                <label for="9">Mercredi</label>
                <br>
            <input id="9" type="text" name="mercredi">
                <br>
            <label for="10">Jeudi</label>
                <br>
            <input id="10" name="jeudi" type="text">
                <br>
            <label for="11">Vendredi</label>
                <br>
            <input id="11" name="vendredi" type="text">
                <br>
            <label for="12">Samedi</label>
                <br>
            <input id="12" type="text" name="samedi">
                <br>
            <label for="13">Dimanche</label>
            <br>
            <input id="13" type="text" name="dimanche">
            <br>
            <input type="submit" id="submitBothForms" value="valider">
</form>
<!--script de soumission du 2eme form pour id exacte-->

    </main>
</body>
</html>