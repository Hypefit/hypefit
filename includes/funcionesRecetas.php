<?php


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
                <div class='card h-100 border-secondary ms-2 text-center'>
                    <h5 class='card-header text-capitalize'>" . $receta->getTitulo() . "</h5>
                    <div class='card-body'>
                        <p class='card-text'>" . $receta->getDescripcion() . "</p>
                        <a href='verRutina.php?id=" . $receta->getId() . "'' class='btn btn-primary'>Ver Rutina</a>
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
                        <h1> No existe ninguna receta con el id especificado. </h1>
                    </div>  
                </div>
            </div>
         </div>
        EOS;
        return array(-1, $html); //-1 indica error
    } else {
        $dao = new UsuarioDAO();
        $usuario = $dao->getUsuario($receta->getIdNutricionista());
        $nombreNutricionista = $usuario->getNombre();

        $html = "<h1>" . $receta->getTitulo() . "</h1>";
        $html .= "Creada por: " . $nombreNutricionista . "<br>";
        $html .= "Categoria: " . ucwords($receta->getCategoria()) . "<br>";
        $html .= "<p>" . $receta->getReceta() . "</p>";

        return array(0,$html); //0 indica correcto
    }


}

function mostrarComentariosReceta($id) : string {
    $daoC = new ComentarioRecetaDAO();
    $daoU = new UsuarioDAO();

    $comentarios = $daoC->getComentariosDeReceta($id);

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

        $html .= $comentario->getTexto() ."</li>";
    }
    $html .= "</ul>";

    return $html;
}