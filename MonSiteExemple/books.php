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

        <div class="form">
            <form class="books_form" action="booksToRead.php" method="POST">
                <label for="wantedBook">Quel livre recherchez-vous ?</label>
                <input type="text" name="wantedBook" id="wantedBook" placeholder="Titre ou auteur" />
                <button class="submit_btn" type="submit">Rechercher</button>
            </form>
        </div>
        <article class="booksContainer">
            <div class="div_books">
                <?php foreach (getBooks($book) as $displayBooks) : ?>
                    <h2><?php echo $displayBooks['book_title']; ?></h2>
                    <h3><?php echo $displayBooks['book_author']; ?></h3>
                    <p><?php echo $displayBooks['book_summary']; ?></p>
                    <button class="read_btn"><a href="books_read.php?id=<?php echo ($displayBooks['book_id']); ?>">Lire</a></button>
                <?php endforeach ?>
            </div>
        </article>
        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>