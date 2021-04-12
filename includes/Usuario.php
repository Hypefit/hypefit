<?php

class Usuario
{
    private $username = "";
    private $pass = "";
    private $rol = "";
    private $id = "";

    public function __construct($username, $pass)
    {
        $this->username = $username;
        $this->pass = $pass;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function getId()
    {
        return $this->id;
    }
}

