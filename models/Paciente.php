<?php

require_once "database/MySqlConnection.php";

class Paciente extends MySqlConnection implements IMysqlActions{

    const TABLE_NAME = 'tbl_pacientes';

    private $id_paciente;
    private $nombre_paciente;
    private $apellido_paciente;
    private $contraseña_paciente;
    private $telefono_paciente;
    private $correo_paciente;
    private $id_sangre;
    private $id_departamento;
    private $id_municipio;
    private $estado_paciente;
    private $id_hospital;

    public function setId_paciente( $id_paciente){
        $this->id_paciente = $id_paciente;
    }

    public function getId_paciente(){
        return $this->id_paciente;
    }

    public function setContraseñaPaciente($contraseña_paciente){
        $this->contraseña_paciente = password_hash($contraseña_paciente, PASSWORD_DEFAULT);        
    }
    
    public function getContraseñaPaciente(){
        return $this->contraseña_paciente;
    }

    public function setNombre_paciente($nombre_paciente){
        $this->nombre_paciente = $nombre_paciente;
    }

    public function getNombre_paciente(){
        return $this->nombre_paciente;
    }

    public function setApellido_paciente($apellido_paciente){
        $this->apellido_paciente = $apellido_paciente;
    }

    public function getApellido_paciente(){
        return $this->apellido_paciente;
    }

    public function setTelefono_paciente($telefono_paciente){
        $this->telefono_paciente = $telefono_paciente;
    }

    public function getTelefono_paciente(){
        return $this->telefono_paciente;
    }

    public function setCorreo_paciente($correo_paciente){
        $this->correo_paciente = $correo_paciente;
    }

    public function getCorreo_paciente(){
        return $this->correo_paciente;
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

    public function setEstado_paciente($estado_paciente){
        $this->estado_paciente = $estado_paciente;
    }

    public function getEstado_paciente(){
        return $this->estado_paciente;
    }

    public function setId_hospital($id_hospital){
        $this->id_hospital = $id_hospital;
    }

    public function getId_hospital(){
        return $this->id_hospital;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function list($page = 1, $limit = 20, $filter = [], $sort = [])
  {
    
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM " . self::TABLE_NAME . " p";
    $sql .= " INNER JOIN tbl_municipio m on m.id_municipio = p.id_municipio ";
    $sql .= " INNER JOIN tbl_departamento dp ON dp.id_departamento = p.id_departamento ";
    $sql .= " INNER JOIN tbl_sangre s ON s.id_sangre = p.id_sangre ";
    $sql .= " INNER JOIN tbl_hospitales h ON h.id_hospital = p.id_hospital ";
    $sql .= $this->createSqlFilter($filter);
    $sql .= $this->crateSqlSort($sort);
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

  private function createSqlFilter($filter) {
    $sql = "";
    $filters = ['name', 'departamento', 'municipio', 'sangre','hospital']; // set available filters here
    if (count($filter)) {
      $i = 0;
      foreach ($filter as $key => $value) {
        $searchInFilters = array_search($key, $filters);
        if ($searchInFilters === false) $searchInFilters = -1;
        if ($searchInFilters >= 0  ) {
          $sql .= ($i == 0 ) ? " WHERE " : " AND ";
          switch ($key) {
            case 'name':
              $sql .= "d.nombre_donante LIKE '%" . $value ."%'"; 
              break;
            case 'municipio':
              $sql .= "m.id_municipio = " . $value ." "; 
              break;
            case 'departamento':
              $sql .= "dp.id_departamento = " . $value ." "; 
              break;
            case 'sangre':
              $sql .= "s.id_sangre = " . $value ." "; 
              break;
            case 'hospital':
                $sql .= "h.id_hospital = " . $value ." "; 
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
    $fields = ['id', 'municipio', 'departamento']; // set available filters here
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
              if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " d.id_donante " . $value ." "; 
              break;
            case 'municipio':
              if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " d.nombre_municipio " . $value ." "; 
              break;
            case 'departamento':
              if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " d.nombre_departamento " . $value ." "; 
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

    public function get()
  {
    $sql = "SELECT p.id_paciente, p.nombre_paciente, p.apellido_paciente,p.telefono_paciente,p.correo_paciente,p.id_sangre, p.id_departamento, p.id_municipio,p.estado_paciente, h.nombre_hospital, p.contrasenia FROM " . self::TABLE_NAME . " p INNER join tbl_hospitales h ON p.id_hospital=h.id_hospital WHERE id_paciente = " . $this->id_paciente;
    
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
    $sql = "INSERT INTO " . self::TABLE_NAME . " (`nombre_paciente`, `apellido_paciente`, `telefono_paciente`, `correo_paciente`, `id_sangre`, `id_departamento`, `id_municipio`, `estado_paciente`, `id_hospital`, `contrasenia`) VALUES 
    ('" . $this->getNombre_paciente() . "','" . $this->getApellido_paciente() . "','" .$this->getTelefono_paciente()."','".$this->getCorreo_paciente()."',". $this->getId_sangre().",". $this->getId_departamento() . ","  . $this->getId_municipio() . "," . $this->getEstado_paciente() . "," . $this->getId_hospital() . ",'" . $this->getContraseñaPaciente. "')";

    if (!$result = $this->db->query($sql)) {
      return "Falló la creación del registro: (" . $this->db->errno . ") " . $this->db->error;
    }
    return $result;
  }

  public function update()
  {
    $sql = "UPDATE " . self::TABLE_NAME . " SET estado_paciente = " . $this->getEstado_paciente() . " WHERE id_paciente = " . $this->getId_paciente();

    if (!$result = $this->db->query($sql)) {
      return "Falló la actualizacion del registro: (" . $this->db->errno . ") " . $this->db->error;
    }
    return $result;
  }

  public function delete()
  {
    $sql = "DELETE FROM " . self::TABLE_NAME . " where id_paciente = " . $this->getId_paciente();

    if (!$result = $this->db->query($sql)) {
      return "Falló la eliminacion del registro: (" . $this->db->errno . ") " . $this->db->error;
    }
    return $result;
  }

  public function verifyPassword ($password, $hash) {
    $isValidPassword = false;
    if (password_verify($password, $hash)) {
        $isValidPassword = true;
    }
    return $isValidPassword;
}
}