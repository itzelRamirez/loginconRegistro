<?php 
	session_start();
	//el isset hace una validacion si la sesion es valida si no se va a inicio
	if(isset($_SESSION['usuario'])){
		require_once "menu.php";
		require_once "dependencias.php"
?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>CRUD</title>
		</head>
		<style>
			body {
				background-color:  #5C1235;
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
			<h1>Gastos Personales</h1>

			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="card text-left">
							<div class="card-header">
								Guarda tus Gastos Personales
							</div>
							<div class="card-body">
								<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
									Agregar nuevo <span class="fa fa-plus-circle"></span>
								</span>
								<hr>
								<div id="tablaDatatable"></div>
							</div>
							<div class="card-footer text-muted">
								By ITZEL
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Agrega nuevos gastos</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="frmnuevo">
								<label>Concepto de gasto</label>
								<input type="text" class="form-control input-sm" id="con_gasto" name="con_gasto">
								<label>Cantidad de gasto</label>
								<input type="text" class="form-control input-sm" id="cant_gasto" name="cant_gasto">
								<label>Fecha</label>
								<input type="text" class="form-control input-sm" id="fecha" name="fecha">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Actualizar gasto</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="frmnuevoU">
								<input type="text" hidden="" id="id_gasto" name="id_gasto">
								<label>Concepto del Gasto</label>
								<input type="text" class="form-control input-sm" id="con_gasto" name="con_gasto">
								<label>Cantidad del Gasto</label>
								<input type="text" class="form-control input-sm" id="cant_gasto" name="cant_gasto">
								<label>Fecha</label>
								<input type="text" class="form-control input-sm" id="fecha" name="fecha">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
						</div>
					</div>
				</div>
			</div>
		</body>
		</html>

<?php  
	} else {
		header("location:../index.php");
	}
 ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			datos=$('#frmnuevo').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
						alertify.success("agregado con exito :D");
					}else{
						alertify.error("Fallo al agregar :(");
					}
				}
			});
		});

        $('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Actualizado con exito :D");
					}else{
						alertify.error("Fallo al actualizar :(");
					}
				}
			});
		});
	});
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaDatatable').load('tabla.php');
    });
</script>

<script type="text/javascript">
    function agregaFrmActualizar(idgasto){
		$.ajax({
			type:"POST",
			data:"idgasto=" + idgasto,
			url:"procesos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idgasto').val(datos['id_gasto']);
				$('#con_gasto').val(datos['con_gasto']);
				$('#cant_gasto').val(datos['cant_gasto']);
				$('#fecha').val(datos['fecha']);
			}
		});
	}

    function eliminarDatos(idgasto){
        alertify.confirm('Eliminar un gasto', '¿Seguro de eliminar este gasto?', 
        function(){ 
                $.ajax({
        type:"POST",
        data:"idgasto=" + idgasto,
        url:"procesos/eliminar.php",
        success:function(r){
                                if(r==1){
                                        $('#tablaDatatable').load('tabla.php');
                                        alertify.success("Eliminado con exito! :D");
                                             }else{
                                                    alertify.error("No se pudo eliminar...");
                                                    }
                            }
                        });

                    }
        , function(){

                    });
    }
</script>