<?php
require_once "database/MySqlConnection.php";

class Municipio extends MySqlConnection
{
  const TABLE_NAME = 'tbl_municipio';

  private $id_municipio;
  private $nombre_municipio;
  private $id_departamento;

  public function setId_municipio(){
    $this->id_municipio = $id_municipio;
  }

  public function getId_municipio(){
      return $this->id_municipio;
  }

  public function setnombre_municipio(){
    $this->nombre_municipio = $nombre_municipio;
  }

  public function getnombre_municipio(){
    return $this->nombre_municipio;
  }

  public function setId_departamento(){
    $this->id_departamento = $id_departamento;
  }

  public function getId_departamento(){
    return $this->id_departamento;
  }

  public function __construct()
  {
    parent::__construct();    
  }

  public function list($page, $limit)
  {
    if (!$limit) $limit = 20;
    if (!$page) $offset = 0;
    else $offset = ($page - 1) * $limit;
    // $sql = "SELECT * FROM " . self::TABLE_NAME;
    $sql = "SELECT * FROM " . self::TABLE_NAME . " limit " . $limit . " offset " . $offset;
    echo $sql;
    // $query = $this->db->prepare("SELECT * FROM " . self::TABLE_NAME . " offset " . $offset . " limit " . $limit); --- PREPARED
    if ($result = $this->db->query($sql, MYSQLI_USE_RESULT)) {
      $data = array();
      while ($obj = $result->fetch_object()) {
        array_push($data, $obj);
      }
      return $data;
    }
  }

  public function get($id)
  {
    $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE id_municipio = " . $id;
    // $query = $this->db->prepare("SELECT * FROM " . self::TABLE_NAME . " offset " . $offset . " limit " . $limit); --- PREPARED
    
    if ($result = $this->db->query($sql, MYSQLI_USE_RESULT)) {
      $data = array();
      while ($obj = $result->fetch_object()) {
        array_push($data, $obj);
      }
      return $data;
    }
  }

  public function create($nombre, $id_departamento)
  {
    $sql = "INSERT INTO " . self::TABLE_NAME . " (nombre_municipio, id_departamento) VALUES ('". $nombre ."', '"  . $id_departamento . "')";
    // $query = $this->db->prepare("INSERT INTO " . self::TABLE_NAME . " ""
    //echo $sql . "<br>";
    if (!$result = $this->db->query($sql)) {
      return "Falló al registrar municipio: (" . $this->db->errno . ") " . $this->db->error;
    }
    return $result;
  }

  public function update()
  {
  }
  
  public function delete()
  {
  }
}