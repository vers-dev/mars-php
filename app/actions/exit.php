<?php

session_start();

require('../Database.php');

global $db;

unset($_SESSION['user']);

header('Location: /');