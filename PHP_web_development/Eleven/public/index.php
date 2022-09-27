<?php

use Slim\Factory\AppFactory;
use DI\Container;
use Web\Eleven\Util\Generator;

require __DIR__ . '/../../../vendor/autoload.php';

// Список пользователей
// Каждый пользователь – ассоциативный массив
// следующей структуры: id, firstName, lastName, email
$users = Generator::generate(100);

$container = new Container();
$container->set('renderer', function () {
    return new \Slim\Views\PhpRenderer(__DIR__ . '/../templates');
});

AppFactory::setContainer($container);
$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

$app->get('/', function ($request, $response) {
    return $this->get('renderer')->render($response, 'index.phtml');
});

// BEGIN (write your solution here)
$app->get('/users', function ($request, $response) use ($users) {
    $shortUsers = collect($users)
        ->mapWithKeys(fn($user)=> [$user['id'] => $user['firstName']])
        ->toArray();
    $params = ['users' => $shortUsers];
    return $this->get('renderer')->render($response, 'users/index.phtml', $params);
});
$app->get('/users/{id}', function ($request, $response, $args) use ($users) {
    $userId = $args['id'];
    $user = collect($users)
        ->firstWhere('id', $userId);
    $params = ['user' => $user];
    return $this->get('renderer')->render($response, 'users/show.phtml', $params);
});
// END

$app->run();
