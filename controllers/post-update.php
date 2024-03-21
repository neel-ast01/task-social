<?php

$config = require('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_GET['post_id'];

    $post_data = $_POST['post_data'];
    $post_img = $_FILES['post_img']['name'];
    $post_img_tmp = $_FILES['post_img']['tmp_name']; 

    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($post_img);

    if ($post_img_tmp != "") {
        move_uploaded_file($post_img_tmp, $target_file);
        $execute = $db->query("UPDATE posts SET post_data = '{$post_data}', post_img = '{$post_img}' WHERE post_id = {$id}");
        if ($execute) {
            header("Location: /");
        } else {
            echo "not updated";
        }
    } else {
        $execute = $db->query("UPDATE posts SET post_data = '{$post_data}' WHERE post_id = {$id}");
        if ($execute) {
            header("Location: /");
        } else {
            echo "not updated";
        }
    }
}
