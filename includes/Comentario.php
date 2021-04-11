<?php


class Comentario {
    private $id = 0;
    private $idPost = 0;
    private $idUsuario = 0;
    private $fecha = "";
    private $comentario = "";

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
    public function getIdPost(): int {
        return $this->idPost;
    }

    /**
     * @param int $idPost
     */
    public function setIdPost(int $idPost): void {
        $this->idPost = $idPost;
    }

    /**
     * @return int
     */
    public function getIdUsuario(): int {
        return $this->idUsuario;
    }

    /**
     * @param int $idUsuario
     */
    public function setIdUsuario(int $idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return string
     */
    public function getFecha(): string {
        return $this->fecha;
    }

    /**
     * @param string $fecha
     */
    public function setFecha(string $fecha): void {
        $this->fecha = $fecha;
    }

    /**
     * @return string
     */
    public function getComentario(): string {
        return $this->comentario;
    }

    /**
     * @param string $comentario
     */
    public function setComentario(string $comentario): void {
        $this->comentario = $comentario;
    }


}