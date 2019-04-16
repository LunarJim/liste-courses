<?php

session_start();

// Inclusion du fichier s'occupant de la connexion à la DB (TODO)
require __DIR__.'/inc/db.php'; // Pour __DIR__ => http://php.net/manual/fr/language.constants.predefined.php
// Rappel : la variable $pdo est disponible dans ce fichier
//          car elle a été créée par le fichier inclus ci-dessus

// Initialisation de variables (évite les "NOTICE - variable inexistante")
$shoppingList = array();
$name = '';

// Si le formulaire a été soumis
if (!empty($_POST)) {
    // Récupération des valeurs du formulaire dans des variables
    $name = isset($_POST['item']) ? $_POST['item'] : '';
    

    // TODO (optionnel) valider les données reçues (ex: donnée non vide)
    // --- START OF YOUR CODE ---

    // Je part du principe qu'il n'y a pas d'erreurs
    $has_error = false;

    if (empty($name)) {

        $_SESSION['flash_message'][] = array('type' => 'danger', 'text' => 'Merci de renseigner un article');
        $has_error = true;
    }


    if ($has_error) {

        // J'indique à PHP qu'il va falloir faire une redirection
        header('Location: ./index.php');
        // Puis j'arrete PHP
        die();
    }

    // --- END OF YOUR CODE ---

    // TODO exécuter la requête qui insère les données
    // TODO une fois inséré, faire une redirection vers la page "index.php" (fonction header)
    // --- START OF YOUR CODE ---

    $inserted = insertItem($pdo, $name);

    // Si inserted n'est pas vide...
    if (!empty($inserted)) {

        $_SESSION['flash_message'][] = array('type' => 'success', 'text' => 'c\'est tout bon!');

    // Si il est vide...
    // sous entendu: $inserted === 0
    // sous entendu: $inserted === false
    } else {

        $_SESSION['flash_message'][] = array('type' => 'danger', 'text' => 'Un problème est survenu merci de reessayer');
    }

    // J'indique à PHP qu'il va falloir faire une redirection
    header('Location: ./index.php');
    // Puis j'arrete PHP
    die();

    // --- END OF YOUR CODE ---
}

if (!empty($_GET['articleDelete'])) {

    $article_id = $_GET['articleDelete'];

    deleteItem($pdo, $article_id);

    header('Location: ./index.php');

}




// --- END OF YOUR CODE ---



$shoppingList = getShoppingList($pdo);

// --- END OF YOUR CODE ---

// Inclusion du fichier s'occupant d'afficher le code HTML
// Je fais cela car mon fichier actuel est déjà assez gros, donc autant le faire ailleurs (pas le métier hein ! ;) )
require __DIR__.'/view/liste.php';
