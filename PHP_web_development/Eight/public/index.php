<?php
/**
 * Добавьте два обработчика:

/phones - возвращает список телефонов содержащихся в переменной $phones закодированный в json.
/domains - возвращает список доменов содержащихся в переменной $domains закодированный в json.
Подсказки
Кодирование в json: json_encode($data)
Чтобы получить данные внутри обработчиков, воспользуйтесь замыканием (для телефонов: use ($phones)).
 */
require_once __DIR__ . "/../../../vendor/autoload.php";

use Slim\Factory\AppFactory;

$faker = \Faker\Factory::create();
$faker->seed(1234);

$domains = [];
for ($i = 0; $i < 10; $i++) {
    $domains[] = $faker->domainName;
}

$phones = [];
for ($i = 0; $i < 10; $i++) {
    $phones[] = $faker->phoneNumber;
}

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$app->get('/phones', function ($request, $response) use ($phones) {
    $response->getBody()->write(json_encode($phones));
    return $response;
});
$app->get('/domains', function ($request, $response) use ($domains) {
    $response->getBody()->write(json_encode($domains));
    return $response;
});
$app->run();
