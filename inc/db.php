<?php

// TODO créer un objet PDO permettant de se connecter à la base de données "videogame"
// et le stocker dans la variable $pdo
// --- START OF YOUR CODE ---

$dsn = 'mysql:dbname=courses;host=localhost;charset=UTF8';
$username = 'courses';
$password = 'courses';

// J'ajoute une option qui me permet d'avoir les erreurs directement en Warning dans PHP
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
];

$pdo = new PDO($dsn, $username, $password, $options);


function getShoppingList($pdo) {

    $sql = 'SELECT * FROM course';

    $pdoStatement = $pdo->query($sql);

    // Si jamais il y a un soucis...
    if ($pdoStatement === false) {

        $_SESSION['flash_message'][] = array('type' => 'danger', 'text' => 'Un problème est survenu merci de reessayer');

        // J'indique à PHP qu'il va falloir faire une redirection
        header('Location: ./index.php');
        // Puis j'arrete PHP
        die();
    }

    return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
}

function insertItem($pdo, $name) {

    // Insertion en DB du jeu video
    $insertQuery = "
        INSERT INTO course (article)
        VALUES ('{$name}')
    ";
    // TODO exécuter la requête qui insère les données
    // TODO une fois inséré, faire une redirection vers la page "index.php" (fonction header)
    // --- START OF YOUR CODE ---

    return $pdo->exec($insertQuery);
}

function deleteItem($pdo,$article_id) {

        $deleteQuery = "
        DELETE FROM course WHERE PK=$article_id
        ";

        return $pdo->exec($deleteQuery);


}

function getTodoList($pdo) {

    $sqlTodo = 'SELECT * FROM todo';

    $pdoStatement = $pdo->query($sqlTodo);

    // Si jamais il y a un soucis...
    if ($pdoStatement === false) {

        $_SESSION['flash_message'][] = array('type' => 'danger', 'text' => 'Un problème est survenu merci de reessayer');

        // J'indique à PHP qu'il va falloir faire une redirection
        header('Location: ./index.php');
        // Puis j'arrete PHP
        die();
    }

    return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
}

function insertTask($pdo, $task) {

    // Insertion en DB du jeu video
    $insertQuery = "
        INSERT INTO todo (task)
        VALUES ('{$task}')
    ";
    // TODO exécuter la requête qui insère les données
    // TODO une fois inséré, faire une redirection vers la page "index.php" (fonction header)
    // --- START OF YOUR CODE ---

    return $pdo->exec($insertQuery);

}

function deleteTask($pdo,$task_id) {

        $deleteQuery = "
        DELETE FROM todo WHERE pk_todo=$task_id
        ";

        return $pdo->exec($deleteQuery);


}
