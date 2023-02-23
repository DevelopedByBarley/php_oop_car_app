<?php


class CarModel
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getCars()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `cars`");
        $stmt->execute([]);
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cars;
    }

    public function sendCar()
    {
        $stmt = $this->pdo->prepare("INSERT INTO `cars` (`id`, `name`, `licenceNumber`, `price`) VALUES (NULL, ?, ?, ?);");
        $stmt->execute([
            $_POST["name"],
            $_POST["licenceNumber"],
            $_POST["price"]
        ]);
    }

    public function deleteCar()
    {
        $stmt = $this->pdo->prepare("DELETE FROM `cars` WHERE id = ?;");
        $stmt->execute([
            $_GET["id"]    
        ]);
    }

    public function updateCar()
    {
        $stmt = $this->pdo->prepare("UPDATE `cars` SET `name` = ?, `licenceNumber` = ?, `price` = ? WHERE `cars`.`id` = ?");
        $stmt->execute([
            $_POST["name"],
            $_POST["licenceNumber"],
            $_POST["price"],
            $_GET["id"]
        ]);
    }
}
