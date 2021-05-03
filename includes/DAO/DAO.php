<?php

namespace hypefit\DAO;

use mysqli;

class DAO
{
    private $mysqli;
    private const servername = "localhost";
    private const user = "admin";
    private const pass = "adminpass";
    private const db = "hypefit";

    protected function __construct()
    {
        if (!$this->mysqli) {
            $this->mysqli = new mysqli(self::servername, self::user, self::pass, self::db);
            if ($this->mysqli->connect_error) {
                echo ("Fallo de conexión: " . $this->mysqli->connect_error);
            }
            if(!$this->mysqli->set_charset("utf8")) {
                printf("<hr>Error loading character set utf8 (Err. nº %d): %s\n<hr/>",  $this->mysqli->errno, $this->mysqli->error);
                exit();
            }

            ini_set('default_charset', 'UTF-8');
        }
        if ( !$this->mysqli ) {
            echo "fail";
        }
    }

    protected function select($sql) {
        if($sql != ""){
            $consulta = $this->mysqli->query($sql) or die ($this->mysqli->error. " en la línea ".(__LINE__-1));
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
            $consulta = $this->mysqli->query($sql) or die ($this->mysqli->error. " en la línea ".(__LINE__-1));
            return $this->mysqli->affected_rows;
        } else {
            return 0;
        }
    }

    protected function insert($sql) {
        if($sql != ""){
            $consulta = $this->mysqli->query($sql) or die ($this->mysqli->error. " en la línea ".(__LINE__-1));
            return mysqli_insert_id($this->mysqli);
        } else {
            return NULL;
        }
    }

    protected function limpiarString($string): string {
        return $this->mysqli->real_escape_string($string);
    }
}

