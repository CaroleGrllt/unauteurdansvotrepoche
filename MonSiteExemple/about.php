<?php session_start(); ?>
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
        <article class="contact">
            <p class="img_contact"><img class="light_img" src="images/ampoule.jpeg" alt="Ampoule vintage" /></p>
            <h2>Qu'est-ce qu' <span>Un auteur dans votre poche</span> ?</h2>
            <p>Lorem ipsum dolor sit amet. Et natus voluptatem id veritatis necessitatibus et sequi dolor ab voluptatem voluptatum sit totam ratione. Et ipsum ipsum in totam beatae non omnis dignissimos. Qui vitae similique est quos dolores est aliquid error ut deserunt possimus et ipsum dolorem ad explicabo expedita. Est totam sunt in Quis architecto non veritatis distinctio ut sint enim! Rem vero delectus est rerum molestias et voluptatum nisi est maiores aliquid.

            </p>
        </article>
        <article class="contact">
            <p class="img_contact"> <img class="letter_img" src="images/lettre.jpeg" alt="Illustration d'un courrier manuscrit" /></p>
            <h2>Restons en contact !</h2>
            <form class="contact_form" action="post_about.php" method="POST">
                <div class="identity_input">
                    <label for="identite">Prénom et NOM : </label>
                    <input type="text" id="identite" name="identite" placeholder="Jean DUPONT" />
                </div>
                <div class="mail_input">
                    <label for="email">Adresse email : </label>
                    <input type="email" name="email" id="email" placeholder="email@email.fr" />
                </div>
                <div class="message_input">

                    <label for="message">Votre message : </label>
                    <textarea name="message" id="message" cols="50" rows="10">Votre message ici</textarea>
                </div>
                <button type="submit" class="read_btn">Envoyer</button>
            </form>
        </article>
        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>