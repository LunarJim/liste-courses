<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Liste de courses</title>
</head>
<body>
<div class="container mt-4">
<div class="shoppingList">

<?php if (!empty($_SESSION['flash_message'])): ?>

<?php foreach ($_SESSION['flash_message'] as $message_datas): ?>

    <div class="alert alert-<?= $message_datas['type']; ?>" role="alert">
        <?= $message_datas['text']; ?>
    </div>

<?php endforeach; ?>

<?php $_SESSION['flash_message'] = array(); ?>

<?php endif; ?>


    <div class="row submit-button ">

        <div class="col-sm-12 shadow p-3 mb-3 bg-primary rounded">
        <form action="" method="post">
            <div class="input-group mt-4">
                <input type="text" class="form-control" placeholder="achat" aria-label="Recipient's username" aria-describedby="button-addon2" name="item">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit" id="button-addon2" ><i class="fas fa-cart-arrow-down text-white font-weight-bolder"></i></button>
                </div>
            </div>
            </form>
        </div>
    </div>


    <div class="row liste-courses shadow p-3 mb-5 bg-white rounded">
        <div class="col-sm-12">
        
            <ul class="list-group">
                <?php foreach ($shoppingList as $currentRow): ?>
                <li class="list-group-item"><?= $currentRow['article']; ?>
                    <a href="?articleDelete=<?= $currentRow['PK'];?>">
                        <button type="submit" class="btn btn-dark ml-4">
                            <i class="fas fa-trash-alt">
                            </i>
                        </button>
                    </a>
                </li>
        
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    </div>

    <div class="TodoList">

        <div class="row submit-button">

<div class="col-sm-12 shadow p-3 mb-3 bg-primary rounded">
<form action="" method="post">
    <div class="input-group mt-4">
        <input type="text" class="form-control" placeholder="todo !!" aria-label="Recipient's username" aria-describedby="button-addon2" name="task">
        <div class="input-group-append">
            <button class="btn btn-success " type="submit" id="button-addon2" ><i class="fas fa-save text-white"></i></button>
        </div>
    </div>
    </form>
</div>
</div>

    <div class="row liste-todo shadow p-3 mb-5 bg-white rounded">
        <div class="col-sm-12">
        
            <ul class="list-group">
                <?php foreach ($todoList as $todoItem): ?>
                <li class="list-group-item"><?= $todoItem['task']; ?>
                    <a href="?taskDelete=<?= $todoItem['pk_todo'];?>">
                        <button type="submit" class="btn btn-dark ml-4">
                            <i class="fas fa-trash-alt">
                            </i>
                        </button>
                    </a>
                </li>
        
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    </div>
</div>


    

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>