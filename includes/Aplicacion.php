<?php

namespace hypefit;

use mysqli;

class Aplicacion {
    private static $instancia;
    private $bdDatosConexion;
    private $conn;

    public static function getSingleton() {
        if (!self::$instancia instanceof self) {
            self::$instancia = new self;
        }
        return self::$instancia;
    }

    private function __construct() {
    }

    public function init($bdDatosConexion) {
        $this->bdDatosConexion = $bdDatosConexion;
    }

    public function conexionBd() {
        if (! $this->conn ) {
            $bdHost = $this->bdDatosConexion['host'];
            $bdUser = $this->bdDatosConexion['user'];
            $bdPass = $this->bdDatosConexion['pass'];
            $bd = $this->bdDatosConexion['bd'];
            $this->conn = new mysqli($bdHost, $bdUser, $bdPass, $bd);
            if ( $this->conn->connect_errno ) {
                echo "Error de conexión a BD:(".$this->conn->connect_errno . ") " . utf8_encode($this->conn->connect_error);
                exit();
            }
            if ( ! $this->conn->set_charset("utf8mb4")) {
                echo "Error al configurar la codificación de BD:(". $this->conn->errno .") ". utf8_encode($this->conn->error);
                exit();
            }
        }
        return $this->conn;
    }
}