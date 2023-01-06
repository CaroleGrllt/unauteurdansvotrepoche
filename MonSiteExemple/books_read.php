<?php session_start();
include_once('mysql.php'); //connexion à mysql
include_once('variables.php'); //les variables qui contiennent info BdD
include_once('functions.php'); //les fonctions qui traitent et affichent les bonnes infos

$getData = $_GET;
if (!isset($getData['id']) && is_numeric($getData['id'])) {
    echo ('Cet identifiant ne peut pas être reconnu');
    return;
}

$retrieveBookStatement = $mysqlClient->prepare('SELECT * FROM books_table WHERE book_id = :id');
$retrieveBookStatement->execute(['id' => $getData['id']]);
$bookChosen = $retrieveBookStatement->fetch(PDO::FETCH_ASSOC);
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
        <div class="container_booksRead">
            <aside>
                <div>
                    <h2><?php echo ($bookChosen['book_title']); ?></h2>
                    <h3><span><?php echo ($bookChosen['book_author']); ?></span></h3>
                    <p><?php echo '(' . ($bookChosen['book_year']) . ')'; ?></p>
                </div>
            </aside>
            <article>
                <p><?php echo ($bookChosen['book_text']); ?></p>
            </article>
        </div>
        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>