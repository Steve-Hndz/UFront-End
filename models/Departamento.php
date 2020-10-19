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

  public function list($page = 1, $limit = 20, $filter = [], $sort = [])
  {
    
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM " . self::TABLE_NAME . " dp";
    $sql .= $this->createSqlFilter($filter);
    $sql .= $this->crateSqlSort($sort);
    $sql .= " limit " . $limit . " offset " . $offset;
    
    $data = array();
    if ($result = $this->db->query($sql, MYSQLI_USE_RESULT)) {
      while ($obj = $result->fetch_object()) {
        array_push($data, $obj);
      }
    }
   return $data;
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
              $sql .= "dp.nombre_departamento LIKE '%" . $value ."%'"; 
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
    $fields = ['id', 'departamento']; // set available filters here
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
              if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " dp.id_departamento" . $value ." "; 
              break;
            case 'departamento':
              if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " dp.nombre_departamento " . $value ." "; 
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
