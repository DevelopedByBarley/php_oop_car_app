<?php


class Database{
   private $serverName = 'localhost';
   private $dbName =  'class_practice';
   private $userName =  'Barley';
   private $password = 'Csak1enter';
   private $connection;

  public function __construct()
  {
    $dsn = "mysql:host=$this->serverName;dbname=$this->dbName";
    $this->connection = new PDO($dsn, $this->userName, $this->password);
  }

  public function getConnection() {
    return $this->connection;
  }

}
