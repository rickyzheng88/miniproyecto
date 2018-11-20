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
		<div id="contenedor2" class="rounded bg-white mx-auto my-auto">
			<div class="rounded-top bg-primary">
				<h3 class="p-3 ml-3">Registro de usuario</h3>
			</div>
			<div class="container">
				<form class="container" action="<?php echo base_url('sesion/regist_user') ?>" method="POST">
					<?php 
					if(isset($success)){
						echo "<p class='text-success'>Se ha registrado existosamente</p>";
					} else if(isset($fail)){
						echo "<p class='text-danger'>No se pudo registrar, intente de nuevo</p>";
					}
					?>
					<div class="form-group">
						<label class="" for="usuario">Nombre de Usuario:</label>
						<input name="usuario" class="form-control <?php if(isset($vacios['usuario'])&&empty($vacios['usuario'])||isset($caracter['usuario'])||isset($existe)){echo 'is-invalid';} ?>" id="usuario" type="text" placeholder="Ingrese Usuario" value="<?php if(isset($_POST['usuario'])){ echo $_POST['usuario']; } ?>">
						<?php
						if(isset($existe)){
							echo "<div class='invalid-feedback'>El nombre de usuario ya existe</div>";
						} else if (isset($vacios['usuario'])&&empty($vacios['usuario'])){
							echo "<div class='invalid-feedback'>Debes ingresar un usuario</div>";
						} else if(isset($caracter['usuario'])){
							echo "<div class='invalid-feedback'>El nombre de usuario contiene caracteres inválidos, solo puedes introducir letras y numeros</div>";
						}
						?>
					</div>
					<div class="form-group">
						<label for="password">Contraseña:</label>
						<input name="clave" class="form-control <?php if(isset($vacios['clave'])&&empty($vacios['clave'])){echo 'is-invalid';} ?>" id="password" type="password" placeholder="Ingrese Contraseña">
						<?php
						if(isset($vacios['clave'])&&empty($vacios['clave'])){
							echo "<div class='invalid-feedback'>Debes ingresar una contraseña</div>";
						}
						?>
					</div>
					<div class="form-group">
						<label for="repeat">Contraseña otra vez:</label>
						<input name="repeat" class="form-control <?php if(isset($vacios['repeat'])&&empty($vacios['repeat'])||isset($caracter['repeat'])){echo 'is-invalid';} ?>" id="repeat" type="password" placeholder="Ingrese de nuevo la contraseña">
						<?php
						if(isset($vacios['repeat'])&&empty($vacios['repeat'])){
							echo "<div class='invalid-feedback'>Repita la contraseña</div>";
						} else if (isset($caracter['repeat'])) {
							echo "<div class='invalid-feedback'>Este campo debe ser igual a la contraseña introducida</div>";
						}
						?>
					</div>
					<div class="d-flex justify-content-around">
						<div class="form-group">
							<label for="correo">Correo electrónico:</label>
							<div class="input-group">			
								<div class="input-group-prepend">
		      						<div class="input-group-text">@</div>
  								</div>	
								<input class="form-control <?php if(isset($vacios['correo'])&&empty($vacios['correo'])||isset($caracter['correo'])){echo 'is-invalid';} ?>" name="correo" type="text" id="correo" placeholder="Ingrese Correo" value="<?php if(isset($_POST['correo'])){echo $_POST['correo'];} ?>">
								<?php
									if(isset($vacios['correo'])&&empty($vacios['correo'])){
										echo "<div class='invalid-feedback'>Debes ingresar un correo</div>";
									} else if(isset($caracter['correo'])){
										echo "<div class='invalid-feedback'>has introducido caracteres incorrectos</div>";
									}
								?>
							</div>
						</div>
						<div class="form-group">
							<label for="telefono">Telefono:</label>
							<div class="input-group">
								<div class="input-group-prepend">
			      					<span class="input-group-text" for="username">
			      						<i class="fas fa-user text-black"></i>
			      					</span>
	      						</div>
								<input type="tel" maxlength="11" id="telefono" name="telefono" placeholder="Ingrese Nro. Telefono" class="form-control <?php if(isset($vacios['telefono'])&&empty($vacios['telefono'])||isset($caracter['telefono'])){echo 'is-invalid';} ?>" value="<?php if(isset($_POST['telefono'])){echo $_POST['telefono'];} ?>">
								<?php
									if(isset($vacios['telefono'])&&empty($vacios['telefono'])){
										echo "<div class='invalid-feedback'>Debes ingresar un Nro. tel.</div>";
									} else if(isset($caracter['telefono'])){
										echo "<div class='invalid-feedback'>Debes introducir solo numeros</div>";
									}
								?>
							</div>
						</div>
					</div>
					<div class="form-group form-inline">
						<a class="btn btn-success btn-lg mb-5" href="<?php echo base_url('sesion');?>">Volver</a>
						<input class="btn btn-danger btn-lg mx-2 mb-5" type="reset" value="Reset">
						<input class="btn btn-primary btn-lg mb-5" type="submit" name="submit" value="Ingresar">
					</div>
				</form>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>resource/Bootstrap/js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resource/Bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resource/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>