<?php

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
$tituloPagina = 'Hypefit | Crear Rutina';

$contenidoPrincipal = <<<EOS
		
		<div id="contenido">
			<h1> NUEVA RUTINA </h1>
			

EOS;
if(esEntrenador()){
    $contenidoPrincipal .= <<<EOS
    <form action="includes/procesarCrearRutina.php" method="POST">
		<fieldset>
			<p><label>Título: </label> <input type="text" name="titulo" /></p>
			<p><label>Contenido:</label> <input type="texto" name="rutina" /></p>
			<p><label>Categoría:</label><select name="categoria">
	            <option>Inferior </option>
	            <option>Superior </option>
            	<option>Full </option>
            </select></p>
			<button type="submit">Entrar</button>
		</fieldset>
	</form>
EOS;
}
else{
    $contenidoPrincipal .= " No eres entrenador de Hypefit";
}

require __DIR__ . '/includes/comun/layout.php';