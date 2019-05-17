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
	} else{
		if($Tipo=='Parrafo'){
			$Texto = mysqli_real_escape_string($con,(strip_tags($_POST["Texto"],ENT_QUOTES)));
			$Color = mysqli_real_escape_string($con,(strip_tags($_POST["Color"],ENT_QUOTES)));
			$Tamaño = mysqli_real_escape_string($con,(strip_tags($_POST["Tamaño"],ENT_QUOTES)));
			$TipoGrafia = mysqli_real_escape_string($con,(strip_tags($_POST["TipoGrafia"],ENT_QUOTES)));
			$Justificacion = mysqli_real_escape_string($con,(strip_tags($_POST["Justificacion"],ENT_QUOTES)));
	
		
			$sql =  "UPDATE parrafos SET Texto='$Texto',Color='$Color',Tamaño='$Tamaño' ,TipoGrafia='$TipoGrafia' 
			,Justificacion='$Justificacion' 
			where Id = $Id;";
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$messages = "Los Datos Se Han Guardado Con Exito.";
			} else {
				$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
			}
		} else{
			if($Tipo=='Imagen'){
				
				if(!empty($_FILES['Imagen']['name'])){
					$nombre =$_FILES['Imagen']['tmp_name'];
				
				
					$im = file_get_contents($nombre);
					$imdata = base64_encode($im);
					$sql =  "UPDATE imagenes SET Imagen='$imdata' where Id = $Id;";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$messages = "Los Datos Se Han Guardado Con Exito.";
					} else {
						$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
					}	
				}
			}else{
				if($Tipo=='Video'){
				
						if(!empty($_POST["Video"])){
							echo 'video';
							$Tipo = mysqli_real_escape_string($con,(strip_tags($_POST["Tipo"],ENT_QUOTES)));
							$Video = mysqli_real_escape_string($con,(strip_tags($_POST["Video"],ENT_QUOTES)));
							
							$sql =  "UPDATE videos SET Video='$Video' where Id = $Id;";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {
								$messages = "Los Datos Se Han Guardado Con Exito.";
							} else {
								$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
							}
						}
						if (isset($_POST['Autoplay'])){
							$Autoplay='Autoplay';
							
						}else{
							$Autoplay='';
						}
						$sql =  "UPDATE  Videos SET Autoplay='$Autoplay'  where Id = $Id;";
							$query_update = mysqli_query($con,$sql);
	
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



