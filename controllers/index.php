<?php

$config = require('config.php');
$db = new Database($config['database']);

$posts = $db->query('SELECT * FROM posts WHERE user_id = 1 ORDER BY post_id DESC')->fetchAll(PDO::FETCH_ASSOC);


//  dd($posts);

require 'views/index.view.php';
