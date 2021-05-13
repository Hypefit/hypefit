<?php

namespace hypefit\Forms;

require_once 'includes/config.php';

class CalculadoraForm extends Form
{
    public function __construct() {
        parent::__construct('CalculadoraForm');
    }


    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $calorias = $errores['calorias'] ?? '';
        $proteinas = $errores['proteinas'] ?? '';
        $grasas = $errores['grasas'] ?? '';
        $carbos = $errores['carbos'] ?? '';

        $html = <<<EOS
        <fieldset>
            $htmlErroresGlobales
		            <legend>Rellena los datos sobre tu alimentación en las 5 comidas del dia:</legend>
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
            
            <p>Tu resultado:</p>
            <p>Calorías consumidas: $calorias</p>
            <p>Proteínas consumidas: $proteinas</p>
            <p>Grasas consumidas: $grasas</p>
            <p>Carbohidratos consumidos: $carbos</p>
            
        </fieldset>
EOS;
        return $html;
    }

   protected function procesaFormulario($datos) {
        $result = array();

        $calorias   =$datos['calorias'] ?? null;
        $calorias2  =$datos['calorias2'] ?? null;
        $calorias3  =$datos['calorias3'] ?? null;
        $calorias4  =$datos['calorias4'] ?? null;
        $calorias5  =$datos['calorias5'] ?? null;

       $result['calorias'] = $calorias + $calorias2 + $calorias3 + $calorias4 + $calorias5;

       $proteinas  =$datos['proteinas'] ?? null;
       $proteinas2 =$datos['proteinas2'] ?? null;
       $proteinas3 =$datos['proteinas3'] ?? null;
       $proteinas4 =$datos['proteinas4'] ?? null;
       $proteinas5 =$datos['proteinas5'] ?? null;

       $result['proteinas'] = $proteinas + $proteinas2 + $proteinas3 + $proteinas4 + $proteinas5;

       $grasas  =$datos['grasas'] ?? null;
       $grasas2 =$datos['grasas2'] ?? null;
       $grasas3 =$datos['grasas3'] ?? null;
       $grasas4 =$datos['grasas4'] ?? null;
       $grasas5 =$datos['grasas5'] ?? null;

       $result['grasas'] = $grasas + $grasas2 + $grasas3 + $grasas4 + $grasas5;

       $carbos  =$datos['carbos'] ?? null;
       $carbos2 =$datos['carbos2'] ?? null;
       $carbos3 =$datos['carbos3'] ?? null;
       $carbos4 =$datos['carbos4'] ?? null;
       $carbos5 =$datos['carbos5'] ?? null;

       $result['carbos'] = $carbos + $carbos2 + $carbos3 + $carbos4 + $carbos5;

        return $result;
    }




}