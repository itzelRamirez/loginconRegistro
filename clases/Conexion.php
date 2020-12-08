
<?php 

	class Conexion{
		public function conectar(){
			$conexion = mysqli_connect('localhost', 
										'root', 
										'', 
										'loginRegistro');
			$conexion->set_charset('utf8');
			return $conexion;
		}
	}
 ?>
