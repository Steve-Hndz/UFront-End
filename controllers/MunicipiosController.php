<?php

class MunicipiosController
{
  public function __construct()
  {
    
  }

  public function list()
  {
    require_once "models/Municipio.php";
    $page = (!isset($_GET['page'])) ? 1 : $_GET['page'];
    $limit = (!isset($_GET['limit'])) ? 20 : $_GET['limit'];
    
    $filter = (!isset($_GET['filter'])) ? [] : $_GET['filter'];
    $sort = (!isset($_GET['sort'])) ? [] : $_GET['sort'];

    $municipio = new Municipio();
    $list = $municipio->list($page, $limit, $filter, $sort);

    $html = '<option disabled selected>Municipio</option>';
    foreach ($list as $municipios) { 
      $html .= '<option value="' . $municipios->id_municipio . '"> ' . $municipios->nombre_municipio . '</option>';
    }
    return $html;
  }

  public function create()
  {
    require_once "models/Municipio.php";
    //if (!isset($_POST['name'])) {
      // $name = $_POST['name'] ;
      // $id_departamento = $_POST['id_departamento'];

      //Para prueba
      $name = "nombre" ;
      $id_departamento = 1;
      /**********************/

      $municipio = new Municipio();
      $createResult = $municipio->create($name, $id_departamento);
      var_dump($createResult);
    //}
  }
}

$municipios = new MunicipiosController();
if (isset($_POST['consulta'])){
  echo $municipios->list();
}