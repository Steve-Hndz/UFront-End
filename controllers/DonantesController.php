<?php

class DonantesController
{
  public function __construct()
  {
    
  }

  public function list()
  {
    require_once "models/Donante.php";
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
    /* $departamentoModel = new Departamento();
    $municipiosModel = new Municipio();
    $departamentosList = $departamentoModel->list(1, 14);
    
     if (isset($filter['departamento'])) {
      $municipiosFilter = ['departamento' => $filter['departamento']];
      $municipiosList = $municipiosModel->list(1, 10000, $municipiosFilter);
    } */
    $donantes = new Donante();
    $list = $donantes->list($page, $limit, $filter, $sort);
    // var_dump($list);
    
    require_once 'views/donantes.php';
  }

  public function showList(){
    require_once 'views/donantes.php';
  }

  public function get() {
    require_once "models/Donante.php";
    $_POST['id_donante'] = "1";
    if (isset($_POST['id_donante'])) {
      $donante = new Donante();
      $donante->setId_donante($_POST['id_donante']);
      $createResult = $donante->get();
      var_dump($createResult); // delete these line
    }
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
      $_POST['carnet'] = "No";
      $_POST['historial'] = "";
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

  public function update()
  {
    require_once "models/Donante.php";

    /* Borrar este bloque es solo para testing */
      $_POST['id_donante'] = "1";
      $_POST['estado_donante'] = "Approved";
    /* Dejar de borrar */
    if (isset($_POST['id_donante']) && isset($_POST['estado_donante'])) { // remove!
      $donante = new Donante();
      $donante->setId_donante($_POST['id_donante']);
      $donante->setEstado_donante($_POST['estado_donante']);
      
      $createResult = $donante->update();
      var_dump($createResult); // delete these line
      // add here a view
    }
  }

  public function delete()
  {
    require_once "models/Donante.php";

    /* Borrar este bloque es solo para testing */
      $_POST['id_donante'] = "3";
    /* Dejar de borrar */
    if (isset($_POST['id_donante'])) { // remove!
      $donante = new Donante();
      $donante->setId_donante($_POST['id_donante']);
      
      
      $createResult = $donante->delete();
      var_dump($createResult); // delete these line
      // add here a view
    }
  }
}
