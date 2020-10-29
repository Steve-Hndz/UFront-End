<?php

class LoginController
{
    public function showLogin()
    {
        require_once "models/Login.php";
        $login = new Login();
        $showLogin = $login->showLogin();
        require_once "views/login.php";
    }
}
