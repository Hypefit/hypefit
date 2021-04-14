<?php
require_once __DIR__ .'/DAO.php';

class RutinaDAO extends DAO {
    public function __construct() {
        parent::__construct();
    }

    public function crearRutina(Rutina $u) {
        $query = "INSERT into Rutinas (rutina, idEntrenador, categoria, titulo) values
                (" . $u->getRutina() . "," . $u->getIdEntrenador() . "," . $u->getCategoria() . "," . $u->getImagen() . "," . $u->getTitulo() . ")";
        return $this->insert($query);
    }

    public function getRutina($id) {
        $id_limpio = $this->limpiarString($id);
        $query = "SELECT * from Rutinas where id = '$id_limpio'";
        $fila = $this->select($query);

        if (empty($fila)) {
            return NULL;
        }
        else return $this->crearObjetoRutina($fila);
    }

    public function getRutinasPorCategoria($categoria) {
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
        $rutina->setImagen($fila['imagen']);
        $rutina->setTitulo($fila['titulo']);

        return $rutina;
    }
}