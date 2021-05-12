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
                        <legend class="mt-4 mb-3">Escribe tu respuesta</legend>
                        <div class="mb-3">
                        <input type="hidden" name="idPost" value="$idPost" />
                        <div><label for="mensaje">Respuesta: </label><input id="mensaje" type="text" name="mensaje" /></div>
                        </div>
                        $htmlErroresGlobales
                        <button type="submit" class="btn btn-dark">Crear</button>
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
