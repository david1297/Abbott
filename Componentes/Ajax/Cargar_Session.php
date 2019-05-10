<?php
	$session_id= session_id();
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$Id = $_GET["Id"];

	$sql="SELECT Tipo,Seccion FROM paginad where Pagina = $Id ";
	$query = mysqli_query($con, $sql);
	while ($row=mysqli_fetch_array($query)){
		if ($row['Tipo'] =='1'){
			$sql="SELECT Descripcion,Id FROM seccion1 where Pagina = $Id ";
			$query1 = mysqli_query($con, $sql);
			while ($row1=mysqli_fetch_array($query1)){
				$Session = $row1['Id'];
			?>
			<br>
			<div class="card border-secondary mb-12" >
				<div class="card-header">
					<div class="btn-group pull-left">
						<h4><?php echo $row1['Descripcion']; ?></h4>
					</div>
					<div class="btn-group pull-right">			
						<button type="button" class="btn btn-default" id="Configurarcion" onclick="ConfigurarSession(<?php echo $Session;?>,1)" >
							<span class="fas fa-cogs"></span>
						</button>
					</div>
				</div>
				<div class="card-body text-secondary">
					<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#AgregarObjeto">
						<i class="fas fa-plus"></i>
					</button>
					<br>
					<button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button>
				</div>
			</div>
			<br>	
			<?php
			}
		}else{
			if ($row['Tipo'] =='2'){
				$sql="SELECT Descripcion,Id FROM seccion2 where Pagina = $Id ";
				$query = mysqli_query($con, $sql);
				while ($row=mysqli_fetch_array($query)){
					$Session = $row['Id'];
				?>
				<br>
				<div class="card border-secondary mb-12" >
					<div class="card-header">
						<div class="btn-group pull-left">
							<h4><?php echo $row['Descripcion']; ?></h4>
						</div>
						<div class="btn-group pull-right">			
							<button type="button" class="btn btn-default" id="Configurarcion" onclick="ConfigurarSession(<?php echo $Session;?>,2)">
								<span class="fas fa-cogs"></span>
							</button>
						</div>
					</div>
					<div class="card-body text-secondary">
						<div class="col-md-6">
						<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#AgregarObjeto">
							<i class="fas fa-plus"></i>
						</button>
						<br>
						<button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button>
						</div>
						<div class="col-md-6">
						<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#AgregarObjeto">
							<i class="fas fa-plus"></i>
						</button>
						<br>
						<button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button>
						</div>
						
					</div>
				</div>
				<br>	
				<?php
				}
			}
		}
	}
	
	?>
