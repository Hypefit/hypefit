<?php

namespace hypefit\TO;

class Noticia {
    private int $id = 0;
    private int $idAutor = 0;
    private string $titulo = "";
    private string $texto = "";
    private string $filename = "";
    private string $tmp = "";

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

    /**
     * @return int
     */
    public function getIdAutor(): int {
        return $this->idAutor;
    }

    /**
     * @param int $idAutor
     */
    public function setIdAutor(int $idAutor): void {
        $this->idAutor = $idAutor;
    }

    /**
     * @return string
     */
    public function getTitulo(): string {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }

    public function getTexto(): string {
        return $this->texto;
    }


    public function setTexto(string $texto): void {
        $this->texto = $texto;
    }

    public function getFilename(): string {
        return $this->filename;
    }

    /**
     * @param string $filename
     */
    public function setFilename(string $filename): void {
        $this->filename = $filename;
    }

}