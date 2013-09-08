<?php
$archivo = dirname($_SERVER['PHP_SELF']);

$menu_inicio_activo = false;
$menu_usuario_activo = false;
$menu_cliente_activo = false;
$menu_facturas_activo = false;

if(stristr($archivo,'usuario')) {
	$menu_usuario_activo = true;
} elseif( stristr($archivo,'cliente') ){
	$menu_cliente_activo = true;
} elseif( stristr($archivo,'facturas') ){
	$menu_facturas_activo = true;
} else {
	$menu_inicio_activo = true;
}



?>
<!-- Fixed navbar -->
  <div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	  <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Proyecto CIMAS</a>
	  </div>
	  <div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
		  <li <?php echo ($menu_inicio_activo) ? 'class="active"':''; ?>><a href="/ejemplo10">Inicio</a></li>
                  <li <?php echo ($menu_cliente_activo) ? 'class="active"':''; ?>><a href="/ejemplo10/cliente">Clientes</a></li>
		  <li <?php echo ($menu_usuario_activo) ? 'class="active"':''; ?>><a href="/ejemplo10/usuario">Usuarios</a></li>
		  <li <?php echo ($menu_facturas_activo) ? 'class="active"':''; ?>><a href="/ejemplo10/facturas">Facturas</a></li>		  
		  <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Opciones con Ajax <b class="caret"></b></a>
			<ul class="dropdown-menu">
                          <li><a href="/ejemplo10/cliente_con_ajax/">Clientes</a></li>
			  <li><a href="#">Usuarios</a></li>			  
			  <li><a href="#">Facturas</a></li>			  
			</ul>
		  </li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#">Bienvenido <?php echo $_SESSION['nick'];?></a></li>
			<li><a href="/ejemplo10/salir.php">Cerrar Sesión</a></li>			
		</ul>
		
		
	  </div><!--/.nav-collapse -->
	</div>
  </div>
  