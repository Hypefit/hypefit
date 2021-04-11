<?php

class UsuarioDAO extends DAO
{
    public function crearUsuario(Usuario $u) {
        $query = "INSERT into Usuarios (nombre, email, hashPassword, rol, aprobado) values
                (" . $u->getNombre() . "," . $u->getEmail() . "," . $u->getHashPassword() . "," . $u->getRol() . "," . $u->getAprobado() . ")";
        return $this->insert($query);
    }

    public function getUsuario($id) {
        $query = "SELECT * from Usuarios where id = '$id'";
        $fila = $this->insert($query);

        $usuario = new Usuario();
        $usuario->setId($fila['id']);
        $usuario->setNombre($fila['nombre']);
        $usuario->setEmail($fila['email']);
        $usuario->setHashPassword($fila['hashPassword']);
        $usuario->setRol($fila['rol']);
        $usuario->setAprobado($fila['aprobado']);

        return $usuario;
    }

    public function getUsuarioPorEmail($email) {
        $query = "SELECT * from Usuarios where email = '$email'";
        $fila = $this->insert($query);

        if (empty($fila)) { //No existe un usuario con ese email
            return NULL;
        } else {
            $usuario = new Usuario();
            $usuario->setId($fila['id']);
            $usuario->setNombre($fila['nombre']);
            $usuario->setEmail($fila['email']);
            $usuario->setHashPassword($fila['hashPassword']);
            $usuario->setRol($fila['rol']);
            $usuario->setAprobado($fila['aprobado']);

            return $usuario;
        }
    }

    /* De momento no queremos modificar usuarios
    public function modificarUsuario(Usuario $u) {
        $query = "UPDATE Usuarios (nombre, email, hashPassword, rol, aprobado) values
                (''" . $u->getNombre() . "'','" . $u->getEmail() . "',''" . $u->getHashPassword() . "'',''" . $u->getRol() . "'',''" . $u->getAprobado() . "'') where id = '". $u->getId() ."' ";
        return $this->modify($query);
    } */


}