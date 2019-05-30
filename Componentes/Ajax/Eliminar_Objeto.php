<?php
$session_id= session_id();
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

if (empty($_GET['Id'])){
	$errors[] = "El Id  Vacio";
} elseif (empty($_GET['Tipo'])){
	$errors[] = "El Tipo Vacio";
}elseif (!empty($_GET['Id'])&& !empty($_GET['Tipo'])){
	$Id = mysqli_real_escape_string($con,(strip_tags($_GET["Id"],ENT_QUOTES)));
	$Tipo = mysqli_real_escape_string($con,(strip_tags($_GET["Tipo"],ENT_QUOTES)));
	if($Tipo=='Titulo'){			
		$sql =  "DELETE FROM titulos where Id = $Id;";
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			$messages = "Los Datos Se Han Eliminado Con Exito.";
		} else {
			$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
		}
	} else{
		if($Tipo=='Parrafo'){
			$sql =  "DELETE FROM parrafos where Id = $Id;";
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$messages = "Los Datos Se Han Eliminado Con Exito.";
			} else {
				$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
			}
		} else{
			if($Tipo=='Imagen'){
				$sql =  "DELETE FROM imagenes where Id = $Id;";
				$query_update = mysqli_query($con,$sql);
				if ($query_update) {
					$messages = "Los Datos Se Han Eliminado Con Exito.";
				} else {
					$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
				}
			}else{
				if($Tipo=='Video'){
					$sql =  "DELETE FROM videos  where Id = $Id;";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$messages = "Los Datos Se Han Eliminado Con Exito.";
					} else {
						$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
					}
				}else{
					if($Tipo=='Carrusel'){
						$sql =  "DELETE FROM Carrusel  where Id = $Id;";
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {
							$sql =  "DELETE FROM Carruseld  where Carrusel = $Id;";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {
								$messages = "Los Datos Se Han Eliminado Con Exito.";
							} else {
								$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
							}
						} else {
							$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
						}
					}else{
						if($Tipo=='CarruselD'){
							$sql =  "DELETE FROM Carruseld  where Id = $Id;";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {
								$messages = "Los Datos Se Han Eliminado Con Exito.";
							} else {
								$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
							}
						}else{
							if($Tipo=='Album'){
								$sql =  "DELETE FROM Album  where Id = $Id;";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {
									$sql =  "DELETE FROM AlbumD  where Album = $Id;";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {
										$messages = "Los Datos Se Han Eliminado Con Exito.";
									} else {
										$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
									}
								} else {
									$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
								}
							}else{
								if($Tipo=='AlbumD'){
									$sql =  "DELETE FROM AlbumD  where Id = $Id;";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {
										$messages = "Los Datos Se Han Eliminado Con Exito.";
									} else {
										$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
									}
								}else{
									if($Tipo=='Album'){
										$sql =  "DELETE FROM Botonera  where Id = $Id;";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {
											$sql =  "DELETE FROM Botonerad  where Botonera = $Id;";
											$query_update = mysqli_query($con,$sql);
											if ($query_update) {
												$messages = "Los Datos Se Han Eliminado Con Exito.";
											} else {
												$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
											}
										} else {
											$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
										}
									}else{
										if($Tipo=='BotoneraD'){
											$sql =  "DELETE FROM Botonerad  where Id = $Id;";
											$query_update = mysqli_query($con,$sql);
											if ($query_update) {
												$messages = "Los Datos Se Han Eliminado Con Exito.";
											} else {
												$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
											}
										}
									}
								}
							}
						}
					}
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
				<strong>¡Bien hecho! Los Datos Se Han Eliminado Con Exito.</strong>
				
		</div>
		<?php
	}


?>



