<?php

namespace hypefit\DAO;

use hypefit\TO\Usuario;

class UsuarioDAO extends DAO
{

    public function crearUsuario(Usuario $u) {
        $nombre = $this->limpiarString($u->getNombre());
        $email = $this->limpiarString($u->getEmail());
        $hash = $this->limpiarString($u->getHashPassword());
        $rol = $this->limpiarString($u->getRol());
        $aprobado = $this->limpiarString($u->getAprobado());

        $query = sprintf("INSERT into usuarios (nombre, email, hashPassword, rol, aprobado) values
                ('%s','%s', '%s', '%s', '%s')", $nombre , $email ,$hash, $rol,$aprobado);
        return $this->insert($query);
    }

    public function getUsuario($id): Usuario {
        $idLimpio = $this->limpiarString($id);
        $query = "SELECT * from usuarios where id = '$idLimpio'";
        $fila = $this->select($query);

        return $this->crearObjetoUsuario($fila[0]);
    }

    public function getUsuarioPorEmail($email): ?Usuario {
        $emailLimpio = $this->limpiarString($email);
        $query = "SELECT * from usuarios where email = '$emailLimpio'";
        $fila = $this->select($query);

        if (empty($fila)) { //No existe un usuario con ese email
            return NULL;
        } else {
            return $this->crearObjetoUsuario($fila[0]);
        }
    }

    public function existeEmail($email): bool {
        $emailLimpio = $this->limpiarString($email);
        $query = "SELECT * from usuarios where email = '$emailLimpio'";
        $fila = $this->select($query);

        if (empty($fila)) { //No existe email en BD
            return false;
        } else {
            return true;
        }
    }
    public function existeNombreUsuario($user): bool {
        $userLimpio = $this->limpiarString($user);
        $query = "SELECT * from usuarios where nombre = '$userLimpio'";
        $fila = $this->select($query);

        if (empty($fila)) { //No existe el nombre usuario en BD
            return false;
        } else {
            return true;
        }
    }

    public function getUsuariosSinAprobar(): array {
        $query = "SELECT * from usuarios where aprobado = 0";
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

    public function eliminarUsuario($id): int {
        $idLimpio = $this->limpiarString($id);
        $query = "DELETE FROM usuarios where id=$idLimpio";
        return $this->modify($query);
    }

    private function crearObjetoUsuario($fila): Usuario {
        $usuario = new Usuario();
        $usuario->setId($fila['id']);
        $usuario->setNombre($fila['nombre']);
        $usuario->setEmail($fila['email']);
        $usuario->setHashPassword($fila['hashPassword']);
        $usuario->setRol($fila['rol']);
        $usuario->setAprobado($fila['aprobado']);

        return $usuario;
    }

    public function getUsuariosPorRolAprobados(string $rol) {
        $rolLimpio = $this->limpiarString($rol);
        $query = "SELECT * from usuarios WHERE rol='$rolLimpio' AND aprobado = 1";
        $filas = $this->select($query);

        $usuarios = array();
        foreach($filas as $fila) {
            array_push($usuarios, $this->crearObjetoUsuario($fila));
        }
        return $usuarios;
    }

}