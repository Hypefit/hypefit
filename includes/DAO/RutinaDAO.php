<?php

namespace hypefit\DAO;

use hypefit\TO\Rutina;

class RutinaDAO extends DAO {

    public function crearRutina(Rutina $u) {
        $rutina = $this->limpiarString($u->getRutina());
        $idEntrenador = $this->limpiarString($u->getIdEntrenador());
        $categoria = $this->limpiarString($u->getCategoria());
        $titulo = $this->limpiarString($u->getTitulo());

        $query = sprintf('INSERT into Rutinas (rutina, idEntrenador, categoria, titulo) values
                ("%s","%s","%s","%s")', $rutina, $idEntrenador, $categoria, $titulo);
        return $this->insert($query);
    }

    public function getRutina($id): ?Rutina {
        $id_limpio = $this->limpiarString($id);
        $query = "SELECT * from Rutinas where id = '$id_limpio'";
        $filas = $this->select($query);

        if (empty($filas)) {
            return NULL;
        }
        else return $this->crearObjetoRutina($filas[0]);
    }

    public function getRutinasPorCategoria($categoria): array {
        $categoria_limpia = $this->limpiarString($categoria);
        $query = "SELECT * from Rutinas where categoria = '$categoria_limpia'";
        $filas = $this->select($query);

        $array_rutinas = array();
        foreach ($filas as $fila) {
            array_push($array_rutinas, $this->crearObjetoRutina($fila));
        }

        return $array_rutinas;
    }

    private function crearObjetoRutina($fila): Rutina {
        $rutina = new Rutina();
        $rutina->setId($fila['id']);
        $rutina->setIdEntrenador($fila['idEntrenador']);
        $rutina->setRutina($fila['rutina']);
        $rutina->setCategoria($fila['categoria']);
        $rutina->setTitulo($fila['titulo']);

        return $rutina;
    }
}