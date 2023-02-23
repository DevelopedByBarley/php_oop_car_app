
<?php
require_once '../app/core/core.php';
require_once '../app/controllers/car_controller.php';
require_once '../app/controllers/user_controller.php';

$carController = new CarController();
$userController = new UserController();

$routes = [
  'GET' => [
      '/' => fn() => $carController->getCars(),
      '/delete-car' => fn() => $carController->deleteCar(),
      '/user/registration-form' => fn() => $userController->user_subscription_form(),
   ],
  'POST' => [
    '/add-car' => fn() => $carController->sendCar(),
    '/update-car' => fn() => $carController->updateCar(),
    '/user/register' => fn() => $userController->registration(),
    '/user/login' => fn() => $userController->login(),
  ]
];

$router = new Router($routes);
echo $router->handlerFunction();
