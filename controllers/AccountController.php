<?php

//Login, registroDonante, registroPaciente
class AccountController
{

  public function __construct()
  {
  }

  public function Login()
  {

    //write code here
  }

  public function register()
  {
    if (isset($_GET['type'])) {
      $registerType = $_GET['type'];
      if ($registerType === 'paciente') {
        header("Location: " . BASE_DIR . "Account/RegistroPaciente");
      } else {
        header("Location: " . BASE_DIR . "Account/RegistroDonante");
      }
    }
  }

  public function registroDonante()
  {
    require_once "models/Departamento.php";
    require_once "models/Municipio.php";
    require_once "models/Sangre.php";
    $municipiosList = array();
    $departamentosList = array();
    $departamentoModel = new Departamento();
    $municipiosModel = new Municipio();
    $departamentosList = $departamentoModel->list(1, 14);

    $municipiosList = $municipiosModel->list(1, 10000);
    if (count($_POST) > 0) {
      require_once "models/Donante.php";
      if (
        isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono_donante']) &&
        isset($_POST['id_sangre']) && isset($_POST['id_departamento']) && isset($_POST['id_municipio']) && isset($_POST['prueba_donante'])
      ) { // remove !
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
    } else {

      require_once "views/registerDonante.php";
    }
  }

  public function registroPaciente()
  {
    if (count($_POST) > 0) {
      require_once "models/Paciente.php";
      if (
        isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono_donante']) &&
        isset($_POST['id_sangre']) && isset($_POST['id_departamento']) && isset($_POST['id_municipio']) && isset($_POST['prueba_donante'])
      ) { // remove !
        $paciente = new Paciente();
        $createResult = $paciente->create();
        var_dump($createResult); // delete these line
        // add here a view
      }
    } else {
      require_once "models/Departamento.php";
      require_once "models/Municipio.php";
      require_once "models/Sangre.php";

      $municipiosList = array();
      $departamentosList = array();
      $departamentoModel = new Departamento();
      $municipiosModel = new Municipio();
      $sangreModel = new Sangre();
      $departamentosList = $departamentoModel->list(1, 14);
      // $sangreList = $sangreModel->list(1, 20);

      $municipiosList = $municipiosModel->list(1, 10000);

      require_once "views/registerPaciente.php";
    }
  }
}
