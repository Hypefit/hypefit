<?php

require_once "autorizacion.php";

use hypefit\DAO\ComentarioRecetaDAO;
use hypefit\DAO\RecetaDAO;
use hypefit\DAO\UsuarioDAO;

function crearListaRecetas($categoria): string {
    $dao = new RecetaDAO();
    $lista = $dao->getRecetasPorCategoria($categoria);
    $html="";

    foreach($lista as $receta) {
        $html .= "
            <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 pb-2'>
                <div class='card h-100 border-secondary text-center'>
                    <h5 class='card-header text-capitalize'>" . $receta->getTitulo() . "</h5>
                    <div class='card-body'>
                        <p class='card-text'>" . $receta->getDescripcion() . "</p>
                        <a href='verReceta.php?id=" . $receta->getId() . "' class='btn btn-primary'>Ver Receta</a>
                    </div>        
                </div>
            </div>
            ";
    }
    return $html;
}

function mostrarReceta($id) {
    $dao = new RecetaDAO();
    $receta = $dao->getReceta($id);


    if ($receta == NULL) {
        return -1; //-1 indica error
    } else {
        $dao = new UsuarioDAO();
        $usuario = $dao->getUsuario($receta->getIdNutricionista());
        $nombreNutricionista = $usuario->getNombre();

        $html =  <<<EOS
            <div class='bg-light container-fluid px-4'>
               <!--Jumbotron-->
                <div class='bg-image jumbotron text-center p-4' style='
                  background-image: url("https://static1.bigstockphoto.com/8/1/1/large1500/118254233.jpg");
                  '>
                    <div class='row my-4 text-light'>
                        <h1 class='text-uppercase'>{$receta->getTitulo()}</h1>
                        <h5>{$receta->getDescripcion()}</h5>
                    </div>
                    <div class='row py-3 my-5 justify-content-center'>
                        <div class='col-7 col-sm-4 shadow border rounded border-secondary' style='background-color: rgba(186,212,236,0.9);'>
                            <p>
                                <span class='fw-bold' >Creada por: </span>{$nombreNutricionista}
                                </br>
                                <span class='fw-bolder'>Categoria: </span>
EOS;
                                    $html .= ucwords($receta->getCategoria());
        $html .= <<<EOS
                            <p>
                        </div>
                    </div>
                </div>
                <!--/Jumbotron-->
                <!--Receta-->
                <div class='row justify-content-center'>
                    <h3 class="text-uppercase text-center mb-3">Pasos</h3>
                    <div class='col-12 col-sm-10 col-md-8 p-5 border text-start'> 
                        <p class='fs-5 lh-lg'>
EOS;
                            $html .= nl2br($receta->getReceta());
        $html .= <<<EOS
                        </p>  
                    </div>  
                </div>
                <!--/Receta-->
                <!--Sección Comentarios-->
                <div class='row py-5 justify-content-center' id='ComentariosReceta'>
                    <h4 class='text-center text-uppercase mb-3'>Comentarios</h4>
                    <div class='col-12 col-sm-10 col-md-8 px-5 py-2 border text-start'>
EOS;
        $html .= mostrarComentariosReceta($receta->getId());
        $html .= <<<EOS
                    </div>  
                </div>
                <!--/Sección comentarios-->
            </div>
EOS;

        return $html;
    }


}

function mostrarComentariosReceta($id) : string {
    $daoC = new ComentarioRecetaDAO();
    $daoU = new UsuarioDAO();

    $comentarios = $daoC->getComentariosDeReceta($id);

    $html = "";
    foreach($comentarios as $comentario) {
        $user = $daoU->getUsuario($comentario->getIdUsuario());
        $html .=  <<<EOS
            <div>
                <p class="mb-0"><span class="fw-bold">{$user->getNombre()}</span>  |  {$comentario->getFecha()}</p>
                <p>
        EOS;
        $valoracion = $comentario->getValoracion();
        for ($i = 1; $i <= $valoracion; $i++) {
            $html .= '<p><span class="fa fa-star checked"></span>';
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

function esCreador($idReceta) {
    $dao = new RecetaDAO();
    $receta = $dao->getReceta($idReceta);
    $idCreador = (int) $receta->getIdNutricionista();
    return $idCreador === idUsuarioLogado();
}