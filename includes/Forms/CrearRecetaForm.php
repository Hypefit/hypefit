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
        <div class="row justify-content-center">
            <div class="mask signup-form col-xs-12 col-sm-10 col-md-9" 
                style="background-color: rgba(255, 255, 255, 0.7); margin: 10%;">
                <div class="row justify-content-center">
                    <h2 class="text-dark pt-3">Nueva receta</h2>
                    <p>Rellena este formulario para crear una deliciosa receta</p>
                    <hr>
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
                                <option value="sin requerimientos">Sin requerimientos</option>
                                <option value="vegetariana">Vegetariana</option>
                                <option value="vegana">Vegana</option>
                            </select>
                       </div>
                   </div>
                   $htmlErroresGlobales
                   <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 mb-4">
                        <button type="submit" class="btn btn-dark">Crear</button>  
                   </div>  
                </div> 
            </div>                     
        </div>     
	</div>
EOS;
        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $titulo =$datos['titulo'] ?? null;
        $textoReceta =$datos['receta'] ?? null;
        $categoria =$datos['categoria'] ?? null;
        $idNutricionista = $_SESSION['idUsuario'];


        if (count($result) === 0) {
            $dao = new RecetaDAO();

            $receta = new Receta();
            $receta->setIdNutricionista($idNutricionista);
            $receta->setReceta($textoReceta);
            $receta->setCategoria($categoria);
            $receta->setTitulo($titulo);

            $id = $dao->crearReceta($receta);

            $result = RUTA_APP . "/verReceta.php?id=$id";
        }
        return $result;
    }
}