<?php
class UserModel
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function registration($body)
    {
        $stmt = $this->pdo->prepare("INSERT INTO `users` (`id`, `name`, `email`, `password`, `createdAt`) VALUES (NULL, ?, ?, ?, ?)");
        $stmt->execute([
            $body["name"],
            $body["email"],
            password_hash($body["password"], PASSWORD_DEFAULT),
            time()
        ]);
    }

    public function login($body)
    {

        $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE email = ?");
        $stmt->execute([
            $body["email"],
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            echo "email or password is wrong!";
            return;
        }

        $isVerified = password_verify($body["password"], $user["password"]);

        if (!$isVerified) {
            echo "email or password is wrong!";
            return;
        }

        session_start();
        $_SESSION["userId"] = $user["id"];
    }

    private function isLoggedIn() {
        if (!isset($_COOKIE[session_name()])) return false;
        session_start();
        if (!isset($_SESSION["userId"])) return false;
        return true;
    }

    public function ifUserNotLoggedInRedirect() {
        if($this->isLoggedIn()) {
            return;
        }
        header("Location: /user/registration-form");
        exit;

    }
}
