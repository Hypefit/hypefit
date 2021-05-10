<?php

namespace hypefit\Forms;

require_once 'includes/config.php';
require_once 'includes/funcionesUsuario.php';

class LoginForm extends Form {
    public function __construct() {
        parent::__construct('LoginForm');
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $email =$datosIniciales['email'] ?? '';

        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $html = <<<EOS
        <fieldset>
		<legend>Usuario y contraseña</legend>
		$htmlErroresGlobales
			<p><label>Email:</label> <input type="email" name="email" value="$email" /></p> 
			<p><label>Contraseña:</label> <input type="password" name="password" required/></p>
			<button type="submit">Entrar</button>
		</fieldset>
EOS;
    return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $email =$datos['email'] ?? null;
        $password = $datos['password'] ?? null;

        //TODO: no habría que limpiar con htmlspecialchars?

        $usuario = checkLogin($email, $password);
        if ( ! $usuario ) {
            $result[] = "El usuario o el password no coinciden";
        } else {
            $result = RUTA_APP . "/perfil.php";
        }
        return $result;
    }
}