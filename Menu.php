

<?php
	
			include("componentes/modal/GenerarPDF.php");
		?>
<nav class="navbar navbar-default navbar-fixed-top">

			<div class="container-fluid">
				<div class="navbar-btn" >
					<button type="button" class="btn-toggle-offcanvas"><i class="fas fa-bars"></i></button>
				</div>
      <div id="logo" class="pull-left logo-ini hidden-xs"><a href="#intro" class="scrollto">
        <img src="assets/img/logo-buenos-momentos.png" class="img-fluid" alt="" style="height: 50px;">
     </a></div>
				<div class="navbar-right">
					<div id="navbar-menu">
						<ul class="nav navbar-nav">
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="fas fa-user-cog"></i>
								</a>
								<ul class="dropdown-menu user-menu menu-icon">
									<li class="menu-heading">CONFIGURACIONES DE LA CUENTA</li>
									<!--<li><a href="#"><i class="fa fa-fw fa-bell"></i> <span>Notificaciones</span></a></li>-->
									<li><a href="Admin.php"><i class="fas fa-sliders-h"></i> <span>Preferencias</span></a></li>
									<li><a href="login.php?logout"><i class="fa fa-fw fa-sign-out-alt"></i> <span>Cerrar Sesion</span></a></li>
								</ul>
							</li>
					</div>
				</div>
			</div>
		</nav>
		<div id="left-sidebar" class="sidebar">
			<button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth" id="boton">
				<span class="sr-only">Toggle Fullwidth</span>
				<i class="fa fa-angle-left"></i>
			</button>
			<div class="sidebar-scroll">
				<div class="user-account">
			
				</div>
				<nav id="left-sidebar-nav" class="sidebar-nav">
					<ul id="main-menu" class="metismenu">
						<!--<i class="fas fa-cogs"></i> <i class="fas fa-dolly"></i> -->
						<li class="<?php echo $Paginas;?>"><a href="index.php"><i class="fas fa-file"></i> <span>Paginas</span></a></li>
						<li class="<?php echo $Encuestas;?>"><a href="Encuestas.php"><i class="fas fa-file-alt"></i> <span>Encuestas</span></a></li>
						<li class=""><a href="#.php" data-toggle="modal" data-target="#Pdf"><i class="fas fa-file-pdf"></i> <span>Exportar</span></a></li>
						
					</ul>
					
				</nav>
				
			</div>
		</div>
		<?php

/*
<li class="<?php echo $Administracion;?>"><a href="Administracion.php"><i class="fab fa-jedi-order"></i> <span>Administracion</span></a></li>
						<li class="<?php echo $Afiliados;?>"><a href="Consultar-Afiliados.php"><i class="fas fa-user-tie"></i><span>Afiliados</span></a></li>
						<li class="<?php echo $Contabilidad;?>"><a href="Consultar-Contabilidad.php"><i class="fas fa-book"></i> <span>Contabilidad</span></a></li>
						<!--<li class="<?php echo $Transacciones;?>"><a href="#"><i class="fas fa-exchange-alt"></i>  <span>Transacciones</span></a></li>-->
						<li class="<?php echo $Ventas;?>"><a href="Consultar-Ventas.php"><i class="fas fa-shopping-cart"></i>  <span>Ventas</span></a></li>
						<li class="<?php echo $Campanas;?>"><a href="Consultar-Campanas.php"><i class="fas fa-bullhorn"></i>  <span>Campañas</span></a></li>
						
						
						<li class="<?php echo $Usuarios;?>"><a href="Consultar-Usuarios.php"><i class="fas fa-users"></i>  <span>Usuarios</span></a></li>
						*/
?>
