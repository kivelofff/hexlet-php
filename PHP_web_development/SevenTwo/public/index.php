<?php
/**
 * Реализуйте Slim приложение, в котором по адресу / отдается строчка Welcome to Hexlet!
 */
require_once __DIR__ . "/../../../vendor/autoload.php";

use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$app->get('/', function ($request, $response) {
    $response->getBody()->write('Welcome to Hexlet!');
    return $response;
});
$app->run();
