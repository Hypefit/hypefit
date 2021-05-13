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
<!-- Jumbotron -->
<div class="p-1 text-center rounded"
        style="
            margin: 0 5% 5%;
            width: 50%;
        ">
   
        <div class="mask border rounded shadow" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-black">
                    <legend class="mt-4 mb-3">Deja tu valoración</legend>
                    <input type="radio" id="1" name="valoracion" value="1" checked><label for="1">1</label>
                    <input type="radio" id="2" name="valoracion" value="2"><label for="2">2</label>
                    <input type="radio" id="3" name="valoracion" value="3"><label for="3">3</label>
                    <input type="radio" id="4" name="valoracion" value="4"><label for="4">4</label>
                    <input type="radio" id="5" name="valoracion" value="5"><label for="5">5</label>
                    <div class="mb-3">
                        <input type="hidden" name="idReceta" value="$idRutina" />
                        <textarea  title="Mensaje" class="form-control" name="mensaje" 
                            placeholder="Mensaje" required id="mensaje"></textarea>
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
        $idRutina =$datos['idRutina'] ?? null;
        $valoracion = $datos['valoracion'];

        if (count($result) === 0) {
            $idUsuario = idUsuarioLogado();

            $dao = new ComentarioRutinaDAO();
            $comentario = new ComentarioRutina();
            $comentario->setTexto($texto);
            $comentario->setIdUsuario($idUsuario);
            $comentario->setIdRutina($idRutina);
            $comentario->setValoracion($valoracion);
            $dao->crearComentarioRutina($comentario);

            $result = RUTA_APP . "/verRutina.php?id=$idRutina";
        }
        return $result;
    }
}
