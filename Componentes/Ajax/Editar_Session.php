<?php
$session_id= session_id();


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
if (empty($_POST['Id'])){
	$errors[] = "El Id  Vacio";
} elseif (empty($_POST['TipoFondo'])){
	$errors[] = "El TipoFondo Vacio";
}elseif (empty($_POST['Tipo'])){
	$errors[] = "El Tipo  Vacio";
}elseif (empty($_POST['Completa'])){
	$errors[] = "El Completa  Vacio";
}elseif (!empty($_POST['Id'])&& !empty($_POST['TipoFondo'])&& !empty($_POST['Tipo'])&&  !empty($_POST['Completa'])){
	$Completa = mysqli_real_escape_string($con,(strip_tags($_POST["Completa"],ENT_QUOTES)));
	$Tipo = mysqli_real_escape_string($con,(strip_tags($_POST["Tipo"],ENT_QUOTES)));
	$TipoFondo = mysqli_real_escape_string($con,(strip_tags($_POST["TipoFondo"],ENT_QUOTES)));
	$Id = mysqli_real_escape_string($con,(strip_tags($_POST["Id"],ENT_QUOTES)));
	$Descripcion = mysqli_real_escape_string($con,(strip_tags($_POST["Descripcion"],ENT_QUOTES)));
	if ($TipoFondo=='Imagen'){
		if(isset($_FILES['Fondo']['name'])){
			$nombre =$_FILES['Fondo']['tmp_name'];
			$im = file_get_contents($nombre);
			$imdata = base64_encode($im);
			$sql =  "UPDATE seccion1 SET Fondo='$imdata' where Id = $Id;";
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$messages = "Los Datos Se Han Guardado Con Exito.";
			} else {
				$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
			}	
		
		}
	}else{
		$imdata = mysqli_real_escape_string($con,(strip_tags($_POST["Fondo"],ENT_QUOTES)));
		$sql =  "UPDATE seccion1 SET Fondo='$imdata' where Id = $Id;";
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			$messages = "Los Datos Se Han Guardado Con Exito.";
		} else {
			$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
		}
			
	}
		$sql =  "UPDATE seccion1 SET Descripcion='$Descripcion',TipoFondo='$TipoFondo',Completa='$Completa' where Id = $Id;";
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			$messages = "Los Datos Se Han Guardado Con Exito.";
		} else {
			$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
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



