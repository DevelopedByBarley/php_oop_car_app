<?php
require_once '../config/database.php';
require_once '../app/models/user_model.php';

class UserController
{
    public $pdo;

    public function __construct()
    {
        $database = new Database();
        $pdo = $database->getConnection();
        $this->pdo = $pdo;
    }

    public function user_subscription_form()
    {
        $render = new Render();
        echo $render->render("layout/layout.php", [
            "content" => $render->render("user_subscription_form.php", [
                "isRegistered" => isset($_GET["isRegistered"]) ? $_GET["isRegistered"] : null
            ])
        ]);
    }

    public function login()
    {
        $userModel = new UserModel($this->pdo);
        $userModel->login($_POST);
        header("Location: /");
    }



    public function registration()
    {
        $userModel = new UserModel($this->pdo);
        $userModel->registration($_POST);
        header("Location: /user/registration-form");
    }
}
