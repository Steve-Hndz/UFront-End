<?php

class DonantesController
{
  public function __construct()
  {
    
  }

  public function list()
  {
    require_once "models/Donante.php";
    $page = (!isset($_GET['page'])) ? 1 : $_GET['page'];
    $limit = (!isset($_GET['limit'])) ? 20 : $_GET['limit'];
    $filter = (!isset($_GET['filter'])) ? [] : $_GET['filter'];
    $sort = (!isset($_GET['sort'])) ? [] : $_GET['sort'];
    
    echo $limit . "<br>";
    $donantes = new Donante();
    $list = $donantes->list($page, $limit, $filter, $sort);
    var_dump($list);
  }

  public function create()
  {
    require_once "models/Donante.php";
    if (!isset($_POST['name'])) { // remove !
      $donante = new Donante();
      $donante->setNombre_donante($_POST['nombre_donante']);
      $donante->setApellido_donante($_POST['apellido_donante']);
      $donante->setTelefono_donante($_POST['telefono_donante']);
      $donante->setId_sangre($_POST['id_sangre']);
      $donante->setId_departamento($_POST['id_departamento']);
      $donante->setId_municipio($_POST['id_municipio']);
      $donante->setPrueba_donante($_POST['prueba_donante']);
      /*  UNCOMENT THIS BLOCK
      $data = [
        'name' => $_POST['nombre_donante'],
        'lastName' => $_POST['apellido_donante'],
        'status' => $_POST['estado_donante'],
        'department' => $_POST['id_departamento'],
        'state' => $_POST['id_municipio'],
        'blood_id' => $_POST['id_sangre'],
        'test' => $_POST['prueba_donante'],
        'telephone' => $_POST['telefono_donante']
      ];
      */
      $data = [
        'name' => "test",
        'lastName' => "last name",
        'status' => "1",
        'department' => "1",
        'state' => "1",
        'blood_id' => "1",
        'test' => "1",
        'telephone' => "71253614"
      ];
      
      $donante = new Donante();
      $createResult = $donante->create($data);
      var_dump($createResult);
    }
  }
}
