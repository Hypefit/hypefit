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
        <div class="mask signup-form col-xs-12 col-sm-10 col-md-9" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%;">
                <div class="row justify-content-center">
                        $htmlErroresGlobales
                        <h2 class="text-dark">Regístrate</h2>
                        <p>Rellena este formulario para crear una cuenta</p>
                        <hr>
                        <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-address-card"></i>
                                    </span>
                                </div>
                                <input title="Nombre de usuario" class="form-control" type="text" name="nombre" placeholder="Nombre"  required>
                            </div>
                        </div> $errorNombre
                        <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-at"></i>
                                    </span>
                                </div>
                                <input  title="Dirección email" class="form-control" type="email" name="email" placeholder="Dirección email" 
                                required>
                            </div>
                        </div> $errorEmail
                       <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div> 
			                     <input title="Contraseña" class="form-control" type="password" name="password" placeholder="Contraseña" 
			                     required>
                            </div>
                       </div> $errorPassword
                       <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                        <i class="fa fa-check"></i>
                                    </span>
                                </div> 
			                    <input title="Confirma la contraseña" class="form-control" type="password" name="password2" 
			                    placeholder="Confirma la contraseña" required>
                            </div>
                       </div> $errorPassword2
                       <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7">
                           <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <select title="Rol" class="form-select" name="rol" required>
                                    <option selected>Rol</option>
                                    <option value="registrado">Usuario Regular</option>
                                    <option value="entrenador">Entrenador</option>
                                    <option value="nutricionista">Nutricionista</option>
                                </select>
                           </div>
                       </div>
                       <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7">
                            <button type="submit" class="btn btn-dark">Registrarse</button>  
                       </div>                
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Jumbotron -->
        
EOS;
        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $email =$datos['email'] ?? null;
        if ( empty($email) || ! filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            $result['email'] = "Debe introducir un email válido";
        }
        $nombre =$datos['nombre'] ?? null;
        if ( empty($nombre) || mb_strlen($nombre) < 5 ) {
            $result['nombre'] = "El nombre tiene que tener una longitud de al menos 5 caracteres.";
        }
        $password =$datos['password'] ?? null;
        if ( empty($password) || mb_strlen($password) < 5 ) {
            $result['password'] = "El password tiene que tener una longitud de al menos 5 caracteres.";
        }
        $password2 =$datos['password2'] ?? null;
        if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
            $result['password2'] = "Los passwords deben coincidir";
        }
        $rol =$datos['rol'] ?? null;

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