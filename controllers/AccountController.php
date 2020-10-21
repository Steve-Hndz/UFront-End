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
            $registerType = $_GET['type'];
            if ($registerType === 'paciente') {
                header("Location: " . BASE_DIR . "Account/RegistroPaciente");
            } else {
                header("Location: " . BASE_DIR . "Account/RegistroDonante");
            }
        }
    }

    public function registroDonante(){
        if (count($_POST) > 0) {
            var_dump($_POST);
        } else {
            require_once "models/Departamento.php";
            require_once "models/Municipio.php";
            require_once "models/Sangre.php";

            $municipiosList = array();
            $departamentosList = array();
            $departamentoModel = new Departamento();
            $municipiosModel = new Municipio();
            $departamentosList = $departamentoModel->list(1, 14);

            
            $municipiosList = $municipiosModel->list(1, 10000);
            require_once "views/registerDonante.php";
        }
    }

    public function registroPaciente(){
        if (count($_POST) > 0) {
            var_dump($_POST);
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