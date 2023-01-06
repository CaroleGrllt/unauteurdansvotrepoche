<?php session_start();
include_once('mysql.php'); //connexion à mysql
include_once('variables.php'); //les variables qui contiennent info BdD
include_once('functions.php'); //les fonctions qui traitent et affichent les bonnes infos

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
            <h2>Votre profil auteur</h2>
            <div class="accountForm">
                <form action="author_verification.php" method="POST">
                    <div>
                        <label for="author_fullname">Prénom et Nom de famille <sup>*</sup></label>
                        <input type="text" name="author_fullname" id="author_fullname" required />
                    </div>
                    <div>
                        <label for="author_birth">Votre date de naissance <sup>*</sup></label>
                        <input type="date" name="author_birth" id="author_birth" required />
                    </div>
                    <div>
                        <label for="author_site">Votre site Internet</label>
                        <input type="text" name="author_site" id="author_site">
                    </div>
                    <div>
                        <label for="author_email">Votre adresse mail <sup>*</sup></label>
                        <input type="email" name="author_email" id="author_email" required />
                    </div>
                    <div>
                        <label for="password">Votre mot de passe <sup>*</sup></label>
                        <input type="password" name="password" id="password" required />
                    </div>
                    <div>
                        <label for="author_password_confirmation">Confirmez votre mot de passe <sup>*</sup></label>
                        <input type="password" name="author_password_confirmation" id="author_password_confirmation" required />
                    </div>
                    <div class="submit_btn_account">
                        <button class="submit_btn">Créer mon compte auteur</button>
                    </div>
                </form>
                <p><sup>*</sup> - mention obligatoire</p>
            </div>
        </div>
        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>