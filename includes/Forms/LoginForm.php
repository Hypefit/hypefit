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
        <div class="row justify-content-center">
            <div class="mask login-form col-xs-12 col-sm-10 col-md-9" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%;">
                <div class="row justify-content-center">
                    $htmlErroresGlobales
                    <h2 class="text-dark">Login</h2>
                        <p>Rellena el formulario para acceder a tu cuenta</p>
                        <hr>
                        <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-at"></i>
                                    </span>
                                </div>
                                <input title="Dirección email" class="form-control aria-describedby='emailHelp'" type="email" name="email" 
                                placeholder="Dirección email" required>
                            </div>
                            <div id="emailHelp" class="form-text">
                                <i class="fas fa-info-circle"></i>
                                Tus datos están a salvo con nosotros.
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>  
                                <input title="Contraseña" class="form-control" type="password" name="password" 
                                placeholder="Contraseña" required>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7">
                            <button type="submit" class="btn btn-dark">Login</button>
                        </div>
                    </div>
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