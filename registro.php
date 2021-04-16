<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/autorizacion.php';

$tituloPagina= 'Hypefit | Registro';

if (!estaLogado()) {
    $contenidoPrincipal = <<<EOS
    <h1>Regístrate en Hypefit</h1>
    <form action="includes/procesarRegistro.php" method="POST">
        <fieldset>
            <legend>Rellena el formulario</legend>
            <p><label>Nombre:</label> <input type="text" name="name" required/></p>
            <p><label>Contraseña:</label> <input type="password" name="password" required/></p>
            <p><label>Email:</label> <input type="email" name="email" required/></p>
            <p><label>Rol:</label></p> <select name="rol" required>
                <option value="registrado" selected>Usuario Regular</option>
                <option value="entrenador">Entrenador</option>
                <option value="nutricionista">Nutricionista</option>
            </select>
            <button type="submit">Entrar</button>
        </fieldset>
    </form>
    EOS;
} else {
    $contenidoPrincipal = <<<EOS
    <h1>Regístrate en Hypefit</h1>
    <p>¡Ya has iniciado sesión! Puedes acceder a <a href="perfil.php">tu perfil</a> o <a href="logout.php">desconectarte</a>.</p>
EOS;
}


require __DIR__.'/includes/comun/layout.php';