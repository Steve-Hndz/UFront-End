<?php

require_once "database/MySqlConnection.php";

class Hospital extends MySqlConnection{

    const TABLE_NAME = 'tbl_hospitales';

    private $id_hospital;
    private $nombre_hospital;
    private $telefono_hospital;
    private $direccion_hospital;
    private $encargado_hospital;
    private $telefonoEncargado_hospital;
    private $correoEncargado_hospital;
    private $correoContacto_hospital;

    public function setId_hospital(){
        $this->id_hospital = $id_hospital;
    }

    public function getId_hospital(){
        return $this->id_hospital;
    }

    public function setNombre_hospital(){
        $this->nombre_hospital = $nombre_hospital;
    }

    public function getNombre_hospital(){
        return $this->nombre_hospital;
    }

    public function setTelefono_hospital(){
        $this->telefono_hospital = $telefono_hospital;
    }

    public function getTelefono_hospital(){
        return $this->telefono_hospital;
    }

    public function setDireccion_hospital(){
        $this->direccion_hospital = $direccion_hospital;
    }

    public function getDireccion_hospital(){
        return $this->direccion_hospital;
    }

    public function setEncargado_hospital(){
        $this->encargado_hospital = $encargado_hospital;
    }

    public function getEncargado_hospital(){
        return $this->encargado_hospital;
    }

    public function setTelefonoEncargado_hospital(){
        $this->telefonoEncargado_hospital = $telefonoEncargado_hospital;
    }

    public function getTelefonoEncargado_hospital(){
        return $this->telefonoEncargado_hospital;
    }

    public function setCorreoEncargado_hospital(){
        $this->correoEncargado_hospital = $correoEncargado_hospital;
    }

    public function getCorreoEncargado_hospital(){
        return $this->correoEncargado_hospital;
    }

    public function setCorreoContacto_hospital(){
        $this->correoContacto_hospital = $correoContacto_hospital;
    }

    public function getCorreoContacto_hospital(){
        return $this->correoContacto_hospital;
    }
    
    public function __construct()
    {
    parent::__construct();
    }
}