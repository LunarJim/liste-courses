<?php

session_start();

// Inclusion du fichier s'occupant de la connexion à la DB (TODO)
require __DIR__.'/inc/db.php'; // Pour __DIR__ => http://php.net/manual/fr/language.constants.predefined.php
// Rappel : la variable $pdo est disponible dans ce fichier
//          car elle a été créée par le fichier inclus ci-dessus

// Initialisation de variables (évite les "NOTICE - variable inexistante")
$shoppingList = array();
$todoList = array();
$task = '';
$name = '';

// Si le formulaire a été soumis
if (!empty($_POST['item'])) {
    // Récupération des valeurs du formulaire dans des variables
    $name = isset($_POST['item']) ? $_POST['item'] : '';

    $inserted = insertItem($pdo, $name);

    // Si inserted n'est pas vide...
    if (!empty($inserted)) {

        $_SESSION['flash_message'][] = array('type' => 'success', 'text' => 'c\'est tout bon!');
    }

    header('Location: ./index.php');
    // Puis j'arrete PHP
    die();

}

if (!empty($_GET['articleDelete'])) {

    $article_id = $_GET['articleDelete'];

    deleteItem($pdo, $article_id);

    header('Location: ./index.php');

}



if (!empty($_POST['task'])) {
        // Récupération des valeurs du formulaire dans des variables
    $task = isset($_POST['task']) ? $_POST['task'] : '';

    $inserted_task = insertTask($pdo, $task);

    // Si inserted n'est pas vide...
    if (!empty($inserted_task)) {

        $_SESSION['flash_message'][] = array('type' => 'success', 'text' => 'yeah...');

    // Si il est vide...
    // sous entendu: $inserted === 0
    // sous entendu: $inserted === false
    }

    header('Location: ./index.php');
    // Puis j'arrete PHP
    die();

    // --- END OF YOUR CODE ---
}

if (!empty($_GET['taskDelete'])) {

    $task_id = $_GET['taskDelete'];

    deleteTask($pdo, $task_id);

    header('Location: ./index.php');

}
// --- END OF YOUR CODE ---

$shoppingList = getShoppingList($pdo);
$todoList = getTodoList($pdo);

// Inclusion du fichier s'occupant d'afficher le code HTML
// Je fais cela car mon fichier actuel est déjà assez gros, donc autant le faire ailleurs (pas le métier hein ! ;) )
require __DIR__.'/view/liste.php';
