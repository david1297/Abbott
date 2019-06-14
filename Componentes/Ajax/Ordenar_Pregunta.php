<?php
$session_id= session_id();


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
$encuesta = mysqli_real_escape_string($con,(strip_tags($_GET["Id"],ENT_QUOTES)));
$Direccion = mysqli_real_escape_string($con,(strip_tags($_GET["Direccion"],ENT_QUOTES)));
$Pregunta = mysqli_real_escape_string($con,(strip_tags($_GET["Pregunta"],ENT_QUOTES)));

$TipoA = 0;
$PreguntaA = 0;
$OrdenA = 0;
			

$sql="SELECT * FROM encuestad where encuesta =$encuesta  order by Orden ";

$query1 = mysqli_query($con, $sql);
if($Direccion =='Arriba'){
	while ($row=mysqli_fetch_array($query1)){
		if (($Pregunta == $row['Id'])){
			$sql =  "UPDATE encuestad SET Orden=$OrdenA where  Id=$Pregunta ;";
			$query_update = mysqli_query($con,$sql);
			
			$sql =  "UPDATE encuestad SET Orden=".$row['Orden']."  where Id=$PreguntaA ;";
			$query_update = mysqli_query($con,$sql);
		
		}else{
			
			$PreguntaA = $row['Id'];
			$OrdenA = $row['Orden'];
		}
	}
}
if($Direccion =='Abajo'){
	while ($row=mysqli_fetch_array($query1)){
		if (($Pregunta == $row['Id'])){
			$PreguntaA = $row['Id'];
			$OrdenA = $row['Orden'];
		}else{
			if ($OrdenA <>0){
				$sql =  "UPDATE encuestad SET Orden=".$row['Orden']." where Id=$Pregunta ;";
				$query_update = mysqli_query($con,$sql);
				$sql =  "UPDATE encuestad SET Orden= $OrdenA where  Id=".$row['Id']." ;";
				$query_update = mysqli_query($con,$sql);
				
				$PreguntaA = 0;
				$OrdenA = 0;
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



