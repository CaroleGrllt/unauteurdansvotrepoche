<?php session_start();
include_once('mysql.php'); //connexion à mysql
include_once('variables.php'); //les variables qui contiennent info BdD
include_once('functions.php'); //les fonctions qui traitent et affichent les bonnes infos

$postData = $_POST;

// vérifier que les deux mdp correspondent bien l'un et l'autre.

if ($postData['password'] !== $postData['author_password_confirmation']) {
    echo ('Le mot de passe ne correspond pas.');
    return;
}

//enregistrer toutes les nouvelles données du formulaire de création de compte dans la BdD

$fullname = $postData['author_fullname'];
$birth = $postData['author_birth'];
$site = $postData['author_site'];
$email = $postData['author_email'];
$password = $postData['password'];

$insertAuthor = $mysqlClient->prepare('INSERT INTO author_table(author_fullname, author_birth, author_site, author_email, author_password) 
VALUES (:fullname, :birth, :site, :email, :password)');

$insertAuthor->execute([
    'fullname' => $fullname,
    'birth' => $birth,
    'site' => $site,
    'email' => $email,
    'password' => $password,
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
        <div id="confirmation_creaCompte">
            <h2>Votre compte a bien été créé !</h2>
            <p>Vous pouvez maintenant vous connecter.</p>
            <form action="authorProfile.php">
                <button class="submit_btn" type="submit">Se connecter</button>
            </form>
        </div>

        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>