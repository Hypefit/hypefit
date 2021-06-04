<?php

namespace hypefit\Forms;

use hypefit\DAO\RutinaDAO;
use hypefit\TO\Rutina;

require_once 'includes/config.php';

class CrearRutinaForm extends Form {
    public function __construct() {
        parent::__construct('CrearRutinaForm');
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $form = <<<EOS
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 pb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-hand-point-right"></i>
                        </span>
                    </div>
                    <input title="Título" class="form-control" type="text" name="titulo" 
                    placeholder="Título" required>
                </div>
            </div> 
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 pb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-paragraph"></i>
                        </span>
                    </div>
                    <textarea title="Descripcion" class="form-control" name="descripcion" 
                    placeholder="Subtítulo" required></textarea>
                </div>
            </div> 
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 pb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-edit"></i>
                        </span>
                    </div>
                    <textarea title="Contenido" class="form-control contenido" name="rutina" 
                    placeholder="Contenido" required></textarea>
                </div>
            </div> 
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 pb-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-list"></i>
                        </span>
                    </div>
                    <select title="Categoria" class="form-select" name="categoria" required>
                        <option selected>Categoría</option>
                        <option value="superior">Superior</option>
                        <option value="inferior">Inferior</option>
                        <option value="full body">Full Body</option>
                    </select>
                </div>
            </div>
            $htmlErroresGlobales
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 mb-4">
                 <button type="submit" class="btn btn-dark">Crear</button>  
            </div>  
        EOS;

        $html = formJumbo("https://s1.1zoom.me/b5249/490/Closeup_15_kg_Barbell_514746_1366x768.jpg",
            "Nueva rutina", "Rellena este formulario para crear una fantástica rutina", $form);

        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $titulo = htmlspecialchars(trim(strip_tags($datos['titulo']))) ?? null;
        $descripcion = htmlspecialchars(trim(strip_tags($datos['descripcion']))) ?? null;
        $textoRutina = htmlspecialchars(trim(strip_tags($datos['rutina']))) ?? null;
        $categoria = htmlspecialchars(trim(strip_tags($datos['categoria']))) ?? null;
        $idEntrenador = $_SESSION['idUsuario'];


        if (count($result) === 0) {
            $dao = new RutinaDAO();

            $rutina = new Rutina();
            $rutina->setIdEntrenador($idEntrenador);
            $rutina->setRutina($textoRutina);
            $rutina->setCategoria($categoria);
            $rutina->setTitulo($titulo);
            $rutina->setDescripcion($descripcion);

            $id = $dao->crearRutina($rutina);

            $result = RUTA_APP . "/verRutina.php?id=$id";
        }
        return $result;
    }
}