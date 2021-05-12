<?php

namespace hypefit\Forms;

use hypefit\DAO\UsuarioDAO;

require_once 'includes/config.php';
require_once 'includes/autorizacion.php';

class AprobarUsuariosForm extends Form {
    public function __construct() {
        parent::__construct('AprobarUsuarioForm');
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $dao = new UsuarioDAO();
        $usuariosSinAprobar = $dao->getUsuariosSinAprobar();

        $html = $htmlErroresGlobales; 
        foreach($usuariosSinAprobar as $usuario) {
            $html .= '<input class = "form-check-label"type="checkbox" name="marcados[]" style = "margin:2%" value="' . $usuario->getId() . '"/>' . $usuario->getNombre() . ' | Rol: ' . ucwords($usuario->getRol());
            $html .= "<br>";
        }
        $html .= '<button type="submit" class="btn btn-dark" name="aprobar" value="Aprobar" style="margin: 2% ">Enviar</button>';
        $html .= '<button type="submit" class="btn btn-dark" name="eliminar" value="Eliminar" style="margin: 2%" >Eliminar</button>';
        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $marcados = $datos['marcados'] ?? null;
        $aprobar = $datos['aprobar'] ?? null;

        if (count($result) === 0) {
            if (!empty($marcados)) {
                $dao = new UsuarioDAO();
                /** @noinspection PhpWrongForeachArgumentTypeInspection */
                foreach ($marcados as $id) {
                    if (isset($aprobar)) {
                        $dao->aprobarUsuario($id);
                    } else { // Suponemos que se ha marcado eliminar entonces
                        $dao->eliminarUsuario($id);
                    }
                }
            }
            
            $result = RUTA_APP . "/perfil.php";
        }
        return $result;
    }
}