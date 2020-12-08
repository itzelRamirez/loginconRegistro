<?php
    require_once "../clases/Conexion.php";
   
    $obj= new conectar();
    $conexion= $obj->conexion();

    $sql="SELECT id_gasto, 
                    con_gasto,
                    cant_gasto,
                    fecha
        from t_crud";
        $result=mysqli_query($conexion,$sql);
?>

<div>
    <table class="table table-hover table-condensed table-bordered"  id="tablaDatatable">
        <thead style="background-color: #dc3545;color: white; font-weight: bold;">
            <tr>
                <td>Concepto Gasto</td>
                <td>Cantidad Gasto</td>
                <td>Fecha</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tfoot style="background-color: #dc3545;color: white; font-weight: bold;">
            <tr>
                <td>Concepto Gasto</td>
                <td>Cantidad Gasto</td>
                <td>Fecha</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </tfoot>
        <tbody style="background-color: white">
            <?php
                while($mostrar=mysqli_fetch_row($result)){
            ?>
            <tr>
                <td><?php echo $mostrar[1]?></td>
                <td><?php echo $mostrar[2]?></td>
                <td><?php echo $mostrar[3]?></td>
                <td style="text-align: center;">
                    <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar" 
                    onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
						<span class="fa fa-pencil-square-o"></span>
					</span>
                </td>
                <td  style="text-align: center;">
                    <span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0] ?>')">
                        <span class="fa fa-trash"></span>
                    </span>
                </td>
            </tr>
            <?php
             }
            ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#iddatatable').DataTable();
    } );
</script>