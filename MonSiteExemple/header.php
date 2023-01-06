<?php
include_once('mysql.php'); //connexion à mysql
include_once('variables.php'); //les variables qui contiennent info BdD
include_once('functions.php'); //les fonctions qui traitent et affichent les bonnes infos
?>

<nav>
    <div>
        <div>
            <ul>
                <li>
                    <a href="home.php">ACCUEIL</a>
                </li>
                <li>
                    <a href="books.php">LIVRES</a>
                </li>
            </ul>
        </div>
        <div class="container-img">
            <img src="images/silhouette.png" alt="Silhouette d'une femme qui lit" />
        </div>
        <div>
            <ul>
                <li>
                    <a href="about.php">A PROPOS</a>
                </li>
                <li>
                    <a href="authorProfile.php">COMPTE</a>
                </li>
                <?php if (isset($_SESSION['LOGGED_USER'])) { ?>

                    <li>
                        <a href="deconnexion.php">DECONNEXION</a>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>