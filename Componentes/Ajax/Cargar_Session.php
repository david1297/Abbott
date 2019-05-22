<?php
	$session_id= session_id();
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$Id = $_GET["Id"];

	$sql="SELECT Tipo,Seccion FROM paginad where Pagina = $Id order by ORden";
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
					<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#AgregarObjeto" onclick="TipoCSession(1,'I',<?php echo $Session;?>,0)">
						<i class="fas fa-plus"></i>
					</button>
					<?php
					$sql1="SELECT Tipo,Elemento,Id FROM seccion1d where Seccion = $Session order by Orden";
					$query1 = mysqli_query($con, $sql1);
					while ($row1=mysqli_fetch_array($query1)){
						$Objeto=$row1['Elemento'];
						if ($row1['Tipo'] =='Titulo'){
							?>
							<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Titulo')"><i class="fas fa-text-height"></i>	 Titulo</button>
							<?php
						}else{
							if ($row1['Tipo'] =='Parrafo'){
								?>
								<button type="button" class="btn btn-secondary btn-lg btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Parrafo')"><i class="fas fa-stream"></i>	 Parrafo</button>
								<?php
							}else{
								if ($row1['Tipo'] =='Imagen'){
									?>
									<button type="button" class="btn btn-secondary btn-lg btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Imagen')"><i class="fas fa-image"></i> Imagen</button>
									<?php
								}else{
									if ($row1['Tipo'] =='Video'){
										?>
										<button type="button" class="btn btn-secondary btn-lg btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Video')"><i class="fas fa-video"></i> Video</button>
										<?php
									}else{
										if ($row1['Tipo'] =='Carrusel'){
											?>
											<button type="button" class="btn btn-secondary btn-lg btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Carrusel')"><i class="fas fa-images"></i> Carrusel</button>
											<?php
										}
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
							<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#AgregarObjeto" onclick="TipoCSession(2,'I',<?php echo $Session;?>,0)">
								<i class="fas fa-plus"></i>
							</button>
							<br>
						</div>
						<div class="col-md-6">
							<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#AgregarObjeto" onclick="TipoCSession(2,'D',<?php echo $Session;?>,0)">
								<i class="fas fa-plus"></i>
							</button>
							<br>
						</div>
						<?php
					$sql1="SELECT Tipo1,Elemento1,Tipo2,Elemento2,Id FROM seccion2d where Seccion = $Session order by Orden";
					$query1 = mysqli_query($con, $sql1);
					while ($row1=mysqli_fetch_array($query1)){	
						$Linea= $row1['Id'];
						$Objeto=$row1['Elemento1'];
						if ($row1['Tipo1'] =='Titulo'){
							?>
							<div class="col-md-6">
								<button type="button" class="btn btn-secondary btn-lg btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Titulo')"><i class="fas fa-text-height"></i>	 Titulo</button>
								<br>
							</div>
							<?php
						}else{
							if ($row1['Tipo1'] =='Parrafo'){
								?>
								<div class="col-md-6">
									<button type="button" class="btn btn-secondary btn-lg btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Parrafo')"><i class="fas fa-stream"></i>	 Parrafo</button>
									<br>
								</div>
								<?php
							}else{
								if ($row1['Tipo1'] =='Imagen'){
									?>
									<div class="col-md-6">
										<button type="button" class="btn btn-secondary btn-lg btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Imagen')"><i class="fas fa-image"></i> Imagen</button>
										<br>
									</div>
									<?php
								}else{
									if ($row1['Tipo1'] =='Video'){
										?>
										<div class="col-md-6">
											<button type="button" class="btn btn-secondary btn-lg btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Video')"><i class="fas fa-video"></i> Video</button>
											<br>
										</div>
										<?php
									}else{
										if ($row1['Tipo1'] =='Carrusel'){
											?>
											<div class="col-md-6">
												<button type="button" class="btn btn-secondary btn-lg btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Carrusel')"><i class="fas fa-images"></i> Carrusel</button>
												<br>
											</div>
											<?php
										}else{
											?>
											<div class="col-md-6">
											<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#AgregarObjeto" onclick="TipoCSession(2,'I',<?php echo $Session;?>,<?php echo $Linea;?>)"><i class="fas fa-plus" ></i>
											<?php echo $Objeto;?>
											</button>
											<br>
											</div>
											<?php	
										}
									}
								}
							}
						}
						$Objeto=$row1['Elemento2'];
						if ($row1['Tipo2'] =='Titulo'){
							?>
							<div class="col-md-6">
								<button type="button" class="btn btn-secondary btn-lg btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Titulo')"><i class="fas fa-text-height"></i>	 Titulo</button>
								<br>
							</div>
							<?php
						}else{
							if ($row1['Tipo2'] =='Parrafo'){
								?>
								<div class="col-md-6">
									<button type="button" class="btn btn-secondary btn-lg btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Parrafo')"><i class="fas fa-stream"></i>	 Parrafo</button>
									<br>
								</div>
								<?php
							}else{
								if ($row1['Tipo2'] =='Imagen'){
									?>
									<div class="col-md-6">
										<button type="button" class="btn btn-secondary btn-lg btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Imagen')"><i class="fas fa-image"></i> Imagen</button>
										<br>
									</div>
									<?php
								}else{
									if ($row1['Tipo2'] =='Video'){
										?>
										<div class="col-md-6">
											<button type="button" class="btn btn-secondary btn-lg btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Video')"><i class="fas fa-video"></i> Video</button>
											<br>
										</div>
										<?php
									}else{
										if ($row1['Tipo2'] =='Carrusel'){
											?>
											<div class="col-md-6">
												<button type="button" class="btn btn-secondary btn-lg btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Carrusel')"><i class="fas fa-images"></i> Carrusel</button>
												<br>
											</div>
											<?php
										}else{
											?>
											<div class="col-md-6">
												<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#AgregarObjeto" onclick="TipoCSession(2,'D',<?php echo $Session;?>,<?php echo $Linea;?>)"><i class="fas fa-plus" ></i>
												</button><br>
											</div>
											<?php	
										}
									}	
										
										
								}
							}
						}
					}
					?>

					</div>
				</div>
				<br>	
				<?php
				}
			}
		}
	}
	
	?>
