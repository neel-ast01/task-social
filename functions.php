<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($url)
{
    return $_SERVER['REQUEST_URI'] === $url;
}

// function authorize($condition, $status = Response::FORBIDDEN)
// {
//     if (!$condition) {
//         abort($status);
//     }
// }

// function abort($code = 404)
// {
//     http_response_code($code);
//     require base_path("views/{$code}.php");
//     die();
// }

// function view($path, $attributes = [])
// {
//     extract($attributes);
//     require base_path("views/$path");
// }

// function base_path($path)
// {
//     return BASE_PATH . $path;
// }
