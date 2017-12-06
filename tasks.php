<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todolist</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<?php

define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__ . '/html/src/app.php');

$todoService = new TodoService();

$tasks = $todoService->getTasks();
?>

<table>
    <tr>
        <td>Tasks</td>
        <td>Actions</td>
    </tr>
    <?php foreach ($tasks as $task) { ?>
        <tr>
            <td><?php echo $task->getTaskName() ?></td>
            <td><a href="todolist.php?taskId=<?php echo $task->getId() ?>">Edit</a> <a href="taskdelete.php?taskId=<?php echo $task->getId() ?>">Delete</a></td>
        </tr>
    <?php } ?>
</table>
<br />
<a href="tasksadd.html">Add new item</a>
<br />
<a href="signout.php">Sign out</a>
</body>