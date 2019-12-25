<?php
    require_once(__DIR__ . '/config.php');
    require_once(__DIR__ . '/function.php');
    require_once(__DIR__ . '/Todo.php');
    
    //get todos
    $todoApp = new \MyApp\Todo();
    $todos = $todoApp->getAll();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TO DO APP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="container">
        
        <h1>Todos</h1>
        <form action="">
            <input type="text" id="new_todo" placeholder="what needs to be done?">
        </form>

        <ul id="todos">
        <?php foreach ($todos as $todo) : ?>
            <li id="to_do_<?= h($todo->id); ?>" data-id="<?= h($todo->id); ?>">
                <input type="checkbox" class="udpate_todo" <?php if ($todo->state === '1') 
                    { echo 'checked';}?>>
                <span class="todo_title <?php if ($todo->state === '1') { echo 'done';}?>">
                    <?= h($todo->title); ?>
                </span>
                <div class="delete_todo">×</div>
            </li>
        <?php endforeach; ?>
        </ul>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="todo.js"></script>
</body>
</html>