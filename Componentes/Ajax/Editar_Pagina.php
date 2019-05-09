<?php
$session_id= session_id();
	if (isset($_POST['Nombre'])){$Nombre=$_POST['Nombre'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
if (empty($_POST['Id'])){
	$errors[] = "El Id  Vacio";
} elseif (empty($_POST['Nombre'])){
	$errors[] = "El Nombre Vacio";
}elseif (empty($_POST['Estado'])){
	$errors[] = "El Estado  Vacio";
}elseif (!empty($_POST['Id'])&& !empty($_POST['Nombre'])&& !empty($_POST['Estado'])){
	$Nombre = mysqli_real_escape_string($con,(strip_tags($_POST["Nombre"],ENT_QUOTES)));
	$Estado = mysqli_real_escape_string($con,(strip_tags($_POST["Estado"],ENT_QUOTES)));
	$Id = mysqli_real_escape_string($con,(strip_tags($_POST["Id"],ENT_QUOTES)));
	if (isset($_POST['Principal'])){
		$Principal='True';
		$sql =  "UPDATE  pagina SET Principal='False';";
		$query_update = mysqli_query($con,$sql);
	}else{
		$Principal='False';
	}
	$sql =  "UPDATE pagina SET Nombre='$Nombre',Principal='$Principal',Estado='$Estado' where Id = $Id;";
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
				foreach ($errors as $error) {
						echo $error;
					}
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



