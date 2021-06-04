<?php

namespace hypefit\Forms;

use hypefit\DAO\ComentarioDAO;
use hypefit\TO\Comentario;

require_once __ROOT__.'/includes/config.php';
require_once __ROOT__.'/includes/autorizacion.php';

class CrearComentarioForm extends Form {

    private $idPost;
    private $idComentarioPadre;
    private $es_Respuesta;

    public function __construct($idPost, $idComentarioPadre, $es_Respuesta = false) {
        $this->idPost = $idPost;
        $this->idComentarioPadre = $idComentarioPadre;
        $this->es_Respuesta = $es_Respuesta;
        $opciones = array( 'action' => RUTA_APP . "/verPost.php?id=" . $idPost );
        parent::__construct('CrearComentarioForm', $opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        if($this->es_Respuesta){
            $html = <<<EOS
                <input type="hidden" name="idPost" value="$this->idPost">
                <input type="hidden" name="idComentarioPadre" value="$this->idComentarioPadre">
                <div class = "mb-3 ms-5">
                    <div class = "mb-2 w-75">
                        <textarea title="RespuestaMensaje" class="form-control" name="mensaje" 
                        placeholder="Deja tu respuesta..." required id="respuestaMensaje"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Comentar</button>
                </div>  
            EOS;
        }

        else {
            $html = <<<EOS
            <!--Caja de respuesta-->
            <input type="hidden" name="idPost" value="$this->idPost">
            <input type="hidden" name="idComentarioPadre" value="$this->idComentarioPadre">
            <div class='container-fluid p-4'>
                <div class='row justify-content-center align-items-center justify-content-center'>
                    <div class="col-sm-8 mask border rounded shadow m-5" style="background-color: rgba(255, 255, 255, 0.7);">
                        <div class=" text-center">
                            <legend class="mt-4 mb-3">Escribe tu respuesta</legend>
                            <div class="mb-3 row justify-content-center">
                                <div class="col col-sm-8">
                                    <textarea  title="Mensaje" class="form-control" name="mensaje" 
                                        placeholder="Mensaje" required id="mensaje"></textarea>
                                </div>
                            </div>
                            $htmlErroresGlobales
                            <button type="submit" class="btn btn-dark mb-3">Crear</button>
                        </div>
                    </div>
                </div>
            </div>
            EOS;
        }
        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $texto  = htmlspecialchars(trim(strip_tags($datos['mensaje']))) ?? null;
        $idPost  = htmlspecialchars(trim(strip_tags($datos['idPost']))) ?? null;
        $idComentarioPadre  = htmlspecialchars(trim(strip_tags($datos['idComentarioPadre']))) ?? null;

        if (count($result) === 0) {
            $idUsuario = idUsuarioLogado();

            $dao = new ComentarioDAO();
            $comentario = new Comentario();
            $comentario->setComentario($texto);
            $comentario->setIdUsuario($idUsuario);
            $comentario->setIdPost($idPost);
            $comentario->setidComentarioPadre($idComentarioPadre);
            $dao->crearComentario($comentario);

            $result = RUTA_APP . "/verPost.php?id=$idPost";
        }
        return $result;
    }
}
