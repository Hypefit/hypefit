<?php
require __DIR__.'/includes/config.php';

$tituloPagina= 'Hypefit | Registro';

$contenidoPrincipal = <<<EOS
<h1>Regístrate a Hypefit</h1>
<form action="/includes/procesarLogin.php" method="POST">
    <fieldset>
        <legend>Usuario y contraseña</legend>
        <p><label>Name:</label> <input type="text" name="nombre" /></p>
        <p><label>Password:</label> <input type="password" name="password" /></p>
        <p><label>Email:</label> <input type="email" name="email" /></p>
        <button type="submit">Entrar</button>
    </fieldset>
</form>
EOS;

require __DIR__.'/includes/comun/layout.php';