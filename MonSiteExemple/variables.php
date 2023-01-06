<?php

// on récupère toutes les données des tables de la BdD ici 

$authorStatement = $mysqlClient->prepare('SELECT * FROM author_table');
$authorStatement->execute();
$author = $authorStatement->fetchAll();

$bookStatement = $mysqlClient->prepare('SELECT * FROM books_table');
$bookStatement->execute();
$book = $bookStatement->fetchAll();
