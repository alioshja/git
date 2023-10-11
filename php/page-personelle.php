<?php
 session_start(); 
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" lang="fr">
        <meta content="page de modération pour valider les demandes de création de comptes et déterminé si il sajit d'employeurs ou de postulant">
        <link rel="stylesheet" href="../Css/stylesheet.css">
        <script src="../JS/script.js"></script>
        <script src="../JS/gestion-compte-personel.js"></script>
    </head>
    <body>
        <header>
        <nav id="burger">
            <button onclick="burgerC()" class="account">
            <img src="../images/vecteur-d-icone-de-menu-icone-du-menu-web-symbole-du-menu-hamburger-2r2hg34.jpg" class="burger" alt="menu">
            </button>
            <h1>Connecté à <?php echo $_SESSION['utilisateur'][4]; ?></h1><!--session==[$mail, $password, $typeConte, $nom, $prenom]-->
        </nav>
        </header>
        <main>
            <h2>Heureux de vous revoir <?php echo $_SESSION['utilisateur'][4];?>.</h2>
            <br>
            <h3>Vos informations:</h3>
            <br>
            <br>
            <p>Nom: <?php echo $_SESSION['utilisateur'][3];?>.</p>
            <p>Prénom: <?php echo $_SESSION['utilisateur'][4];?>.</p>
            <p>Rôle: <?php echo $_SESSION['utilisateur'][2];?>.</p>
            <p>E-Mail: <?php echo $_SESSION['utilisateur'][0];?>.</p>
            <br>
            <br>
            <br>

        </main>
    </body>
    <script>
    // Utilisation de PHP pour générer du code JavaScript en incluant les valeurs de la session.
    var utilisateurConnecte = {
        nom: "<?php echo $_SESSION['utilisateur'][3]; ?>",
        prenom: "<?php echo $_SESSION['utilisateur'][4]; ?>",
        role: "<?php echo $_SESSION['utilisateur'][2]; ?>",
        email: "<?php echo $_SESSION['utilisateur'][0]; ?>"
    };
</script>
</html>