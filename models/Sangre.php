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

    public function list($page = 1, $limit = 20, $filter = [], $sort = [])
  {
    
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM " . self::TABLE_NAME . " s"; // la letra d es solo una abreviasion del nombre de la tabla asi como en los demas abreviaciones de tabla
    $sql .= $this->createSqlFilter($filter);
    $sql .= $this->crateSqlSort($sort);
    $sql .= " limit " . $limit . " offset " . $offset;
    echo $sql . "<br>"; // pueden comentar usar esta linea solo en desarrollo para verificar el sql generado, para ver si esta bien
    
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
    $filters = ['id', 'name']; // set available filters here
    if (count($filter)) {
      $i = 0;
      foreach ($filter as $key => $value) {
        $searchInFilters = array_search($key, $filters);
        if ($searchInFilters === false) $searchInFilters = -1;
        echo "<br>";
        if ($searchInFilters >= 0  ) {
          $sql .= ($i == 0 ) ? " WHERE " : " AND ";
          switch ($key) {
            case 'id':
                $sql .= "s.id_sangre LIKE '%" . $value ."%'"; 
                break;
            case 'name':
              $sql .= "s.nombre_sangre LIKE '%" . $value ."%'"; 
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
    $fields = ['id', 'name']; // set available filters here
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
              if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " s.id_sangre " . $value ." "; 
              break;
            case 'name':
              if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " s.nombre_sangre " . $value ." "; 
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
}