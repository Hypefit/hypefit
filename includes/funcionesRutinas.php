<?php


use hypefit\DAO\ComentarioRutinaDAO;
use hypefit\DAO\RutinaDAO;
use hypefit\DAO\UsuarioDAO;

function crearListaRutinas($categoria): string {
    $dao = new RutinaDAO();
    $lista = $dao->getRutinasPorCategoria($categoria);
    $html="";
    foreach($lista as $rutina) {
        $html .= "
            <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 pb-2'>
                <div class='card h-100 border-secondary ms-2 text-center'>
                    <h5 class='card-header text-capitalize'>" . $rutina->getTitulo() . "</h5>
                    <div class='card-body'>
                        <p class='card-text'>" . $rutina->getDescripcion() . "</p>
                        <a href='verRutina.php?id=" . $rutina->getId() . "'' class='btn btn-primary'>Ver Rutina</a>
                    </div>        
                </div>
            </div>
            ";
    }

    return $html;

}

function mostrarRutina($id): string {
    $dao = new RutinaDAO();
    $rutina = $dao->getRutina($id);
    $rutaImgSup = RUTA_IMGS.'/cat-superior.jpg';
    $rutaImgInf = RUTA_IMGS;
    $rutaImgFull = RUTA_IMGS;

    if ($rutina == NULL) {
        return "<p>No existe ninguna rutina con el id especificado.</p>";
    } else {
        $dao = new UsuarioDAO();
        $usuario = $dao->getUsuario($rutina->getIdEntrenador());
        $nombreEntrenador = $usuario->getNombre();

        $html = "<div class='container my-4'>
                      <div class='row justify-content-center align-items-center py-5 text-center'>
                          <div class='col bg-image text-center' style='
                          background-image: url($rutaImgSup);
                          background-size: cover;'>
                            <h1 class=''>" . $rutina->getTitulo() . "</h1>
                            <h5 class='text-secondary'>". $rutina->getDescripcion() . "</h5>
                          </div>
                      </div>
                      <div class='row mb-4 justify-content-center'>
                          <div class='col-4 shadow border rounded border-secondary' style='background-color: rgba(186,212,236,0.85)'>
                              <p><span class='fw-bold'>Creada por: </span>" . $nombreEntrenador . "</br>
                                 <span class='fw-bolder'>Categoria: </span>" . ucwords($rutina->getCategoria()) . "<p>
                          </div>
                      </div> 
                    
                      <div class='row justify-content-center'>
                          <div class='col-8 p-5 border text-start'> 
                            <p class='fs-5 lh-lg'>" . nl2br($rutina->getRutina()) . "</p>  
                          </div>  
                      </div>
                  </div>
                
                 ";

        return $html;
    }
}

function mostrarComentariosRutina($id) : string {
    $daoC = new ComentarioRutinaDAO();
    $daoU = new UsuarioDAO();

    $comentarios = $daoC->getComentariosDeRutina($id);

    $html = "<ul>";
    foreach($comentarios as $comentario) {
        $user = $daoU->getUsuario($comentario->getIdUsuario());
        $html .= "<li>" . $user->getNombre() . " | " .  $comentario->getFecha() . "<br>";
        $valoracion = $comentario->getValoracion();
        for ($i = 1; $i <= $valoracion; $i++) {
            $html .= '<span class="fa fa-star checked"></span>';
        }
        for ($i = $valoracion + 1; $i <= 5; $i++) {
            $html .= '<span class="fa fa-star"></span>';
        }

        $html .= $comentario->getComentario() ."</li>";
    }
    $html .= "</ul>";

    return $html;
}