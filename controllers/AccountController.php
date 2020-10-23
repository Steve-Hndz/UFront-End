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
    $sangreModel = new Sangre();

    $departamentosList = $departamentoModel->list(1, 14);
    $municipiosList = $municipiosModel->list(1, 10000);
    $sangreList = $sangreModel->list(1, 20);

    if (count($_POST) > 0) {
      require_once "models/Donante.php";
      if (
        /*En el formulario de la vista regsterDonante se pinden "correo" e "informacion". Estos campos no estan
        declarados ni tienen sus respectivos metodos en el modelo de Donantes, tampoco en la base de datos. Dado eso
        no hago su validacion en esta parte
        */
        isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) &&
        isset($_POST['sangre']) && isset($_POST['departamento']) && isset($_POST['municipio']) &&
        isset($_POST['historial']) && isset($_POST['carnet'])
      ) { // remove !
        $donante = new Donante();
        $donante->setNombre_donante($_POST['nombre']);
        $donante->setApellido_donante($_POST['apellido']);
        $donante->setTelefono_donante($_POST['telefono']);
        $donante->setId_sangre($_POST['sangre']);
        $donante->setId_departamento($_POST['departamento']);
        $donante->setId_municipio($_POST['municipio']);
        $donante->setHistorial($_POST['historial']);
        $donante->setCarnet($_POST['carnet']);
        $donante->setPrueba_donante('Yes');//Este valor esta colocado de manera estatica ya que no estan en el formulario
        $donante->setEstado_donante('Active');//Este valor esta colocado de manera estatica ya que no estan en el formulario

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
        isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) &&
        isset($_POST['departamento']) && isset($_POST['municipio']) && isset($_POST['hospital']) &&
        isset($_POST['sangre']) && isset($_POST['descripcion'])
      ) { // remove !
        $paciente = new Paciente();
        $paciente->setNombre_paciente($_POST['nombre']);
        $paciente->setApellido_paciente($_POST['apellido']);
        $paciente->setTelefono_paciente($_POST['telefono']);
        $paciente->setCorreo_paciente('correo@gmail.com');//Este valor esta colocado de manera estatica ya que no estan en el formulario
        $paciente->setId_sangre($_POST['sangre']);
        $paciente->setId_departamento($_POST['departamento']);
        $paciente->setId_municipio($_POST['municipio']);
        $paciente->setEstado_paciente('Estado');//Este valor esta colocado de manera estatica ya que no estan en el formulario
        $paciente->setId_hospital($_POST['hospital']);
        $paciente->setContraseñaPaciente('password');//Este valor esta colocado de manera estatica ya que no estan en el formulario
        
        //$paciente->setDescripcion($_POST['descripcion']);//Lo dejo comentado porque no esta declarado en el modelo ni en base de datos

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
      $sangreList = $sangreModel->list(1, 20);
      $municipiosList = $municipiosModel->list(1, 10000);

      require_once "views/registerPaciente.php";
    }
  }
}
