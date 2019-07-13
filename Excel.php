<?php
	require_once ("config/db.php");
	require_once ("config/conexion.php");
		$FechaIni = mysqli_real_escape_string($con,(strip_tags($_REQUEST['FechaIni'], ENT_QUOTES)));
		$FechaFin = mysqli_real_escape_string($con,(strip_tags($_REQUEST['FechaFin'], ENT_QUOTES)));
		
			$sTable = "resp ";
			$sWhere = "where Fecha >= '$FechaIni' and  Fecha <= '$FechaFin' ";
			
			$Order =" order by Fecha,NRes ";
	
		
	
			$sql="SELECT * FROM $sTable $sWhere  $Order";	
			$query = mysqli_query($con, $sql);
			echo mysqli_error($con);
			$Array="";	
			$Ant= 0;
			$h=0;
			while ($row=mysqli_fetch_array($query)){
				$Fecha=$row['Fecha'];
				$Hora=$row['Hora'];
				$Pregunta=$row['Pregunta'];
				$Respuesta=$row['Respuesta'];
				$NRes=$row['NRes'];
				if($NRes != $Ant){
					$h=0;
					if($Array==''){
						$Array.='{"Fecha":"'.date("d-m-Y", strtotime($Fecha)).'", "Hora": "'.$Hora.'" , "Pregunta-'.$h.'": "'.$Pregunta.'" , "Respuesta-'.$h.'": "'.$Respuesta.'"';
					}else{
						$Array.='},{"Fecha":"'.date("d-m-Y", strtotime($Fecha)).'", "Hora": "'.$Hora.'" , "Pregunta-'.$h.'": "'.$Pregunta.'"  , "Respuesta-'.$h.'": "'.$Respuesta.'"';	
					}		
				}else{
					$Array.=' , "Pregunta-'.$h.'": "'.$Pregunta.'" , "Respuesta-'.$h.'": "'.$Respuesta.'"';	
				}
				
				$Ant =$NRes;
				$h=$h+1;					
			}
			$Array.='}';
	
	echo $Array;
?>