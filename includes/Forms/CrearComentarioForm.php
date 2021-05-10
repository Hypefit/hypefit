<?php

namespace hypefit\Forms;

use hypefit\DAO\ComentarioDAO;
use hypefit\TO\Comentario;

require_once 'includes/config.php';
require_once 'includes/autorizacion.php';

class CrearComentarioForm extends Form {
    public function __construct() {
        parent::__construct('CrearComentarioForm');
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $idPost = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
        $html = <<<EOS
        <fieldset>
            $htmlErroresGlobales
            <input type="hidden" name="idPost" value="$idPost" />
			<fieldset>
				<div><label for="mensaje">Respuesta: </label><input id="mensaje" type="text" name="mensaje" /></div>
				<div><button type="submit">Crear</button></div>
			</fieldset>
        </fieldset>
EOS;
        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $texto =$datos['texto'] ?? null;
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