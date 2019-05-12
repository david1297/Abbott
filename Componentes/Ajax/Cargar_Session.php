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
					<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#AgregarObjeto" onclick="TipoCSession(1,'I',<?php echo $Session;?>)">
						<i class="fas fa-plus"></i>
					</button>
					<?php
					$sql1="SELECT Tipo,Elemento FROM seccion1d where Seccion = $Session order by Orden";
					$query1 = mysqli_query($con, $sql1);
					while ($row1=mysqli_fetch_array($query1)){
						if ($row1['Tipo'] =='Titulo'){
							?>
							<button type="button" class="btn btn-secondary btn-lg btn-block"><i class="fas fa-text-height"></i>	 Titulo</button>
							<?php
						}else{
							if ($row1['Tipo'] =='Parrafo'){
								?>
								<button type="button" class="btn btn-secondary btn-lg btn-block"><i class="fas fa-stream"></i>	 Parrafo</button>
								<?php
							}else{
								if ($row1['Tipo'] =='Imagen'){
									?>
									<button type="button" class="btn btn-secondary btn-lg btn-block"><i class="fas fa-image"></i> Imagen</button>
									<?php
								}else{
									if ($row1['Tipo'] =='Video'){
										?>
										<button type="button" class="btn btn-secondary btn-lg btn-block"><i class="fas fa-video"></i> Video</button>
										<?php
									}
								}
							}
						}
					}
					?>
					<br>
					
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
						<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#AgregarObjeto" onclick="TipoCSession(2,'I',<?php echo $Session;?>)">
							<i class="fas fa-plus"></i>
						</button>
						<br>
						<button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button>
						</div>
						<div class="col-md-6">
						<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#AgregarObjeto" onclick="TipoCSession(2,'D',<?php echo $Session;?>)">
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
