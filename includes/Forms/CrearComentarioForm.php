<?php

namespace hypefit\Forms;

use hypefit\DAO\ComentarioDAO;
use hypefit\TO\Comentario;

require_once 'includes/config.php';
require_once 'includes/autorizacion.php';

class CrearComentarioForm extends Form {
    public function __construct() {
        $idPost = $_REQUEST["id"];
        $opciones = array( 'action' => RUTA_APP . "/verPost.php?id=" . $idPost );
        parent::__construct('CrearComentarioForm', $opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $idPost = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
        $html = <<<EOS
<!-- Jumbotron -->
<div class='container-fluid p-4'>
    <div class='row justify-content-center align-items-center justify-content-center'>
        <div class="col-sm-8 mask border rounded shadow m-5" style="background-color: rgba(255, 255, 255, 0.7);">
            <div class=" text-center">
                <legend class="mt-4 mb-3">Escribe tu respuesta</legend>
                <div class="mb-3 row justify-content-center">
                    <div class="col col-sm-8">
                        <input type="hidden" name="idPost" value="$idPost" />
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
     /*
      * <div class="p-5 text-center bg-image img-fluid"
        style="
            background-image: url(https://s1.1zoom.me/b5249/490/Closeup_15_kg_Barbell_514746_1366x768.jpg);
            background-color: #d7e9f7;
            opacity: 0.9;
            background-repeat: no-repeat;
            background-size: cover;
            width:  auto;
            height: 100%;
            margin: 5%;
        ">*/

        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $texto =$datos['mensaje'] ?? null;
        $idPost =$datos['idPost'] ?? null;

        if (count($result) === 0) {
            $idUsuario = idUsuarioLogado();

            $dao = new ComentarioDAO();
            $comentario = new Comentario();
            $comentario->setComentario($texto);
            $comentario->setIdUsuario($idUsuario);
            $comentario->setIdPost($idPost);
            $dao->crearComentario($comentario);

            $result = RUTA_APP . "/verPost.php?id=$idPost";
        }
        return $result;
    }
}
