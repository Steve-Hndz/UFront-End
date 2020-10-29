<?php

class Task {
    private $db;
    
    const TABLE_NAME = 'tasks';

    public function __construct($database)
    {
        $this->db = $database;
        $this->sql = '';
    }

    public function list () {
       /*  $sql = "SELECT * FROM " . self::TABLE_NAME;
        if ($result = $this->db->query($sql, MYSQLI_USE_RESULT)) {
            $data = array();
            while ($obj = $result->fetch_object()) {
                array_push($data, $obj);
            }
            return $data;
        } */
        require_once "assets/tasks.php";
        return $tasks;
    }
    public function get () {

    }
    public function create () {

    }
    public function update () {

    }
    public function delete () {

    }
}