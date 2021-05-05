<?php

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';

$tituloPagina = 'Hypefit | Calculadora Nutricional';

if (estaLogado()) {
    $contenidoPrincipal = <<<EOS
    <h1>Calculadora Nutricional HypeFit</h1>
    <h1>Utiliza nuestra calculadora nutricional para saber si has logrado tus objetivos</h1>
    <form action="includes/procesarNutri.php" method="POST">
        <fieldset>
            <legend>Rellena los datos sobre tu rutina y alimentación:</legend>
            <p><label>Peso actual:</label> <input type="text" name="pesoA" required/></p>
            <p><label>Peso objetivo:</label> <input type="text" name="pesoO" required/></p>
            <p><label>¿Cuál es tu objetivo calórico?</label></p> <select name="objetivo" required>
                <option value="Déficit Calórico" selected> Déficit Calórico</option>
                <option value="Equilibrio Calórico">Equilibrio Calórico</option>
                <option value="Superávit Calórico">Superávit Calórico</option>
            </select>
            
            <p><label>Calorías:</label> <input type="number" name="calorias" required/></p>
            <p><label>Proteínas:</label> <input type="number" name="proteinas" required/></p>
            
            <p><label>Ejercicio realizado:</label> <input type="text" name="ejercicio" required/></p>
            <p><label>Tiempo de ejercicio realizado:</label> <input type="number" name="tiempo" required/></p>

            <button type="Calcular">Calcular</button>
        </fieldset>
    </form>
    EOS;


require __DIR__ . '/includes/comun/layout.php';