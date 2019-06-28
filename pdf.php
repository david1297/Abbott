
<?php
$FechaIni=$_POST['FechaIni'];
$FechaFin=$_POST['FechaFin'];

require_once ("config/db.php");
require_once ("config/conexion.php");

$D=date("d-m-Y");

$sql="SELECT * FROM respuestas where Fecha >= '$FechaIni'  and Fecha <=  '$FechaFin' ";
$query = mysqli_query($con, $sql);
$h=0;
$filecontent='';
while ($row=mysqli_fetch_array($query)){
	$filecontent.='Fecha:'.$row['Fecha'];
	
		$filecontent.=strip_tags($row['Respuestas']);
	}
	$downloadfile="Encuestas ".$D.".txt";
 
header("Content-disposition: attachment; filename=$downloadfile");
header("Content-Type: application/force-download");
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".strlen($filecontent));
header("Pragma: no-cache");
header("Expires: 0");
 
echo $filecontent;
 





?>