<?php

use Slim\Factory\AppFactory;
use DI\Container;
use Slim\Middleware\MethodOverrideMiddleware;

require __DIR__ . "/../../../vendor/autoload.php";

session_start();

$container = new Container();
$container->set('renderer', function () {
    return new \Slim\Views\PhpRenderer(__DIR__ . '/../templates');
});
$container->set('flash', function () {
    return new \Slim\Flash\Messages();
});

AppFactory::setContainer($container);
$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);
$app->add(MethodOverrideMiddleware::class);

$users = [
    ['name' => 'admin', 'passwordDigest' => hash('sha256', 'secret')],
    ['name' => 'mike', 'passwordDigest' => hash('sha256', 'superpass')],
    ['name' => 'kate', 'passwordDigest' => hash('sha256', 'strongpass')]
];

// BEGIN (write your solution here)
$app->post('/session', function ($request, $response) use ($users) {
    $user = $request->getParsedBodyParam('user');
    $userEncrypted = ['name' => $user['name'], 'passwordDigest' => hash('sha256', $user['password'])];
    if (in_array($userEncrypted, $users)) {
        $_SESSION['user'] = $userEncrypted;
        return $response->withRedirect('/');
    }
    $this->get('flash')->addMessage('error', 'Wrong password or name');
    return $response->withRedirect('/');
});

$app->delete('/session', function ($request, $response) {
    $_SESSION = [];
    session_destroy();
    return $response->withRedirect('/');
});

$app->get('/', function ($request, $response) {
    $flash = $this->get('flash')->getMessages() ?? [];
    $params = [
        'flash' => $flash
    ];
    return $this->get('renderer')->render($response, 'index.phtml', $params);
});
// END

$app->run();

/*
 * $app->get('/', function ($request, $response) {
    $flash = $this->get('flash')->getMessages();
    $params = [
        'currentUser' => $_SESSION['user'] ?? null,
        'flash' => $flash
    ];
    return $this->get('renderer')->render($response, 'index.phtml', $params);
});

$app->post('/session', function ($request, $response) use ($users) {
    $userData = $request->getParsedBodyParam('user');

    $user = collect($users)->first(function ($user) use ($userData) {
        return $user['name'] === $userData['name']
            && hash('sha256', $userData['password']) === $user['passwordDigest'];
    });

    if ($user) {
        $_SESSION['user'] = $user;
    } else {
        $this->get('flash')->addMessage('error', 'Wrong password or name');
    }
        return $response->withRedirect('/');
});

$app->delete('/session', function ($request, $response) {
    $_SESSION = [];
    session_destroy();
    return $response->withRedirect('/');
});
 */
