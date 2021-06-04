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
            <div class="container py-5  text-center my-5 rounded shadow"
                style="background-color: rgba(215,233,247,0.85);">
                <h2 class="pb-2 mb-3">Usuarios sin aprobar</h2>
                
                <!--Row-->
                <div class="row justify-content-center align-items-center">
                    <div class="form-check col-10 col-sm-6">                       
                        <label class="form-check-label " for="flexCheck">
                            <input class="form-check-input me-2" type="checkbox" value="' . $usuario->getId() . '"
                                 id="flexCheck" name="marcados[]"/>
                            <p class="ms-1">
                                 <span class="fw-bold">' . $usuario->getNombre() . '</span> 
                                 <i class="fas fa-hand-point-right px-2"></i> 
                                 Rol: ' . ucwords($usuario->getRol()) . '
                            </p>
                        </label>
                    </div>
                </div>
                <!--Row-->
                
                <!--Row-->
                <div class="row justify-content-center align-items-center mt-5">
                    <button type="submit" class="btn btn-dark mx-2 col-3" name="aprobar" value="Aprobar">Enviar</button>
                    <button type="submit" class="btn btn-dark mx-2 col-3" name="eliminar" value="Eliminar">Eliminar</button>
                </div>
                <!--Row-->
                 
             </div>
            ';
        }
       return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $marcados = htmlspecialchars(trim(strip_tags($datos['marcados']))) ?? null;
        $aprobar = htmlspecialchars(trim(strip_tags($datos['aprobar']))) ?? null;

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