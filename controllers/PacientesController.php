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
    echo "<main>";
    if (isset($_POST)) {
      $objeto = new Donante();
      $objeto->setContraseñaDonante($_POST['contrasenia']);
      echo $objeto->getContraseñaDonante();
    }
    echo "</main>";
  }
}
