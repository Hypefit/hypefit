<?php

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';

$tituloPagina = 'Hypefit | Crear Post';

if(estaLogado()){
    $contenidoPrincipal = <<<EOS
    <h1> Nuevo post </h1>
    <form action="includes/procesarCrearPost.php" method="POST" enctype="multipart/form-data">
		<fieldset>
			<p><label>Título: </label> <input type="text" name="titulo" required /></p>
			<p><label>Mensaje:</label> <input type="text" name="mensaje" required /></p>
			<button type="submit">Publicar</button>
		</fieldset>
	</form>
EOS;
}
else{
    $contenidoPrincipal = "No estás autenticado.";
}

require __DIR__ . '/includes/comun/layout.php';