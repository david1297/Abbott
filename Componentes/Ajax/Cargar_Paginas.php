<?php
	$session_id= session_id();
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$sql="SELECT Nombre,Id FROM pagina ";
	$query = mysqli_query($con, $sql);
	while ($row=mysqli_fetch_array($query)){
	?>
		<div class="col-md-2 col-sm-2">
			<div class="card text-center" style="width: 18rem;">
				<div class="card-body">
					<br>
					<h4 class="card-title"><?php echo $row['Nombre']; ?></h4>
					<br>
					<a href="Paginas.php?id=<?php echo $row['Id']; ?>" class="btn btn-primary punteado">Editar</a>
				</div>
			</div>
		</div>
	<?php
	}
?>