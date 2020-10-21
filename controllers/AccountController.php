<?php

//Login, registroDonante, registroPaciente
class AccountController {

    public function __construct(){
    
    }

    public function Login(){

        //write code here
    }

    public function register(){
        if (isset($_GET['type'])) {
            $registerType = $_GET['type'] || 'donante';
            if ($registerType == 'paciente') {
                header("Location: " . BASE_DIR . "Account/RegistroDonante");
            } else {
                header("Location: " . BASE_DIR . "Account/RegistroPaciente");
            }
        }
    }

    public function registroDonante(){

        require_once "views/registerDonante.php";
    }

    public function registroPaciente(){

        require_once "views/registerPaciente.php";
    }
}