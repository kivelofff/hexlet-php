<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

/**
 * $app->get('/companies/{id:[0-9]+}', function ($request, $response, $args) use ($companies) {
$id = $args['id'];
$company = collect($companies)->firstWhere('id', $id);
if (!$company) {
return $response->withStatus(404)->write('Page not found');
}
return $response->write(json_encode($company));
});
 */
use Slim\Factory\AppFactory;
use Illuminate\Support\Collection;

$companies = generate(100);
$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);
$app->get('/companies/{id}', function ($request, $response, $args) use ($companies) {
    $companyId = $args['id'];
    $company = collect($companies)->firstWhere('id', $companyId);
    if ($company !== null) {
        $response->getBody()->write(json_encode($company));
        return $response;
    }
    $response->getBody()->write('Page not found');
    return $response->withStatus(404);
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