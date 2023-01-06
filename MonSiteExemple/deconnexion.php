<?php session_start(); // on inclut la session actuelle, pour savoir ce qu'il faut détruire

    $_SESSION = array(); // on détruit toutes les variables de session 

    session_destroy(); // on détruit la session

     // Suppression du cookie LOGGED_USER
    setcookie('LOGGED_USER');
  // Suppression de la valeur du tableau $_COOKIE
  unset($_COOKIE['LOGGED_USER']);

    header('Location:home.php'); // on renvoie vers la page d'accueil du site
