<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang='es'>
	<head>
		<title>Iniciar sesión</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resource/Bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resource/fontawesome/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resource/css/estilo.css">
	</head>
	<body>
		<div id="contenedor" class="rounded bg-white mx-auto my-auto">
			<div class="rounded-top bg-primary">
				<h3 class="p-3 ml-3">Iniciar Sesión</h3>
			</div>
			<form action="<?php echo base_url('sesion/validate') ?>" method="POST" class="container">
				<div class="container mt-5">
					<div class="form-group">
						<label class="" for="usuario"><b>Nombre de Usuario:</b></label>
						<div class="input-group">
		      				<div class="input-group-prepend">
		      					<span class="input-group-text" for="username">
		      						<i class="fas fa-user text-black"></i>
		      					</span>
		      				</div>
						<input class="form-control <?php if((isset($vacios['usuario']) && empty($vacios['usuario']))||isset($incorrect)){echo 'is-invalid';} ?>" type="text" name="usuario" placeholder="ingresar usuario" id="usuario" value="<?php if(isset($_POST['usuario'])){echo $_POST['usuario'];} else if(isset($_COOKIE['usuario'])){echo $_COOKIE['usuario'];} ?>">
						<?php 
						if(isset($vacios['usuario'])&&empty($vacios['usuario'])){
							echo "<div class='invalid-feedback'>Debe ingresar el nombre de usuario</div>";
						}
						?>
						</div>
					</div>
					<div class="form-group">
						<label for="password"><b>Contraseña:</b></label>
						<div class="input-group">
		      				<div class="input-group-prepend">
		      					<span class="input-group-text"><i class="fas fa-key text-black"></i></span>
		      				</div>
						<input class="form-control <?php if((isset($vacios['password'])&&empty($vacios['password']))||isset($incorrect)){echo 'is-invalid';} ?>" type="password" name="password" placeholder="Ingresar Contraseña" id="password">
						<?php 
						if(isset($vacios['password'])&&empty($vacios['password'])){
							echo "<div class='invalid-feedback'>Debe ingresar la contraseña</div>";
						} 
						if(isset($incorrect)){
							echo "<div class='invalid-feedback'>Los datos introducidos son incorrectos</div>";
						}
						?>
						</div>
					</div>
					<div class="form-group custom-control custom-checkbox">
						<input name="recordar" value="1" id="recordar" type="checkbox" class="custom-control-input" <?php if(isset($_COOKIE['usuario'])){echo 'checked';} ?>>
						<label for="recordar" class="custom-control-label">Recuérdame</label>
					</div>
					<div class="form-group form-inline float-right">
						<input type="reset" class="btn btn-danger btn-lg mr-2" value="Reset">
						<input type="submit" class="btn btn-primary btn-lg" name="submit" value="Ingresar">
					</div>
						<div class="form-group">
						<a href="<?php echo base_url('sesion/regist') ?>">No tienes cuenta? Regístrate aquí!</a><br>
						<a href="">Se te olvidó la cuenta? Recupéralo aquí!</a>
					</div>
				</div>		
			</form>
			<a class='ml-4 mb-3 btn btn-success btn-sm' href="<?php echo base_url() ?>">menu principal</a>
		</div>
		<script src="<?php echo base_url(); ?>resource/Bootstrap/js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resource/Bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resource/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>