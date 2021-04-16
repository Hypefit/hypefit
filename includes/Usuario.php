<?php

class Usuario
{
    private string $email = "";
    private string $hashPassword = "";
    private string $rol = "";
    private string $nombre = "";
    private int $aprobado = 0;
    private int $id = 0;

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getHashPassword(): string {
        return $this->hashPassword;
    }

    public function setHashPassword(string $hashPassword): void {
        $this->hashPassword = $hashPassword;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getAprobado(): int {
        return $this->aprobado;
    }

    public function setAprobado(int $aprobado): void {
        $this->aprobado = $aprobado;
    }

    public function getRol(): string {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }
}

