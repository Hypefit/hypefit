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
        <!-- Jumbotron -->
            <div class="p-5 text-center bg-image img-fluid"
                style="
                    background-image: url(https://s1.1zoom.me/b5249/490/Closeup_15_kg_Barbell_514746_1366x768.jpg);
                    opacity: 0.9;
                    background-repeat: no-repeat;
                    background-size: cover;
                    width:  auto;
                    height: 100%;
                    margin: 5%;
                ">
                <div class="mask" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%;">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-black">
                            <fieldset>
                                <legend class="mt-4 mb-3">Escribe tus pensamientos</legend>
                                <div class="mb-3">
                                    <label class="form-label">Titulo:</label> 
                                    <input class="form-control" type="text" name="titulo"/>
                                </div>
                                 <div class="mb-3">
                                    <label class="form-label">Texto:</label> 
                                    <textarea class="form-control" name="mensaje"></textarea>
                                </div>
                                $htmlErroresGlobales
                                <button type="submit" class="btn btn-dark">Enviar</button>
                                <h5></h5>
                                <p></p>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
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
