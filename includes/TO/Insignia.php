<?php

namespace hypefit\TO;

class Insignia {
    private int $id;
    private string $titulo;
    private string $rutaImagen;
    private string $descripcion;

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


    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }

    public function getRutaImagen() {
        return $this->rutaImagen;
    }


    public function setRutaImagen(string $rutaImagen): void {
        $this->rutaImagen = $rutaImagen;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }


}