<?php


class Post {
    private int $id = 0;
    private int $idCreador = 0;
    private string $titulo = "";

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
    public function getIdCreador(): int {
        return $this->idCreador;
    }

    /**
     * @param int $idCreador
     */
    public function setIdCreador(int $idCreador): void {
        $this->idCreador = $idCreador;
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

}