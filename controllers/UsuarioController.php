<?php

class UsuarioController
{
    public function index()
    {
        echo "Controlador de Usuario, accion index";
    }

    public function register()
    {
        require_once "views/registerUser.php";
    }

    public function save()
    {
        echo "<main>";
            if(isset($_POST))
            {
                var_dump($_POST);
            }
        echo "</main>";
    }
}