<?php session_start();
include_once('mysql.php'); //connexion à mysql
include_once('variables.php'); //les variables qui contiennent info BdD
include_once('functions.php'); //les fonctions qui traitent et affichent les bonnes infos

$getData = $_GET;
if (!isset($getData['id']) && is_numeric($getData['id'])) {
    echo ('Il faut un identifiant valide pour modifier le profil auteur ! Veuillez réessayer.');
    return;
}

$retrieveProfileStatement = $mysqlClient->prepare('SELECT * FROM author_table WHERE author_id = :id');
$retrieveProfileStatement->execute([
    'id' => $getData['id'],
]);
$editProfile = $retrieveProfileStatement->fetch(PDO::FETCH_ASSOC);

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
            <h2>Mettre à jour votre profil auteur</h2>
            <div class="accountForm">
                <form action="post_editAuthorProfile.php" method="POST">
                    <div class="hidden">
                        <label for="id">Identifiant de l'auteur</label>
                        <input type="hidden" name="id" id="id" value="<?php echo ($getData['id']); ?>" />
                    </div>

                    <div>
                        <label for="author_fullname">Prénom et Nom de famille <sup>*</sup></label>
                        <input type="text" name="author_fullname" id="author_fullname" value="<?php echo ($editProfile['author_fullname']); ?>" required />
                    </div>
                    <div>
                        <label for="author_site">Votre site Internet</label>
                        <input type="text" name="author_site" id="author_site" value="<?php echo ($editProfile['author_site']); ?>">
                    </div>
                    <div>
                        <label for="author_email">Votre adresse mail <sup>*</sup></label>
                        <input type="email" name="author_email" id="author_email" value="<?php echo ($editProfile['author_email']); ?>" required />
                    </div>
                    <div class="submit_btn_account">
                        <button class="submit_btn">Mettre à jour mon compte auteur</button>
                    </div>
                </form>
                <p><sup>*</sup> - mention obligatoire</p>
            </div>
        </div>



        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>