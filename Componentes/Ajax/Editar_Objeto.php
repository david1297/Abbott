<?php
$session_id= session_id();
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

$destino="C:/xampp/htdocs/Abbott/Imagenes";
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
		$Tamano = mysqli_real_escape_string($con,(strip_tags($_POST["Tamano"],ENT_QUOTES)));
		$TipoGrafia = mysqli_real_escape_string($con,(strip_tags($_POST["TipoGrafia"],ENT_QUOTES)));
		$Justificacion = mysqli_real_escape_string($con,(strip_tags($_POST["Justificacion"],ENT_QUOTES)));

	
		$sql =  "UPDATE titulos SET Texto='$Texto',Color='$Color',Tamano='$Tamano' ,TipoGrafia='$TipoGrafia',Justificacion='$Justificacion'  
		where Id = $Id;";
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			$messages = "Los Datos Se Han Guardado Con Exito.";
		} else {
			$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
		}
	} else{
		if($Tipo=='Parrafo'){
			$Texto = $_POST["Texto"];
			$Color = mysqli_real_escape_string($con,(strip_tags($_POST["Color"],ENT_QUOTES)));
			$Tamano = mysqli_real_escape_string($con,(strip_tags($_POST["Tamano"],ENT_QUOTES)));
			$TipoGrafia = mysqli_real_escape_string($con,(strip_tags($_POST["TipoGrafia"],ENT_QUOTES)));
			$Justificacion = mysqli_real_escape_string($con,(strip_tags($_POST["Justificacion"],ENT_QUOTES)));
			
		
			$sql =  "UPDATE parrafos SET Texto='$Texto',Color='$Color',Tamano='$Tamano' ,TipoGrafia='$TipoGrafia' 
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
					$nombre =$_FILES['Imagen']['name'];
						if(copy($_FILES['Imagen']['tmp_name'], $destino.'/'.$_FILES['Imagen']['name'])){
							$sql =  "UPDATE imagenes SET Imagen='$nombre' where Id = $Id;";
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
				$Tamano = mysqli_real_escape_string($con,(strip_tags($_POST["Tamano"],ENT_QUOTES)));
				$Justificacion = mysqli_real_escape_string($con,(strip_tags($_POST["Justificacion"],ENT_QUOTES)));

				$sql =  "UPDATE  imagenes SET Tamano=$Tamano,Justificacion='$Justificacion'  where Id = $Id;";
				$query_update = mysqli_query($con,$sql);
				if ($query_update) {
					$messages = "Los Datos Se Han Guardado Con Exito.";
				} else {
					$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
				}
			}else{
				if($Tipo=='Video'){
					if(!empty($_POST["Video"])){
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
					$Tamano = mysqli_real_escape_string($con,(strip_tags($_POST["Tamano"],ENT_QUOTES)));
					$Justificacion = mysqli_real_escape_string($con,(strip_tags($_POST["Justificacion"],ENT_QUOTES)));
					$sql =  "UPDATE  Videos SET Autoplay='$Autoplay',Tamano=$Tamano,Justificacion='$Justificacion'  where Id = $Id;";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$messages = "Los Datos Se Han Guardado Con Exito.";
					} else {
						$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
					}
				}else{
					if($Tipo=='Carrusel'){
						if (isset($_POST['Controles'])){
							$Controles='True';							
						}else{
							$Controles='False';
						}
						$Tamano = mysqli_real_escape_string($con,(strip_tags($_POST["Tamano"],ENT_QUOTES)));
						$sql =  "UPDATE  Carrusel SET Controles='$Controles',Tamano=$Tamano  where Id = $Id;";
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {
							$messages = "Los Datos Se Han Guardado Con Exito.";
						} else {
							$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
						}
					}else{
						if($Tipo=='CarruselD'){
							if(!empty($_FILES['Imagen']['name'])){
								$nombre =$_FILES['Imagen']['name'];
									move_uploaded_file($_FILES['Imagen']['tmp_name'], $destino.'/'.$_FILES['Imagen']['name']);	
									$sql =  "UPDATE Carruseld SET Imagen='$nombre' where Id = $Id;";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {
										$messages = "Los Datos Se Han Guardado Con Exito.";
									} else {
										$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
									}	
							}
							$Titulo = mysqli_real_escape_string($con,(strip_tags($_POST["Titulo"],ENT_QUOTES)));
							$TTamano = mysqli_real_escape_string($con,(strip_tags($_POST["TTamano"],ENT_QUOTES)));
							$TTipografia = mysqli_real_escape_string($con,(strip_tags($_POST["TTipografia"],ENT_QUOTES)));
							$TColor = mysqli_real_escape_string($con,(strip_tags($_POST["TColor"],ENT_QUOTES)));
							$TJustificacion = mysqli_real_escape_string($con,(strip_tags($_POST["TJustificacion"],ENT_QUOTES)));
							$Parrafo = mysqli_real_escape_string($con,(strip_tags($_POST["Parrafo"],ENT_QUOTES)));
							$PTamano = mysqli_real_escape_string($con,(strip_tags($_POST["PTamano"],ENT_QUOTES)));
							$PTipografia = mysqli_real_escape_string($con,(strip_tags($_POST["PTipografia"],ENT_QUOTES)));
							$PColor = mysqli_real_escape_string($con,(strip_tags($_POST["PColor"],ENT_QUOTES)));
							$PJustificacion = mysqli_real_escape_string($con,(strip_tags($_POST["PJustificacion"],ENT_QUOTES)));
							$sql =  "UPDATE Carruseld SET Titulo='$Titulo',TTamano='$TTamano',TTipografia='$TTipografia',TColor='$TColor',TJustificacion='$TJustificacion'
									,Parrafo='$Parrafo',PTamano='$PTamano',PTipografia='$PTipografia',PColor='$PColor',PJustificacion='$PJustificacion'
							
							 where Id = $Id;";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {
									$messages = "Los Datos Se Han Guardado Con Exito.";
								} else {
									$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
								}
						}else{
							if($Tipo=='AlbumD'){
								if(!empty($_FILES['Imagen']['name'])){
									$nombre =$_FILES['Imagen']['name'];
										move_uploaded_file($_FILES['Imagen']['tmp_name'], $destino.'/'.$_FILES['Imagen']['name']);	
										$sql =  "UPDATE AlbumD SET Imagen='$nombre' where Id = $Id;";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {
											$messages = "Los Datos Se Han Guardado Con Exito.";
										} else {
											$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
										}	
								}
							}else{
								if($Tipo=='BotoneraD'){	
									if(!empty($_FILES['Imagen']['name'])){
										$nombre =$_FILES['Imagen']['name'];
									
										move_uploaded_file($_FILES['Imagen']['tmp_name'], $destino.'/'.$_FILES['Imagen']['name']);	
										
										$sql =  "UPDATE BotoneraD SET Imagen='$nombre' where Id = $Id;";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {
											$messages = "Los Datos Se Han Guardado Con Exito.";
										} else {
											$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
										}	
									}
									$Enlace = mysqli_real_escape_string($con,(strip_tags($_POST["Enlace"],ENT_QUOTES)));
									$BColor = mysqli_real_escape_string($con,(strip_tags($_POST["BColor"],ENT_QUOTES)));
									$RBorder = mysqli_real_escape_string($con,(strip_tags($_POST["RBorder"],ENT_QUOTES)));
									$BGrosor = mysqli_real_escape_string($con,(strip_tags($_POST["BGrosor"],ENT_QUOTES)));
									$Descripcion = mysqli_real_escape_string($con,(strip_tags($_POST["Descripcion"],ENT_QUOTES)));
									$RBorderI = mysqli_real_escape_string($con,(strip_tags($_POST["RBorderI"],ENT_QUOTES)));
									$sql =  "UPDATE BotoneraD SET Enlace='$Enlace',BColor='$BColor',RBorder=$RBorder,RBorderI=$RBorderI,BGrosor=$BGrosor,Descripcion='$Descripcion' where Id = $Id;";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {
										$messages = "Los Datos Se Han Guardado Con Exito.";
									} else {
										$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
									}	



								}else{
									if($Tipo=='Boton'){
										$Texto = mysqli_real_escape_string($con,(strip_tags($_POST["Texto"],ENT_QUOTES)));
										$Enlace = mysqli_real_escape_string($con,(strip_tags($_POST["Enlace"],ENT_QUOTES)));
										$Justificacion = mysqli_real_escape_string($con,(strip_tags($_POST["Justificacion"],ENT_QUOTES)));
										$sql =  "UPDATE Boton SET Texto='$Texto',Enlace='$Enlace',Justificacion='$Justificacion' 
										where Id = $Id;";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {
											$messages = "Los Datos Se Han Guardado Con Exito.";
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



