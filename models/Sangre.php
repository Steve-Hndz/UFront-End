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
}