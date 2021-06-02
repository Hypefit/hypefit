<?php


use hypefit\DAO\ComentarioRutinaDAO;
use hypefit\DAO\RutinaDAO;
use hypefit\DAO\RutinasUsuariosDAO;
use hypefit\DAO\UsuarioDAO;

function crearListaRutinas($categoria): string {
    $dao = new RutinaDAO();
    $lista = $dao->getRutinasPorCategoria($categoria);
    $html="";

    foreach($lista as $rutina) {
        $html .= "
            <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 pb-2'>
                <div class='card h-100 border-secondary text-center'>
                    <h5 class='card-header text-capitalize'>" . $rutina->getTitulo() . "</h5>
                    <div class='card-body'>
                        <p class='card-text'>" . $rutina->getDescripcion() . "</p>
                        <a href='verRutina.php?id=" . $rutina->getId() . "' class='btn btn-primary'>Ver Rutina</a>
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
    $rutaImgSup = RUTA_IMGS.'/tren-superior-inicio.jpg';

    if ($rutina == NULL) {
        return -1; //-1 indica error
    } else {
        $dao = new UsuarioDAO();
        $usuario = $dao->getUsuario($rutina->getIdEntrenador());
        $nombreEntrenador = $usuario->getNombre();

        $html = <<<EOS
            <div class='bg-light container-fluid px-4'>
                <!--Jumbotron-->
                <div class='bg-image jumbotron text-center p-4' style='
                  background-image: url($rutaImgSup);'>
                    <div class='row my-4 text-light'>
                        <h1 class=' text-uppercase'>{$rutina->getTitulo()}</h1>
                        <h5 >{$rutina->getDescripcion()}</h5>
                    </div>
                    <div class='row py-3 justify-content-center'>
                        <div class='col-7 col-sm-4 shadow border rounded border-secondary' style='background-color: rgba(186,212,236,0.85);'>
                            <p>
                                <span class='fw-bold' >Creada por: </span>{$nombreEntrenador}
                                </br>
                                <span class='fw-bolder'>Categoria: </span>
EOS;
                                   $html .= ucwords($rutina->getCategoria());
            $html .= <<<EOS
                            <p>
                        </div>
                    </div>
EOS;

            if (estaLogado()) $html .= generarBotonSeguir($id);

            $html .=<<<EOS
                </div>
                <!--/Jumbotron-->
                <!--Rutina-->
                <div class='row justify-content-center'>
                    <h3 class="text-uppercase text-center mb-3">Ejercicios</h3>
                    <div class='col-12 col-sm-10 col-md-8 p-5 border text-start'> 
                        <p class='fs-5 lh-lg'>
EOS;
                        $html .= nl2br($rutina->getRutina());
            $html .= <<<EOS
                        </p>  
                    </div>  
                </div>
                <!--/Rutina-->
                <!--Sección Comentarios-->
                <div class='row py-5 justify-content-center' id='ComentariosRutina'>
                    <h4 class='text-center text-uppercase mb-3'>Comentarios</h4>
                    <div class='col-12 col-sm-10 col-md-8 px-5 py-2 border text-start'>
EOS;
                       $html .= mostrarComentariosRutina($rutina->getId());
            $html .= <<<EOS
                    </div>  
                </div>
                <!--/Sección Comentarios-->
            </div>
EOS;

        return $html;
    }
}

function mostrarComentariosRutina($id) : string {
    $daoC = new ComentarioRutinaDAO();
    $daoU = new UsuarioDAO();

    $comentarios = $daoC->getComentariosDeRutina($id);

    $html = "";
    foreach($comentarios as $comentario) {
        $user = $daoU->getUsuario($comentario->getIdUsuario());
        $html .= <<<EOS
            <div>   
                <p class="mb-0"><span class="fw-bold">{$user->getNombre()}</span>  |  {$comentario->getFecha()}</p>
                <p>
EOS;
        $valoracion = $comentario->getValoracion();
        for ($i = 1; $i <= $valoracion; $i++) {
            $html .= '<span class="fa fa-star checked"></span>';
        }
        for ($i = $valoracion + 1; $i <= 5; $i++) {
            $html .= '<span class="fa fa-star"></span>';
        }

        $html .= <<<EOS
                <span class="ms-2">{$comentario->getTexto()}</span>
                </p>
                <hr class='bg-secondary border-2 border-top'>
            </div>
EOS;
    }

    return $html;
}

function generarBotonSeguir($idRutina) {
    if (estaLogado()) {
        $dao = new RutinasUsuariosDAO();
        $to = $dao->buscarRutinaPorUsuario(idUsuarioLogado(), $idRutina);
        if ($to === 0) {
            $estado = "sin-seguir";
        }
        else if ($to->getCompletada()) {
            $estado = "completada";
        }
        else {
            $estado = "siguiendo";
        }
        return <<<EOS
        <!-- Botón de seguir -->
        <div class="dropdown" data-estado="$estado" data-rutina="$idRutina">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="botonSeguir" data-bs-toggle="dropdown" aria-expanded="false">
            Seguir
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#" id="empezarSeguir">Empezar a seguir</a></li>
            <li><a class="dropdown-item" href="#" id="dejarSeguir">Dejar de seguir</a></li>
            <li><a class="dropdown-item" href="#" id="marcarCompletada">Marcar como completada</a></li>
            <li><a class="dropdown-item" href="#" id="desmarcarCompletada">Desmarcar como completada</a></li>
          </ul>
        </div>
EOS;
    }
    else {
        return '';
    }
}