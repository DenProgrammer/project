<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$get = isset($_GET['task']) ? $_GET['task'] : 1;

$action = isset($_POST['action']) ? $_POST['action'] : null;

include 'actions/email.php';
include 'actions/files.php';

switch ($action) {
    case 'save.email': {
            $emailClass = new Email();
            $emailClass->save();

            header('Location: index.php?task=4');
            exit;
            break;
        }
    case 'save.file': {
            $fileClass = new Files();
            $filepath = $fileClass->upload();

            header("Location: index.php?task=1&path=$filepath");
            exit;
            break;
        }
}

$task = file_exists('templates/task' . $get . '.php') ? $get : 1;

include 'templates/main.php';
