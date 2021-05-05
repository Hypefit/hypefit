<?php

namespace hypefit\Forms;

use hypefit\DAO\RutinaDAO;
use hypefit\TO\Rutina;

class CrearRutinaForm extends Form {
    public function __construct() {
        parent::__construct('CrearRutinaForm');
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $html = <<<EOS
        <fieldset>
            $htmlErroresGlobales
			<p><label>Título: </label> <input type="text" name="titulo" required /></p>
			<p><label>Contenido:</label> <input type="text" name="rutina" required /></p>
			<p><label>Categoría:</label><select name="categoria">
	            <option value="superior">Inferior</option>
	            <option value="inferior">Superior</option>
            	<option value="full body">Full Body</option>
            </select></p>
			<button type="submit">Subir</button>
        </fieldset>
EOS;
        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $titulo =$datos['titulo'] ?? null;
        $textoRutina =$datos['rutina'] ?? null;
        $categoria =$datos['categoria'] ?? null;
        $idEntrenador = $_SESSION['idUsuario'];


        if (count($result) === 0) {
            $dao = new RutinaDAO();

            $rutina = new Rutina();
            $rutina->setIdEntrenador($idEntrenador);
            $rutina->setRutina($textoRutina);
            $rutina->setCategoria($categoria);
            $rutina->setTitulo($titulo);

            $id = $dao->crearRutina($rutina);

            header("Location: ../verRutina.php?id=$id");
        }
        return $result;
    }
}