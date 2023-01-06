<?php

function displayAuthor(string $authorName, array $author): string
{
    for ($i = 0; $i < count($author); $i++) {
        $displayAuthorName = $author[$i];
        if ($authorName === $displayAuthorName['author_fullname']) {
            return $displayAuthorName['author_fullname'];
        }
    }
}

function getBooks(array $book): array
{
    $validBooks = [];
    foreach ($book as $valid) {
        $validBooks[] = $valid;
    }
    return $validBooks;
}



function displayWantedBook($book, $requireBook)
{
    if (!$requireBook) {
        // si requireBook est vide, c'est à dire si aucune correspondance n'est trouvée, on retourne et on met fin à la fonction.
        return;
    }
    // sinon, on crée une variable tableau pour stocker les données. Et on retourne un tableau. 
    $chooseBooks = [];
    foreach ($book as $choose) {
        if (
            $requireBook['book_title'] === $choose['book_title'] or
            $requireBook['book_author'] === $choose['book_author']
        ) {
            $chooseBooks[] = $choose;
        }
    }
    return $chooseBooks;
}

function getAuthor($author)
{
    $authorsList = [];
    foreach ($author as $list) {
        $authorsList[] = $list;
    }
    return $authorsList;
}
