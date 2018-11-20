<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('session');
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
	
	<div id="contenedor" class="container">
		<div id="contenedor" class="container bg-white rounded">
			<div class="row rounded-top bg-primary ">
				<div class="container">
					<h2 class="p-2">Registrar producto</h2>
				</div>
			</div>
			<div class="container my-4">
				<form action="<?php echo base_url('inicio/insert'); ?>" method="POST">
					<?php
					if(isset($success)){
						echo "<p class='text-success'>Se ha registrado el producto exitosamente</p>";
					} else if(isset($fail)){
						echo "<p class='text-danger'>No se ha podido registrar el producto, intente de nuevo</p>";
					}
					?>
					<div class="form-row d-flex justify-content-around">
						<div class="form-group">
							<label for="nombre"><b>Nombre</b></label>
							<input name="nombre" id="nombre" type="text" placeholder="Nombre del producto" class="form-control <?php if(isset($vacios['nombre'])&&empty($vacios['nombre'])){ echo 'is-invalid'; } ?>" value='<?php if(isset($vacios['nombre'])){ echo $vacios['nombre'];} ?>'>
							<?php
							if(isset($vacios['nombre'])&&empty($vacios['nombre'])){
								echo "<div class='invalid-feedback'>Debes ingresar nombre</div>";
							}
							?>
						</div>
						<div class="form-group">
							<label for="numero"><b>precio</b></label>
							<input name="precio" type="number" id="numero" placeholder="Precio del producto" class="form-control <?php if(isset($vacios['precio'])&&empty($vacios['precio'])){ echo 'is-invalid'; } ?>" value='<?php if(isset($vacios['precio'])){ echo $vacios['precio'];} ?>'>
							<?php
							if(isset($vacios['precio'])&&empty($vacios['precio'])){
								echo "<div class='invalid-feedback'>Debes ingresar precio</div>";
							}
							?>
						</div>
					</div>
					<div class="form-row d-flex justify-content-around">
						<div class="form-group">
							<label for="existencia"><b>Existencia</b></label>
							<input name="existencia" type="number" id="existencia" placeholder="Cantidad de productos" class="form-control <?php if(isset($vacios['existencia'])&&empty($vacios['existencia'])){ echo 'is-invalid'; } ?>" value='<?php if(isset($vacios['existencia'])){ echo $vacios['existencia'];} ?>'>
							<?php
							if(isset($vacios['precio'])&&empty($vacios['precio'])){
								echo "<div class='invalid-feedback'>Debes ingresar Existencia</div>";
							}
							?>
						</div>
						<div class="form-group">
							<label for="categoria"><b>Categoria</b></label>
							<select name="categoria" id="categoria" class="form-control <?php if(isset($vacios['categoria'])&&empty($vacios['categoria'])){ echo 'is-invalid'; } ?>">
								<option value="">Selecciona Categoría</option>
								<option <?php if(isset($vacios['categoria'])&&($vacios['categoria']==1)){echo 'selected';} ?> value="1">Ferretería</option>
								<option <?php if(isset($vacios['categoria'])&&($vacios['categoria']==2)){echo 'selected';} ?> value="2">Alimentos</option>
								<option <?php if(isset($vacios['categoria'])&&($vacios['categoria']==3)){echo 'selected';} ?> value="3">Quincallería</option>
								<option <?php if(isset($vacios['categoria'])&&($vacios['categoria']==4)){echo 'selected';} ?> value="4">Ropa</option>
								<option <?php if(isset($vacios['categoria'])&&($vacios['categoria']==5)){echo 'selected';} ?> value="5">Juguetes</option>
								<option <?php if(isset($vacios['categoria'])&&($vacios['categoria']==6)){echo 'selected';} ?> value="6">Automotriz</option>
								<option <?php if(isset($vacios['categoria'])&&($vacios['categoria']==7)){echo 'selected';} ?> value="7">Electrodomésticos</option>
							</select>
							<?php
							if(isset($vacios['categoria'])&&empty($vacios['categoria'])){
								echo "<div class='invalid-feedback'>Debes ingresar categoria</div>";
							}
							?>
							<input type="hidden" name="usuario" value="<?php echo $this->session->idusuario; ?>">
						</div>
					</div>
					<div class="row container">
						<div class="form-group">
							<div class="form-row">
								<input class="btn btn-danger mr-2" type="reset" value="Restablecer">
								<input class="btn btn-primary" type="submit" value="Registrar">
							</div>
							<a class="btn btn-sm btn-success my-2" href="<?php echo base_url('inicio') ?>">Volver</a>
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