<?php

namespace hypefit\Forms;

use hypefit\DAO\PostsDAO;
use hypefit\TO\Post;
use hypefit\DAO\ComentarioDAO;
use hypefit\TO\Comentario;

require_once 'includes/config.php';
require_once 'includes/autorizacion.php';
require_once 'includes/comun/jumbotron.php';


class CrearPostForm extends Form {
    public function __construct() {
        parent::__construct('CrearPostForm');
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $form = <<<EOS
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 pb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                             <i class="fas fa-hand-point-right"></i>
                        </span>
                    </div>
                    <input title="Título" class="form-control" type="text" name="titulo" 
                    placeholder="Título" required>
                </div>
                </div> 
                <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 pb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-edit"></i>
                            </span>
                        </div>
                        <textarea title="Contenido" class="form-control" name="mensaje" 
                        placeholder="Contenido" required></textarea>
                    </div>
                </div> 
                $htmlErroresGlobales        
                <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 mb-4">
                    <button type="submit" class="btn btn-dark">Crear</button>  
               </div>   
            </div>
        EOS;

        $html = formJumbo("https://s1.1zoom.me/b5249/490/Closeup_15_kg_Barbell_514746_1366x768.jpg",
            "Escribe tus pensamientos", "Deja tus comentarios, preguntas y sensaciones", $form);

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
