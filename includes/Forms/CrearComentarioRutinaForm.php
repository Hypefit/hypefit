<?php

namespace hypefit\Forms;

use hypefit\DAO\ComentarioRutinaDAO;
use hypefit\TO\ComentarioRutina;

require_once 'includes/config.php';
require_once 'includes/autorizacion.php';

class CrearComentarioRutinaForm extends Form {
    public function __construct() {
        $idRutina = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
        $opciones = array( 'action' => RUTA_APP . "/verRutina.php?id=" . $idRutina );
        parent::__construct('CrearComentarioRutinaForm', $opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $idRutina = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
        $html = <<<EOS
        <!-- Caja de valoracion -->
        <div class='container-fluid p-4'>
            <div class='row justify-content-center align-items-center justify-content-center'>
                <div class="col-sm-8 mask border rounded shadow m-5" style="background-color: rgba(255, 255, 255, 0.7);">
                    <div class="text-center">
                        <legend class="mt-4 mb-3">Deja tu valoración</legend>
                        <!--De mayor a menor, en el estilo se cambia-->
                        <div class="valoracion mb-3">
                            <input type="radio" id="radio5Rutina" name="valoracionReceta" value="5" />
                            <label for="radio5Rutina" class="fa fa-star"></label>  
                            <input type="radio" id="radio4Rutina" name="valoracionReceta" value="4" />
                            <label for="radio4Rutina" class="fa fa-star"></label>
                            <input type="radio" id="radio3Rutina" name="valoracionReceta" value="3" />
                            <label for="radio3Rutina" class="fa fa-star"></label>
                            <input type="radio" id="radio2Rutina" name="valoracionReceta" value="2" />
                            <label for="radio2Rutina" class="fa fa-star"></label>
                            <input type="radio" id="radio1Rutina" name="valoracionReceta" value="1" checked />
                            <label for="radio1Rutina" class="fa fa-star"></label>
                        </div>
                        <div class="mb-3 row justify-content-center">
                            <div class="col col-sm-8">
                                <input type="hidden" name="idRutina" value="$idRutina" />
                                <textarea title="Mensaje" class="form-control" name="mensaje" 
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
        $texto = htmlspecialchars(trim(strip_tags($datos['mensaje']))) ?? null;
        $idRutina = htmlspecialchars(trim(strip_tags($datos['idRutina']))) ?? null;
        $valoracion = htmlspecialchars(trim(strip_tags($datos['valoracionRutina'])));

        if (count($result) === 0) {
            $idUsuario = idUsuarioLogado();

            $dao = new ComentarioRutinaDAO();
            $comentario = new ComentarioRutina();
            $comentario->setTexto($texto);
            $comentario->setIdUsuario($idUsuario);
            $comentario->setIdRutina($idRutina);
            $comentario->setValoracion($valoracion);
            $dao->crearComentarioRutina($comentario);

            $result = RUTA_APP . "/verRutina.php?id=$idRutina#ComentariosRutina";
        }
        return $result;
    }
}
