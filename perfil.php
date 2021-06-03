<?php

use hypefit\Forms\AprobarUsuariosForm;
use hypefit\DAO\InsigniasUsuariosDAO;
use hypefit\DAO\InsigniasDAO;

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/autorizacion.php';
require_once __DIR__.'/includes/funcionesUsuario.php';
require_once __DIR__.'/includes/comun/jumbotron.php';

$tituloPagina= 'Hypefit | Perfil';

if(estaLogado())
{
    $rol = ucwords($_SESSION["rol"]);
    if(esAdmin()){
        $img = "https://www.vikika.es/blog/wp-content/uploads/2019/09/sindrome-oficinista-1.jpg";
    }
    else if(esEntrenador()) {
        $img = "https://media.quincemil.com/imagenes/2020/11/09164849/shutterstock_1060003700-1706x960.jpg";
    }
    else if(esNutricionista()) {
        $img = "https://elviajerofeliz.com/wp-content/uploads/2020/01/comida-tipica-de-armenia.jpg";
    }
    else {
        $img = "https://s1.1zoom.me/b5249/490/Closeup_15_kg_Barbell_514746_1366x768.jpg";
    }
    $mensajeNoAprobado = estaAprobado() ? '' : "<p>¡Tu cuenta aún no ha sido aprobada! No podrás crear recetas ni rutinas hasta que tu cuenta sea aprobada por un administrador.</p>";

    $titulo= "<h1>Tu perfil</h1>";
    $customText = " <p>Nombre: {$_SESSION["nombre"]}</p>
                    <p>Tu tipo de usuario: {$rol}</p>
                    {$mensajeNoAprobado}";

    $contenidoPrincipal = customizableJumbo($img, $titulo, "", $customText, "", "", "");

    //Columnas logros
    $daoInsigniasUsuario = new InsigniasUsuariosDAO();
    $listaInsigniasUsuario = $daoInsigniasUsuario->getInsigniasUsuario($_SESSION["idUsuario"]);

    $daoInsignias = new InsigniasDAO();

    $contenidoPrincipal .= <<<EOS
        <div class="container">
            <div class="row mb-4">
                <div class="col-xs-12 col-md-4 px-3 ">
                    <h4 class="mb-4">Tus insignias</h4>
                    <div>
        EOS;

        foreach($listaInsigniasUsuario as $insigniaUsuario ){
            $id = $insigniaUsuario["idInsignia"];
            $insignia = $daoInsignias->buscarInsigniaPorId($id);

            $contenidoPrincipal.= <<< EOS
                <div>
                    <img src="{$insignia->getRutaImagen()}" class="img-insignia me-3" alt="Imagen insignia"/>
                    <p class="mb-0 fw-bold">{$insignia->getTitulo()}</p>
                    <p>{$insignia->getDescripcion()}</p>
                </div>
            EOS;
        }
        $contenidoPrincipal .= <<<EOS
                    </div>
                </div>
                 <div class="col-xs-12 col-md-4">
                    <h4>Rutinas que sigues</h4>
                    
                </div>
                 <div class="col-xs-12 col-md-4">
                    <h4>Rutinas completadas</h4>
                    
                </div>
            </div>
        </div>
    EOS;


	if (esAdmin()) {
        $form = new AprobarUsuariosForm();
        $contenidoPrincipal .= $form->gestiona() ;
    }
}
else {
    $contenidoPrincipal = mostrarJumboBoton("https://s1.1zoom.me/b5249/490/Closeup_15_kg_Barbell_514746_1366x768.jpg",
    "No has iniciado sesión", "Puedes hacerlo aquí", "login.php", "Login");
}

require __DIR__.'/includes/comun/layout.php';

