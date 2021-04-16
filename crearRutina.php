<?php

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
$tituloPagina = 'Hypefit | Crear Rutina';

if( (esEntrenador() && estaAprobado()) || esAdmin()){
    $contenidoPrincipal = <<<EOS
    <h1> Nueva rutina </h1>
    <form action="includes/procesarCrearRutina.php" method="POST" enctype="multipart/form-data">
		<fieldset>
			<p><label>Título: </label> <input type="text" name="titulo" required /></p>
			<p><label>Contenido:</label> <input type="text" name="rutina" required /></p>
			<p><label>Categoría:</label><select name="categoria">
	            <option value="superior">Inferior</option>
	            <option value="inferior">Superior</option>
            	<option value="full body">Full Body</option>
            </select></p>
			<button type="submit">Subir</button>
		</fieldset>
	</form>
EOS;
}
else{
    $contenidoPrincipal = "<p>No eres entrenador de Hypefit o tu cuenta todavía no ha sido aprobada.</p>";
}

require __DIR__ . '/includes/comun/layout.php';