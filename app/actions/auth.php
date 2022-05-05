<?php

session_start();

require('../Database.php');

global $db;

require('../models/User.php');

$_SESSION['errors'] = [];

if ($_POST){

    $user = getUserByLogin($_POST['username']);

    if (empty($user)){
        $_SESSION['errors'][] = 'Пользователь не найден';
        header("Location: /index.php");
        die();
    }

    if (!empty($user)){

        if ($user['password'] === md5($_POST['pass'])){

            $_SESSION['user'] = $user;
            header("Location: /main.php");
            die();

        } else{
            $_SESSION['errors'][] = 'Пароли не совпадают';
            header("Location: /index.php");
            die();
        }

    }

}

header("Location: /index.php");

