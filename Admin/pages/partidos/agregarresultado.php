<?php  
$ubicacion ="../";
$id_modulos="25";
include("../menuinicial.php");
include($ubicacion."../php/partidos.php");
include($ubicacion."../php/equipo.php");
include($ubicacion."../php/jugador.php");
if(Boolean_Get_Modulo_Permiso($id_modulos,$_SESSION['perfil'])){
	$partido = Get_Partido($_GET['id']);
	?>


	<!-- JQuery DataTable Css -->
	<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="pages/partidos/css/partido.css" rel="stylesheet">
	<section class="content">
		<div class="container-fluid">
			<div class="block-header">
				<h2>
					<ol class="breadcrumb">
						<li>
							<a href="pages/administracion.php">
								<!--<i class="material-icons">home</i>-->
								Administración
							</a>
						</li>
						<?php
						$vector = Array_Get_PadreHijo($id_modulos);
						foreach ($vector as $value)
						{
							?>
							<li>
								<a href="<?php echo $value['ruta'] ?>" class="active">
									<!--<i class="material-icons"><?php echo $value['icono'] ?></i>-->
									<?php echo $value['nombre'] ?>
								</a>
							</li>
							<?php
						}
						?>
					</ol>
				</h2>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2>
							<div class="col-sm-3">
									<div class="form-group">
										<div class="form-line">
											<input type="text" class="form-control goles" placeholder="Goles">
										</div>
									</div>
								</div>
								<?php echo Get_NombreEquipo($partido['equipo1']);  ?>
							</h2>
						</div>
						<div class="body">
							<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
								<thead>
									<tr>
										<th>Jugador</th>
										<th>Tarjeta</th>
										<th>Gol</th>
										<th>Autogol</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$vector = Array_Get_Jugadores_Equipo($partido['equipo1']);
									$i=1;
									foreach ($vector as $value) {
										?>
										<tr>
											<td><?php echo String_Get_NombreCompleto($value['id_jugador']) ?></td>
											<td>
												<select class="form-control show-tick select-equipoa">
													<option value="">--Tarjeta--</option>
													<option value="1">Amarilla</option>
													<option value="1">Roja</option>
												</select>
											</td>
											<td>
												<div class="col-md-12">
													<div class="form-group">
														<div class="form-line">
															<input type="text" id="ronda" class="form-control"  placeholder="0">
														</div>
													</div>
												</div>
											</td>
											<td>
												<div class="col-md-12">
													<div class="form-group">
														<div class="form-line">
															<input type="text" id="ronda" class="form-control"  placeholder="0">
														</div>
													</div>
												</div>
											</td>
										</tr>
										<?php
										$i++; 
									}
									?>
								</tbody>
							</table>

						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2>
							<div class="col-sm-3">
									<div class="form-group">
										<div class="form-line">
											<input type="text" class="form-control goles" placeholder="Goles">
										</div>
									</div>
								</div>
								<?php echo Get_NombreEquipo($partido['equipo2']);  ?>
								
							</h2>
						</div>
						<div class="body">
							<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
								<thead>
									<tr>
										<th>Jugador</th>
										<th>Tarjeta</th>
										<th>Gol</th>
										<th>Autogol</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$vector = Array_Get_Jugadores_Equipo($partido['equipo2']);
									$i=1;
									foreach ($vector as $value) {
										?>
										<tr>
											<td><?php echo String_Get_NombreCompleto($value['id_jugador']) ?></td>
											<td>
												<select class="form-control show-tick select-equipoa">
													<option value="">--Tarjeta--</option>
													<option value="1">Amarilla</option>
													<option value="1">Roja</option>
												</select>
											</td>
											<td>
												<div class="col-md-12 col-xs-12">
													<div class="form-group">
														<div class="form-line">
															<input type="text" id="ronda" class="form-control"  placeholder="0">
														</div>
													</div>
												</div>
											</td>
											<td>
												<div class="col-md-12 col-xs-12">
													<div class="form-group">
														<div class="form-line">
															<input type="text" id="ronda" class="form-control"  placeholder="0">
														</div>
													</div>
												</div>
											</td>
										</tr>
										<?php
										$i++; 
									}
									?>
								</tbody>
							</table>

						</div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="body">
							<center>
								<button type="button" class="btn btn-primary btn-lg m-l-15 waves-effect guardar">Guardar</button>
							</center>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- JS ====================================================================================================================== -->
	<!--  Js-principal -->
	<script src="pages/partidos/js/partidos.js"></script>

	<!-- Jquery DataTable Plugin Js -->
	<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
	<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<!-- Custom Js -->
	<script src="js/pages/tables/jquery-datatable.js"></script>



	<!-- Modal Dialogs ====================================================================================================================== -->
	<!-- Default Size -->
	<?php
}else
{
	require("../sinpermiso.php");
}
?>