<?php

	
if (empty($_POST['Id'])){
	$errors[] = "El Id Se Encuentra Vacio";
} elseif (empty($_POST['Opcion'])){
	$errors[] = "La Opcion Se Encuentra Vacia";
} elseif (
			!empty($_POST['Id'])
			&& !empty($_POST['Opcion'])
          )
         {
            require_once ("../../config/db.php");
			require_once ("../../config/conexion.php");
				$Id = mysqli_real_escape_string($con,(strip_tags($_POST["Id"],ENT_QUOTES)));
				$Opcion = mysqli_real_escape_string($con,(strip_tags($_POST["Opcion"],ENT_QUOTES)));
				
				
				$sql =  "Update p_seleccion Set Opcion='".$Opcion."' where Id=".$Id."; ";

                    $query_update = mysqli_query($con,$sql);
                    if ($query_update) {
                        $messages[] = "Los Datos Se Han Modificado Con Exito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
                    }
        } else {
            $errors[] = "Un error desconocido ocurrió.";
        }
		if (isset($errors)){
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error! </strong> 
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
				<a href="#" class="btn btn-success"><i class="fas fa-check"></i></a>
				
				<?php
			}

?>