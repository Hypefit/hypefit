<?php

use hypefit\DAO\EventosDAO;

include("../../config.php");

if (isset($_POST["id"])) {
    $dao = new EventosDAO();
    $dao->eliminarEvento($_POST["id"]);
}
