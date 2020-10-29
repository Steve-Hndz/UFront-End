<?php

require_once "database/MySqlConnection.php";

class Hospital extends MySqlConnection{

    const TABLE_NAME = 'tbl_hospitales';

    private $id_hospital;
    private $nombre_hospital;
    private $telefono_hospital;
    private $direccion_hospital;
    private $encargado_hospital;
    private $telefonoEncargado_hospital;
    private $correoEncargado_hospital;
    private $correoContacto_hospital;

    public function setId_hospital($id_hospital){
        $this->id_hospital = $id_hospital;
    }

    public function getId_hospital(){
        return $this->id_hospital;
    }

    public function setNombre_hospital($nombre_hospital){
        $this->nombre_hospital = $nombre_hospital;
    }

    public function getNombre_hospital(){
        return $this->nombre_hospital;
    }

    public function setTelefono_hospital($telefono_hospital){
        $this->telefono_hospital = $telefono_hospital;
    }

    public function getTelefono_hospital(){
        return $this->telefono_hospital;
    }

    public function setDireccion_hospital($direccion_hospital){
        $this->direccion_hospital = $direccion_hospital;
    }

    public function getDireccion_hospital(){
        return $this->direccion_hospital;
    }

    public function setEncargado_hospital($encargado_hospital){
        $this->encargado_hospital = $encargado_hospital;
    }

    public function getEncargado_hospital(){
        return $this->encargado_hospital;
    }

    public function setTelefonoEncargado_hospital($telefonoEncargado_hospital){
        $this->telefonoEncargado_hospital = $telefonoEncargado_hospital;
    }

    public function getTelefonoEncargado_hospital(){
        return $this->telefonoEncargado_hospital;
    }

    public function setCorreoEncargado_hospital($correoEncargado_hospital){
        $this->correoEncargado_hospital = $correoEncargado_hospital;
    }

    public function getCorreoEncargado_hospital(){
        return $this->correoEncargado_hospital;
    }

    public function setCorreoContacto_hospital($correoContacto_hospital){
        $this->correoContacto_hospital = $correoContacto_hospital;
    }

    public function getCorreoContacto_hospital(){
        return $this->correoContacto_hospital;
    }
    
    public function __construct()
    {
        parent::__construct();
    }

    public function list($page = 1, $limit = 20, $filter = [], $sort = [])
  {
    
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM " . self::TABLE_NAME . " h"; // la letra h es solo una abreviasion del nombre de la tabla asi como en los demas abreviaciones de tabla

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

        if ($searchInFilters >= 0  ) {
          $sql .= ($i == 0 ) ? " WHERE " : " AND ";
          switch ($key) {
            case 'name':
              $sql .= "h.nombre_hospital LIKE '%" . $value ."%'"; 
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
    $fields = ['id', 'name', 'direccion']; // set available filters here
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
              if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " h.id_hospital " . $value ." "; 
              break;
            case 'name':
              if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " h.nombre_hospital " . $value ." "; 
              break;
            case 'direccion':
              if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " h.direccion_hospital " . $value ." "; 
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