<?php

namespace hypefit\Forms;

use hypefit\DAO\ComentarioRecetaDAO;
use hypefit\TO\ComentarioReceta;

require_once 'includes/config.php';
require_once 'includes/autorizacion.php';

class CrearComentarioRecetaForm extends Form {
    public function __construct() {
        $idReceta = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
        $opciones = array( 'action' => RUTA_APP . "/verReceta.php?id=" . $idReceta );
        parent::__construct('CrearComentarioRecetaForm', $opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $idReceta = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
        $html = <<<EOS
        <!-- Jumbotron -->
        <div class='container-fluid p-4'>
            <div class='row justify-content-center align-items-center justify-content-center'>
                <div class="col-sm-8 mask border rounded shadow m-5" style="background-color: rgba(255, 255, 255, 0.7);">
                    <div class=" text-center">
                        <legend class="mt-4 mb-3">Deja tu valoración</legend>
                        <!--De mayor a menor, en el estilo se cambia-->
                        <div class="valoracion mb-3">
                            <input type="radio" id="radio5" name="valoracion" value="5">
                            <label for="radio5"><span class="fa fa-star"></label>  
                            <input type="radio" id="radio4" name="valoracion" value="4">
                            <label for="radio4"><span class="fa fa-star"></label>
                            <input type="radio" id="radio3" name="valoracion" value="3">
                            <label for="radio3"><span class="fa fa-star"></label>
                            <input type="radio" id="radio2" name="valoracion" value="2">
                            <label for="radio2"><span class="fa fa-star"></label>
                            <input type="radio" id="radio1" name="valoracion" value="1">
                            <label for="radio1"><span class="fa fa-star"></label>
                        </div>
                        <div class="mb-3 row justify-content-center">
                            <div class="col col-sm-8">
                                <input type="hidden" name="idReceta" value="$idReceta" />
                                <textarea  title="Mensaje" class="form-control" name="mensaje" 
                                    placeholder="Mensaje" required id="mensaje"></textarea>
                            </div>
                        </div>
                        $htmlErroresGlobales
                        <button type="submit" class="btn btn-dark mb-3">Enviar</button>
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
        $idReceta =$datos['idReceta'] ?? null;
        $valoracion = $datos['valoracion'];

        if (count($result) === 0) {
            $idUsuario = idUsuarioLogado();

            $dao = new ComentarioRecetaDAO();
            $comentario = new ComentarioReceta();
            $comentario->setTexto($texto);
            $comentario->setIdUsuario($idUsuario);
            $comentario->setIdReceta($idReceta);
            $comentario->setValoracion($valoracion);
            $dao->crearComentarioReceta($comentario);

            $result = RUTA_APP . "/verReceta.php?id=$idReceta";
        }
        return $result;
    }
}
