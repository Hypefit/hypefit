<?php

namespace hypefit\DAO;

use hypefit\TO\Rutina;

class RutinaDAO extends DAO {

    public function crearRutina(Rutina $u) {
        $rutina = $this->limpiarString($u->getRutina());
        $idEntrenador = $this->limpiarString($u->getIdEntrenador());
        $categoria = $this->limpiarString($u->getCategoria());
        $titulo = $this->limpiarString($u->getTitulo());
        $descricion = $this->limpiarString($u->getDescripcion());

        $query = sprintf('INSERT into rutinas (rutina, idEntrenador, categoria, titulo, descripcion) values
                ("%s","%s","%s","%s", "%s")', $rutina, $idEntrenador, $categoria, $titulo, $descricion);
        return $this->insert($query);
    }

    public function getRutina($id): ?Rutina {
        $id_limpio = $this->limpiarString($id);
        $query = "SELECT * from rutinas where id = '$id_limpio'";
        $filas = $this->select($query);

        if (empty($filas)) {
            return NULL;
        }
        else return $this->crearObjetoRutina($filas[0]);
    }

    public function getRutinasPorCategoria($categoria): array {
        $categoria_limpia = $this->limpiarString($categoria);
        $query = "SELECT * from rutinas where categoria = '$categoria_limpia'";
        $filas = $this->select($query);

        $array_rutinas = array();
        foreach ($filas as $fila) {
            array_push($array_rutinas, $this->crearObjetoRutina($fila));
        }

        return $array_rutinas;
    }

    public function getIdsPorEntrenador($idEntrenador): array {
        $idEntrenadorLimpio = $this->limpiarString($idEntrenador);
        $query = "SELECT id from rutinas where idEntrenador = '$idEntrenadorLimpio'";
        $filas = $this->select($query);

        $ids = array();
        foreach ($filas as $fila) {
            array_push($ids, $fila['id']);
        }
        return $ids;
    }

    private function crearObjetoRutina($fila): Rutina {
        $rutina = new Rutina();
        $rutina->setId($fila['id']);
        $rutina->setIdEntrenador($fila['idEntrenador']);
        $rutina->setRutina($fila['rutina']);
        $rutina->setCategoria($fila['categoria']);
        $rutina->setTitulo($fila['titulo']);
        $rutina->setDescripcion($fila['descripcion']);

        return $rutina;
    }

    public function getNumRutinas() {
        $query = "SELECT * FROM rutinas";
        $resultado = $this->select($query);
        return count($resultado);
    }
}