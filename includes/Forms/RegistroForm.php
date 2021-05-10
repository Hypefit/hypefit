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
        <fieldset>
            $htmlErroresGlobales
            <legend>Rellena el formulario</legend>
            <p><label>Nombre:</label> <input type="text" name="nombre" value="$nombre" required/></p> $errorNombre
            <p><label>Email:</label> <input type="email" name="email" value="$email" required/></p> $errorEmail
            <p><label>Contraseña:</label> <input type="password" name="password" required/></p> $errorPassword
            <p><label>Confirma tu contraseña:</label> <input type="password" name="password2" required/></p> $errorPassword2
            <p><label>Rol:</label></p> <select name="rol" required>
                <option value="registrado" selected>Usuario Regular</option>
                <option value="entrenador">Entrenador</option>
                <option value="nutricionista">Nutricionista</option>
            </select>
            <button type="submit">Entrar</button>
        </fieldset>
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