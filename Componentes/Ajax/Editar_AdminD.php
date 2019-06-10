<?php
$destino="C:/xampp/htdocs/Abbott/Imagenes";


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
if (isset($_GET['Id'])){
	$Id=$_GET['Id'];
	$sql =  "DELETE from administraciond where Id=$Id";
$query_update = mysqli_query($con,$sql);
}else{
	$Id = mysqli_real_escape_string($con,(strip_tags($_POST["Id"],ENT_QUOTES)));
	$Texto = mysqli_real_escape_string($con,(strip_tags($_POST["Texto"],ENT_QUOTES)));
	$Enlace = mysqli_real_escape_string($con,(strip_tags($_POST["Enlace"],ENT_QUOTES)));
	$sql =  "UPDATE administraciond SET Texto='$Texto',Enlace='$Enlace'
			 where Id=$Id";
	$query_update = mysqli_query($con,$sql);
	if ($query_update) {
		$messages = "Los Datos Se Han Guardado Con Exito.";
	} else {
		$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
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
}


?>



