<?php
require __DIR__.'/includes/config.php';

$tituloPagina= 'Hypefit | Registro';

$contenidoPrincipal = <<<EOS
<h1>Regístrate a Hypefit</h1>
<form action="/includes/procesarRegistro.php" method="POST">
    <fieldset>
        <legend>Usuario y contraseña</legend>
        <p><label>Name:</label> <input type="text" name="name" required/></p>
        <p><label>Password:</label> <input type="password" name="password" required/></p>
        <p><label>Email:</label> <input type="email" name="email" required/></p>
        <p><label>Rol:</label></p> <select name="rol" required>
            <option value="regular" selected>Usuario Regular</option>
            <option value="entrenador">Entrenador</option>
            <option value="cheff">Cheff</option>
        </select>
        <button type="submit">Entrar</button>
    </fieldset>
</form>
EOS;

require __DIR__.'/includes/comun/layout.php';