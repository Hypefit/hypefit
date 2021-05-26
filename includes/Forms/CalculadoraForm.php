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
        $grasas = $errores['grasas'] ?? '';
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

        /*$html .= '
        <!--Contenido-->
        <div class="jumbotron p-5 text-center bg-image img-fluid"
            style="
                background-image: url(https://muysaludable.sanitas.es/wp-content/uploads/2018/09/6_tabla-nutricional2.jpg);
            ">
            <div class="row justify-content-center">
                <div class="mask-light signup-form col-xs-12 col-sm-10 col-md-9 m-2">
                    <div class="row justify-content-center">
                        <h2 class="text-dark pt-3">Rellena los datos sobre tu alimentación</h2>
                    </div>
                    <hr>
    
                    <div class="row ps-0 ">
                        '.  $htmlErroresGlobales .'
                        
                        <!--<p><label>¿Cuál es tu objetivo calórico?</label></p> <select name="objetivo" required>
                            <option value="Déficit Calórico" selected> Déficit Calórico</option>
                            <option value="Equilibrio Calórico">Equilibrio Calórico</option>
                            <option value="Superávit Calórico">Superávit Calórico</option>
                        </select>-->
                            
                        <h3>Comida número 1</h3>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Calorias1" class="form-control" type="number" name="calorias1" 
                                placeholder="Calorías 1ª Comida" required>
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Proteinas1" class="form-control" type="number" name="proteinas1" 
                                placeholder="Proteínas 1ª Comida" required>
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Grasas1" class="form-control" type="number" name="grasas1" 
                                placeholder="Grasas 1ª Comida" required>
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Carbos1" class="form-control" type="number" name="carbos1" 
                                placeholder="Carbohidratos 1ª Comida" required>
                            </div>
                        </div>
                          
                        <h3>Comida número 2</h3>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Calorias2" class="form-control" type="number" name="calorias2" 
                                placeholder="Calorías 2ª Comida" required>
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Proteinas2" class="form-control" type="number" name="proteinas2" 
                                placeholder="Proteínas 2ª Comida" required>
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Grasas2" class="form-control" type="number" name="grasas2" 
                                placeholder="Grasas 2ª Comida" required>
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Carbos2" class="form-control" type="number" name="carbos2" 
                                placeholder="Carbohidratos 2ª Comida" required>
                            </div>
                        </div>
                        
                        <h3>Comida número 3</h3>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Calorias3" class="form-control" type="number" name="calorias3" 
                                placeholder="Calorías 3ª Comida" >
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Proteinas3" class="form-control" type="number" name="proteinas3" 
                                placeholder="Proteínas 3ª Comida" >
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Grasas3" class="form-control" type="number" name="grasas3" 
                                placeholder="Grasas 3ª Comida" >
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Carbos3" class="form-control" type="number" name="carbos3" 
                                placeholder="Carbohidratos 3ª Comida" >
                            </div>
                        </div>
                        
                        <h3>Comida número 4</h3>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Calorias4" class="form-control" type="number" name="calorias4" 
                                placeholder="Calorías 4ª Comida" >
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Proteinas4" class="form-control" type="number" name="proteinas4" 
                                placeholder="Proteínas 4ª Comida" >
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Grasas4" class="form-control" type="number" name="grasas4" 
                                placeholder="Grasas 4ª Comida" >
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Carbos4" class="form-control" type="number" name="carbos4" 
                                placeholder="Carbohidratos 4ª Comida" >
                            </div>
                        </div>                                     
                        
                        <h3>Comida número 5</h3>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Calorias5" class="form-control" type="number" name="calorias5" 
                                placeholder="Calorías 5ª Comida" >
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Proteinas5" class="form-control" type="number" name="proteinas5" 
                                placeholder="Proteínas 5ª Comida" >
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Grasas5" class="form-control" type="number" name="grasas5" 
                                placeholder="Grasas 5ª Comida" >
                            </div>
                        </div>
                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                            <div class="input-group">
                                <input title="Carbos5" class="form-control" type="number" name="carbos5" 
                                placeholder="Carbohidratos 5ª Comida" >
                            </div>
                        </div>
                        
                        <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 mb-4" style="margin-left:20%" >
                            <button type="Calcular" class="btn btn-dark" >Calcular</button>  
                        </div> 
                             
                    </div>
                </div>
            </div>
        </div>
        ';*/

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

        $calorias1  = $datos['calorias1']!="" ? $datos['calorias1']: 0;
        $calorias2  = $datos['calorias2']!="" ? $datos['calorias2']: 0;
        $calorias3  = $datos['calorias3']!="" ? $datos['calorias3']: 0;
        $calorias4  = $datos['calorias4']!="" ? $datos['calorias4']: 0;
        $calorias5  = $datos['calorias5']!="" ? $datos['calorias5']: 0;

       $result['calorias'] = $calorias1 + $calorias2 + $calorias3 + $calorias4 + $calorias5;

       $proteinas1 =$datos['proteinas1']!="" ? $datos['proteinas1'] : 0;
       $proteinas2 =$datos['proteinas2']!="" ? $datos['proteinas2'] : 0;
       $proteinas3 =$datos['proteinas3']!="" ? $datos['proteinas3'] : 0;
       $proteinas4 =$datos['proteinas4']!="" ? $datos['proteinas4'] : 0;
       $proteinas5 =$datos['proteinas5']!="" ? $datos['proteinas5'] : 0;

       $result['proteinas'] = $proteinas1 + $proteinas2 + $proteinas3 + $proteinas4 + $proteinas5;

       $grasas1 =$datos['grasas1']!="" ? $datos['grasas1'] : 0;
       $grasas2 =$datos['grasas2']!="" ? $datos['grasas2'] : 0;
       $grasas3 =$datos['grasas3']!="" ? $datos['grasas3'] : 0;
       $grasas4 =$datos['grasas4']!="" ? $datos['grasas4'] : 0;
       $grasas5 =$datos['grasas5']!="" ? $datos['grasas5'] : 0;

       $result['grasas'] = $grasas1 + $grasas2 + $grasas3 + $grasas4 + $grasas5;

       $carbos1 =$datos['carbos1']!="" ? $datos['carbos1'] : 0;
       $carbos2 =$datos['carbos2']!="" ? $datos['carbos2'] : 0;
       $carbos3 =$datos['carbos3']!="" ? $datos['carbos3'] : 0;
       $carbos4 =$datos['carbos4']!="" ? $datos['carbos4'] : 0;
       $carbos5 =$datos['carbos5']!="" ? $datos['carbos5'] : 0;

       $result['carbos'] = $carbos1 + $carbos2 + $carbos3 + $carbos4 + $carbos5;

        return $result;
    }




}