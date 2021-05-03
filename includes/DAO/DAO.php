<?php

namespace hypefit\DAO;

use hypefit\Aplicacion;

class DAO
{
    protected function select($sql) {
        if($sql != ""){
            $conn = Aplicacion::getSingleton()->conexionBd();
            $consulta = $conn->query($sql) or die ($conn->error. " en la línea ".(__LINE__-1));
            $tablaDatos = array();
            while ($fila = mysqli_fetch_assoc($consulta)){
                array_push($tablaDatos, $fila);
            }
            return $tablaDatos;
        } else {
            return 0;
        }
    }

    protected function modify($sql): int {
        if($sql != ""){
            $conn = Aplicacion::getSingleton()->conexionBd();
            $consulta = $conn->query($sql) or die ($conn->error. " en la línea ".(__LINE__-1));
            return $conn->affected_rows;
        } else {
            return 0;
        }
    }

    protected function insert($sql) {
        if($sql != ""){
            $conn = Aplicacion::getSingleton()->conexionBd();
            $consulta = $conn->query($sql) or die ($conn->error. " en la línea ".(__LINE__-1));
            return mysqli_insert_id($conn);
        } else {
            return NULL;
        }
    }

    protected function limpiarString($string): string {
        $conn = Aplicacion::getSingleton()->conexionBd();
        return $conn->real_escape_string($string);
    }
}

