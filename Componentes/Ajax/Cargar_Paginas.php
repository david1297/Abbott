<?php
	$session_id= session_id();
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$sql="SELECT Nombre,Id,Principal,Estado FROM pagina ";
	$query = mysqli_query($con, $sql);
	
	while ($row=mysqli_fetch_array($query)){
		if ($row['Principal']=='True'){
			$Star='<i class="fas fa-star"></i>';
		}else{
			$Star='';
		}
		if ($row['Estado']=='Activa'){
			$Border='border-primary';
		}else{
			$Border='border-dark';
		}



	?>
		<div class="col-md-3 col-sm-3">
			<div class="card <?php echo $Border; ?>">
  			<div class="card-header <?php echo $Border; ?>">
  				<h4 class="text-center"><?php echo $row['Nombre']; ?>&nbsp;&nbsp;<?php echo $Star; ?>  </h4>
  			</div>
  			<div class="card-body">
    			<a href="Paginas.php?id=<?php echo $row['Id']; ?>" class="btn btn-primary punteado btn-lg btn-block"><i class="fas fa-edit"></i> Editar</a>
  			</div>
			</div>
			<br>
		</div>
	<?php
	}
?>