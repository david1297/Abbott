<?php


$session_id= session_id();
	if (isset($_GET['Tipo'])){$Tipo=$_GET['Tipo'];}
	if (isset($_GET['TipoSession'])){$TipoSession=$_GET['TipoSession'];}
	if (isset($_GET['Lado'])){$Lado=$_GET['Lado'];}
	if (isset($_GET['IdSession'])){$IdSession=$_GET['IdSession'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

	
	
	if ($TipoSession == '1'){
		$sql="SELECT count(*)as Numero FROM seccion1d where Seccion=".$IdSession." ";
		$query = mysqli_query($con, $sql);
		$row=mysqli_fetch_array($query);
		$Orden = $row['Numero'];
		$Orden = $Orden + 1;
		if($Tipo == '1'){
			$sql =  "INSERT INTO titulos(Texto,color,Tamaño,TipoGrafia) VALUES ('','',12,'');";
			$query_update = mysqli_query($con,$sql);
    		if ($query_update) {
				$sql="SELECT Max(Id) AS Id FROM titulos";
				$query = mysqli_query($con, $sql);
				$row=mysqli_fetch_array($query);
				$Elemento= $row['Id'];

				$sql =  "INSERT INTO seccion1d(Seccion,Tipo,Elemento,Orden) VALUES ($IdSession,'Titulo',$Elemento,$Orden);";
				$query_update = mysqli_query($con,$sql);
    			if ($query_update) {						
				}
			}	
		}else{
			if($Tipo == '2'){
				$sql =  "INSERT INTO parrafos(Texto,color,Tamaño,TipoGrafia,Justificacion) VALUES ('','',12,'','');";
				$query_update = mysqli_query($con,$sql);
				if ($query_update) {
					$sql="SELECT Max(Id) AS Id FROM parrafos";
					$query = mysqli_query($con, $sql);
					$row=mysqli_fetch_array($query);
					$Elemento= $row['Id'];
	
					$sql =  "INSERT INTO seccion1d(Seccion,Tipo,Elemento,Orden) VALUES ($IdSession,'Parrafo',$Elemento,$Orden);";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {						
					}
				}	
			}else{
				if($Tipo == '3'){
					$sql =  "INSERT INTO imagenes(Imagen) VALUES ('');";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$sql="SELECT Max(Id) AS Id FROM imagenes";
						$query = mysqli_query($con, $sql);
						$row=mysqli_fetch_array($query);
						$Elemento= $row['Id'];
		
						$sql =  "INSERT INTO seccion1d(Seccion,Tipo,Elemento,Orden) VALUES ($IdSession,'Imagen',$Elemento,$Orden);";
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {						
						}
					}	
				}else{
					if($Tipo == '4'){
						$sql =  "INSERT INTO videos(Video,Autoplay) VALUES ('','');";
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {
							$sql="SELECT Max(Id) AS Id FROM videos";
							$query = mysqli_query($con, $sql);
							$row=mysqli_fetch_array($query);
							$Elemento= $row['Id'];
			
							$sql =  "INSERT INTO seccion1d(Seccion,Tipo,Elemento,Orden) VALUES ($IdSession,'Video',$Elemento,$Orden);";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {						
							}
						}	
					}
				}		
			}
		}
	}
	if ($TipoSession == '2'){
		$sql="SELECT count(*)as Numero FROM seccion2d where Seccion=".$IdSession." ";
		$query = mysqli_query($con, $sql);
		$row=mysqli_fetch_array($query);
		$Orden = $row['Numero'];
		$Orden = $Orden + 1;
		if($Tipo == '1'){
			$sql =  "INSERT INTO titulos(Texto,color,Tamaño,TipoGrafia) VALUES ('','',12,'');";
			$query_update = mysqli_query($con,$sql);
    		if ($query_update) {
				$sql="SELECT Max(Id) AS Id FROM titulos";
				$query = mysqli_query($con, $sql);
				$row=mysqli_fetch_array($query);
				$Elemento= $row['Id'];

				$sql =  "INSERT INTO seccion2d(Seccion,Tipo,Elemento,Orden) VALUES ($IdSession,'Titulo',$Elemento,$Orden);";
				$query_update = mysqli_query($con,$sql);
    			if ($query_update) {						
				}
			}	
		}
	}

	




?>