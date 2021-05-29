<?php

namespace hypefit\Forms;

use hypefit\DAO\ComentarioDAO;
use hypefit\TO\Comentario;

require_once 'includes/config.php';
require_once 'includes/autorizacion.php';

class CrearComentarioForm extends Form {

    private $idComentarioPadre;

    public function __construct($idComentarioPadre) {
        $this->idComentarioPadre = $idComentarioPadre;
        $idPost = $_REQUEST["id"];
        $opciones = array( 'action' => RUTA_APP . "/verPost.php?id=" . $idPost );
        parent::__construct('CrearComentarioForm', $opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $idPost = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
        $html = <<<EOS
        <!--Caja de respuesta-->
        <div class='container-fluid p-4'>
            <div class='row justify-content-center align-items-center justify-content-center'>
                <div class="col-sm-8 mask border rounded shadow m-5" style="background-color: rgba(255, 255, 255, 0.7);">
                    <div class=" text-center">
                        <legend class="mt-4 mb-3">Escribe tu respuesta</legend>
                        <div class="mb-3 row justify-content-center">
                            <div class="col col-sm-8">
                                <input type="hidden" name="idPost" value="$idPost" />
                                <input type="hidden" name="idComentarioPadre" value="$this->idComentarioPadre" />
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
        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $texto  = $datos['mensaje'] ?? null;
        $idPost = $datos['idPost'] ?? null;
        $idComentarioPadre = $datos['idComentarioPadre'] ?? null;


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
