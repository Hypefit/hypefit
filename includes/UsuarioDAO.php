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
        $fila = $this->select($query);

        return $this->crearObjetoUsuario($fila);
    }

    public function getUsuarioPorEmail($email) {
        $query = "SELECT * from Usuarios where email = '$email'";
        $fila = $this->select($query);

        if (empty($fila)) { //No existe un usuario con ese email
            return NULL;
        } else {
            return $this->crearObjetoUsuario($fila);
        }
    }

    private function crearObjetoUsuario($fila) {
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