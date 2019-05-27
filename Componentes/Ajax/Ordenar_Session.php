<?php
$session_id= session_id();


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
$Session = mysqli_real_escape_string($con,(strip_tags($_GET["Session"],ENT_QUOTES)));
$Direccion = mysqli_real_escape_string($con,(strip_tags($_GET["Direccion"],ENT_QUOTES)));
$Pagina = mysqli_real_escape_string($con,(strip_tags($_GET["Pagina"],ENT_QUOTES)));
$TipoS = mysqli_real_escape_string($con,(strip_tags($_GET["TipoS"],ENT_QUOTES)));

$TipoA = 0;
$SessionA = 0;
$OrdenA = 0;
			

$sql="SELECT * FROM paginad where Pagina =$Pagina and Estado ='Activa' order by Orden ";

$query1 = mysqli_query($con, $sql);
if($Direccion =='Arriba'){
	while ($row=mysqli_fetch_array($query1)){
		if (($row['Tipo'] ==$TipoS)&&($Session == $row['Seccion'])){
			$sql =  "UPDATE paginad SET Orden=$OrdenA where Tipo = $TipoS and Seccion=$Session ;";
			$query_update = mysqli_query($con,$sql);
			
			$sql =  "UPDATE paginad SET Orden=".$row['Orden']." where Tipo = $TipoA and Seccion=$SessionA ;";
			$query_update = mysqli_query($con,$sql);
		
		}else{
			$TipoA = $row['Tipo'];
			$SessionA = $row['Seccion'];
			$OrdenA = $row['Orden'];
		}
	}
}
if($Direccion =='Abajo'){
	while ($row=mysqli_fetch_array($query1)){
		if (($row['Tipo'] ==$TipoS)&&($Session == $row['Seccion'])){
			$TipoA = $row['Tipo'];
			$SessionA = $row['Seccion'];
			$OrdenA = $row['Orden'];
		}else{
			if ($TipoA <>0){
				$sql =  "UPDATE paginad SET Orden=".$row['Orden']." where Tipo = $TipoS and Seccion=$Session ;";
				$query_update = mysqli_query($con,$sql);
				$sql =  "UPDATE paginad SET Orden= $OrdenA where Tipo = ".$row['Tipo']." and Seccion=".$row['Seccion']." ;";
				$query_update = mysqli_query($con,$sql);
				$TipoA = 0;
				$SessionA = 0;
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



