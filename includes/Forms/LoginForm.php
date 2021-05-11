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
<!-- Jumbotron -->
    <div class="p-5 text-center bg-image img-fluid"
        style="
            background-image: url(https://s1.1zoom.me/b5249/490/Closeup_15_kg_Barbell_514746_1366x768.jpg);
            opacity: 0.9;
            background-repeat: no-repeat;
            background-size: cover;
            width:  auto;
            height: 100%;
            margin: 5%;
        ">
        <div class="mask" style="background-color: rgba(255, 255, 255, 0.6); margin: 10%;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-black">
                    <fieldset>
                        $htmlErroresGlobales
                        <p></p>
                        
                        <legend>Usuario y contraseña</legend>
                        <p><label class="col-sm-4">Email:</label> <input type="email" name="email" value="$email" /></p> 
			            <p><label class="col-sm-4">Contraseña:</label> <input type="password" name="password" required/></p>
                        <p></p>
                        <button type="submit">ENTRAR</button>
                        <h5></h5>
                        <p></p>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
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