<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use Slim\Factory\AppFactory;

/**
 * Пейджинг — механизм, позволяющий итерироваться по большим коллекциям небольшими порциями. Очень часто встречается в Интернете, например, в результатах запросов поисковых систем. Пейджинг с точки зрения пользователя выглядит как параметры запроса: page определяет текущую страницу, а per — количество элементов на страницу. Имена могут быть и другими, но обычно их называют так как показано выше. Запрос c page, равным 1, аналогичен запросу без указания page вообще.

src/index.php
Реализуйте маршрут /companies, по которому отдаётся список компаний в виде json. Компании отдаются не все сразу, а только соответствующие текущей запрошенной странице. По умолчанию выдаётся 5 результатов на запрос.

Подсказки
Список компаний лежит в массиве $companies
Чтобы получить его внутри обработчика, воспользуйтесь замыканием
Возможно, вам пригодится функция array_slice()
 */

$companies = generate(100);

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$app->get('/companies', function ($request, $response) use ($companies) {
    $page = $request->getQueryParam('page', 1);
    $per = $request->getQueryParam('per', 5);
    $offset = ($page - 1) * $per;
    $response->getBody()->write(json_encode(array_slice($companies, $offset, $per)));
    return $response;
});
$app->run();

function generate($count)
{
    $numbers = range(1, 100);
    shuffle($numbers);

    $faker = \Faker\Factory::create();
    $faker->seed(1);
    $companies = [];
    for ($i = 0; $i < $count; $i++) {
        $companies[] = [
            'id' => $numbers[$i],
            'name' => $faker->company,
            'phone' => $faker->phoneNumber
        ];
    }

    return $companies;
}
