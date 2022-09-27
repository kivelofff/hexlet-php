<?php

use Slim\Factory\AppFactory;
use DI\Container;
use Web\Thirteen\Util\Generator;

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

$app->get('/', function ($request, $response) use ($users) {
    $params = ['users' => $users];
    return $this->get('renderer')->render($response, 'index.phtml', $params);
});

// BEGIN (write your solution here)
$app->get('/users', function ($request, $response) use ($users) {

    $term = $request->getQueryParam('term');
    if ($term == null) {
        $filteredUsers = $users;
    } else {
        $filteredUsers = collect($users)->filter(fn($value, $key) => str_starts_with(
            strtolower($value['firstName']),
            strtolower($term)
        ));
    }
    $fields = array_keys(collect($users)->first());
    $params = [
        'filteredUsers' => $filteredUsers,
        'userFields' => $fields,
        'term' => $term
        ];
    return $this->get('renderer')->render($response, 'users/index.phtml', $params);
});
// END

$app->run();

/*
 * $app->get('/users', function ($request, $response) use ($users) {
    $term = $request->getQueryParam('term');
    $result = collect($users)->filter(
        fn($user) => empty($term) ? true : s($user['firstName'])->ignoreCase()->startsWith($term)
    );
    $params = [
        'users' => $result,
        'term' => $term
    ];
    return $this->get('renderer')->render($response, 'users/index.phtml', $params);
});
 */
