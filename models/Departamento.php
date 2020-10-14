<?php
require_once "database/MySqlConnection.php";

class Departamento extends MySqlConnection
{
  const TABLE_NAME = 'tbl_departamento';

  private $id_departamento;
  private $nombre_departamento;

  public function setId_departamento($id_departamento){
      $this->id_departamento = $id_departamento;
    }

    public function getId_departamento(){
      return $this->id_departamento;
    }

    public function setNombre_departamento($nombre_departamento){
      $this->nombre_departamento = $nombre_departamento;
    }

    public function getNombre_departamento(){
      return $this->nombre_departamento;
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
    $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE id_departamento = " . $id;
    // $query = $this->db->prepare("SELECT * FROM " . self::TABLE_NAME . " offset " . $offset . " limit " . $limit); --- PREPARED

    if ($result = $this->db->query($sql, MYSQLI_USE_RESULT)) {
      $data = array();
      while ($obj = $result->fetch_object()) {
        array_push($data, $obj);
      }
      return $data;
    }
  }
  public function create($nombre)
  {
    $sql = "INSERT INTO " . self::TABLE_NAME . " (nombre_departamento) VALUES ('" . $nombre . "')";
    // $query = $this->db->prepare("INSERT INTO " . self::TABLE_NAME . " ""
    echo $sql . "<br>";
    if (!$result = $this->db->query($sql)) {
      return "Falló la creación de la tabla: (" . $this->db->errno . ") " . $this->db->error;
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
