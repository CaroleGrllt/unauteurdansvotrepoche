<?php session_start();
include_once('mysql.php'); //connexion à mysql
include_once('variables.php'); //les variables qui contiennent info BdD
include_once('functions.php'); //les fonctions qui traitent et affichent les bonnes infos

$getData = $_GET;

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

            <h2>Êtes-vous sûr(e) de vouloir supprimer ce livre ?</h2>
            <div>
                <form class="deleteForm" action="post_delete.php" method="POST">
                    <div>
                        <label for="id"> La suppression est définitive !</label>
                        <input type="hidden" name="id" id="id" value="<?php echo ($getData['id']); ?>">
                    </div>
                    <button type="submit" class="submit_btn">Supprimer</button>
                </form>
            </div>
        </div>
        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>