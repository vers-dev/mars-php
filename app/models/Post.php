<?php

function getAllPosts()
{
    global $db;

    $data = $db->query("SELECT * FROM `posts`")->fetchAll(2);

    if ($data == '') {
        $data = array();
    }

    return $data;
}

function deletePost($id)
{
    global $db;

    $st = $db->prepare("DELETE FROM `posts` WHERE id = :id");
    $st->execute([
        'id' => $id
    ]);
}