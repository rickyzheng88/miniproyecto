<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('session');
?>
<!DOCTYPE html>
<html lang='es'>
	<head>
		<title>Sistema de productos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resource/Bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resource/fontawesome/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resource/css/estilo.css">
	</head>
	<body>
		<div class="container bg-white rounded">
			<div class="mt-5 d-flex">
				<div class="col-4">
					<?php
					if (!isset($this->session->usuario)) {
						echo "<a href='".base_url('sesion')."'>iniciar sesion</a>";
					} else {
						echo "Bienvenidos ".$this->session->usuario."!";
						 echo "<a href='".base_url('sesion/cerrar_sesion')."'> Cerrar sesión</a>";

					}
					
					?>
					<form action="<?php echo base_url('inicio/search_products') ?>" method="POST" class="mt-5">
						<div class="form-group form-inline">
							<input name="id" type="text" class="form-control mr-1" placeholder="Buscar por ID">
							<input type="submit" class="btn btn-primary" value="Buscar">
						</div>
					</form>
					<form action="<?php echo base_url('inicio/search_products') ?>" method="POST">
						<div class="form-group form-inline">
							<input name="nombre" type="text" class="form-control mr-1" placeholder="Buscar por Nombre">
							<input type="hidden" name="wol" value='TRUE'>
							<input type="submit" class="btn btn-primary" value='Buscar'>
						</div>
					</form>
					<form action="<?php echo base_url('inicio/search_products') ?>" method="POST">
						<div class="custom-control form-inline p-0 mb-5">
							<select name="categoria" id="categoria" class="custom-select">
								<option value="">Selecciona Categoría</option>
								<option value="1">Ferretería</option>
								<option value="2">Alimentos</option>
								<option value="3">Quincallería</option>
								<option value="4">Ropa</option>
								<option value="5">Juguetes</option>
								<option value="6">Automotriz</option>
								<option value="7">Electrodomésticos</option>
							</select>
							<input type="submit" class="btn btn-primary" value='Buscar'>
						</div>
					</form>
				</div>
				<div class="col-8 table-responsive">
					<table class="mt-1 mb-1 table rounded table-hover">
						<thead>
							<tr class="bg-primary">
								<td>ID</td>
								<td>Nombre</td>
								<td>Categoría</td>
								<td>Existencia</td>
								<td>Precio</td>
							</tr>
						</thead>
						<tbody>
							<?php 
							if(isset($empty)){
								echo "<tr>";
								echo "<td>"."</td>";
								echo "<td>".'Ningun Resultado'."</td>";
								echo "<td>"."</td>";
								echo "<td>"."</td>";
								echo "<td>"."</td>";
								echo "</tr>";
							} else {
							foreach ($query->result() as $result) {
								echo "<tr>";
								echo "<td>".$result->id."</td>";
								echo "<td>".$result->nombre."</td>";
								echo "<td>".$result->catalogo."</td>";
								echo "<td>".$result->existencia."</td>";
								echo "<td>".$result->precio."</td>";
								echo "</tr>";
								}
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>


		<script src="<?php echo base_url(); ?>resource/Bootstrap/js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resource/Bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resource/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>