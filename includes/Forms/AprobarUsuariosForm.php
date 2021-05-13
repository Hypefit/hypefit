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
            $html .= '
            <div class="container">
                <div class="row justify-content-center align-items-center"
                    <div class="form-check">
                        <input class="form-check-input p-0 col-3" type="checkbox" value="' . $usuario->getId() . '"
                         id="flexCheck" name="marcados[]">
                        
                        <label class="form-check-label col-4 mx-0" for="flexCheck"
                            style = "margin:2%">
                               <p class="m-0">
                                    <span class="fw-bold">' . $usuario->getNombre() . '</span> 
                                    <i class="fas fa-hand-point-right px-2"></i> 
                                    Rol: ' . ucwords($usuario->getRol()) . '</p>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-dark" name="aprobar" value="Aprobar" style="margin: 2% ">Enviar</button>
                    <button type="submit" class="btn btn-dark" name="eliminar" value="Eliminar" style="margin: 2%" >Eliminar</button>
                </div>
            </div>
            <br>
            ';
        }
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