<?php
	$session_id= session_id();
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$sql="SELECT Nombre,Id FROM encuesta ";
	$query = mysqli_query($con, $sql);
	
	while ($row=mysqli_fetch_array($query)){
			$Border='border-dark';
	?>
	<div class="col-md-2">
		<div class="card border-dark">
		<div class="card-header <?php echo $Border; ?>">
  				<h4 class="text-center"><?php echo $row['Nombre']; ?>  </h4>
  			</div>
			<div class="card-body">
				<div class="form-group row">
					<div class="col-md-12">
					<button type="button" class="btn btn-primary btn-block " onclick="location.href='Editar_Encuesta.php?id=<?php echo $row['Id']; ?>'"><i class="fas fa-edit"></i>Editar</button>
						
					</div>
					
				</div>
			</div>
		</div>
		<br>
	</div>

		
	<?php
	}
?>