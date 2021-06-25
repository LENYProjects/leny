<?php
	
	function isNull($nombre, $usuario, $contraseña, $con_password, $correo){
		if(strlen(trim($nombre)) < 1 || strlen(trim($usuario)) < 1 || strlen(trim($contraseña)) < 1 || strlen(trim($con_password)) < 1 || strlen(trim($correo)) < 1)
		{
			return true;
			} else {
			return false;
		}		
	}
	
	function isEmail($correo)
	{
		if (filter_var($correo, FILTER_VALIDATE_EMAIL)){
			return true;
			} else {
			return false;
		}
	}
	
	function validaPassword($var1, $var2)
	{
		if (strcmp($var1, $var2) !== 0){
			return false;
			} else {
			return true;
		}
	}
	
	function minMax($min, $max, $valor){
		if(strlen(trim($valor)) < $min)
		{
			return true;
		}
		else if(strlen(trim($valor)) > $max)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function usuarioExiste($usuario)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id FROM usuario WHERE usuario = ? LIMIT 1");
		$stmt->bind_param("s", $usuario);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}
	
	function emailExiste($correo)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id FROM usuario WHERE correo = ? LIMIT 1");
		$stmt->bind_param("s", $correo);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;	
		}
	}
	
	/*function generateToken()
	{
		$gen = md5(uniqid(mt_rand(), false));	
		return $gen;
	}
	*/
	function hashPassword($contraseña) 
	{
		$hash = password_hash($contraseña, PASSWORD_DEFAULT);
		return $hash;
	}
	
	function resultBlock($errors){
		if(count($errors) > 0)
		{
			echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\">[X]</a>
			<ul>";
			foreach($errors as $error)
			{
				echo "<li>".$error."</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}
	
	function registraUsuario($nombre, $apellido, $usuario, $correo, $pass_hash, $tipoUsuario){
		
		global $mysqli;
		
		$stmt = $mysqli->prepare("INSERT INTO usuario (nombre, apellido, usuario, correo, contraseña, id_us) VALUES(?,?,?,?,?,?)");
		$stmt->bind_param('sssssi', $nombre, $apellido, $usuario, $correo, $pass_hash, $tipoUsuario);
		
		if ($stmt->execute()){
			return $mysqli->insert_id;
			} else {
			return 0;	
		}		
	}

	function crearTarea($nom_tarea, $id_tarea, $fecha_inicial, $fecha_final, $prioridad, $estado, $participantes, $nom_proyecto)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("INSERT INTO tarea (nom_T, id_tarea, fecha_Inicio, fecha_Final, prioridad, estado, participantes, nom_proyecto) VALUES(?,?,?,?,?,?,?,?)");
		$stmt->bind_param('sissssis', $nom_tarea, $id_tarea, $fecha_inicial, $fecha_final, $prioridad, $estado, $participantes, $nom_proyecto);
		
		if ($stmt->execute()){
			return $mysqli->insert_id; 
			} else {
			return 0;	
		}	
	}

	function tareaExiste($nom_tarea)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT nom_T FROM tarea WHERE nom_t = ? LIMIT 1");
		$stmt->bind_param("s", $nom_tarea);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}

	function crearProyecto($nom_proyecto, $tema, $fecha_inicial, $fecha_final, $estado, $participantes, $encargado)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("INSERT INTO proyecto (nom_P, id_tarea, fecha_Inicio, fecha_Final, tema, estado, participantes) VALUES(?,?,?,?,?,?,?)");
		$stmt->bind_param('sssssii', $nom_proyecto, $tema, $fecha_inicial, $fecha_final, $estado, $participantes, $encargado);
		
		if ($stmt->execute()){
			return $mysqli->insert_id; 
			} else {
			return 0;	
		}	
	}

	function proyectoExiste($nom_proyecto)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT nom_P FROM proyecto WHERE nom_P = ? LIMIT 1");
		$stmt->bind_param("s", $nom_proyecto);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}

	
	/*function enviarEmail($email, $nombre, $asunto, $cuerpo){
		
		require_once 'PHPMailer/PHPMailerAutoload.php';
		
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tipo de seguridad'; //Modificar
		$mail->Host = 'dominio'; //Modificar
		$mail->Port = puerto; //Modificar
		
		$mail->Username = 'correo emisor'; //Modificar
		$mail->Password = 'password de correo emisor'; //Modificar
		
		$mail->setFrom('correo emisor', 'nombre de correo emisor'); //Modificar
		$mail->addAddress($email, $nombre);
		
		$mail->Subject = $asunto;
		$mail->Body    = $cuerpo;
		$mail->IsHTML(true);
		
		if($mail->send())
		return true;
		else
		return false;
	}
	*/ #Esto sirve para enviar email

	/*function validaIdToken($id, $token){
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id = ? AND token = ? LIMIT 1");
		$stmt->bind_param("is", $id, $token);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		if($rows > 0) {
			$stmt->bind_result($activacion);
			$stmt->fetch();
			
			if($activacion == 1){
				$msg = "La cuenta ya se activo anteriormente.";
				} else {
				if(activarUsuario($id)){
					$msg = 'Cuenta activada.';
					} else {
					$msg = 'Error al Activar Cuenta';
				}
			}
			} else {
			$msg = 'No existe el registro para activar.';
		}
		return $msg;
	}
	
	function activarUsuario($id)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET activacion=1 WHERE id = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}
	*/
	function isNullLogin($usuario, $contraseña){
		if(strlen(trim($usuario)) < 1 || strlen(trim($contraseña)) < 1)
		{
			return true;
		}
		else
		{
			return false;
		}		
	}
	
	function login($usuario, $contraseña)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id, id_us, contraseña FROM usuario WHERE usuario = ? || correo = ? LIMIT 1");
		$stmt->bind_param("ss", $usuario, $usuario);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		if($rows > 0) {
			
			/*if(isActivo($usuario)){
				
				$stmt->bind_result($id, $id_us, $passwd);
				$stmt->fetch();
				
				$validaPassw = password_verify($contraseña, $passwd);
				
				if($validaPassw){
					
					lastSession($id);
					$_SESSION['id_usuario'] = $id;
					$_SESSION['tipo_usuario'] = $id_tipo;
					*/
					
					header("location: inicio.html"); #redireccion a la pantalla principal
					 #else {
					
				#	$errors = "La contrase&ntilde;a es incorrecta";
				 #   }
				
			} else {
			$errors = "El nombre de usuario o correo electronico no existe";
		}
		return $errors;
	}
	
	/*function lastSession($id)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("UPDATE usuario SET last_session=NOW(), token_password='', password_request=0 WHERE id = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		$stmt->close();
	}*/
	
	/*function isActivo($usuario)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE usuario = ? || correo = ? LIMIT 1");
		$stmt->bind_param('ss', $usuario, $usuario);
		$stmt->execute();
		$stmt->bind_result($activacion);
		$stmt->fetch();
		
		if ($activacion == 1)
		{
			return true;
		}
		else
		{
			return false;	
		}
	}*/ 
	
	function generaTokenPass($user_id)
	{
		global $mysqli;
		
		$token = generateToken();
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET token_password=?, password_request=1 WHERE id = ?");
		$stmt->bind_param('ss', $token, $user_id);
		$stmt->execute();
		$stmt->close();
		
		return $token;
	}
	
	function getValor($campo, $campoWhere, $valor)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT $campo FROM usuarios WHERE $campoWhere = ? LIMIT 1");
		$stmt->bind_param('s', $valor);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		
		if ($num > 0)
		{
			$stmt->bind_result($_campo);
			$stmt->fetch();
			return $_campo;
		}
		else
		{
			return null;	
		}
	}
	
	function getPasswordRequest($id)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT password_request FROM usuarios WHERE id = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->bind_result($_id);
		$stmt->fetch();
		
		if ($_id == 1)
		{
			return true;
		}
		else
		{
			return null;	
		}
	}
	
	function verificaTokenPass($user_id, $token){
		
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id = ? AND token_password = ? AND password_request = 1 LIMIT 1");
		$stmt->bind_param('is', $user_id, $token);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		
		if ($num > 0)
		{
			$stmt->bind_result($activacion);
			$stmt->fetch();
			if($activacion == 1)
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	
	function cambiaPassword($password, $user_id, $token){
		
		global $mysqli;
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET password = ?, token_password='', password_request=0 WHERE id = ? AND token_password = ?");
		$stmt->bind_param('sis', $password, $user_id, $token);
		
		if($stmt->execute()){
			return true;
			} else {
			return false;		
		}
	}		