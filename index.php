<?php

$todos = [];
if(file_exists('todo.json'))
{
    $json = file_get_contents('todo.json');
    $todos = json_decode($json, true);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My ToDo</title>
</head>
<body>

<form action="newtodo.php" method="post">
    <input type="text" name="todo_name" placeholder="Enter your todo">
    <button>New ToDo</button>
</form>

    <?php foreach ($todos as $todoName => $todo): ?>
            <div style="margin-bottom: 20px;">
                <form style="display: inline-block" action="changeStatus.php" method="post">
                    <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                    <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : ''?>>
                </form>
                <?php echo $todoName ?>
                <form  style="display: inline-block"  action="delete.php" method="post">
                    <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                    <button>Delete</button>

                </form>
            </div>
     <?php endforeach; ?>
<script>
     const checkboxes = document.querySelectorAll('input[type=checkbox]');
     checkboxes.forEach(ch =>
     {
         ch.onclick = function()
         {
             this.parentNode.submit();
         };
     })
</script>
</body>
</html>
