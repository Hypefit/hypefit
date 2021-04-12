<?php
	session_start();
	$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
	$password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));

	$dao = new UsuarioDAO();
	$usuario = $dao->getUsuarioPorEmail($email);
	$hash = $usuario->getHashPassword();


	if (password_verify($password, $hash)){
		$_SESSION["login"] = true;
		$_SESSION["nombre"] = $usuario->getNombre();
		$_SESSION["rol"] = $usuario->getRol();
		$_SESSION["aprobado"] = $usuario->getAprobado();
	}

	header("Location: ../perfil.php");
?>


<body>
<div id="contenedor">

	<?php
	require("cabecera.php");
	?>

<div id="contenido">
	<?php
		if (!isset($_SESSION["login"])) { //Usuario incorrecto
			echo "<h1>ERROR</h1>";
			echo "<p>El usuario o contraseña no son válidos.</p>";
		}
		else { //Usuario registrado
			echo "<h1>Bienvenido {$_SESSION['nombre']}</h1>";
			echo "<p>Usa el menú de Hypefit para navegar.</p>";
		}
	?>
</div>

    <?php
	  #include("sidebarDer.php");
	  #include("pie.php");
	?>

</div> <!-- Fin del contenedor -->
</body></html>
