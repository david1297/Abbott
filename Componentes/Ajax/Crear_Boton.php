<?php


require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
	$sql =  "INSERT INTO administraciond (Texto,Enlace) VALUES ('',0);";
	$query_update = mysqli_query($con,$sql);
    
	


?>



