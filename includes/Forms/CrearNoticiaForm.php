<?php

namespace hypefit\Forms;

use hypefit\DAO\NoticiasDAO;
use hypefit\TO\Noticia;


require_once 'includes/config.php';
require_once 'includes/autorizacion.php';
require_once 'includes/comun/jumbotron.php';


class CrearNoticiaForm extends Form {
    public function __construct() {
        parent::__construct('CrearNoticiaForm');
    }

    protected function generaCamposFormulario($datosIniciales, $errores = array())  {
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);

        $form = <<<EOS
            <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 pb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                             <i class="fas fa-hand-point-right"></i>
                        </span>
                    </div>
                    <input title="Título" class="form-control" type="text" name="titulo" 
                    placeholder="Título" required>
                </div>
                 </div> 
                <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 pb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-edit"></i>
                            </span>
                        </div>
                        <textarea title="Contenido" class="form-control" name="texto" 
                        placeholder="Contenido" required></textarea>
                        
                    </div>
                </div> 
                <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 pb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-file-image"></i>
                            </span>
                        </div>
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" name="filename" required/>
                        </div>
                    </div>
                </div> 

                $htmlErroresGlobales        
                <div class="form-group col-xs-12 col-sm-10 col-md-9 col-lg-7 mb-4">
                    <button type="submit" class="btn btn-dark">Crear</button>  
               </div>   
            </div>
        EOS;

        $html = formJumbo("https://s1.1zoom.me/b5249/490/Closeup_15_kg_Barbell_514746_1366x768.jpg",
            "Escribe una nueva noticia", "Comparte con otros las noticias actuales", $form);

        return $html;
    }

    protected function procesaFormulario($datos) {
        $result = array();
        $titulo =$datos['titulo'] ?? null;
        $texto =$datos['texto'] ?? null;
        //$filename = $datos['filename'] ?? null;
        $filename = $_FILES["filename"]["name"];
        $idUsuario = idUsuarioLogado();
        $tempname = $_FILES["filename"]["tmp_name"];
        echo $tempname;
        if (count($result) === 0) {
            $dao = new NoticiasDAO();
            $post = new Noticia();
            $post->setTitulo($titulo);
            $post->setIdAutor($idUsuario);
            $post->setTexto($texto);
            $post->setFilename($filename);
            $path = getcwd();
            $folder = "$path/img" ."/$filename";
            if(move_uploaded_file($tempname, $folder)===false) {
                //echo getcwd();
                die("Upload fallado");
            }
            $idPost = $dao->crearNoticia($post);

            $result = RUTA_APP . "/verNoticia.php?id=$idPost";
        }
        return $result;
    }
}