<?php

class DepartamentosController
{
  public function __construct()
  {
    
  }

  public function list()
  {
    require_once "models/Departamento.php";
    $page = (!isset($_GET['page'])) ? 1 : $_GET['page'];
    $limit = (!isset($_GET['limit'])) ? 20 : $_GET['limit'];

    $filter = (!isset($_GET['filter'])) ? [] : $_GET['filter'];
    $sort = (!isset($_GET['sort'])) ? [] : $_GET['sort'];

    $departamentos= new Departamento();
    $list = $departamentos->list($page, $limit, $filter, $sort);
    
    var_dump($list);
  }

  public function create()
  {
    require_once "models/Departamento.php";
    if (!isset($_POST['name'])) {
      // $name = $_POST['name'] ;
      $name = "test" ;
      $departamento = new Departamento();
      $createResult = $departamento->create($name);
      var_dump($createResult);
    }
  }
}
