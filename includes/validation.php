<?php

use hypefit\DAO\UsuarioDAO;

require_once __DIR__.'/DAO/UsuarioDAO.php';

     if (isset($_GET["user"])) {
        if ($_GET["user"] == "elpepe" | $_GET["user"] == "")
            echo "existe";
        else
            echo "disponible";
     } else
        echo "userNotSet";

    if (isset($_POST["email"])) {
        $email = $_POST["email"];
        $errorEmpty = false;
        $errorEmail = false;
        $errorNotAvailable = false;
        $dao = new UsuarioDAO();

        if(empty($email)){
            //echo "<span class='text-danger'>Este campo no puede estar vacío</span>";
            echo "";
            $errorEmpty = true;
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<span>Correo no válido</span>";
            $errorEmail = true;
        }
        else if( $dao->existeEmail($_POST["email"])) {
            echo "<span>Correo no disponible</span>";
            $errorNotAvailable = true;
        }
    } else
        echo "emailNotSet";
?>
    <script>
        var errorEmpty = "<?php echo $errorEmpty; ?>";
        var errorEmail =  "<?php echo $errorEmail; ?>";
        var errorNotAvailable = "<?php echo $errorNotAvailable; ?>";

        if(errorEmpty || errorEmail || errorNotAvailable){
            $("#emailRegistro").addClass("border-danger");
        }
        else{
            $("#emailRegistro").removeClass("border-danger");
        }

    </script>

