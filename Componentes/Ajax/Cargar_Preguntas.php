<?php
	$session_id= session_id();
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$Id = $_GET["Id"];
	$sql="SELECT Id,Tipo,Pregunta FROM encuestad where Encuesta = $Id order by Orden";
	$query = mysqli_query($con, $sql);
	while ($row=mysqli_fetch_array($query)){
			$Id_Pregunta=$row['Id'];
			$Pregunta=$row['Pregunta'];
			$Tipo=$row['Tipo'];
			if ($Tipo=='Texto'){
				$TipoP='<i class="fas fa-text-height"></i>	 Texto';
			}else{
				if($Tipo=='Multiple'){
					$TipoP='<i class="fas fa-check-square"></i>	 Multiple';
				}else{
					$TipoP='<i class="far fa-check-square"></i> Seleccion';
				}	
			}
			?>
			<br>
			<div class="card border-secondary mb-12" id='Pregunta-<?php echo $Id_Pregunta;?>' >
				<div class="card-header">
					<div class="btn-group pull-left">
						<h4><?php echo $TipoP; ?></h4>
					</div>
					<div class="btn-group pull-right">	
						<button type="button" class="btn btn-default" id="Arriba" onclick="MoverPregunta(<?php echo $Id_Pregunta;?>,'Arriba')">
							<i class="fas fa-chevron-up"></i>
						</button>	
						<button type="button" class="btn btn-default" id="Abajo" onclick="MoverPregunta(<?php echo $Id_Pregunta;?>,'Abajo')">
							<i class="fas fa-chevron-down"></i>
						</button>		
						<button type="button" class="btn btn-default" id="Configurarcion" onclick="ConfigurarPregunta(<?php echo $Id_Pregunta;?>)" >
							<span class="fas fa-cogs"></span>
						</button>
						<button type="button" class="btn btn-outline-danger " onclick="Eliminar_Pregunta(<?php echo $Id_Pregunta;?>)"><i class="fas fa-trash-alt"></i></button>
					</div>
				</div>
				<div class="card-body text-secondary">
					<div class="form-group row">
						<div class="col-md-12">
							<span>
								<?php
								echo $Pregunta;
								?>
							</span>
						</div>
						<?php
						if($Tipo<>'Texto'){
							?>
							<div class="col-md-12">
								<button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#AgregarObjeto" onclick="TipoCSession(1,'I',<?php echo $Session;?>,0)">	
									<i class="fas fa-plus"></i>
								</button>
							</div>
							<?php
						}
						?>
						
					</div>
					
					
					
				</div>
			</div>
			<br>	
			<?php
			
		
		}
	
	
	?>
