<?php session_start(); 
include_once('mysql.php'); //connexion à mysql
include_once('variables.php'); //les variables qui contiennent info BdD
include_once('functions.php'); //les fonctions qui traitent et affichent les bonnes infos

$getData = $_GET;

if(!isset($getData['name'])) {
    echo('Votre requête ne peut pas être traitée. Merci de réessayer dans quelques minutes.');
    return;
}

?>

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

    <div class="accountContainer">
            <h2>Publier un livre</h2>
            <div class="accountForm">
                <form action="post_create.php" method="POST">
                    <div class="hidden">
                        <label for="author">Prénom/nom de l'auteur</label>
                        <input type="text" name="author" id="author" value="<?php echo($getData['name']); ?>"/>
                    </div>
                    <div>
                        <label for="title">Titre du livre <sup>*</sup></label>
                        <input type="text" name="title" id="title" required/>
                    </div>
                    <div>
                        <label for="year">Année de publication <sup>*</sup></label>
                        <input type="text" name="year" id="year" required/>
                        <div><p>Exemple : 1658.</p></div>
                    </div>
                    <div class="inputCreate">
                        <label for="summary">Résumé du livre <sup>*</sup></label>
                        <textarea name="summary" id="summary" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="inputCreate">
                        <label for="text">Le texte du livre <sup>*</sup></label>
                        <textarea name="text" id="text" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="submit_btn_account">
                        <button class="submit_btn">Publier</button>
                    </div>
                </form>
                <p><sup>*</sup> - mention obligatoire</p>
            </div>
        </div>
    <?php include_once('footer.php'); ?>
    </div>
</body>
</html>