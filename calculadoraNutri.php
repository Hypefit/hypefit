<?php

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';

$tituloPagina = 'Hypefit | Calculadora Nutricional';


$contenidoPrincipal = <<<EOS
    <h1>Calculadora Nutricional HypeFit</h1>
    <h1>Utiliza nuestra calculadora nutricional para saber si has logrado tus objetivos</h1>
    <form action="includes/procesarNutri.php" method="POST">
        <fieldset>
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
    </form>
EOS;

require __DIR__ . '/includes/comun/layout.php';
