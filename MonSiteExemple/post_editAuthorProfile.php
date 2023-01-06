<?php session_start();
include_once('mysql.php'); //connexion à mysql
include_once('variables.php'); //les variables qui contiennent info BdD
include_once('functions.php'); //les fonctions qui traitent et affichent les bonnes infos

$postData = $_POST;

if (!isset($postData['id']) or !isset($postData['author_fullname']) or !isset($postData['author_email'])) {
    echo ('Certaines informations sont manquantes. Nous ne pouvons pas mettre ce profil à jour, veuillez réessayer.');
    return;
}

$id = $postData['id'];
$fullname = $postData['author_fullname'];
$site = $postData['author_site'];
$email = $postData['author_email'];

$retrieveProfileStatement = $mysqlClient->prepare('UPDATE author_table 
SET author_fullname = :fullname, author_site = :site, author_email = :email 
WHERE author_id = :id');
$retrieveProfileStatement->execute([
    'fullname' => $fullname,
    'site' => $site,
    'email' => $email,
    'id' => $id,
]);

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

        <article class="post_aboutContainer">
            <h2 class="sentMessage">Votre profil a bien été modifié !</h2>
            <div class="reminderInfo">
                <h5>Rappel de vos informations :</h5>
                <p><b>Prénom et NOM</b> : <?php echo strip_tags($fullname); ?></p>
                <p><b>Votre email</b> : <?php echo strip_tags($email); ?></p>
                <p><b>Votre site (si vous en avez renseigné un)</b> : <?php echo strip_tags($site); ?></p>
            </div>
        </article>


        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>