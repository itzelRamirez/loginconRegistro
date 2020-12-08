<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php 
		require_once "dependencias.php"; 
		session_start();
		if (isset($_SESSION['usuario'])) {
			header("location:vistas/inicio.php");
		}
	?>
</head>
<style>
	body {
		background-color: #AE5CA9;
		}
	h1 {
		color: white;
		text-align: center;
		}
	#customers tr,td {
					background-color: #FFCECB;
					text-align: left;
					padding: 20px;
					color: white;
					}	
</style>
<body>
	<div class="container">
			<img class="card-img-top" src="welcome.jpeg" alt="Card image cap">
		<br>
		<table width="550" align=center  id="customers">
			<tr>
				<h1>Login de usuario</h1>
				<td>
					<img class="card-img-top" src="inicio.png" alt="Card image cap">
				</td>
					<td>
						<br>
					</td>
				<td>
				<br>
				<div style="width: 20rem;">
					<form action="procesos/login.php" method="post">
							<label for="usuario">
							<i class="fas fa-user"></i> Usuario
							<input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
							<label for="password">
							<i class="fas fa-lock"></i> Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password">
							<br>
							<center>
								<button class="btn btn-primary">Entrar</button>
								<br>
								<a href="registro.php"><i class="fas fa-user-plus"></i></a>
							</center>
						</form>
				</td>
			</tr>
	</table>
	</div>
</body>
</html>

