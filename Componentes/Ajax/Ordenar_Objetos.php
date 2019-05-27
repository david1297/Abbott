<?php
$session_id= session_id();


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
$TipoS = mysqli_real_escape_string($con,(strip_tags($_GET["TipoS"],ENT_QUOTES)));
$Session = mysqli_real_escape_string($con,(strip_tags($_GET["Session"],ENT_QUOTES)));
$Direccion = mysqli_real_escape_string($con,(strip_tags($_GET["Direccion"],ENT_QUOTES)));
$Linea = mysqli_real_escape_string($con,(strip_tags($_GET["Linea"],ENT_QUOTES)));

$IdA = 0;
$OrdenA = 0;
if($TipoS ==1){
	$sql="SELECT * FROM seccion1d where Seccion =$Session  order by Orden ";
	$query1 = mysqli_query($con, $sql);

	if($Direccion =='Arriba'){
		while ($row=mysqli_fetch_array($query1)){
			if ($row['Id'] ==$Linea){
				$sql =  "UPDATE seccion1d SET Orden=$OrdenA where Id = $Linea  ;";
			
				$query_update = mysqli_query($con,$sql);
				$sql =  "UPDATE seccion1d SET Orden=".$row['Orden']." where Id = $IdA  ;";
				$query_update = mysqli_query($con,$sql);
			}else{
				$IdA = $row['Id'];
				$OrdenA = $row['Orden'];
			}
		}
	}
	if($Direccion =='Abajo'){
		while ($row=mysqli_fetch_array($query1)){
			if ($row['Id'] ==$Linea){
				$IdA = $row['Id'];
				$OrdenA = $row['Orden'];
				
			}else{
				if ($IdA <>0){
					$sql =  "UPDATE seccion1d SET Orden=".$row['Orden']." where Id = $Linea ;";
					$query_update = mysqli_query($con,$sql);
					$sql =  "UPDATE seccion1d SET Orden= $OrdenA where Id = ".$row["Id"]." ;";
					$query_update = mysqli_query($con,$sql);
					$IdA = 0;
					
					$OrdenA = 0;
				}
			}
			
		}
	}

}
if($TipoS ==2){
	$sql="SELECT * FROM seccion2d where Seccion =$Session  order by Orden ";
	$query1 = mysqli_query($con, $sql);

	if($Direccion =='Arriba'){
		while ($row=mysqli_fetch_array($query1)){
			if ($row['Id'] ==$Linea){
				$sql =  "UPDATE seccion2d SET Orden=$OrdenA where Id = $Linea  ;";
			
				$query_update = mysqli_query($con,$sql);
				$sql =  "UPDATE seccion2d SET Orden=".$row['Orden']." where Id = $IdA  ;";
				$query_update = mysqli_query($con,$sql);
			}else{
				$IdA = $row['Id'];
				$OrdenA = $row['Orden'];
			}
		}
	}
	if($Direccion =='Abajo'){
		while ($row=mysqli_fetch_array($query1)){
			if ($row['Id'] ==$Linea){
				
				$IdA = $row['Id'];
				$OrdenA = $row['Orden'];
				
			}else{
				if ($IdA <>0){
					$sql =  "UPDATE seccion2d SET Orden=".$row['Orden']." where Id = $Linea ;";
					$query_update = mysqli_query($con,$sql);
					$sql =  "UPDATE seccion2d SET Orden= $OrdenA where Id = ".$row["Id"]." ;";
					$query_update = mysqli_query($con,$sql);

					$IdA = 0;
					
					$OrdenA = 0;
				}
			}
			
		}
	}

}		




if (isset($errors)){
			
	?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error!</strong> 
			<?php
				echo $sql;
				?>
	</div>
	<?php
}
	if (isset($messages)){
		
		?>
		<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>¡Bien hecho! Los Datos Se Han Guardado Con Exito.</strong>
				
		</div>
		<?php
	}


?>



