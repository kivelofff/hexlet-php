<?php

use Slim\Factory\AppFactory;
use DI\Container;
use Slim\Middleware\MethodOverrideMiddleware;

require __DIR__ . '/../../../vendor/autoload.php';

$container = new Container();
$container->set('renderer', function () {
    return new \Slim\Views\PhpRenderer(__DIR__ . '/../templates');
});

AppFactory::setContainer($container);
$app = AppFactory::create();
$app->add(MethodOverrideMiddleware::class);
$app->addErrorMiddleware(true, true, true);

$app->get('/', function ($request, $response) {
    $cart = json_decode($request->getCookieParam('cart', json_encode([])), true);
    $params = [
        'cart' => $cart
    ];
    return $this->get('renderer')->render($response, 'index.phtml', $params);
});

// BEGIN (write your solution here)
$app->post('/cart-items', function ($request, $response) {
    $item = $request->getParsedBodyParam('item');
    $cart = json_decode($request->getCookieParam('cart', json_encode([])), true);
    $isExists = false;
    $updatedCart = array_map(function ($e) use ($item, &$isExists) {
        if ($e['id'] === $item['id']) {
            $e['count']++;
            $isExists = true;
        }
        return $e;
    }, $cart);
    if (!$isExists) {
        $item['count'] = 1;
        $updatedCart[] = $item;
    }
    $encodedCart = json_encode($updatedCart);
    return $response->withHeader('Set-Cookie', "cart={$encodedCart}")
        ->withRedirect('/');
});

$app->delete('/cart-items', function ($request, $response) {
    $encodedCart = json_encode([]);
    return $response->withHeader('Set-Cookie', "cart={$encodedCart}")
        ->withRedirect('/');
});
// END

$app->run();
