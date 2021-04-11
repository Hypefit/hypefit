<?php


class RutinaDAO extends DAO {
    public function crearRutina(Rutina $u) {
        $query = "INSERT into Rutinas (rutina, idEntrenador, categoria, imagen) values
                (" . $u->getRutina() . "," . $u->getIdEntrenador() . "," . $u->getCategoria() . "," . $u->getImagen() . ")";
        return $this->insert($query);
    }

    public function getRutina($id) {
        $query = "SELECT * from Rutinas where id = '$id'";
        $fila = $this->select($query);

        return $this->crearObjetoRutina($fila);
    }

    public function getAllRutinas() {
        $query = "SELECT * from Rutinas";
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

        return $rutina;
    }
}