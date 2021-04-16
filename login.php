<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/autorizacion.php';

$tituloPagina= 'Hypefit | Login';

if (!estaLogado()) {
    $contenidoPrincipal = <<<EOS
	<h1>Haz login en Hypefit</h1>
	<form action="includes/procesarLogin.php" method="POST">
		<fieldset>
		<legend>Usuario y contraseña</legend>
			<p><label>Email:</label> <input type="email" name="email" required /></p>
			<p><label>Contraseña:</label> <input type="password" name="password" required/></p>
			<button type="submit">Entrar</button>
		</fieldset>
	</form>
EOS;
} else {
    $contenidoPrincipal = <<<EOS
    <h1>Haz login en Hypefit</h1>
    <p>¡Ya has iniciado sesión! Puedes acceder a <a href="perfil.php">tu perfil</a> o <a href="logout.php">desconectarte</a>.</p>
EOS;

}

	
require __DIR__.'/includes/comun/layout.php';