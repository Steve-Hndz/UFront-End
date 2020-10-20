<?php

class SignupController
{
    public function showSignup()
    {
        require_once "models/Signup.php";
        $signup = new Signup();
        $showSignup = $signup->showSignup();
        require_once "views/signup.php";
    }
}
