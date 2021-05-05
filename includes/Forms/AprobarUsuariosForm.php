<?php

namespace hypefit\Forms;

use hypefit\DAO\UsuarioDAO;

require_once '../autorizacion.php';

class AprobarUsuarioForm extends Form {
    public function __construct() {
        parent::__construct('AprobarUsuarioForm');
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $dao = new UsuarioDAO();
        $usuariosSinAprobar = $dao->getUsuariosSinAprobar();

        $html = $htmlErroresGlobales; 
        foreach($usuariosSinAprobar as $usuario) {
            $html .= '<input type="checkbox" name="marcados[]" value="' . $usuario->getId() . '"/>' . $usuario->getNombre() . ' | Rol: ' . ucwords($usuario->getRol());
            $html .= "<br>";
        }
        $html .= '<input type="submit" name="aprobar" value="Aprobar" />';
        $html .= '<input type="submit" name="eliminar" value="Eliminar" />';
        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $marcados = $datos['marcados'] ?? null;
        $aprobar = $datos['aprobar'] ?? null;

        if (count($result) === 0) {
            if (!empty($marcados)) {
                $dao = new UsuarioDAO();
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