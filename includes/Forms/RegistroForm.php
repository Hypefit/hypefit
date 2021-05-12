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
        <div class="mask" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-black">
                    <fieldset>
                        $htmlErroresGlobales
                        <legend class="mt-4 mb-3">Rellena el formulario</legend>
                        <div class="mb-3">
                            <label class="form-label">Nombre:</label> 
                            <input  class="form-control" type="nombre" name="nombre" value="$nombre" required />
                        </div> $errorNombre
                        <div class="mb-3">
                            <label class="form-label">Email:</label> 
                            <input  class="form-control aria-describedby='emailHelp'" type="email" name="email" value="$email" required />
                        </div> $errorEmail
                        <div class="mb-3">
			                <label class="form-label">Contraseña:</label> 
			                <input class="form-control" type="password" name="password" required/>
                        </div> $errorPassword
                        <div class="mb-3">
			                <label class="form-label">Repite tu contraseña:</label> 
			                <input class="form-control" type="password" name="password2" required/>
                        </div> $errorPassword2
                        <div class="mb-3">Rol: </label> <select class="form-control" name="rol" required>
                            <option value="registrado" selected>Usuario Regular</option>
                            <option value="entrenador">Entrenador</option>
                            <option value="nutricionista">Nutricionista</option>
                        </select></p>
                        <h5></h5>
                        <button type="submit" class="btn btn-dark">Enviar</button>                  
                        <p></p>
                    </fieldset>
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
            $resultado = crearUsuario($email, $password, $nombre, $rol);
            if (!$resultado) {
                $result[] = "El usuario ya existe";

            } else {
                $result = RUTA_APP . "/perfil.php";
            }
        }
        return $result;
    }
}