<?php

require_once "database/MySqlConnection.php";

class Donante extends MySqlConnection{

  const TABLE_NAME = 'tbl_donantes';

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
    /* echo $sql; */
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