﻿<?php


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
$Nombre=$_POST['Nombre'];

	


	$sql =  "INSERT INTO encuesta (Nombre) VALUES ('$Nombre');";
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



