<?php
	$session_id= session_id();
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$Pregunta = $_GET["Pregunta"];
	$sql="SELECT Id,Tipo,Pregunta FROM encuestad where Id = $Pregunta order by Orden";
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
						<button type="button" class="btn btn-outline-danger " onclick="Eliminar_Pregunta(<?php echo $Id_Pregunta;?>,'<?php echo $Tipo;?>')"><i class="fas fa-trash-alt"></i></button>
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
							$sql1="SELECT Id,Opcion FROM p_seleccion where Pregunta = $Id_Pregunta ";
							$query1 = mysqli_query($con, $sql1);
							while ($row1=mysqli_fetch_array($query1)){
								$Opcion=$row1['Opcion'];	
								$Id_Opcion=$row1['Id'];	
							?>
							
								<div class="col-md-9">
									<input type="text" class="form-control" id="Seleccion<?php echo $Id_Opcion;?>" name="Seleccion<?php echo $Id_Opcion;?>"  placeholder="Opcion" value="<?php echo $Opcion;?>" 
									onkeypress="UpdateOpciones(event,<?php echo $Id_Opcion;?>)">
								</div>
								<div class="col-md-1">
									<span id="loader_B<?php echo $Id_Opcion;?>"></span>
								</div>
								<div class="col-md-2">
									<button type="button" class="btn btn-outline-danger btn-block " onclick="Eliminar_Opcion(<?php echo $Id_Opcion;?>)"><i class="fas fa-trash-alt"></i></button>
								</div>

								
							<?php	
							}
							?>
							<br>
							<br>
							<br>
							<div class="col-md-12">
								<button type="button" class="btn btn-secondary btn-block" data-toggle="modal"  onclick="Agregar_Opcion(<?php echo $Id_Pregunta;?>)">	
									<i class="fas fa-plus"></i>
								</button>
							</div>
							<?php
						}
						?>
						
					</div>
					
					
					
				</div>
			
			<br>	
			<?php
			
		
		}
	
	
	?>
