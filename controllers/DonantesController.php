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
    
    // echo $limit . "<br>";
    $donantes = new Donante();
    $list = $donantes->list($page, $limit, $filter, $sort);
    // var_dump($list);
    
    require_once 'views/donantes.php';
  }

  public function showList(){
    require_once 'views/donantes.php';
  }

  public function create()
  {
    require_once "models/Donante.php";

    /* Borrar este bloque es solo para testing */
      $_POST['nombre_donante'] = "Erick Josue";
      $_POST['apellido_donante'] = "Saravia";
      $_POST['telefono_donante'] = "71021375";
      $_POST['id_sangre'] = "1";
      $_POST['id_departamento'] = "1";
      $_POST['id_municipio'] = "1";
      $_POST['prueba_donante'] = "Yes";
    /* Dejar de borrar */
    if (isset($_POST['nombre_donante']) && isset($_POST['apellido_donante']) && isset($_POST['telefono_donante']) && 
    isset($_POST['id_sangre']) && isset($_POST['id_departamento']) && isset($_POST['id_municipio']) && isset($_POST['prueba_donante'])) { // remove !
      $donante = new Donante();
      $donante->setNombre_donante($_POST['nombre_donante']);
      $donante->setApellido_donante($_POST['apellido_donante']);
      $donante->setTelefono_donante($_POST['telefono_donante']);
      $donante->setId_sangre($_POST['id_sangre']);
      $donante->setId_departamento($_POST['id_departamento']);
      $donante->setId_municipio($_POST['id_municipio']);
      $donante->setPrueba_donante($_POST['prueba_donante']);
      
      $createResult = $donante->create();
      var_dump($createResult); // delete these line
      // add here a view
    }
  }
}
