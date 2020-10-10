<?php

require_once "database/Connection.php";
class MySqlConnection extends Connection {
    public function __construct($host, $user, $password, $database)
    {
        parent::__construct($user, $host, $database, $password);
    }

    public function connect (){
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        
        if ($this->connection->connect_errno) {
            echo "Fallo al conectar a MySQL: " . $this->connection->connect_error;
        }
    }

    public function disconnect()
    {
        
    }
}