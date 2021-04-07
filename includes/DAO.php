<?php


abstract class DAO
{
    private $conexionBD;
    private const servername = "localhost";
    private const user = "admin";
    private const pass = "adminpass";
    private const db = "hypefit";

    protected function __construct()
    {
        if (!empty($this->conexionBD)) {
            if (!$this->conexionBD) {
                $this->conexionBD = new mysqli(self::servername, self::user, self::pass, self::db);
                if ($this->conexionBD->connect_error) {
                    die("Fallo de conexión: " . $this->conexionBD->connect_error);
                }
            }
        }
    }

    protected function __destruct()
    {
        $this->conexionBD->close();
    }

    protected function query($sql) {
        if ($sql != "") {
            return $this->conexionBD->query($sql);
        }
        else return null;
    }

    abstract protected function insert($TO);
    abstract protected function update($TO);
    abstract protected function select($TO);
    abstract protected function delete($TO);
}
