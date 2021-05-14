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
<div class='container-fluid p-4'>
    <div class='row justify-content-center align-items-center justify-content-center'>
        <div class="col-sm-8 mask border rounded shadow m-5" style="background-color: rgba(255, 255, 255, 0.7);">
            <div class=" text-center valoracion">
                <legend class="mt-4 mb-3">Deja tu valoración</legend>
                <input type="radio" id="radio5" name="valoracion" value="5">
                <label for="radio5">&#9733</label>  
                <input type="radio" id="radio4" name="valoracion" value="4">
                <label for="radio4">&#9733</label>
                <input type="radio" id="radio3" name="valoracion" value="3">
                <label for="radio3">&#9733</label>
                <input type="radio" id="radio2" name="valoracion" value="2">
                <label for="radio2">&#9733</label>
                <input type="radio" id="radio1" name="valoracion" value="1">
                <label for="radio1">&#9733</label>
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
