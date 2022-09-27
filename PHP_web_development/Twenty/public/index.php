<?php

use Slim\Factory\AppFactory;
use DI\Container;
use Web\Twenty\src\PostRepository;
use Web\Twenty\src\Validator;

require __DIR__ . '/../../../vendor/autoload.php';

$container = new Container();
$container->set('renderer', function () {
    return new Slim\Views\PhpRenderer(__DIR__ . '/../templates');
});
$container->set('flash', function () {
    return new Slim\Flash\Messages();
});

$app = AppFactory::createFromContainer($container);
$app->addErrorMiddleware(true, true, true);

$repo = new PostRepository();
$router = $app->getRouteCollector()->getRouteParser();

$app->get('/', function ($request, $response) {
    return $this->get('renderer')->render($response, 'index.phtml');
});

$app->get('/posts', function ($request, $response) use ($repo) {
    $flash = $this->get('flash')->getMessages();

    $params = [
        'flash' => $flash,
        'posts' => $repo->all()
    ];
    return $this->get('renderer')->render($response, 'posts/index.phtml', $params);
})->setName('posts');

// BEGIN (write your solution here)
$app->get('/posts/new', function ($request, $response) {
    $params = [
        'postData' => [],
        'errors' => []
    ];
    return $this->get('renderer')->render($response, 'posts/new.phtml', $params);
})->setName('newPost');

$app->post('/posts', function ($request, $response) use ($router, $repo) {
    $postData = $request->getParsedBodyParam('post');
    $validator = new Validator();
    $errors = $validator->validate($postData);

    if (count($errors) === 0) {
        $repo->save($postData);
        $this->get('flash')->addMessage('success', 'Post has been created');
        $url = $router->urlFor('posts');
        return $response->withRedirect($url);
    }
    $params = [
        'postData' => $postData,
        'errors' => $errors
    ];
    $response = $response->withStatus(422);
    return $this->get('renderer')->render($response, 'posts/new.phtml', $params);
});
// END

$app->run();
