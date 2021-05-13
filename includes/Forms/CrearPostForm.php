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
                <div class="row justify-content-center">
                    <div class="mask signup-form col-xs-12 col-sm-10 col-md-9" 
                         style="background-color: rgba(255, 255, 255, 0.7); margin: 10%;">
                        <div class="row justify-content-center">
                            <h2 class="text-dark pt-3">Escribe tus pensamientos</h2>
                            <p>Deja tus comentarios, preguntas y sensaciones</p>
                            <hr>
                            
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
