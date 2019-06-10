<?php
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
if (isset($_GET['Id'])){
	$Numero=intval($_GET['Id']);	
	$delete="DELETE FROM administraciond WHERE Id=".$Numero."; ";
	$query_update = mysqli_query($con,$delete);
	if ($query_update) {
		$messages[] = "Los Datos Se Han Modificado Con Exito.";
	} else {
		$errors[] = "Lo sentimos , No se Puede Eliminar El Banco.<br>";
	}
}

if (!isset($errors)){
?>
<table class="table">
<tr>
	<th class='text-center'>Texto</th>
	<th class='text-center'>Enlace</th>
    <th></th>
    <th></th>
    <th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select * from administraciond ");
	while ($row=mysqli_fetch_array($sql)){
        $Numero=$row["Id"];
        $Texto=$row["Texto"];
        $Enlace=$row['Enlace'];
        ?>
        <tr>
            <td class='text-center'>
                <input type="text" class="form-control" id="Texto<?php echo $Numero;?>" name="Texto<?php echo $Numero;?>"  placeholder="Texto" value="<?php echo $Texto;?>">
            </td>
            <td class='text-center'>
			    <div class="form-group ">							
                    <div class="col-md-12">
                        <select class='form-control' id="Enlace<?php echo $Numero;?>" name ="Enlace<?php echo $Numero;?>" placeholder="Enlace" > 
                            <?php 
                            $sql1="SELECT * FROM pagina order by Id ";    
                            $query1 = mysqli_query($con, $sql1);
                            while($row1=mysqli_fetch_array($query1)){
                                if($Enlace == $row1['Id']){
                                    echo '<option  value="'.$row1['Id'].'" selected>'.$row1['Nombre'].'</option>';
                                }else{
                                    echo '<option  value="'.$row1['Id'].'" >'.$row1['Nombre'].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
			</td>		
            <td>
                <span id="loader_B<?php echo $Numero;?>"></span>
            </td>
			<?PHP
		    	ECHO' 
                <td class="text-center">
                    <button type="button" class="btn btn-default"  onclick="ActualizarBoton('.$Numero.')">
                        <i class="fas fa-save"></i>
                    </button>
                </td>
                ';
                ECHO' 
                <td class="text-center">
                    <button type="button" class="btn btn-default"  onclick="EliminarBoton('.$Numero.')">
                        <i class="glyphicon glyphicon-trash"></i>
                    </button>
                </td>
				';
			?>
		</tr>		
		<?php
	}
echo '</table>'	;
}else{
	echo 'Error';
}

?>