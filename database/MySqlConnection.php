<?php
require_once "config/db.php";
require_once "database/Connection.php";
class MySqlConnection extends Connection
{
  public $db;

  public function __construct()
  {
    parent::__construct(DB_USER, DB_HOST, DB_DATABASE, DB_PASSWORD);
    $this->connect();
  }

  public function connect()
  {
    $this->db = new mysqli($this->host, $this->user, $this->password, $this->database);

    if ($this->db->connect_errno) {
      echo "Fallo al conectar a MySQL: " . $this->connection->connect_error;
    }
  }

  public function disconnect()
  {
  }
}
