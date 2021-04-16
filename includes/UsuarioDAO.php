<?php

require_once __DIR__ . '/Usuario.php';
require_once __DIR__ . '/DAO.php';

class UsuarioDAO extends DAO
{
    public function __construct() {
        parent::__construct();
    }

    public function crearUsuario(Usuario $u) {
        $query = sprintf("INSERT into Usuarios (nombre, email, hashPassword, rol, aprobado) values
                ('%s','%s', '%s', '%s', '%s')", $u->getNombre() , $u->getEmail() ,$u->getHashPassword(), $u->getRol(),$u->getAprobado());
        return $this->insert($query);
    }

    public function getUsuario($id) {
        $query = "SELECT * from Usuarios where id = '$id'";
        $fila = $this->select($query);

        return $this->crearObjetoUsuario($fila[0]);
    }

    public function getUsuarioPorEmail($email) {
        $query = "SELECT * from Usuarios where email = '$email'";
        $fila = $this->select($query);

        if (empty($fila)) { //No existe un usuario con ese email
            return NULL;
        } else {
            return $this->crearObjetoUsuario($fila[0]);
        }
    }

    public function getUsuariosSinAprobar() {
        $query = "SELECT * from Usuarios where aprobado = 0";
        $filas = $this->select($query);

        $array_rutinas = array();
        foreach ($filas as $fila) {
            array_push($array_rutinas, $this->crearObjetoUsuario($fila));
        }

        return $array_rutinas;
    }

    public function aprobarUsuario($id): int {
        $idLimpio = $this->limpiarString($id);
        $query = "UPDATE usuarios SET aprobado=1 where id=$idLimpio";
        return $this->modify($query);
    }

    public function eliminarUsuario($id) {
        $idLimpio = $this->limpiarString($id);
        $query = "DELETE FROM usuarios where id=$idLimpio";
        return $this->modify($query);
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