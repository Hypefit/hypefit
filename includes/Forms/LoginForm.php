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
                    type="email" name="email"  placeholder="Dirección email" required>
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
                    <input title="Contraseña" class="form-control" type="password" name="password" 
                    placeholder="Contraseña" required>
                </div>
            </div>
            $htmlErroresGlobales
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
        $email =$datos['email'] ?? null;
        $password = $datos['password'] ?? null;

        $usuario = checkLogin($email, $password);
        if ( ! $usuario ) {
            $result[] = "El usuario o el password no coinciden";
        } else {
            $result = RUTA_APP . "/perfil.php";
        }
        return $result;
    }
}