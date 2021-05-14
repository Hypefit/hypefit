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

function mostrarRutina($id) {
    $dao = new RutinaDAO();
    $rutina = $dao->getRutina($id);
    $rutaImgSup = RUTA_IMGS.'/cat-superior.jpg';
    // $rutaImgInf = RUTA_IMGS;
    // $rutaImgFull = RUTA_IMGS;

    if ($rutina == NULL) {
        $html = <<<EOS
        <div class="p-4 text-center bg-image img-fluid" 
            style="background-image: url(https://www.aurigasv.es/img/error-code.jpeg);
            opacity: 0.9;
            background-repeat: no-repeat;
            background-size: cover;
            width:  auto;
            height: 100%;
            margin: 5%;
        ">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6); margin: 10%; padding: 15%">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-light">
                        <h1> No existe ninguna rutina con el id especificado. </h1>
                    </div>  
                </div>
            </div>
         </div>
EOS;
        return array(-1, $html); //-1 indica error
    } else {
        $dao = new UsuarioDAO();
        $usuario = $dao->getUsuario($rutina->getIdEntrenador());
        $nombreEntrenador = $usuario->getNombre();

        $html = "<div class='bg-light container-fluid p-4'>
                      <div class='row justify-content-center align-items-center py-5 text-center'>
                          <div class='bg-image' style='
                          background-image: url($rutaImgSup);
                          background-size: cover;'>
                              <div class='p-4'>
                                  <div class='row py-3'>
                                      <h1 class='text-black text-uppercase'>" . $rutina->getTitulo() . "</h1>
                                      <h5 class='text-black'>". $rutina->getDescripcion() . "</h5>
                                  </div>
                                  <div class='row py-3 justify-content-center'>
                                      <div class='col-7 col-sm-4 shadow border rounded border-secondary' style='background-color: rgba(186,212,236,0.85);'>
                                          <p><span class='fw-bold' >Creada por: </span>" . $nombreEntrenador . "</br>
                                             <span class='fw-bolder'>Categoria: </span>" . ucwords($rutina->getCategoria()) . "<p>
                                      </div>
                                </div>
                              </div>
                          </div>
                      </div>
                      <div class='row justify-content-center'>
                          <div class='col-12 col-sm-10 col-md-8 p-5 border text-start'> 
                            <p class='fs-5 lh-lg '>" . nl2br($rutina->getRutina()) . "</p>  
                          </div>  
                      </div>
                      <div class='row mt-4 justify-content-center'>
                          <div class='col-12 col-sm-10 col-md-8 p-5 border text-start'>
                                <h4 class='text-center text-uppercase'>Comentarios</h4>
                           " . mostrarComentariosRutina($rutina->getId())."  
                          </div>  
                      </div>
                  </div>
                
                 ";

        return array(0, $html);
    }
}

function mostrarComentariosRutina($id) : string {
    $daoC = new ComentarioRutinaDAO();
    $daoU = new UsuarioDAO();

    $comentarios = $daoC->getComentariosDeRutina($id);

    $html = "<ul class='list-unstyled '>";
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

        $html .= $comentario->getTexto() ."</li>";
    }
    $html .= "</ul>";

    return $html;
}