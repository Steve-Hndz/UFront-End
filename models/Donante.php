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

  public function setId_donante($id_donante){
    $this->id_donante = $id_donante;
  }

  public function getId_donante(){
    return $this->id_donante;
  }

  public function setNombre_donante($nombre_donante){
    $this->nombre_donante = $nombre_donante;
  }

  public function getNombre_donante(){
    return $this->nombre_donante;
  }

  public function setApellido_donante($apellido_donante){
    $this->apellido_donante = $apellido_donante;
  }

  public function getApellido_donante(){
    return $this->apellido_donante;
  }

  public function setTelefono_donante($telefono_donante){
    $this->telefono_donante = $telefono_donante;
  }

  public function getTelefono_donante(){
    return $this->telefono_donante;
  }

  public function setId_sangre($id_sangre){
    $this->id_sangre = $id_sangre;
  }

  public function getId_sangre(){
    return $this->id_sangre;
  }

  public function setId_departamento($id_departamento){
    $this->id_departamento = $id_departamento;
  }

  public function getId_departamento(){
    return $this->id_departamento;
  }

  public function setId_municipio($id_municipio){
    $this->id_municipio = $id_municipio;
  }

  public function getId_municipio(){
    return $this->id_municipio;
  }

  public function setEstado_donante($estado_donante){
    $this->estado_donante = $estado_donante;
  }

  public function getEstado_donante(){
    return $this->estado_donante;
  }

  public function setPrueba_donante($prueba_donante){
    $this->prueba_donante = $prueba_donante;
  }

  public function getPrueba_donante(){
    return $this->prueba_donante;
  }

  public function __construct()
  {
    parent::__construct();
  }

  public function list($page = 1, $limit = 20, $filter = [], $sort = [])
  {
    
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM " . self::TABLE_NAME ;
    $sql .= $this->createSqlFilter($filter);
    $sql .= $this->crateSqlSort($sort);
    $sql .= " limit " . $limit . " offset " . $offset;
    echo $sql . "<br>";
    // $query = $this->db->prepare("SELECT * FROM " . self::TABLE_NAME . " offset " . $offset . " limit " . $limit); --- PREPARED
    
    if ($result = $this->db->query($sql, MYSQLI_USE_RESULT)) {
      $data = array();
      while ($obj = $result->fetch_object()) {
        array_push($data, $obj);
      }
      return $data;
    }
  }

  private function createSqlFilter($filter) {
    $sql = "";
    $filters = ['name']; // set available filters here
    if (count($filter)) {
      $i = 0;
      foreach ($filter as $key => $value) {
        $searchInFilters = array_search($key, $filters);
        if ($searchInFilters === false) $searchInFilters = -1;
        echo "<br>";
        if ($searchInFilters >= 0  ) {
          $sql .= ($i == 0 ) ? " WHERE " : " AND ";
          switch ($key) {
            case 'name':
              $sql .= "nombre_donante LIKE '%" . $value ."%'"; 
              break;
            
            default:
              # code...
              break;
          }
        }
        $i++;
      }
    }
    return $sql;
  }

  private function crateSqlSort($rules) {
    $sql = "";
    $fields = ['id']; // set available filters here
    if (count($rules)) {
      $i = 0;
      foreach ($rules as $key => $value) {
        $searchInFilters = array_search($key, $fields);
        if ($searchInFilters === false) $searchInFilters = -1;
        echo "<br>";
        if ($searchInFilters >= 0  ) {
          $value = strtoupper($value);
          if ($value == 'ASC' || $value == 'DESC') $sql .= ($i == 0) ? " ORDER BY " : " , ";
          switch ($key) {
            case 'id':
              if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " id_donante " . $value ." "; 
              break;
            
            default:
              # code...
              break;
          }
        }
        $i++;
      }
    }
    return $sql;
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
  public function create()
  {
    try {
      $sql = "INSERT INTO " . self::TABLE_NAME . " 
      (nombre_donante,apellido_donante,estado_donante,id_departamento,id_municipio,id_sangre,prueba_donante,telefono_donante) 
      VALUES (?,?,?,?,?,?,?,?)";
      $query = $this->db->prepare($sql);
      $query->bind_param("sssdddss", $this->nombre_donante, $this->apellido_donante, $this->telefono_donante, $this->id_sangre, $this->id_departamento, $this->id_municipio, $this->estado_donante, $this->prueba_donante);
      $query->execute();
    } catch (\Throwable $th) {
    }
  }
  public function update()
  {
  }
  public function delete()
  {
  }
}