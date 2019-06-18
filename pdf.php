
<?php
$FechaIni=$_POST['FechaIni'];
$FechaFin=$_POST['FechaFin'];
 //Agregamos la libreria FPDF
require_once 'dompdf/autoload.inc.php';

// Reference the Dompdf namespace
use Dompdf\Dompdf;

// Instantiate and use the dompdf class
$dompdf = new Dompdf();
require_once ("config/db.php");
require_once ("config/conexion.php");

$D=date("d-m-Y");
$pdf='<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head><body>';
$sql="SELECT * FROM respuestas where Fecha >= '$FechaIni'  and Fecha <=  '$FechaFin' ";
$query = mysqli_query($con, $sql);

while ($row=mysqli_fetch_array($query)){
		$pdf.=$row['Respuestas'];
		$pdf.='<div style="page-break-after:always;"></div>';

	}


	
$pdf.='</body></html>';
$pdf=utf8_encode($pdf);
$dompdf->loadHtml($pdf);
 ini_set("memory_limit","360M");
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'portrait');



// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF (1 = download and 0 = preview)
//$dompdf->stream("codexworld",array("Attachment"=>0));
$dompdf->stream("Correos ".$D.".pdf");




?>