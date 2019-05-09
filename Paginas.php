<?php
	session_start();

	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	

	if (isset($_GET['id'])) {
		$query=mysqli_query($con, "select Nombre,Id from pagina where pagina.Id ='".$_GET['id']."' ");
		$rw_Admin=mysqli_fetch_array($query);
		
		$Nombre =$rw_Admin['Nombre'];
		$Id =$rw_Admin['Id'];
	}else{
		
	}

?>
<!doctype html>
<html lang="es">
<head>
	<?php 
		include("head.php"); 
	?>
	<style>
	.fusion-builder-column-1_2, .fusion_builder_column_layout_1_2 {
    width: 48%;
}
.fusion_builder_layout_column:last-child {
    margin-right: 0;
}
a, div {
    outline: 0;
}
.fusion_builder_column_layout_1_1, .fusion_builder_column_layout_fullwidth {
    width: 100%;
}
.fusion-builder-column-1_1, .fusion_builder_column_layout_1_1 {
    width: 100%;
    margin-left: 0;
}
.fusion_builder_layout_column:last-child {
    margin-right: 0;
}
.fusion-builder-modal-settings-container .fusion-builder-column-layouts li .fusion_builder_layout_column {
    height: 18px;
}
	.fusion-builder-modal-settings-container .fusion-builder-column-layouts li {
    padding: 0.5em;
    float: left;
    margin: 1.5%;
    cursor: pointer;
    border: 1px dashed #ccc;
    margin-bottom: 2em;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.fusion-builder-modal-settings-container .fusion-builder-column-layouts li:hover {
    border: 1px dashed #666;
}
.fusion-builder-all-modules li:hover {
    background: #f7f7f7;
    -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
    color: #444;
    border: 1px dashed #ccc;
}
.fusion-builder-all-modules li {
    border: 1px dashed #ddd;
    float: left;
    background-color: #fff;
    text-align: left;
		padding: 1em;
    width:43%;
    list-style-type: none;
    cursor: pointer;
    margin: 1.5% 1.5% 1.5% 1.5%;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.fusion_builder_layout_column {
    text-align: center;
    padding: 18% 0;
    display: inline-block;
    float: left;
    background: #aaa;
    color: #ddd;
    margin-right: 4%;
    font-size: 12px;
}
.fusion_builder_layout_column {
    height: 18px;
}
	</style>
</head>
<body>
	<div id="wrapper">
		<?php
			include("Menu.php");
			include("componentes/modal/Agregar_Objeto.php");
			include("componentes/modal/Agregar_Session.php");
		?>
		<div id="main-content">
			<div class="container-fluid">
				<div class="panel panel-default">
					<div class="panel-heading">
		    		<div class="btn-group pull-right">				
							<button type="button" class="btn btn-default" id="Configurarcion">
								<span class="fas fa-cogs"></span> Configuracion
							</button>
						</div>
						<h4><i class="fas fa-file-alt"></i>&nbsp;&nbsp;&nbsp;<?php echo $Nombre;?></h4>
					</div>
					<div class="panel-body">
						<div class="tab-content content-profile">
							<div class="tab-pane fade in active" id="Informacion">
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarSession">
									<i class="fas fa-plus"></i> Adicionar Seccion
								</button>
								<form class="form-horizontal " method="post" id="Guardar_Pagina" name="Guardar_Pagina">
			   					<div id="resultados_ajax"></div>
									<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id; ?>" > 
								<?php
									$sql="SELECT Tipo,Seccion FROM paginad where Pagina = $Id ";
									$query = mysqli_query($con, $sql);
									while ($row=mysqli_fetch_array($query)){
										if ($row['Tipo'] =='1'){
											$sql="SELECT Descripcion,Id FROM seccion1 where Pagina = $Id ";
											$query1 = mysqli_query($con, $sql);
											while ($row1=mysqli_fetch_array($query1)){
											?>
											<br>
											<div class="card border-secondary mb-12" >
												<div class="card-header">
													<div class="btn-group pull-left">
														<h4><?php echo $row1['Descripcion']; ?></h4>
													</div>
													<div class="btn-group pull-right">			
														<button type="button" class="btn btn-default" id="Configurarcion">
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
												?>
												<br>
												<div class="card border-secondary mb-12" >
													<div class="card-header">
														<div class="btn-group pull-left">
															<h4><?php echo $row['Descripcion']; ?></h4>
														</div>
														<div class="btn-group pull-right">			
															<button type="button" class="btn btn-default" id="Configurarcion">
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
								</form>	
							</div>
						</div>
					</div>			
		  	</div>	
			</div>	  		
		</div>
	</div>
	

	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script>
function NuevaSession(N){
	var Id = document.getElementById('Id').value;
	$.ajax({
	url:'Componentes/Ajax/Crear_Session.php?Pagina='+Id+'&Tipo='+N,
		 beforeSend: function(objeto){
			$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
	
			$('#AgregarSession').modal('hide');
			
		}
	})
	
}
function NuevoObjeto(N){
	var Id = document.getElementById('Id').value;
	$.ajax({
	url:'Componentes/Ajax/Crear_Session.php?Pagina='+Id+'&Tipo='+N,
		 beforeSend: function(objeto){
			$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
	
			$('#AgregarSession').modal('hide');
			
		}
	})
	
}

	</script>
</body>

</html>
