<?php
// Router for PHP built-in server: serve index.php at /
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($uri === '/' || $uri === '') {
    require __DIR__ . '/index.php';
    return true;
}
$path = __DIR__ . $uri;
if (is_file($path)) {
    return false; // let server serve the file
}
if (is_dir($path) && is_file($path . '/index.php')) {
    require $path . '/index.php';
    return true;
}
return false;