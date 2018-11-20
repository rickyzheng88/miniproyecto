<?php
defined('BASEPATH') OR exit('No direct script access allowed');
foreach ($query->result_array() as $key) {
	$id = $key['id'];
	$nombre = $key['nombre'];
	$precio = $key['precio'];
	$categoria = $key['catalogo'];
	$existencia = $key['existencia'];
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro de productos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resource/Bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resource/fontawesome/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resource/css/estilo.css">
	</head>
	<body>
		<div id="contenedor" class="container ">
			<div id="contenedor" class="container bg-white rounded">
				<div class="row rounded-top bg-primary">
					<div class="container">
						<h2 class="p-2">Modificar productos</h2>
					</div>
				</div>
				<div class="row container">
					<form action="<?php echo base_url('inicio/update') ?>" method="POST"><?php 
								if(isset($success)){
									echo "<p class='text-success'>Se ha modificado el producto exitosamente</p>";
								} else if(isset($fail)){
									echo "<p class='text-danger'>No se ha podido modificar el producto, por favor intente de nuevo</p>";
								}
								?>
						<div class="form-row container">
							<div class="form-group col-2">

								<label for="id">id:</label>
								<input disabled type="text" id="id" class="form-control" value="<?php echo $id; ?>">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
							</div>
						</div>
						<div class="form-row container">
							<div class="form-group col-6">
								<label for="nombre">Nombre:</label>
								<input value="<?php echo $nombre; ?>" type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre">
							</div>
							<div class="form-group col-6">
								<label for="precio">Precio:</label>
								<input value="<?php echo $precio; ?>" type="number" name="precio" id="precio" class="form-control" placeholder="Ingrese precio">
							</div>
						</div>
						<div class="form-row container">
							<div class="form-group col-6">
								<label for="categoria">Categoria:</label>
								<select class="form-control" name="categoria" id="categoria">
									<option <?php if($categoria == 'ferreteria'){echo 'selected';} ?> value="1">ferreteria</option>
									<option <?php if($categoria == 'alimentos'){echo 'selected';} ?> value="2">alimentos</option>
									<option <?php if($categoria == 'quincalleria'){echo 'selected';} ?> value="3">quincalleria</option>
									<option <?php if($categoria == 'ropa'){echo 'selected';} ?> value="4">ropa</option>
									<option <?php if($categoria == 'juguete'){echo 'selected';} ?> value="5">juguete</option>
									<option <?php if($categoria == 'automotriz'){echo 'selected';} ?> value="6">automotriz</option>
									<option <?php if($categoria == 'electrodomestico'){echo 'selected';} ?> value="7">electrodomestico</option>
								</select>
							</div>
							<div class="form-group col-6">
								<label for="existencia">Existencia:</label>
								<input name="existencia" value="<?php echo $existencia; ?>" type="number" class="form-control" id="existencia" placeholder="Ingrese existencia">
							</div>
						</div>
						<div class="form-row container">
							<div class="form-group">
								<a href="<?php echo base_url('inicio'); ?>" class="btn btn-success">Volver</a>
								<input type="reset" name="reset" value="Reset" class="btn btn-danger">
								<input type="submit" name="submit" value="Ingresar" class="btn btn-primary">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		

		<script src="<?php echo base_url(); ?>resource/Bootstrap/js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resource/Bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resource/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>