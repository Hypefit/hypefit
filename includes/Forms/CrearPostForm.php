<?php

namespace hypefit\Forms;

use hypefit\DAO\PostsDAO;
use hypefit\TO\Post;
use hypefit\DAO\ComentarioDAO;
use hypefit\TO\Comentario;

require_once 'includes/config.php';
require_once 'includes/autorizacion.php';

class CrearPostForm extends Form {
    public function __construct() {
        parent::__construct('CrearPostForm');
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $html = <<<EOS
        <fieldset>
            $htmlErroresGlobales
			<p><label>Título: </label> <input type="text" name="titulo" required /></p>
			<p><label>Mensaje:</label> <input type="text" name="mensaje" required /></p>
			<button type="submit">Publicar</button>
        </fieldset>
EOS;
        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $titulo =$datos['titulo'] ?? null;
        $mensaje =$datos['mensaje'] ?? null;
        $idUsuario = idUsuarioLogado();

        if (count($result) === 0) {
            $dao = new PostsDAO();
            $post = new Post();
            $post->setTitulo($titulo);
            $post->setIdCreador($idUsuario);
            $idPost = $dao->crearPost($post);
            
            $dao = new ComentarioDAO();
            $comentario = new Comentario();
            $comentario->setComentario($mensaje);
            $comentario->setIdUsuario($idUsuario);
            $comentario->setIdPost($idPost);
            $dao->crearComentario($comentario);

            $result = RUTA_APP . "/verPost.php?id=$idPost";
        }
        return $result;
    }
}