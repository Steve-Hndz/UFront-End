<?php

require_once "database/MySqlConnection.php";

class Donante extends MySqlConnection{

    const TABLE_NAME = 'tbl_pacientes';

    private $id_paciente;
    private $nombre_paciente;
    private $apellido_paciente;
    private $telefono_paciente;
    private $correo_paciente;
    private $id_sangre;
    private $id_departamento;
    private $id_municipio;
    private $estado_paciente;
    private $id_hospital;

    public function setId_paciente(){
        $this->id_paciente = $id_paciente;
    }

    public function getId_paciente(){
        return $this->id_paciente;
    }

    public function setNombre_paciente(){
        $this->nombre_paciente = $nombre_paciente;
    }

    public function getNombre_paciente(){
        return $this->nombre_paciente;
    }

    public function setApellido_paciente(){
        $this->apellido_paciente = $apellido_paciente;
    }

    public function getApellido_paciente(){
        return $this->apellido_paciente;
    }

    public function setTelefono_paciente(){
        $this->telefono_paciente = $telefono_paciente;
    }

    public function getTelefono_paciente(){
        return $this->telefono_paciente;
    }

    public function setCorreo_paciente(){
        $this->correo_paciente = $correo_paciente;
    }

    public function getCorreo_paciente(){
        return $this->correo_paciente;
    }

    public function setId_sangre(){
        $this->id_sangre = $id_sangre;
    }

    public function getId_sangre(){
        return $this->id_sangre;
    }

    public function setId_departamento(){
        $this->id_departamento = $id_departamento;
    }

    public function getId_departamento(){
        return $this->id_departamento;
    }

    public function setId_municipio(){
        $this->id_municipio = $id_municipio;
    }

    public function getId_municipio(){
        return $this->id_municipio;
    }

    public function setEstado_paciente(){
        $this->estado_paciente = $estado_paciente;
    }

    public function getEstado_paciente(){
        return $this->estado_paciente;
    }

    public function setId_hospital(){
        $this->id_hospital = $id_hospital;
    }

    public function getId_hospital(){
        return $this->id_hospital;
    }

    public function __construct()
    {
    parent::__construct();
    }
}