<?php

namespace hypefit\Forms;

use hypefit\DAO\RecetaDAO;
use hypefit\TO\Receta;

require_once 'includes/config.php';

class CrearRecetaForm extends Form {
    public function __construct() {
        parent::__construct('CrearRecetaForm');
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
                    <textarea title="Contenido" class="form-control contenido" name="receta" 
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
                        <option value="normal">Sin requerimientos</option>
                        <option value="vegetariana">Vegetariana</option>
                        <option value="vegana">Vegana</option>
                    </select>
               </div>
           </div>
           $htmlErroresGlobales
           <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 mb-4">
                <button type="submit" class="btn btn-dark">Crear</button>  
           </div>  
                
        EOS;

        $html = formJumbo("https://elviajerofeliz.com/wp-content/uploads/2020/01/comida-tipica-de-armenia.jpg",
            "Nueva receta", "Rellena este formulario para crear una deliciosa receta", $form);

        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $titulo =$datos['titulo'] ?? null;
        $descripcion = $datos['descripcion'] ?? null;
        $textoReceta = $datos['receta'] ?? null;
        $categoria = $datos['categoria'] ?? null;
        $idNutricionista = $_SESSION['idUsuario'];


        if (count($result) === 0) {
            $dao = new RecetaDAO();

            $receta = new Receta();
            $receta->setIdNutricionista($idNutricionista);
            $receta->setReceta($textoReceta);
            $receta->setCategoria($categoria);
            $receta->setTitulo($titulo);
            $receta->setDescripcion($descripcion);

            $id = $dao->crearReceta($receta);

            $result = RUTA_APP . "/verReceta.php?id=$id";
        }
        return $result;
    }
}