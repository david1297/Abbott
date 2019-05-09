<?php


$session_id= session_id();
	if (isset($_GET['Pagina'])){$Pagina=$_GET['Pagina'];}
	if (isset($_GET['Tipo'])){$Tipo=$_GET['Tipo'];}
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

	$sql="SELECT count(*)as Numero FROM seccion1 where Pagina=".$Pagina." ";
	$query = mysqli_query($con, $sql);
	$row=mysqli_fetch_array($query);
	$Orden = $row['Numero'];
	$Orden = $Orden + 1;
	
	if ($Tipo == '1'){
		$sql =  "INSERT INTO seccion1(Descripcion,Orden,Pagina) VALUES ('Nueva',$Orden,$Pagina);";
		$query_update = mysqli_query($con,$sql);
    	if ($query_update) {
			$sql="SELECT Id FROM seccion1 where Pagina=".$Pagina." and Orden=$Orden  ";
			$query = mysqli_query($con, $sql);
			$row=mysqli_fetch_array($query);
			$Id= $row['Id'];
			
			$sql="SELECT count(*)as Numero FROM paginad where Pagina=".$Pagina." ";
			$query = mysqli_query($con, $sql);
			$row=mysqli_fetch_array($query);
			$Orden = $row['Numero'];
			$Orden = $Orden + 1;	

		
        	$sql =  "INSERT INTO paginad (Pagina,Tipo,Seccion,Orden,Estado) VALUES ('$Pagina','1',$Id,$Orden,'Activa');";
			$query_update = mysqli_query($con,$sql);
		
    		if ($query_update) {
				
        		$messages = "Los Datos Se Han Guardado Con Exito.";
    		}
    	}
	}
	if ($Tipo == '2'){
		$sql =  "INSERT INTO seccion2(Descripcion,Orden,Pagina) VALUES ('Nueva',$Orden,$Pagina);";
		$query_update = mysqli_query($con,$sql);
    	if ($query_update) {
			$sql="SELECT Id FROM seccion2 where Pagina=".$Pagina." and Orden=$Orden  ";
			$query = mysqli_query($con, $sql);
			$row=mysqli_fetch_array($query);
			$Id= $row['Id'];
			
			$sql="SELECT count(*)as Numero FROM paginad where Pagina=".$Pagina." ";
			$query = mysqli_query($con, $sql);
			$row=mysqli_fetch_array($query);
			$Orden = $row['Numero'];
			$Orden = $Orden + 1;	

		
        	$sql =  "INSERT INTO paginad (Pagina,Tipo,Seccion,Orden,Estado) VALUES ('$Pagina','2',$Id,$Orden,'Activa');";
			$query_update = mysqli_query($con,$sql);
		
    		if ($query_update) {
				
        		$messages = "Los Datos Se Han Guardado Con Exito.";
    		}
    	}
	}

	




?>