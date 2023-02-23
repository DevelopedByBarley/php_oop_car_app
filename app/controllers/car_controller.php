<?php
require_once '../config/database.php';
require_once '../app/models/car_model.php';
require_once '../app/helpers/render.php';


class CarController
{
    public $pdo;
    public $userModel;
    public $fileUploader;

    public function __construct()
    {
        $database = new Database();
        $pdo = $database->getConnection();
        $this->pdo = $pdo;

        $userModel = new UserModel($this->pdo);
        $this->userModel = $userModel;

        $fileUploader = new FileUploader();
        $this->fileUploader = $fileUploader;
    }

    public function getCars()
    {
        $this->userModel->ifUserNotLoggedInRedirect();
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
        $this->userModel->ifUserNotLoggedInRedirect();
        $file = $this->fileUploader->saveFile($_FILES["file"]);
        $carModel = new CarModel($this->pdo);
        $carModel->sendCar($file);
        header('Location: /');
    }


    public function deleteCar()
    {
        
        $this->userModel->ifUserNotLoggedInRedirect();
        $carModel = new CarModel($this->pdo);
        $carModel->deleteCar();
        header('Location: /');
    }

    public function updateCar()
    {
        $this->userModel->ifUserNotLoggedInRedirect();
        $carModel = new CarModel($this->pdo);
        $carModel->updateCar();
        header('Location: /');
    }
}
