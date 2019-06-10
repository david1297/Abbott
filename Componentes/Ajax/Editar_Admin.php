<?php
$destino="C:/xampp/htdocs/Abbott/Imagenes";


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

if(!empty($_FILES['ImagenP']['name'])){

	$nombre =$_FILES['ImagenP']['name'];
		if(copy($_FILES['ImagenP']['tmp_name'], $destino.'/'.$_FILES['ImagenP']['name'])){
			$sql =  "UPDATE administracion SET ImagenP='$nombre' ;";
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$messages = "Los Datos Se Han Guardado Con Exito.";
			} else {
				$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
			}	
		}else{
			$errors = "Lo sentimos , no se Cargo la imagen .<br>";
		}	
		
}
if(!empty($_FILES['Icono']['name'])){

	$nombre =$_FILES['Icono']['name'];
		if(copy($_FILES['Icono']['tmp_name'], $destino.'/'.$_FILES['Icono']['name'])){
			$sql =  "UPDATE administracion SET Icono='$nombre' ;";
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$messages = "Los Datos Se Han Guardado Con Exito.";
			} else {
				$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
			}	
		}else{
			$errors = "Lo sentimos , no se Cargo la imagen .<br>";
		}	
		
}
	$Justificacion = mysqli_real_escape_string($con,(strip_tags($_POST["Justificacion"],ENT_QUOTES)));
	$ColorP = mysqli_real_escape_string($con,(strip_tags($_POST["ColorP"],ENT_QUOTES)));
	$ColorS = mysqli_real_escape_string($con,(strip_tags($_POST["ColorS"],ENT_QUOTES)));
	$ColorT = mysqli_real_escape_string($con,(strip_tags($_POST["ColorT"],ENT_QUOTES)));
	$TipoGrafia = mysqli_real_escape_string($con,(strip_tags($_POST["TipoGrafia"],ENT_QUOTES)));
	$Tamano = mysqli_real_escape_string($con,(strip_tags($_POST["Tamano"],ENT_QUOTES)));
	$sql =  "UPDATE administracion SET ColorP='$ColorP',ColorS='$ColorS',ColorT='$ColorT'
			,Justificacion='$Justificacion',TipoGrafia='$TipoGrafia',Tamano='$Tamano' ";
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


?>



