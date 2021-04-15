<?php
require_once __DIR__.'/includes/config.php';

$tituloPagina= 'Hypefit | Login';

$contenidoPrincipal = <<<EOS
	<div id="contenido">
		<h1>Haz login en Hypefit</h1>
		<form action="includes/procesarLogin.php" method="POST">
		<fieldset>
		<legend>Usuario y contraseña</legend>
			<p><label>Email:</label> <input type="email" name="email" required /></p>
			<p><label>Contraseña:</label> <input type="password" name="password" required/></p>
			<button type="submit">Entrar</button>
		</fieldset>
	</form>
	</div>
EOS;
	
require __DIR__.'/includes/comun/layout.php';