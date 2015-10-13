<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$get = isset($_GET['task']) ? $_GET['task'] : 1;

include 'actions/email.php';
include 'actions/files.php';

if (isset($_POST['action']) && $_POST['action'] == 'save.email') {
    $emailClass = new Email();
    $emailClass->save();

    header('Location: index.php?task=4');
    exit;
}

if (isset($_POST['action']) && $_POST['action'] == 'save.file') {
    $fileClass = new Files();
    $filepath = $fileClass->upload();

    header("Location: index.php?task=1&path=$filepath");
    exit;
}

$task = file_exists('templates/task' . $get . '.php') ? $get : 1;
?>
<html>
    <head>
        <title>Test</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <script type="text/javascript" src="js/jquery.js" ></script>
    </head>
    <body>
        <div class="wraper">
            <div class="menu">
                <?php
                include 'templates/menu.php';
                ?>
            </div>
            <div class="content">
                <?php
                include 'templates/task' . $task . '.php';
                ?>
            </div>

        </div>

    </body>
</html>
