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
    echo $limit . "<br>";
    $departamento = new Departamento();
    $list = $departamento->list($page, $limit);
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
