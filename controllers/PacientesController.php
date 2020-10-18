<?php

class PacientesController
{
  /*  public function __construct($database)
  {
  } */

  public function register()
  {

    require_once "views/registerUser.php";
  }

  public function save()
  {
    require_once "models/Donante.php";
    require_once "models/Paciente.php";
    echo "<main>";
    if (isset($_POST)) {
      //EJEMPLO DE ENCRIPACION DE DONANTE
      $objeto = new Paciente();
      $objeto->setContraseñaPaciente($_POST['contrasenia']);
      echo '<h3>Contraseña Encriptada Paciente: ' . $objeto->getContraseñaPaciente() . '</h3>';

      //EJEMPLO DE ENCRIPACION DE DONANTE
      /* $objeto = new Donante();
      $objeto->setContraseñaDonante($_POST['contrasenia']);
      echo '<h3>Contraseña Encriptada Donante: ' . $objeto->getContraseñaDonante() . '</h3>'; */
    }
    echo "</main>";
  }
}
