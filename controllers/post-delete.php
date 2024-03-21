<?php

$config = require('config.php');
$db = new Database($config['database']);

if (isset($_GET['post_id'])) {
    $id = $_GET['post_id'];
    $db->query("delete from posts where post_id = {$id}");
    header('location: /');
} else {
    echo "Sorry You Fail";
}
