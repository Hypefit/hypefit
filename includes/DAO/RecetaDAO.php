<?php

namespace hypefit\DAO;

use hypefit\TO\Receta;

class RecetaDAO extends DAO {

    public function crearReceta(Receta $u) {
        $receta = $this->limpiarString($u->getReceta());
        $idNutricionista = $this->limpiarString($u->getIdNutricionista());
        $categoria = $this->limpiarString($u->getCategoria());
        $titulo = $this->limpiarString($u->getTitulo());
        $descripcion = $this->limpiarString($u->getDescripcion());

        $query = sprintf('INSERT into Recetas (receta, idNutricionista, categoria, titulo, descripcion) values
                ("%s","%s","%s","%s")', $receta, $idNutricionista, $categoria, $titulo, $descripcion);
        return $this->insert($query);
    }

    public function getReceta($id): ?Receta {
        $id_limpio = $this->limpiarString($id);
        $query = "SELECT * from Recetas where id = '$id_limpio'";
        $filas = $this->select($query);

        if (empty($filas)) {
            return NULL;
        }
        else return $this->crearObjetoReceta($filas[0]);
    }

    public function getRecetasPorCategoria($categoria): array {
        $categoria_limpia = $this->limpiarString($categoria);
        $query = "SELECT * from Recetas where categoria = '$categoria_limpia'";
        $filas = $this->select($query);

        $array_recetas = array();
        foreach ($filas as $fila) {
            array_push($array_recetas, $this->crearObjetoReceta($fila));
        }

        return $array_recetas;
    }

    public function getIdsPorEntrenador($idNutricionista): array {
        $idNutricionistaLimpio = $this->limpiarString($idNutricionista);
        $query = "SELECT id from Recetas where idNutricionista = '$idNutricionistaLimpio'";
        $filas = $this->select($query);

        $ids = array();
        foreach ($filas as $fila) {
            array_push($ids, $fila['id']);
        }
        return $ids;
    }

    private function crearObjetoReceta($fila): Receta {
        $receta = new Receta();
        $receta->setId($fila['id']);
        $receta->setIdNutricionista($fila['idNutricionista']);
        $receta->setReceta($fila['receta']);
        $receta->setCategoria($fila['categoria']);
        $receta->setTitulo($fila['titulo']);

        return $receta;
    }
}