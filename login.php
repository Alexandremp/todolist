<?php

define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__ . '/html/src/app.php');

$userService = new UserService();

if ($userService->checkUserExistsAndIsValid($_POST['name'], $_POST['pass'])) {

    header('Location: tasks.php');
} else { ?>
    <html>
        <body>
            <h1>Invalid user or password!</h1>
            <a href="index.html">Go back to inital page</a>
        </body>
    </html>
    <?php
}
?>
