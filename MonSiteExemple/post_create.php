<?php session_start();
include_once('mysql.php'); //connexion à mysql
include_once('variables.php'); //les variables qui contiennent info BdD
include_once('functions.php'); //les fonctions qui traitent et affichent les bonnes infos

$postData = $_POST;

if (
    !isset($postData['author']) or
    !isset($postData['title']) or
    !isset($postData['year']) or
    !isset($postData['summary']) or
    !isset($postData['text'])
) {
    echo ('Il manque des informations pour valider le formulaire.');
    return;
}

$author = $postData['author'];
$title = $postData['title'];
$year = $postData['year'];
$summary = $postData['summary'];
$text = $postData['text'];

$insertNewBook = $mysqlClient->prepare('INSERT INTO books_table(book_author, book_title, book_year, book_summary, book_text)
VALUES(:author, :title, :year, :summary, :text)');
$insertNewBook->execute([
    'author' => $author,
    'title' => $title,
    'year' => $year,
    'summary' => $summary,
    'text' => $text,
])

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
        <article class="post_updateContainer">
            <h2 class="sentMessage">Votre livre a bien été publié !</h2>
            <div class="reminderInfoUpdate">
                <h5>Rappel de vos informations :</h5>
                <div class="misePageContainer">
                    <h4>Titre</h4>
                    <div class="miseEnPageContenu">
                        <p><?php echo strip_tags($title); ?></p>
                    </div>
                </div>
                <div class="misePageContainer">
                    <h4>Année de publication</h4>
                    <div class="miseEnPageContenu">
                        <p> <?php echo strip_tags($year); ?></p>
                    </div>
                </div>
                <div class="misePageContainer">
                    <h4>Résumé</h4>
                    <div class="reminderSummary">
                        <p><?php echo strip_tags($summary); ?></p>
                    </div>
                </div>
                <div class="misePageContainer">
                    <h4>Texte intégral</h4>
                    <div class="reminderText">
                        <p><?php echo strip_tags($text); ?></p>
                    </div>
                </div>
            </div>
        </article>

        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>