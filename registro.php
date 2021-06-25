<?php
	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	
	$errors = array();
	
	if(!empty($_POST)){

		$nombre = $mysqli ->real_escape_string($_POST['nombre']);
		$apellido = $mysqli ->real_escape_string($_POST['apellido']);
		$usuario = $mysqli ->real_escape_string($_POST['usuario']);
		$correo = $mysqli ->real_escape_string($_POST['correo']);
		$contraseña = $mysqli ->real_escape_string($_POST['contraseña']);
		$con_password = $mysqli ->real_escape_string($_POST['con_password']);

		$activo = 0;

		$tipoUsuario = 2; #el tipo de usurio que sera en este caso es normal
		$secret = '';

		if(!isEmail($correo))
		{
			$errors[] = "Dirección de correo inválido";
		}

		if(!validaPassword($contraseña, $con_password))
		{
			$errors[] = "Las contraseñas no coinciden";
		}

		if(usuarioExiste($usuario))
		{
			$errors[] = "El nombre de usuario $usuario ya existe";
		}

		if(emailExiste($correo))
		{
			$errors[] = "El correo $correo ya existe";
		}

		if(count($errors)==0)
		{
			$pass_hash = hashPassword($contraseña);
			#$token = generateToken();

			$registro = registraUsuario($nombre, $apellido, $usuario, $correo, $pass_hash, $tipoUsuario);

			if($registro > 0)
			{
				#aqui se puede agregar la funcion de enviar correo
			}else{
				$errors[] = "Error al Registrar";
			}
		}

	}
	
?>

<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registro</title>
		<link rel="stylesheet" type="text/css" href="CSS/registro.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	
	<body>
		<div class="container">
			<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">Reg&iacute;strate</div>
						<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="index.php">Iniciar Sesi&oacute;n</a></div>
					</div>  
					
					<div class="panel-body" >
						
						<form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
							<div class="form-group">
								<label for="nombre" class="col-md-3 control-label">Nombre:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellido" class="col-md-3 control-label">Apellido:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="apellido" placeholder="Apellido" value="<?php if(isset($apellido)) echo $apellido; ?>" required >
								</div>
							</div>
							
							<div class="form-group">
								<label for="usuario" class="col-md-3 control-label">Usuario</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required>
								</div>
							</div>

							<div class="form-group">
								<label for="correo" class="col-md-3 control-label">Correo</label>
								<div class="col-md-9">
									<input type="email" class="form-control" name="correo" placeholder="Correo" value="<?php if(isset($correo)) echo $correo; ?>" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="contraseña" class="col-md-3 control-label">Contraseña</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="contraseña" placeholder="Contraseña" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
								</div>
							</div>
							
							<div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-signup" type="submit" class="btn btn-info" href="login.html"><i class="icon-hand-right"></i>Registrar</button> 
								</div>
							</div>
						</form>
						<?php echo resultBlock($errors); ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>															