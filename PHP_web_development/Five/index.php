<?php

$uri = $_SERVER['REQUEST_URI'];
$root = '<a href="/welcome">welcome</a><br><a href="/not-found">not-found</a>';
$welcome = '<a href="/">main</a>';
$notFound = 'Page not found. <a href="/">main</a>';

switch ($uri) {
    case '/':
        echo $root;
        break;
    case '/welcome':
        echo $welcome;
        break;
    default:
        header('HTTP/1.0 404 not found');
        echo $notFound;
}
