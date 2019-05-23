<?php
$session_id= session_id();
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

$TipoS = mysqli_real_escape_string($con,(strip_tags($_GET["TipoS"],ENT_QUOTES)));
$Lado = mysqli_real_escape_string($con,(strip_tags($_GET["Lado"],ENT_QUOTES)));
$Session = mysqli_real_escape_string($con,(strip_tags($_GET["Session"],ENT_QUOTES)));
$TipoO = mysqli_real_escape_string($con,(strip_tags($_GET["TipoO"],ENT_QUOTES)));
$IdO = mysqli_real_escape_string($con,(strip_tags($_GET["IdO"],ENT_QUOTES)));
	if ($TipoS==1){
		$sql =  "DELETE FROM seccion1d where Id = $Session;";
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			$messages = "Los Datos Se Han Eliminado Con Exito.";
		} else {
			$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
		}
	}else{
		if($Lado=='I'){
			$sql="SELECT Tipo2 FROM seccion2d where Id = ".$Session." ";    
			$query = mysqli_query($con, $sql);
			$row=mysqli_fetch_array($query);
			if ($row['Tipo2']<>''){
				$sql =  "UPDATE  seccion2d SET Tipo1='', Elemento1=0  where Id = $Session;";
				$query_update = mysqli_query($con,$sql);
			}else{
				$sql =  "DELETE FROM seccion2d where Id = $Session;";
				$query_update = mysqli_query($con,$sql);
			}

		}else{
			if($Lado=='D'){
				$sql="SELECT Tipo1 FROM seccion2d where Id = ".$Session." ";    
				$query = mysqli_query($con, $sql);
				$row=mysqli_fetch_array($query);
				if ($row['Tipo1']<>''){
					$sql =  "UPDATE  seccion2d SET Tipo2='', Elemento2=0  where Id = $Session;";
					$query_update = mysqli_query($con,$sql);
				}else{
					$sql =  "DELETE FROM seccion2d where Id = $Session;";
					$query_update = mysqli_query($con,$sql);
				}
	
			}
		}
	}


?>



