<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Un auteur dans votre poche</title>
    <link href="https://fonts.googleapis.com/css2?family=Prosto+One&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div id="blocPage">
        <?php include_once('header.php'); ?>
        <div id="banniere">
            <img src="images/image_accueil.jpg" alt="Photo d'illustration d'un livre ouvert et d'une bougie" />
        </div>
        <div class="home_container">
            <h3>Amoureux des belles lettres, soyez les bienvenus !</h3>
            <p>Vous êtes auteur et vous souhaitez publier vos livres ? </p>
            <p>Vous êtes lecteur et vous souhaitez découvrir de nouveaux ouvrages ? </p>
            <p>Cet endroit est fait pour vous ! </p>
            <button class="btn"><a href="books.php">Découvrir les ouvrages !</a></button>
        </div>
        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>