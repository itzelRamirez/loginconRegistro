<?php 
	
	require_once "Conexion.php";

	class Usuarios extends Conexion {
		public function agregarUsuario($nombre,$ap_paterno, $ap_materno, $email,$usuario, $password) {
			$conexion = Conexion::conectar();

			$password = sha1($password);

			$sql = "INSERT INTO t_usuarios (nombre,ap_paterno,ap_materno,email,usuario, password) 
					VALUES ('$nombre','$ap_paterno','$ap_materno','$email','$usuario','$password')";
			$result =  mysqli_query($conexion, $sql);
			return $result;
		}

		public function login($usuario, $password) {
			$conexion = Conexion::conectar();
			$password = sha1($password);
			$sql = "SELECT count(*) as total FROM t_usuarios 
					WHERE usuario = '$usuario' AND password = '$password'";
			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			if ($datos['total'] > 0) {
				//encontro el usuario
				$_SESSION['usuario'] = $usuario;
				header("location:../vistas/inicio.php");
			} else {
				//no encontro el usuario
				header("location:../index.php");
			}	

		}
	}
 ?>