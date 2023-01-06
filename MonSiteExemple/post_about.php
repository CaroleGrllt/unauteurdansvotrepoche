<?php session_start();
include_once('mysql.php'); //connexion à mysql
include_once('variables.php'); //les variables qui contiennent info BdD
include_once('functions.php'); //les fonctions qui traitent et affichent les bonnes infos

$postData = $_POST;

if (empty($postData['identite']) || empty($postData['message']) || empty($postData['email']) || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
    echo ('Il faut une identité, un email et un message pour soumettre le formulaire.');
    return;
}

$identite = $postData['identite'];
$email = $postData['email'];
$message = $postData['message'];

$insertMessage = $mysqlClient->prepare('INSERT INTO messages_table(identity, email, message) VALUES (:identity, :email, :message)');
$insertMessage->execute([
    'identity' => $identite,
    'email' => $email,
    'message' => $message,
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
            <p><img class="courrier_img" src="images/courrier.jpeg" alt="Illustration d'une enveloppe"> </p>
            <h2 class="sentMessage">Votre message nous est bien parvenu !</h2>
            <div class="reminderInfo">
                <h5>Rappel de vos informations :</h5>
                <p><b>Prénom et NOM</b> : <?php echo strip_tags($identite); ?></p>
                <p><b>Votre email</b> : <?php echo strip_tags($email); ?></p>
                <p><b>Votre message</b> : <?php echo strip_tags($message); ?></p>
            </div>
        </article>

        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>