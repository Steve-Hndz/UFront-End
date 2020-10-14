<?php

require_once "database/MySqlConnection.php";

class Donante extends MySqlConnection{

  const TABLE_NAME = 'tbl_donantes';

  private $id_donante;
  private $nombre_donante;
  private $apellido_donante;
  private $telefono_donante;
  private $id_sangre;
  private $id_departamento;
  private $id_municipio;
  private $estado_donante;
  private $prueba_donante;

  public function setId_donante(){
    $this->id_donante = $id_donante;
  }

  public function getId_donante(){
    return $this->id_donante;
  }

  public function setNombre_donante(){
    $this->nombre_donante = $nombre_donante;
  }

  public function getNombre_donante(){
    return $this->nombre_donante;
  }

  public function setApellido_donante(){
    $this->apellido_donante = $apellido_donante;
  }

  public function getApellido_donante(){
    return $this->apellido_donante;
  }

  public function setTelefono_donante(){
    $this->telefono_donante = $telefono_donante;
  }

  public function getTelefono_donante(){
    return $this->telefono_donante;
  }

  public function setId_sangre(){
    $this->id_sangre = $id_sangre;
  }

  public function getId_sangre(){
    return $this->id_sangre;
  }

  public function setId_departamento(){
    $this->id_departamento = $id_departamento;
  }

  public function getId_departamento(){
    return $this->id_departamento;
  }

  public function setId_municipio(){
    $this->id_municipio = $id_municipio;
  }

  public function getId_municipio(){
    return $this->id_municipio;
  }

  public function setEstado_donante(){
    $this->estado_donante = $estado_donante;
  }

  public function getEstado_donante(){
    return $this->estado_donante;
  }

  public function setPrueba_donante(){
    $this->prueba_donante = $prueba_donante;
  }

  public function getPrueba_donante(){
    return $this->prueba_donante;
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
  public function create($data)
  {
    $sql = "INSERT INTO " . self::TABLE_NAME . " (nombre_donante,apellido_donante,estado_donante,id_departamento,id_municipio,id_sangre,prueba_donante,telefono_donante) VALUES ('" . $data['name'] . "','" . $data['lastName'] . "'," . $data['status'] . "," . $data['department'] . ","  . $data['state'] . "," . $data['blood_id'] . "," . $data['test'] . ",'" . $data['telephone'] . "')";
    // $query = $this->db->prepare("INSERT INTO " . self::TABLE_NAME . " ""
    echo $sql . "<br>";
    if (!$result = $this->db->query($sql)) {
      return "Falló la creación del registro: (" . $this->db->errno . ") " . $this->db->error;
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