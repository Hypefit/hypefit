<?php

namespace hypefit\Forms;

require_once '../config.php';

class CrearRespuestaComentarioForm extends Form {

    private $idPost;
    private $idComentarioPadre;

    public function __construct($idPost, $idComentarioPadre) {
        $this->idPost = $idPost;
        $this->idComentarioPadre = $idComentarioPadre;
        $opciones = array( 'action' => RUTA_APP . "/includes/Forms/procesarRespuestaComentario.php" );
        parent::__construct('CrearRespuestaComentarioForm', $opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
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
                        <button type="submit" class="btn btn-dark mb-3">Crear</button>
                    </div>
                </div>
            </div>
        </div>
        EOS;
        return $html;
    }
}
