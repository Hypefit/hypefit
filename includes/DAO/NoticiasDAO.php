<?php

namespace hypefit\DAO;

use hypefit\TO\Noticia;

class NoticiasDAO extends DAO {

    public function crearNoticia(Noticia $u) {
        $creador = $this->limpiarString($u->getIdAutor());
        $titulo = $this->limpiarString($u->getTitulo());
        $texto = $this->limpiarString($u->getTexto());
        $filename = $this->limpiarString($u->getFilename());
        
        $query = sprintf("INSERT into noticias (idAutor, titulo, texto, filename) values
                ('%s','%s','%s','%s')", $creador, $titulo, $texto, $filename); 
        return $this->insert($query);
    }

    public function getNoticia($id) {
        $idLimpio = $this->limpiarString($id);
        $query = "SELECT * from noticias where id = '$idLimpio'";
        $fila = $this->select($query);
        if(count($fila) > 0)
            return $this->crearObjetoNoticia($fila[0]);
        else return null;
    }

    public function getAllNoticias(): array {
        $query = "SELECT * from noticias";
        $filas = $this->select($query);

        $array_noticias = array();
        foreach ($filas as $fila) {
            array_push($array_noticias, $this->crearObjetoNoticia($fila));
        }

        return $array_noticias;
    }

    private function crearObjetoNoticia($fila): Noticia {
        $post = new Noticia();
        $post->setId($fila['id']);
        $post->setIdAutor($fila['idAutor']);
        $post->setTitulo($fila['titulo']);
        $post->setTexto($fila['texto']);
        $post->setFilename($fila['filename']);

        return $post;
    }
}