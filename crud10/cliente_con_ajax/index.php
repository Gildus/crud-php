<?php
require_once '../login.php';
require_once '../include/Cliente.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>CIMAS - 35068 - Intranet</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet">
	<link href="../css/cliente.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
      <script src="../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Wrap all page content here -->
    <div id="wrap">

      <?php include '../header.php';?>

      <!-- Begin page content -->
      <div class="container">
        <div class="page-header">
          <h1>Listado de Clientes</h1>
        </div>
        <p class="lead">Clientes registrados en el sistema,....</p>
        <p>
            <button class="btn btn-primary btn-lg" id="btn-adicionar">Adicionar Nuevo</button>
        </p>
        
        
    <div class="modal fade" id="modal_cliente" tabindex="-1" role="dialog" aria-labelledby="modalCliente" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="titulo_accion">Este titulo cambiara con jquery según sea nuevo o edición</h4>
            </div>
            <div class="modal-body">
                
                <div class="alert alert-block alert-danger" style="display:none;">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">&times;</button>
                    <h4>Hubo un error!</h4>
                    <p>No se pudo realizar la operaci&oacute;n, por favor vuelva ha intentarlo.</p>
                </div>
                
                <form id="frmModal" class="form-horizontal" method="post" role="form">			
                    <input type="hidden" name="id" id="id" value=""/>
                    <div class="form-group">
                        <label for="nombre_cliente" class="col-lg-2 control-label">Nombre Cliente: </label>					
                        <div class="col-lg-10">
                            <input type="text" required="required" class='form-control' name="nombre_cliente" id="nombre_cliente" placeholder="Nombre del Cliente"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estado" class="col-lg-2 control-label">Estado Cliente: </label>
                        <div class="col-lg-10">
                            <select id='estado' name='estado' class="form-control">
                                <option value='E'>Habilitado</option>
                                <option value='D'>Deshabilitado</option>
                            </select>
                        </div>
                    </div>
                </form>
                
                
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="btn-guardar">Guardar</button>
            </div>
          </div>
        </div>
    </div>
        
        
        
        
        <div class="table-responsive">
            <table class='table table-bordered table-hover table-condensed'>
                    <thead>
                            <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th></th>
                            </tr>
                    <thead>
                    <tbody>
<?php
$obj = new Cliente();
$clientes = $obj->obtenerTodosClientes();
foreach($clientes as $item){ ?>
                            <tr>
                                    <td><?php echo $item['idcliente'];?></td>
                                    <td><?php echo $item['nombre_cliente'];?></td>
                                    <td><?php echo $item['status'];?></td>
                                    <td>
                                            <a class="btn btn-default btn-xs btn-editar" data-id="<?php echo $item['idcliente'];?>">Editar</a>						
                                            <a class="btn btn-danger btn-xs btn-eliminar" data-id="<?php echo $item['idcliente'];?>">Eliminar</a>
                                    </td>
                            </tr>

<?php } ?>			

                    </tbody>			
            </table>
	</div>
		
	
		
      </div>
    </div>

    
	<?php include '../footer.php';?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/cliente.js"></script>
  </body>
</html>
