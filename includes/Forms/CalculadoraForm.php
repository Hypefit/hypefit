<?php

namespace hypefit\Forms;

use hypefit\DAO\RecetaDAO;
use hypefit\TO\Receta;

class CalculadoraForm extends Form
{
    public function __construct() {
        parent::__construct('CalculadoraForm');
    }


    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $html = <<<EOS
        <fieldset>
            $htmlErroresGlobales
		            <legend>Rellena los datos sobre tu alimentación:</legend>
            <p><label>¿Cuál es tu objetivo calórico?</label></p> <select name="objetivo" required>
                <option value="Déficit Calórico" selected> Déficit Calórico</option>
                <option value="Equilibrio Calórico">Equilibrio Calórico</option>
                <option value="Superávit Calórico">Superávit Calórico</option>
            </select>
            
            <h3>Comida número 1:</h3>
            <p><label>Calorías :</label> <input type="number" name="calorias" required/></p>
            <p><label>Proteínas:</label> <input type="number" name="proteinas" required/></p>
            <p><label>Grasas:</label> <input type="number" name="grasas" required/></p>
            <p><label>Carbohidratos:</label> <input type="number" name="carbos" required/></p>
          
             <h3>Comida número 2</h3>
            <p><label>Calorías :</label> <input type="number" name="calorias2" required/></p>
            <p><label>Proteínas:</label> <input type="number" name="proteinas2" required/></p>
            <p><label>Grasas:</label> <input type="number" name="grasas2" required/></p>
            <p><label>Carbohidratos:</label> <input type="number" name="carbos2" required/></p>
            
               <h3>Comida número 3</h3>
            <p><label>Calorías :</label> <input type="number" name="calorias3" required/></p>
            <p><label>Proteínas:</label> <input type="number" name="proteinas3" required/></p>
            <p><label>Grasas:</label> <input type="number" name="grasas3" required/></p>
            <p><label>Carbohidratos:</label> <input type="number" name="carbos3" required/></p>
            
               <h3>Comida número 4</h3>
            <p><label>Calorías :</label> <input type="number" name="calorias4" required/></p>
            <p><label>Proteínas:</label> <input type="number" name="proteinas4" required/></p>
            <p><label>Grasas:</label> <input type="number" name="grasas4" required/></p>
            <p><label>Carbohidratos:</label> <input type="number" name="carbos4" required/></p>
            
            
               <h3>Comida número 5</h3>
            <p><label>Calorías :</label> <input type="number" name="calorias5" required/></p>
            <p><label>Proteínas:</label> <input type="number" name="proteinas5" required/></p>
            <p><label>Grasas:</label> <input type="number" name="grasas5" required/></p>
            <p><label>Carbohidratos:</label> <input type="number" name="carbos5" required/></p>
          
            <button type="Calcular">Calcular</button>
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