<?php 
	require_once "../clases/Usuarios.php";
	$Usuarios = new Usuarios();

	$nombre = $_POST['nombre'];
	$ap_paterno = $_POST['ap_paterno'];
	$ap_materno = $_POST['ap_materno'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];

	$respuesta = $Usuarios->agregarUsuario($nombre,$ap_paterno, $ap_materno, $email,$usuario, $password);

	if ($respuesta) {
?>
	<script>
		alert("Registro exitoso! ;)");
		window.location.href = '../registro.php';
	</script>	

<?php
		  		
	} else {
?>
		<script>
			alert("Fallo!");
			window.location.href ='../registro.php';
		</script>	
<?php 
		
	}

 ?>