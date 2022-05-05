<?php

session_start();

require('../Database.php');

global $db;

require('../models/Post.php');

$post_id = $_GET['id'];

if (!empty($post_id)){

    deletePost($post_id);

}

header("Location: /main.php");