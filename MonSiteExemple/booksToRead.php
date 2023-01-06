<?php session_start();
include_once('mysql.php');
include_once('variables.php');
include_once('functions.php');

$postData = $_POST;

if (empty($postData['wantedBook'])) {
    echo ('Il faut un titre ou un auteur pour lancer la recherche.');
    return;
}

$retrieveBookTable = $mysqlClient->prepare('SELECT * FROM books_table WHERE book_title LIKE :book_title OR 
    book_author LIKE :book_author');

$retrieveBookTable->execute([
    'book_title' => '%' . $postData['wantedBook'] . '%',
    'book_author' => '%' . $postData['wantedBook'] . '%',
]);
$requireBook = $retrieveBookTable->fetch(PDO::FETCH_ASSOC);

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
        <article class="booksContainer">
            <div class="div_books">
                <?php $livre = displayWantedBook($book, $requireBook); ?> <!-- on stocke la fonction displayWantedBook dans une variable -->
                <?php if (empty($livre)) : ?> <!-- la fonction renoyant un tableau, on vérifie si ce tableau est true ou false -->
                    <h2><?php echo 'L\'auteur ou le titre demandé ne fait pas (encore) partie de notre base de données. '; ?></h2>
                    <!-- si le tableau est false, alors on retourne un message d'erreur -->
                <?php else : ?> <!-- sinon, on appelle une boucle avec la variable qui stocke la fonction -->

                    <?php foreach ($livre as $selectedBook) : ?>
                        <h2><?php echo $selectedBook['book_title']; ?> </h2>
                        <h3><?php echo $selectedBook['book_author']; ?></h3>
                        <p><?php echo $selectedBook['book_summary']; ?></p>
                        <button class="read_btn"><a href="books_read.php?id=<?php echo ($selectedBook['book_id']); ?>">Lire</a></button>
                    <?php endforeach ?>
                <?php endif; ?>

            </div>

        </article>
        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>