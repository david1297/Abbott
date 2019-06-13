<?php


$session_id= session_id();
$TipoSession=0;
	if (isset($_GET['Encuesta'])){$Encuesta=$_GET['Encuesta'];}
	if (isset($_GET['Tipo'])){$Tipo=$_GET['Tipo'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

		$sql="SELECT count(*)as Numero FROM encuestad  where Encuesta=".$Encuesta." ";
		$query = mysqli_query($con, $sql);
		$row=mysqli_fetch_array($query);
		$Orden = $row['Numero'];
		$Orden = $Orden + 1;
		if($Tipo == '1'){
			$sql =  "INSERT INTO encuestad (Encuesta,Tipo,Pregunta,Orden) VALUES ($Encuesta,'Texto','',$Orden);";
				$query_update = mysqli_query($con,$sql);	
		}else{
			if($Tipo == '2'){
				$sql =  "INSERT INTO encuestad (Encuesta,Tipo,Pregunta,Orden) VALUES ($Encuesta,'Multiple','',$Orden);";
				$query_update = mysqli_query($con,$sql);	
			}else{
				if($Tipo == '3'){
					$sql =  "INSERT INTO encuestad (Encuesta,Tipo,Pregunta,Orden) VALUES ($Encuesta,'Seleccion','',$Orden);";
					$query_update = mysqli_query($con,$sql);	
				}
			}
		}
		$sql="SELECT max(Id) Numero FROM encuestad";

	$query = mysqli_query($con, $sql);
	$row=mysqli_fetch_array($query);
	echo $row['Numero'];
?>