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

        $form = <<<EOS
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 py-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-at"></i>
                        </span>
                    </div>
                    <input title="Dirección email" class="form-control aria-describedby='emailHelp'" 
                    type="email" name="email"  id="emailLogin" placeholder="Dirección email">
                </div>
                <div id="emailHelp" class="form-text">
                    <i class="fas fa-info-circle"></i>
                    Tus datos están a salvo con nosotros.
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 pb-3">
                <div class="input-group">
                    <div class="input-group-prepend" >
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>  
                    <input title="Contraseña" class="form-control" type="password" name="password" id="passwordLogin"
                    placeholder="Contraseña">
                </div>
            </div>
            <h5 id="errorLogin" class="m-0 mb-3 text-danger">$htmlErroresGlobales</h5>
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 mb-3">
                <button type="submit" class="btn btn-dark">Login</button>
            </div>       
        EOS;

        $html = formJumbo("https://s1.1zoom.me/b5249/490/Closeup_15_kg_Barbell_514746_1366x768.jpg",
            "Login", "Rellena el formulario para acceder a tu cuenta", $form);

        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $email = htmlspecialchars(trim(strip_tags($datos['email']))) ?? null;
        $password = htmlspecialchars(trim(strip_tags($datos['password']))) ?? null;

        $usuario = checkLogin($email, $password);
        if ( ! $usuario ) {
            $result[] = "El usuario o el password no coinciden";
        } else {
            $result = RUTA_APP . "/perfil.php";
        }
        return $result;
    }
}