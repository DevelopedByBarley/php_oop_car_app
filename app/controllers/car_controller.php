<?php
require_once '../config/database.php';
require_once '../app/models/car_model.php';
require_once '../app/helpers/render.php';


class CarController
{
    public $pdo;


    public function __construct()
    {
        $database = new Database();
        $pdo = $database->getConnection();
        $this->pdo = $pdo;
    }

    public function getCars()
    {
        $carModel = new CarModel($this->pdo);
        $cars = $carModel->getCars();
        $render = new Render();
        echo $render->render("layout/layout.php", [
            "content" => $render->render("carList.php", [
                "cars" => $cars,
                "isUnderEdit" => $_GET["isUnderEdit"] ?? ""
            ])
        ]);
    }

    public function sendCar()
    {
        $carModel = new CarModel($this->pdo);
        $carModel->sendCar();
        header('Location: /');
    }


    public function deleteCar()
    {
 
        $carModel = new CarModel($this->pdo);
        $carModel->deleteCar();
        header('Location: /');
    }

    public function updateCar() {
        $carModel = new CarModel($this->pdo);
        $carModel->updateCar();
        header('Location: /');
    }
}
