<?php

require_once __DIR__ . '/includes/config.php';
$tituloPagina = 'Hypefit | Ver post';

$idPost = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
$contenidoPrincipal = mostrarPost($idPost);
if (estaLogado()) {
    $contenidoPrincipal .= <<<EOS
		<h2>Responder</h2>
		<form action="procesarCrearComentario.php" method="POST">
			<input type="hidden" name="idPost" value="$idPost" />
			<fieldset>
				<div><label for="mensaje">Respuesta: </label><input id="mensaje" type="text" name="mensaje" /></div>
				<div><button type="submit">Crear</button></div>
			</fieldset>
		</form>
	EOS;
}


require __DIR__ . '/includes/comun/layout.php';
