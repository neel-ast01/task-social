<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

const BASE_PATH = __DIR__. '/./'; 

require BASE_PATH . 'functions.php';
require 'Database.php';
// require 'Response.php';
require 'router.php';