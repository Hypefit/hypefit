<?php

namespace hypefit\Forms;
require_once 'includes/config.php';
require_once 'includes/funcionesUsuario.php';

class RegistroForm extends Form {
    public function __construct() {
        parent::__construct('RegistroForm');
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $email =$datosIniciales['email'] ?? '';
        $nombre =$datosIniciales['nombre'] ?? '';

        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $errorEmail = self::createMensajeError($errores, "email");
        $errorNombre = self::createMensajeError($errores, "nombre");
        $errorPassword = self::createMensajeError($errores, "password");
        $errorPassword2 = self::createMensajeError($errores, "password2");
        $errorRol = self::createMensajeError($errores, "rol");

        $form = <<<EOS
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 pb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-address-card"></i>
                        </span>
                    </div>
                    <input title="Nombre de usuario" class="form-control" type="text" name="nombre" 
                    placeholder="Nombre" id="nombreRegistro">
                </div>
                <p id="errorUser" class="m-0 mt-1 text-danger">$errorNombre</p>
            </div> 
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 pb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-at"></i>
                        </span>
                    </div>
                    <input  title="Dirección email" class="form-control" type="email" name="email" 
                    placeholder="Dirección email" id="emailRegistro">
                </div>
                <p id="errorEmail" class="m-0 mt-1 text-danger">$errorEmail</p>
            </div> 
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 pb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div> 
                     <input title="Contraseña" class="form-control" type="password" name="password" 
                     placeholder="Contraseña" id="passwordRegistro">
                </div>
                <p id="errorPass" class="m-0 mt-1 text-danger">$errorPassword</p>
            </div> 
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 pb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    <input title="Confirma la contraseña" class="form-control" type="password" name="password2" 
                    placeholder="Confirma la contraseña" id="password2Registro">
                </div>
                <p id="errorPass2" class="m-0 mt-1 text-danger">$errorPassword2</p>
            </div> 
            <div class="form-group  col-sm-10 col-md-9 col-lg-7 pb-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                    <select id="rolRegistro" title="Rol" class="form-select" name="rol" required>
                        <option value = "rol" selected>Rol</option>
                        <option value="registrado">Usuario Regular</option>
                        <option value="entrenador">Entrenador</option>
                        <option value="nutricionista">Nutricionista</option>
                    </select>
                </div>
                <p id="errorRol" class="m-0 mt-1 text-danger">$errorRol</p>
           </div>
           <h5 id="errorSubmit" class="m-0 mb-3 text-danger">$htmlErroresGlobales</h5>
           <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 mb-4">
                <button type="submit" class="btn btn-dark">Registrarse</button>  
           </div>  
        EOS;

        $html = formJumbo("https://s1.1zoom.me/b5249/490/Closeup_15_kg_Barbell_514746_1366x768.jpg",
            "Regístrate", "Rellena este formulario para crear una cuenta", $form);

        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $email = htmlspecialchars(trim(strip_tags($datos['email']))) ?? null;
        if ( empty($email) || ! filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            $result['email'] = "Debe introducir un email válido";
        }
        $nombre = htmlspecialchars(trim(strip_tags($datos['nombre']))) ?? null;
        if ( empty($nombre) || mb_strlen($nombre) < 5 ) {
            $result['nombre'] = "El nombre tiene que tener una longitud de al menos 5 caracteres.";
        }
        $password = htmlspecialchars(trim(strip_tags($datos['password']))) ?? null;
        if ( empty($password) || mb_strlen($password) < 5 ) {
            $result['password'] = "El password tiene que tener una longitud de al menos 5 caracteres.";
        }
        $password2 = htmlspecialchars(trim(strip_tags($datos['password2']))) ?? null;
        if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
            $result['password2'] = "Los passwords deben coincidir";
        }
        $rol = htmlspecialchars(trim(strip_tags($datos['rol']))) ?? null;
        if($rol == 'rol'){
            $result['rol']="Selecciona un rol";
        }

        if (count($result) === 0) {
            $resultado = crearUsuario($email, $nombre, $password, $rol);
            if (!$resultado) {
                $result[] = "El usuario ya existe";

            } else {
                $result = RUTA_APP . "/perfil.php";
            }
        }
        return $result;
    }
}