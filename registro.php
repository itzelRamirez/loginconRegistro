<!DOCTYPE html>
<html>
<head>
	<title>Registro de usuario</title>
	<?php require_once "dependencias.php"; ?>
</head>
<style>
	body {
		background-color:  #94167B;
		margin:50px auto;
		width:600px;
		}
	h1 {
		color: white;
		text-align: center;
		}
		#customers tr,td {
						background-color: #DC88CB;
						text-align: left;
						padding: 20px;
						color: white;

						}
</style>

<body>
	<div class="container"> 
		<h1><i class="fas fa-user-plus"></i> Registro de usuarios</h1> 
		<br>
		<div>
			<div class="col-sm-20">
				<form action="procesos/registro.php" method="post">
	<table id="customers">
		<tr>
			<td>
				<img  class="card-img-top" src="Usuario1.png" >
			</td>
			<td>
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" required="" placeholder="Nombre">
					<label for="ap_paterno">Apellido Paterno</label>
					<input type="text" name="ap_paterno" class="form-control" required="" placeholder="Apellido Paterno">
					<label for="ap_materno">Apellido Materno</label>
					<input type="text" name="ap_materno" class="form-control" required="" placeholder="Apellido Materno">
			</td>
			<td>
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" required="" placeholder="Email">
					<label for="usuario">Usuario</label>
					<input type="text" name="usuario" class="form-control" required="" placeholder="Usuario">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control" required="" placeholder="Contraseña">
			</td>
		</tr>	
	</table>
					<br>
					<center>
					<button class="btn btn-danger">Registrar</button>
					<a href="index.php" >Logear</a>
					</center>
				</form>
			</div>
		</div>		
	</div>				
</style>
</body>
</html>