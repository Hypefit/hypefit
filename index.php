<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/comun/jumbotron.php';
require_once __DIR__.'/includes/autorizacion.php';

$tituloPagina= 'Hypefit | Inicio';

$rutaTrenSup=RUTA_IMGS.'/pressbanca.jpg';
$rutaTrenInf=RUTA_IMGS.'/tren-superior-inicio.jfif';
$rutaFullBody=RUTA_IMGS.'/fullbody.jpg';

$rutaRecetasNormales=RUTA_IMGS.'/platosinrequerimientos.png';
$rutaRecetasVegetarianas=RUTA_IMGS.'/plato-vegetariano.jpg';
$rutaRecetasVeganas=RUTA_IMGS.'/plato-vegano.jpg';


//Jumbotron Cabecera
$contenidoPrincipal = cabeceraInicio(RUTA_IMGS.'/cabecera2.jpg', "Bienvenido a HYPEFIT",
    "Todo lo que necesitas a un solo click", "Empezar", "#inicio" );

$botonCrearEvento = (esAdmin() || ((esEntrenador() || esNutricionista()) && estaAprobado())) ?
    '<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#crearEventoModal">
            Crear evento </button>' : '';

//Contenido
$contenidoPrincipal .= <<<EOS
  <div class="bg-light" id="inicio" style="height: 9%;"></div>
    <!--Rutinas-->
    <div class="container-fluid px-0">
        <div class="bg-light row ps-0 me-0 align-items-center justify-content-center">
            <div class="outer container">
                <!--Rows-->
                <div class="row justify-content-center align-items-center">
                    <h2 class="text-uppercase mt-3 mb-4 text-center font-weight-bold">Rutinas de entrenamiento</h2>
                </div>
                <div class="row ps-0 justify-content-center">
                    <!--Cards-->
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 pb-2">
                        <div class="card h-100 border-secondary ms-2 text-center ">
                            <a href="rutinas.php#trenSup">
                                <img class="card-img-top" src="${rutaTrenSup}" alt="Tren Superior" style="height: 17rem;">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">Tren superior</h5>
                                <p class="card-text">Ejercicios para fortalecer la parte superior del cuerpo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 pb-2">
                        <div class="card h-100 border-secondary ms-2 text-center">
                            <a href="rutinas.php#trenInf">
                                <img class="card-img-top " src="${rutaTrenInf}" alt="Tren Inferior" style="height: 17rem;">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">Tren inferior</h5>
                                <p class="card-text">Ejercicios para fortalecer la parte inferior del cuerpo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 pb-2">
                        <div class="card h-100 border-secondary ms-2 text-center">
                            <a href="rutinas.php#fullBody">
                              <img class="card-img-top" src="${rutaFullBody}" alt="Full Body" style="height: 17rem;">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">Full Body</h5>
                                <p class="card-text">Ejercicios para fortalecer todo el cuerpo en un solo entrenamiento</p>
                            </div>
                        </div>
                    </div>
                     <!--Cards-->   
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="text-center mb-3">
                        <h5>Mantente en forma con nuestras <a style="text-decoration: none;" href="rutinas.php">rutinas</a>.</h5>
                        <h5>Disponemos de un amplio catálogo de rutinas divididas en grupos musculares.</h5>
                    </div>
                </div>
                <!--Rows -->
            </div>
        </div>
    </div>
    <!--Rutinas-->
    
    <!--Recetas-->
    <div class="recetas-index" style="height: 9%;"></div>
    <div class="recetas-index container-fluid px-0">
        <div class="row ps-0 me-0 align-items-center justify-content-center"">
            <div class="outer container">
                <!--Rows-->
                <div class="row justify-content-center align-items-center">
                    <h2 class="text-uppercase mt-3 mb-4 text-center font-weight-bold" style="color: #e2e1e1;">Recetas fit</h2>
                </div>
                <div class="row ps-0 justify-content-center">
                    <!--Cards-->
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3  pb-2">
                        <div class="card h-100 border-dark ms-2 text-center">
                            <a href="recetas.php" >
                                <img style="height: 17rem;" class="card-img-top" src="${rutaRecetasNormales}" alt="sin requerimientos">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">Dieta sin requerimientos</h5>
                                <p class="card-text">Recetas sin ningún tipo de restricción en cuanto a los alimentos
                                a ingerir</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 pb-2">
                        <div class="card h-100 border-dark ms-2 text-center">
                            <a href="recetas.php">
                                <img style="height: 17rem;" class="card-img-top " src="${rutaRecetasVegetarianas}" alt="Vegetariana">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">Dieta vegetariana</h5>
                                <p class="card-text">Recetas sin carne ni pescado</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 pb-2">
                        <div class="card h-100 border-dark ms-2 text-center">
                            <a href="recetas.php">
                                <img style="height: 17rem;" class="card-img-top " src="${rutaRecetasVeganas}" alt="Vegana">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">Dieta vegana</h5>
                                <p class="card-text">Recetas sin ningún producto de origen animal</p>
                            </div>
                        </div>
                    </div>
                     <!--Cards-->   
                </div>
                <div class="row align-items-center justify-content-center" style="color: #e2e1e1;">
                    <div class="text-center mb-3">
                        <h5>Un buen calendario de entrenamientos no sirve de nada sin una buena alimentación.</h5>
                        <h5>Nuestras <a href="recetas.php" style="text-decoration: none;">recetas</a> preparadas por nutricionistas te ayudarán a
                         conseguir tus objetivos.</h5>
                    </div>
                </div>
                <!--Rows -->
            </div>
        </div>
    </div>
    
    <!--Calendario-->
    <div class="container-fluid">
        <div class="row px-5 my-5 align-items-center justify-content-center">
            <h2 class="text-uppercase mt-3 mb-4 text-center font-weight-bold">Calendario de actividades</h2>
               <div class="container">
                    <div id="calendar" class="m-4"></div>                    
                    <div class="col text-center pt-3">
                        {$botonCrearEvento}                    
                    </div>                 
               </div>
        </div>
    </div>
    <!--Quienes Somos-->
    <div class="bg-light container-fluid px-0">
        <div class="bg-light row ps-0 me-0 align-items-center justify-content-center">
            <h2 class="text-uppercase mt-3 mb-4 text-center font-weight-bold">¿QUIÉNES SOMOS?</h2>
             <div class="text-center mb-3">
                <h5>Hypefit es un innovador gimnasio online que incluye tanto recetas como rutinas </h5>
                <h5>equilibradas y pensadas para los distintas necesidades de nuestro clientes. </h5>
                <h5><a href="quienesSomos.php">Ver más</a></h5>
             </div>
        </div>
    </div>
    <div class="bg-light" style="height: 9%;"></div>
EOS;

$idCreador = idUsuarioLogado();
$contenidoPrincipal .=<<<EOS
<div class="modal fade" id="crearEventoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Crear evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">

                <div class="container-fluid">

                    <form id="createEvent" class="form-horizontal">

                    <div class="row">
                            <div id="title-group" class="form-group">
                                <label class="control-label" for="title">Título</label>
                                <input type="text" class="form-control" name="titulo" required>
                                <!-- errors will go here -->
                            </div>
                            <div id="startdate-group" class="form-group">
                                <label class="control-label" for="startDate">Fecha de inicio (formato DD-MM-AAAA HH:MM:SS)</label>
                                <input type="text" class="form-control" id="fechaInicio" name="fechaInicio" required>
                                <!-- errors will go here -->
                            </div>
                            <div id="enddate-group" class="form-group">
                                <label class="control-label" for="endDate">Fecha de fin (formato DD-MM-AAAA HH:MM:SS)</label>
                                <input type="text" class="form-control" id="fechaFin" name="fechaFin" required>
                                <!-- errors will go here -->
                            </div>                       
                            <div id="description-group" class="form-group">
                                <label class="control-label" for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" name="descripcion" required>
                                <input type="hidden" class="form-control" id="idCreador" name="idCreador" value="{$idCreador}">
                                <!-- errors will go here -->
                            </div>                   
                    </div>                   
                </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Descartar</button>
              <button type="submit" class="btn btn-primary">Crear</button>
            </div>

            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="editarEventoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Actualizar evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">

                <div class="container-fluid">

                    <form id="editEvent" class="form-horizontal">
                    <input type="hidden" id="editEventId" name="editEventId" value="">

                    <div class="row">
                            <div id="title-group" class="form-group">
                                <label class="control-label" for="title">Título</label>
                                <input type="text" class="form-control" id="editartitulo" name="titulo" required>
                                <!-- errors will go here -->
                            </div>
                            <div id="startdate-group" class="form-group">
                                <label class="control-label" for="startDate">Fecha de inicio (formato DD-MM-AAAA HH:MM:SS)</label>
                                <input type="text" class="form-control" id="editarfechaInicio" name="fechaInicio" required>
                                <!-- errors will go here -->
                            </div>
                            <div id="enddate-group" class="form-group">
                                <label class="control-label" for="endDate">Fecha de fin (formato DD-MM-AAAA HH:MM:SS)</label>
                                <input type="text" class="form-control" id="editarfechaFin" name="fechaInicio" required>
                                <!-- errors will go here -->
                            </div>                       
                            <div id="description-group" class="form-group">
                                <label class="control-label" for="descripcion">Descripción</label>
                                <input type="text" class="form-control" id="editardescripcion" name="descripcion" required>
                                <!-- errors will go here -->
                            </div>                   
                    </div>   

                    </div>

                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Descartar</button>
              <button type="submit" class="btn btn-primary">Actualizar</button>
              <button type="button" class="btn btn-danger" id="deleteEvent" data-id>Eliminar evento</button>
            </div>
            </div>         
            

        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
EOS;

$scripts = array();
array_push($scripts, 'js/calendarioEventos.js');

require __DIR__.'/includes/comun/layout.php';