<?php

session_start();

require('../Database.php');

global $db;

require('../models/User.php');

$_SESSION['errors'] = [];

if ($_POST){

    $user = getUserByLogin($_POST['username']);

    if (!empty($user)){
        $_SESSION['errors'][] = "Пользователь '{$_POST['username']}' уже существует!";
        header("Location: /register.php");
        die();
    }

    if ((strlen($_POST['pass']) < 6) OR (strlen($_POST['re_pass']) < 6)){
        $_SESSION['errors'][] = "Пароль меньше 6 символов";
        header("Location: /register.php");
        die();
    }

    if (empty($_SESSION['errors'])){

        $file = $_FILES['file']['name'];

        if (!empty($file)){
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $ext;
            $path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/' . $filename;

            move_uploaded_file($_FILES['file']['tmp_name'], $path);
        }

        $data = [
            'username' => $_POST['username'],
            'pass' => md5($_POST['pass']),
            'image' => $filename
        ];

        $id = createUser($data);

        $_SESSION['user'] = getUserById($id);

    }

}
header("Location: /main.php");