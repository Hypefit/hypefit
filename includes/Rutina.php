<?php


class Rutina {
    private $rutina = "";
    private $idEntrenador = 0;
    private $categoria = "";
    private $imagen = "";
    private $id = 0;

    /**
     * @return string
     */
    public function getRutina(): string {
        return $this->rutina;
    }

    /**
     * @param string $rutina
     */
    public function setRutina(string $rutina): void {
        $this->rutina = $rutina;
    }

    /**
     * @return int
     */
    public function getIdEntrenador(): int {
        return $this->idEntrenador;
    }

    /**
     * @param int $idEntrenador
     */
    public function setIdEntrenador(int $idEntrenador): void {
        $this->idEntrenador = $idEntrenador;
    }

    /**
     * @return string
     */
    public function getCategoria(): string {
        return $this->categoria;
    }

    /**
     * @param string $categoria
     */
    public function setCategoria(string $categoria): void {
        $this->categoria = $categoria;
    }

    /**
     * @return string
     */
    public function getImagen(): string {
        return $this->imagen;
    }

    /**
     * @param string $imagen
     */
    public function setImagen(string $imagen): void {
        $this->imagen = $imagen;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

}