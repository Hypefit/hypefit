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
        <div class="mask" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-black">
                    <fieldset>
                        <legend class="mt-4 mb-3">Usuario y contraseña</legend>
                        <div class="mb-3">
                            <label class="form-label">Email:</label> 
                            <input  class="form-control aria-describedby='emailHelp'" type="email" name="email" value="$email" />
                            <div id="emailHelp" class="form-text">
                                <i class="fas fa-info-circle"></i>
                                Tus datos están a salvo con nosotros.
                            </div>
                        </div>
                         <div class="mb-3">
			                <label class="form-label">Contraseña:</label> 
			                <input class="form-control" type="password" name="password" required/>
                        </div>
                        $htmlErroresGlobales
                        <button type="submit" class="btn btn-dark">Enviar</button>
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