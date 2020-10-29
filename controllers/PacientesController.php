<?php


class PacientesController
{
  public function __construct()
  {
  }

  public function list()
  {
    require_once "models/Paciente.php";
    require_once "models/Departamento.php";
    require_once "models/Municipio.php";

    $page = (!isset($_GET['page'])) ? 1 : $_GET['page'];
    $limit = (!isset($_GET['limit'])) ? 20 : $_GET['limit'];

    $filter = (!isset($_GET['filter'])) ? [] : $_GET['filter'];
    $sort = (!isset($_GET['sort'])) ? [] : $_GET['sort'];

    $municipiosList = array();
    $departamentosList = array();
    // echo $limit . "<br>";
    // $departamentos
    // $municipios
    $departamentoModel = new Departamento();
    $municipiosModel = new Municipio();
    $departamentosList = $departamentoModel->list(1, 14);
    
    if (isset($filter['departamento'])) {
      $municipiosFilter = ['departamento' => $filter['departamento']];
      $municipiosList = $municipiosModel->list(1, 10000, $municipiosFilter);
    }
    $donantes = new Paciente();
    $list = $donantes->list($page, $limit, $filter, $sort);
    // var_dump($list);
    
    require_once 'views/pacientes.php';
  }

  public function get()
  {
    
  }

  public function create()
  {
    
  }

  public function delete()
  {
    
  }

  public function update()
  {
    
  }
}