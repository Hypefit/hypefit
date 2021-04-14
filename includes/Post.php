<?php


class Post {
    private $post = "";
    private $id = 0;
    private $idCreador = 0;
    private $titulo = "";

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

    public function getPost() : string {
        return $this->post;
    }

    public function setPost(string $post) : void {
        $this->post = $post;
    }

}