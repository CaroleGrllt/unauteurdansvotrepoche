<?php session_start();
include_once('mysql.php'); //connexion à mysql
include_once('variables.php'); //les variables qui contiennent info BdD
include_once('functions.php'); //les fonctions qui traitent et affichent les bonnes infos

$getData = $_GET;
if (!isset($getData['id']) && is_numeric($getData['id'])) {
    echo ('Un problème est survenu. Veuillez réessayer ultérieurement.');
    return;
}

$retrieveBookStatement = $mysqlClient->prepare('SELECT * FROM books_table WHERE book_id = :id');
$retrieveBookStatement->execute([
    'id' => $getData['id'],
]);

$updateBook = $retrieveBookStatement->fetch(PDO::FETCH_ASSOC);

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

        <div class="accountContainer">
            <h2>Mettre à jour :<span class="messageName"> <?php echo ($updateBook['book_title']); ?> </span> </h2>
            <div class="accountForm">
                <form action="post_update.php" method="POST">
                    <div class="hidden">
                        <label for="id">Identifiant du livre</label>
                        <input type="hidden" name="id" id="id" value="<?php echo ($getData['id']); ?>" />
                    </div>

                    <div>
                        <label for="title">Titre du livre <sup>*</sup></label>
                        <input type="text" name="title" id="title" value="<?php echo ($updateBook['book_title']); ?>" required />
                    </div>
                    <div>
                        <label for="year">Année de publication <sup>*</sup></label>
                        <input type="text" name="year" id="year" value="<?php echo ($updateBook['book_year']); ?>" required />
                    </div>
                    <div class="inputCreate">
                        <label for="summary">Résumé <sup>*</sup></label>
                        <textarea name="summary" id="summary" cols="50" rows="10"><?php echo ($updateBook['book_summary']); ?></textarea>
                    </div>
                    <div class="inputCreate">
                        <label for="text">Texte intégral <sup>*</sup></label>
                        <textarea name="text" id="text" cols="50" rows="10"><?php echo ($updateBook['book_text']); ?></textarea>
                    </div>
                    <div class="submit_btn_account">
                        <button class="submit_btn">Mettre à jour mon livre</button>
                    </div>
                </form>
                <p><sup>*</sup> - mention obligatoire</p>
            </div>
        </div>

        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>