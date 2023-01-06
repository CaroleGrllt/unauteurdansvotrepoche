<?php session_start();
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
        <?php include_once('login.php'); ?>
        <div class="editProfileBtn">

            <?php foreach (getAuthor($author) as $editProfile) : ?>

                <?php if (isset($loggedUser['fullname']) && $loggedUser['fullname'] === $editProfile['author_fullname']) : ?>
                    <button type="submit" class="submit_btn"><a href="editAuthorProfile.php?id=<?php echo ($editProfile['author_id']); ?>">Editer mon profil</a></button>
                    <button type="submit" class="submit_btn"><a href="create.php?name=<?php echo ($editProfile['author_fullname']); ?>">Publier un livre</a></button>
                <?php endif; ?>
            <?php endforeach ?>
        </div>
        <article class="booksContainer">
            <div class="div_books">
                <?php foreach (getBooks($book) as $bookAuthor) : ?>
                    <?php if (isset($loggedUser) && $bookAuthor['book_author'] === $loggedUser['fullname']) : ?>
                        <h2><?php echo $bookAuthor['book_title']; ?></h2>
                        <h3><?php echo $bookAuthor['book_author']; ?></h3>
                        <p><?php echo $bookAuthor['book_summary']; ?></p>
                        <div class="editProfileBtn">
                            <button type="submit" class="submit_btn"><a href="update.php?id=<?php echo ($bookAuthor['book_id']); ?>">Mettre mon livre à jour</a></button>
                            <button type="submit" class="submit_btn"><a href="delete.php?id=<?php echo ($bookAuthor['book_id']); ?>">Supprimer mon livre</a></button>
                        </div>
                    <?php endif; ?>
                <?php endforeach ?>
            </div>
        </article>
        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>