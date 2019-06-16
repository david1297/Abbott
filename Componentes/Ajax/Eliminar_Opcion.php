<?php
$session_id= session_id();
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

if (empty($_GET['Id'])){
	$errors[] = "El Id  Vacio";
} elseif (!empty($_GET['Id'])){
	$Id = mysqli_real_escape_string($con,(strip_tags($_GET["Id"],ENT_QUOTES)));
	$sql="SELECT Pregunta FROM p_seleccion where Id = $Id;";

	$query = mysqli_query($con, $sql);
	$row=mysqli_fetch_array($query);
	echo '-'.$row['Pregunta'];

	
	$sql =  "DELETE FROM p_seleccion  where Id = $Id;";
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$messages = "Los Datos Se Han Eliminado Con Exito.";
			} else {
				$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
			}
}



?>



