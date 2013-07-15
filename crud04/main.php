<?php
require_once 'login.php';

?>
<!doctype>
<html>
<head>
	<meta charset="utf-8">
	<title>Intranet</title>
	
	
</head>
<body>
	<header>
		<div>Bienvenido <?php echo $_SESSION['nick'];?></div>
		<nav>
			<a href="salir.php">Cerrar Sesión</a>
		</nav>
	</header>
	
	<section>
		<menu>
			<ul>
				<li>
					<a href="usuario.php">Tabla de Usuario</a>
				</li>
				<li>
					<a href="#">Otra Tabla 1</a>
				</li>
				<li>
					<a href="#">Otra Tabla 2</a>
				</li>
			</ul>
		</menu>
	</section>
	
	<footer>
		<hr/>
		Intranet - Cimas &copy 2013
	</footer>

</body>
</html>