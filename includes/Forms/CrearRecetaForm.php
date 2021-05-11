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
        <fieldset>
            $htmlErroresGlobales
			<p><label>Título: </label> <input type="text" name="titulo" required /></p>
			<p><label>Contenido:</label> <input type="text" name="receta" required /></p>
			<p><label>Categoría:</label><select name="categoria">
	            <option value="normal">Normal</option>
	            <option value="vegetariana">Vegetariana</option>
            	<option value="vegana">Vegana</option>
            </select></p>
			<button type="submit">Subir</button>
        </fieldset>
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