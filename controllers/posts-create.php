<?php

$config = require('config.php');
$db = new Database($config['database']);

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//     $db->query('INSERT INTO posts(post_data, post_timedate, user_id) VALUES (:post_data, NOW(), :user_id)', [
//         'post_data' => $_POST['post_data'],
//         // 'post_img' => $_POST['post_img'],
//         'user_id' => 1
//     ]);
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $post_data = $_POST['post_data'];
    $post_img = isset($_FILES['post_img']) ? $_FILES['post_img']['name'] : null;

    if ($post_img !== null) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($post_img);
        move_uploaded_file($_FILES['post_img']['tmp_name'], $target_file);
    }

    $db->query('INSERT INTO posts(post_data, post_img, post_timedate, user_id) VALUES (:post_data, :post_img, NOW(), :user_id)', [
        'post_data' => $post_data,
        'post_img' => $post_img !== null ? $post_img : '',
        'user_id' => 1
    ]);
    header('location: /');
}

// $posts = $db->query('SELECT * FROM posts WHERE user_id = 1 ORDER BY post_id DESC')->fetchAll(PDO::FETCH_ASSOC);
// view('index.view.php', compact('posts'));
