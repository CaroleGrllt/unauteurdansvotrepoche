<?php
include_once('mysql.php'); //connexion à mysql
include_once('variables.php'); //les variables qui contiennent info BdD
include_once('functions.php'); //les fonctions qui traitent et affichent les bonnes infos

$postData = $_POST;

if (isset($postData['author_identifiant']) && isset($postData['password'])) {
    foreach ($author as $loggedAuthor) {
        if (
            $loggedAuthor['author_email'] === $postData['author_identifiant']
            && $loggedAuthor['author_password'] === $postData['password']
        ) {
            $loggedUser = [
                'email' => $loggedAuthor['author_email'],
                'fullname' => $loggedAuthor['author_fullname'],
            ];

            setcookie(
                'LOGGED_USER',
                $loggedUser['fullname'],
                [
                    'expires' => time() + 365 * 24 * 3600,
                    'secure' => true,
                    'httponly' => true,
                ]
            );
            $_SESSION['LOGGED_USER'] = $loggedUser['fullname'];
        } else {
            $errorMessage = 'Les informations saisies ne nous permettent pas de vous identifier.';
        }
    }
}

if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = [
        'fullname' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
    ];
}

?>

<?php if (!isset($loggedUser)) : ?>
    <div class="containerLogin">
        <form class="errorMessage" action="authorProfile.php" method="POST">
            <?php if (isset($errorMessage)) : ?>
                <h2 class="connexionError"><?php echo ($errorMessage); ?></h2>
            <?php endif; ?>
            <div class="connexion_pageContainer">
                <div class="connexion_form">
                    <h2>Vous avez déjà en compte ?</h2>
                    <h4>Connectez-vous !</h4>
                    <div>
                        <label for="author_identifiant">Identifiant <sub>votre adresse email</sub> : </label>
                        <input type="email" name="author_identifiant" id="author_identifiant" />
                    </div>
                    <div>
                        <label for="password">Mot de passe : </label>
                        <input type="password" name="password" id="password" />
                    </div>
                    <div>
                        <button class="submit_btn" type="submit">Se connecter</button>
                    </div>
            </div>
         </form>
    </div>
    <div class="createAccountForm">
        <h2>Vous êtes auteur et n'avez pas encore de compte ?</h2>
        <h4>Créez-en un !</h4>
        <form class="createAccountBtn" action="account.php">
            <button class="submit_btn" type="submit">Créer un compte !</button>
        </form>
    </div>
    </div>

<?php else : ?>
    <h2 class="welcomeMessage">Bonjour et bienvenue,</h2>
    <h3 class="welcomeMessageName"> <span class="messageName"> <?php echo ($loggedUser['fullname']); ?> </span>! </h3>
<?php endif; ?>