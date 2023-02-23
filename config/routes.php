
<?php
require_once '../app/core/core.php';
require_once '../app/controllers/car_controller.php';

$carController = new CarController();

$routes = [
  'GET' => [
      '/' => fn() => $carController->getCars(),
      '/delete-car' => fn() => $carController->deleteCar(),
   ],
  'POST' => [
    '/add-car' => fn() => $carController->sendCar(),
    '/update-car' => fn() => $carController->updateCar(),
  ]
];

$router = new Router($routes);
echo $router->handlerFunction();
