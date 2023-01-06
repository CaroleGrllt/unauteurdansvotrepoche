<?php session_start();
include_once('mysql.php'); //connexion à mysql
include_once('variables.php'); //les variables qui contiennent info BdD
include_once('functions.php'); //les fonctions qui traitent et affichent les bonnes infos

$postData = $_POST;
if(!isset($postData['id'])) {
    echo('Une erreur est survenue, veuillez réessayer ultérieurement.');
    return;
}

$id = $postData['id'];
$deleteBook = $mysqlClient->prepare('DELETE FROM books_table WHERE book_id = :id');
$deleteBook->execute([
    'id' => $id,
]);

header('Location: authorProfile.php')
?>