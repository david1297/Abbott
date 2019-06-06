<?php
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

$destino="C:/xampp/htdocs/Abbott/Imagenes";
	
	//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name){
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            move_uploaded_file($source, $destino.'/'.$filename);
            $Album=$_POST['IdAlbum'];
            $sql="SELECT Max(Orden) AS Orden FROM AlbumD where Album = ".$Album."; ";
		    $query = mysqli_query($con, $sql);
		    $row=mysqli_fetch_array($query);
		    $Orden= $row['Orden'];
		    $Orden=$Orden+1;
		    $sql =  "INSERT INTO AlbumD (Album, Orden,Imagen) VALUES ($Album, $Orden,'$filename');";
		    $query_update = mysqli_query($con,$sql);
		    if ($query_update) {
			    $messages = "Los Datos Se Han Guardado Con Exito.";	
            } else {
                $errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
            }
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



