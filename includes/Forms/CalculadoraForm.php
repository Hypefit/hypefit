<?php

namespace hypefit\Forms;

require_once 'includes/config.php';
require_once 'includes/comun/jumbotron.php';
require_once 'includes/funcionesUsuario.php';

class CalculadoraForm extends Form{
    public function __construct() {
        $opciones = array();
        $opciones['action'] =  "#resultadoCalculadora";
        parent::__construct('CalculadoraForm', $opciones);
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $calorias = $errores['calorias'] ?? '';
        $proteinas = $errores['proteinas'] ?? '';
        $grasas = $errores['grasas']?? '';
        $carbos = $errores['carbos'] ?? '';

        $macros = ["calorias","Calorías","proteinas","Proteínas","grasas","Grasas","carbos","Carbohidratos"];

        //Jumbotron
        $html = mostrarJumbo("https://planetadelhogar.com/wp-content/uploads/2019/10/ray-reyes-3xwrg7Vv6Ts-unsplash-1536x1024.jpg",
            "Calculadora Nutricional","Averigua cuántos macros consumes al día");

        $form = "";
        $required="required";
        //Contenido
        for ($i = 1; $i <= 5; $i++){
           $form .= "<h3 class='text-dark pb-2'>Comida número {$i}</h3>";
           $pos = 0;
           if($i>2)$required="";
           for($j = 0; $j < 4; $j++){
               $form .= <<<EOS
               <div class="form-group col-xs-10 col-sm-8 col-md-7 col-lg-5 pb-3">
                    <div class="input-group">
                        <input title="{$macros[$pos+1]} {$i}ª" class="form-control" type="number" name="{$macros[$pos]}{$i}" 
                        placeholder="{$macros[$pos+1]} {$i}ª Comida" {$required}>
                    </div>
               </div>
EOS;
               $pos +=2;
           }
        }
        $form .=<<<EOS
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 mb-4">
                <button type="submit" class="btn btn-dark" href="#resultadoCalculadora">Calcular</button>  
            </div>
EOS;
        $html .= formJumbo("https://muysaludable.sanitas.es/wp-content/uploads/2018/09/6_tabla-nutricional2.jpg",
        "Rellena los datos sobre tu alimentación","",$form);

        $html .= "<div id='resultadoCalculadora'></div>";
        
        $titulo="<h3 class='text-uppercase'>Tu resultado:</h3>";
        $texto = " <h5>Calorías consumidas: {$calorias}  </h5>
                    <h5>Proteínas consumidas: {$proteinas} </h5>
                    <h5>Grasas consumidas: {$grasas} </h5>
                    <h5>Carbohidratos consumidos: {$carbos}</h5>";

        $html .= customizableJumbo("https://planetadelhogar.com/wp-content/uploads/2019/10/ray-reyes-3xwrg7Vv6Ts-unsplash-1536x1024.jpg",
           $titulo, "", $texto, "","py-2","");

        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();

        $calorias1  = htmlspecialchars(trim(strip_tags($datos['calorias1']))) != "" ?
            htmlspecialchars(trim(strip_tags($datos['calorias1']))): 0;
        $calorias2  = htmlspecialchars(trim(strip_tags($datos['calorias2']))) != "" ?
            htmlspecialchars(trim(strip_tags($datos['calorias2']))): 0;
        $calorias3  = htmlspecialchars(trim(strip_tags($datos['calorias3']))) != "" ?
            htmlspecialchars(trim(strip_tags($datos['calorias3']))): 0;
        $calorias4  = htmlspecialchars(trim(strip_tags($datos['calorias4']))) != "" ?
            htmlspecialchars(trim(strip_tags($datos['calorias4']))): 0;
        $calorias5  = htmlspecialchars(trim(strip_tags($datos['calorias5']))) != "" ?
            htmlspecialchars(trim(strip_tags($datos['calorias5']))): 0;

       $result['calorias'] = $calorias1 + $calorias2 + $calorias3 + $calorias4 + $calorias5;

       $proteinas1 = htmlspecialchars(trim(strip_tags($datos['proteinas1']))) != "" ?
           htmlspecialchars(trim(strip_tags($datos['proteinas1']))) : 0;
       $proteinas2 = htmlspecialchars(trim(strip_tags($datos['proteinas2']))) != "" ?
           htmlspecialchars(trim(strip_tags($datos['proteinas2']))) : 0;
       $proteinas3 = htmlspecialchars(trim(strip_tags($datos['proteinas3']))) != "" ?
            htmlspecialchars(trim(strip_tags($datos['proteinas3']))) : 0;
       $proteinas4 = htmlspecialchars(trim(strip_tags($datos['proteinas4']))) != "" ?
            htmlspecialchars(trim(strip_tags($datos['proteinas4']))) : 0;
       $proteinas5 = htmlspecialchars(trim(strip_tags($datos['proteinas5']))) != "" ?
            htmlspecialchars(trim(strip_tags($datos['proteinas5']))) : 0;

       $result['proteinas'] = $proteinas1 + $proteinas2 + $proteinas3 + $proteinas4 + $proteinas5;

       $grasas1 = htmlspecialchars(trim(strip_tags($datos['grasas1']))) !="" ?
           htmlspecialchars(trim(strip_tags($datos['grasas1']))) : 0;
       $grasas2 = htmlspecialchars(trim(strip_tags($datos['grasas2']))) !="" ?
           htmlspecialchars(trim(strip_tags($datos['grasas2']))) : 0;
       $grasas3 = htmlspecialchars(trim(strip_tags($datos['grasas3']))) !="" ?
           htmlspecialchars(trim(strip_tags($datos['grasas3']))) : 0;
       $grasas4 = htmlspecialchars(trim(strip_tags($datos['grasas4']))) !="" ?
           htmlspecialchars(trim(strip_tags($datos['grasas4']))) : 0;
       $grasas5 = htmlspecialchars(trim(strip_tags($datos['grasas5']))) !="" ?
            htmlspecialchars(trim(strip_tags($datos['grasas5']))) : 0;

       $result['grasas'] = $grasas1 + $grasas2 + $grasas3 + $grasas4 + $grasas5;

       $carbos1 = htmlspecialchars(trim(strip_tags($datos['carbos1']))) !="" ?
           htmlspecialchars(trim(strip_tags($datos['carbos1']))) : 0;
       $carbos2 = htmlspecialchars(trim(strip_tags($datos['carbos2']))) !="" ?
            htmlspecialchars(trim(strip_tags($datos['carbos2']))) : 0;
       $carbos3 = htmlspecialchars(trim(strip_tags($datos['carbos3']))) !="" ?
           htmlspecialchars(trim(strip_tags($datos['carbos3']))) : 0;
       $carbos4 = htmlspecialchars(trim(strip_tags($datos['carbos4']))) !="" ?
           htmlspecialchars(trim(strip_tags($datos['carbos4']))) : 0;
       $carbos5 = htmlspecialchars(trim(strip_tags($datos['carbos5']))) !="" ?
            htmlspecialchars(trim(strip_tags($datos['carbos5']))) : 0;

       $result['carbos'] = $carbos1 + $carbos2 + $carbos3 + $carbos4 + $carbos5;

        return $result;
    }




}