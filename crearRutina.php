<?php

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
$tituloPagina = 'Hypefit | Crear Rutina';

if(esEntrenador() || esAdmin()){
    $contenidoPrincipal = <<<EOS
    <h1> Nueva rutina </h1>
    <form action="includes/procesarCrearRutina.php" method="POST" enctype="multipart/form-data">
		<fieldset>
			<p><label>Título: </label> <input type="text" name="titulo" /></p>
			<p><label>Contenido:</label> <input type="text" name="rutina" /></p>
			<p><label>Categoría:</label><select name="categoria">
	            <option value="superior">Inferior</option>
	            <option value="inferior">Superior</option>
            	<option value="full body">Full Body</option>
            </select></p>
            <p><label>Imagen:</label>Fichero: <input type="file" name="archivo" accept="image/jpeg, image/png, image/gif"/></p>
			<button type="submit">Entrar</button>
		</fieldset>
	</form>
EOS;
}
else{
    $contenidoPrincipal = "No eres entrenador de Hypefit o tu cuenta todavía no ha sido aprobada";
}

require __DIR__ . '/includes/comun/layout.php';