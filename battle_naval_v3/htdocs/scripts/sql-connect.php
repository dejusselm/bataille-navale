<?php

class SqlConnect
{
  public PDO $db;
  private string $host = '127.0.0.1';
  private string $port = '3306';
  private string $dbname = 'bataille_navale';
  private string $user = 'root';
  private string $password = 'root';

  public function __construct()
  {
    $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->dbname};charset=utf8mb4";
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
    ];

    $this->db = new PDO($dsn, $this->user, $this->password, $options);
  }

  public function transformDataInDot($data)
  {
    $dataFormated = [];
    foreach ($data as $key => $value) {
      $dataFormated[':' . $key] = $value;
    }

    return $dataFormated;
  }
}
