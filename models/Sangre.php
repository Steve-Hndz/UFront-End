<?php

require_once "database/MySqlConnection.php";

class Sangre extends MySqlConnection{

    const TABLE_NAME = 'tbl_sangre';

    private $id_sangre;
    private $nombre_sangre;

    public function setId_sangre($id_sangre){
        $this->id_sangre = $id_sangre;
    }

    public function getId_sangre(){
        return $this->id_sangre;
    }

    public function setNombre_sangre($nombre_sangre){
        $this->nombre_sangre = $nombre_sangre;
    }

    public function getNombre_sangre(){
        return $this->nombre_sangre;
    }
    
    public function __construct()
    {
        parent::__construct();
    }

    public function list ($page = 1, $limit = 20, $filter = [], $sort = []){
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM " . self::TABLE_NAME . " d";
        $sql .= " limit " . $limit . " offset " . $offset;
        // echo "<p></p>" . $sql . "<br>";

        $data = array();
        if ($result = $this->db->query($sql, MYSQLI_USE_RESULT)) {

          while ($obj = $result->fetch_object()) {
            array_push($data, $obj);
          }
        }
        return $data;
    }
}