<?php

namespace hypefit\Forms;

require_once 'includes/config.php';
require_once 'includes/funcionesUsuario.php';

class CalculadoraForm extends Form{
    public function __construct() {
        parent::__construct('CalculadoraForm');
    }


    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $calorias = $errores['calorias'] ?? '';
        $proteinas = $errores['proteinas'] ?? '';
        $grasas = $errores['grasas'] ?? '';
        $carbos = $errores['carbos'] ?? '';

        $html = <<<EOS

        <!--Cabecera-->
            <div class="p-5 text-center bg-image img-fluid"
                    style="
                        background-image: url(https://planetadelhogar.com/wp-content/uploads/2019/10/ray-reyes-3xwrg7Vv6Ts-unsplash-1536x1024.jpg);
                        opacity: 0.9;
                        background-repeat: no-repeat;
                        background-size: cover;
                        width:  auto;
                        height: 100%;
                        margin: 5%;
                    ">
                <div class="mask" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%; padding: 5%">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <div class="text-black">
                            <h1 class='mb-3 text-uppercase'>Calculadora Nutricional</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cabecera-->
            
            <!--Contenido-->
            <div class="p-5 text-center bg-image img-fluid"
                    style="
                        background-image: url(https://muysaludable.sanitas.es/wp-content/uploads/2018/09/6_tabla-nutricional2.jpg);
                        opacity: 0.9;
                        background-repeat: no-repeat;
                        background-size: cover;
                        width:  auto;
                        height: 100%;
                        margin: 5%;
                    ">

                    <div  style="background-color: rgba(255, 255, 255, 0.7); margin: 10%;">
                        <div class="row align-items-start">
                            <h2 class="text-dark pt-3">Rellena los datos sobre tu alimentación</h2>
                                <hr>
                                </div>
                                <div class='row ps-0 '>
                                    <fieldset>
                                        $htmlErroresGlobales
                                        
                                        <!--<p><label>¿Cuál es tu objetivo calórico?</label></p> <select name="objetivo" required>
                                            <option value="Déficit Calórico" selected> Déficit Calórico</option>
                                            <option value="Equilibrio Calórico">Equilibrio Calórico</option>
                                            <option value="Superávit Calórico">Superávit Calórico</option>
                                        </select>-->
                                        
                                        <h3>Comida número 4</h3>
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
                                      
                                        <h3>Comida número 4</h3>
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
                                        
                                        <h3>Comida número 4</h3>
                                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                                            <div class="input-group">
                                                <input title="Calorias3" class="form-control" type="number" name="calorias3" 
                                                placeholder="Calorías 3ª Comida" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                                            <div class="input-group">
                                                <input title="Proteinas3" class="form-control" type="number" name="proteinas3" 
                                                placeholder="Proteínas 3ª Comida" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                                            <div class="input-group">
                                                <input title="Grasas3" class="form-control" type="number" name="grasas3" 
                                                placeholder="Grasas 3ª Comida" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                                            <div class="input-group">
                                                <input title="Carbos3" class="form-control" type="number" name="carbos3" 
                                                placeholder="Carbohidratos 3ª Comida" required>
                                            </div>
                                        </div>
                                        
                                        <h3>Comida número 4</h3>
                                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                                            <div class="input-group">
                                                <input title="Calorias4" class="form-control" type="number" name="calorias4" 
                                                placeholder="Calorías 4ª Comida" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                                            <div class="input-group">
                                                <input title="Proteinas4" class="form-control" type="number" name="proteinas4" 
                                                placeholder="Proteínas 4ª Comida" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                                            <div class="input-group">
                                                <input title="Grasas4" class="form-control" type="number" name="grasas4" 
                                                placeholder="Grasas 4ª Comida" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                                            <div class="input-group">
                                                <input title="Carbos4" class="form-control" type="number" name="carbos4" 
                                                placeholder="Carbohidratos 4ª Comida" required>
                                            </div>
                                        </div>                                     
                                        
                                        <h3>Comida número 4</h3>
                                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                                            <div class="input-group">
                                                <input title="Calorias5" class="form-control" type="number" name="calorias5" 
                                                placeholder="Calorías 5ª Comida" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                                            <div class="input-group">
                                                <input title="Proteinas5" class="form-control" type="number" name="proteinas5" 
                                                placeholder="Proteínas 5ª Comida" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                                            <div class="input-group">
                                                <input title="Grasas5" class="form-control" type="number" name="grasas5" 
                                                placeholder="Grasas 5ª Comida" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-10 col-sm-8 col-md-9 col-lg-6 pb-3 " style="margin-left: 25%;">
                                            <div class="input-group">
                                                <input title="Carbos5" class="form-control" type="number" name="carbos5" 
                                                placeholder="Carbohidratos 5ª Comida" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 mb-4" style="margin-left:20%" >
                                            <button type="Calcular" class="btn btn-dark" >Calcular</button>  
                                        </div> 
                                         
                                    </fieldset>
                                </div>
                            </div> 
                        </div>
                    </div>
            </div>
            <div class="p-5 text-center bg-image img-fluid"
                    style="
                        background-image: url(https://planetadelhogar.com/wp-content/uploads/2019/10/ray-reyes-3xwrg7Vv6Ts-unsplash-1536x1024.jpg);
                        opacity: 0.9;
                        background-repeat: no-repeat;
                        background-size: cover;
                        width:  auto;
                        height: 100%;
                        margin: 5%;
                    ">
                <div class="mask" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%; padding: 5%">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <div class="text-black">
                            <h3>TU RESULTADO:</h3>
                            <h5>Calorías consumidas: $calorias</h5>
                            <h5>Proteínas consumidas: $proteinas</h5>
                            <h5>Grasas consumidas: $grasas</h5>
                            <h5>Carbohidratos consumidos: $carbos</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
            
         <!--Posts-->
        </div>
    </div>    

</div>
EOS;




        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();

        $calorias   =$datos['calorias'] ?? null;
        $calorias2  =$datos['calorias2'] ?? null;
        $calorias3  =$datos['calorias3'] ?? null;
        $calorias4  =$datos['calorias4'] ?? null;
        $calorias5  =$datos['calorias5'] ?? null;

       $result['calorias'] = $calorias + $calorias2 + $calorias3 + $calorias4 + $calorias5;

       $proteinas  =$datos['proteinas'] ?? null;
       $proteinas2 =$datos['proteinas2'] ?? null;
       $proteinas3 =$datos['proteinas3'] ?? null;
       $proteinas4 =$datos['proteinas4'] ?? null;
       $proteinas5 =$datos['proteinas5'] ?? null;

       $result['proteinas'] = $proteinas + $proteinas2 + $proteinas3 + $proteinas4 + $proteinas5;

       $grasas  =$datos['grasas'] ?? null;
       $grasas2 =$datos['grasas2'] ?? null;
       $grasas3 =$datos['grasas3'] ?? null;
       $grasas4 =$datos['grasas4'] ?? null;
       $grasas5 =$datos['grasas5'] ?? null;

       $result['grasas'] = $grasas + $grasas2 + $grasas3 + $grasas4 + $grasas5;

       $carbos  =$datos['carbos'] ?? null;
       $carbos2 =$datos['carbos2'] ?? null;
       $carbos3 =$datos['carbos3'] ?? null;
       $carbos4 =$datos['carbos4'] ?? null;
       $carbos5 =$datos['carbos5'] ?? null;

       $result['carbos'] = $carbos + $carbos2 + $carbos3 + $carbos4 + $carbos5;

        return $result;
    }




}