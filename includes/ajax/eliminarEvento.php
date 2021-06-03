<?php

use hypefit\DAO\EventosDAO;

require_once "../config.php";
require_once "../autorizacion.php";

$id = htmlspecialchars(trim(strip_tags($_POST['id'])));

$dao = new EventosDAO();
$dao->eliminarEvento($id);