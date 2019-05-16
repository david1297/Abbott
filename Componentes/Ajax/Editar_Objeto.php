<?php
$session_id= session_id();
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

if (empty($_POST['Id'])){
	$errors[] = "El Id  Vacio";
} elseif (empty($_POST['Tipo'])){
	$errors[] = "El Tipo Vacio";
}elseif (!empty($_POST['Id'])&& !empty($_POST['Tipo'])){
	$Id = mysqli_real_escape_string($con,(strip_tags($_POST["Id"],ENT_QUOTES)));
	$Tipo = mysqli_real_escape_string($con,(strip_tags($_POST["Tipo"],ENT_QUOTES)));
	if($Tipo=='Titulo'){
		$Texto = mysqli_real_escape_string($con,(strip_tags($_POST["Texto"],ENT_QUOTES)));
		$Color = mysqli_real_escape_string($con,(strip_tags($_POST["Color"],ENT_QUOTES)));
		$Tamaño = mysqli_real_escape_string($con,(strip_tags($_POST["Tamaño"],ENT_QUOTES)));
		$TipoGrafia = mysqli_real_escape_string($con,(strip_tags($_POST["TipoGrafia"],ENT_QUOTES)));

	
		$sql =  "UPDATE titulos SET Texto='$Texto',Color='$Color',Tamaño='$Tamaño' ,TipoGrafia='$TipoGrafia' 
		where Id = $Id;";
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			$messages = "Los Datos Se Han Guardado Con Exito.";
		} else {
			$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
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



