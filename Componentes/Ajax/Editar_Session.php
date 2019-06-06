<?php
$session_id= session_id();


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
$destino="C:/xampp/htdocs/Abbott/Imagenes";
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
		
		if(!empty($_FILES['Imagen']['name'])){
			$nombre =$_FILES['Imagen']['name'];
				move_uploaded_file($_FILES['Imagen']['tmp_name'], $destino.'/'.$_FILES['Imagen']['name']);	
				$sql =  "UPDATE seccion".$Tipo." SET Fondo='$nombre' where Id = $Id;";
				$query_update = mysqli_query($con,$sql);
				if ($query_update) {
					$messages = "Los Datos Se Han Guardado Con Exito.";
				} else {
					$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
				}	
		}
	}else{
		$imdata = mysqli_real_escape_string($con,(strip_tags($_POST["Color"],ENT_QUOTES)));
		$sql =  "UPDATE seccion".$Tipo." SET Fondo='$imdata' where Id = $Id;";
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			$messages = "Los Datos Se Han Guardado Con Exito.";
		} else {
			$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
		}
			
	}
		$sql =  "UPDATE seccion".$Tipo." SET Descripcion='$Descripcion',TipoFondo='$TipoFondo',Completa='$Completa' where Id = $Id;";
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



