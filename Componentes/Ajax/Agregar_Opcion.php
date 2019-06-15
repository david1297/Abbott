<?php
$TipoSession=0;
	if (isset($_GET['Id'])){$Id=$_GET['Id'];}


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

			$sql =  "INSERT INTO p_seleccion (Pregunta,Opcion,Tipo) VALUES ($Id,'','');";
				$query_update = mysqli_query($con,$sql);	
		
?>