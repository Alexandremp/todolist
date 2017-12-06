<?php

define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__ . '/html/src/app.php');

$todoService = new TodoService();

$todoService->deleteTask($_GET['taskId']);

header('Location: tasks.php');