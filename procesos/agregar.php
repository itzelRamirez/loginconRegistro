<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['con_gasto'],
		$_POST['cant_gasto'],
		$_POST['fecha']
				);

	echo $obj->agregar($datos);
	

 ?>