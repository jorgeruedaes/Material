<?php  
$ubicacion ="../";
$id_modulos="12";
include("../menuinicial.php");
include($ubicacion."../php/partidos.php");
include($ubicacion."../php/equipo.php");
if(Boolean_Get_Modulo_Permiso($id_modulos,$_SESSION['perfil'])){
	?>
	<input type="hidden" id="modulo" value="<?php echo $id_modulos ?>">
	<input type="hidden" id="perfil" value="<?php echo $_SESSION['perfil'] ?>">
	<!-- JQuery DataTable Css -->
	<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
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
			<!-- Basic Examples -->
			<div class="row clearfix">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2>
								SELECCIONA EL PARTIDO A EDITAR
							</h2>
						</div>
						<div class="body">
							<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
								<thead>
									<tr>
										<th>Partido</th>
										<th>Estado y fecha</th>
										<th>Opciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$vector = Array_Get_Partidos_No_Estado('2');
									$i=1;
									foreach ($vector as $value) {
										?>
										<tr>
											<td><?php echo Get_NombreEquipo($value['equipo1'])." <strong>vs</strong> ".Get_NombreEquipo($value['equipo2']) ?></td>
											<td><strong><?php echo Get_NombreEstado_Partido($value['estado']) ?></strong><br><?php echo $value['fecha'] ?></td>
											
											<td>
												<div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
													<button data-partido=" <?php echo Get_NombreEquipo($value['equipo1'])." vs ".Get_NombreEquipo($value['equipo2']) ?>" data-id="<?php echo $value['id_partido']?>"  type="button" class="btn bg-blue waves-effect edit-partido" data-toggle="modal" > <i class="material-icons">edit</i></button>

													<button  data-partido=" <?php echo Get_NombreEquipo($value['equipo1'])." vs ".Get_NombreEquipo($value['equipo2']) ?>"  data-id="<?php echo $value['id_partido']?>" type="button" class="btn bg-red waves-effect delete-partido"> <i class="material-icons">delete</i></button>
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
	<div class="modal fade" id="defaultModal" data-perfil="" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="defaultModalLabel">Editar partido</h4>
				</div>
				<div class="modal-body">

					<div class="body">
						<form>
							<h4 class="card-inside-title">Horario y lugar </h4>
							<div class="row clearfix">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="fecha" class="datepicker form-control" placeholder="Seleccina una fecha...">
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="hora" class="timepicker form-control" placeholder="Selecciona una hora...">
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
									<select class="form-control show-tick select-lugar">
										<option value="">--Selecciona un lugar --</option>
										<?php
										$vector = Array_Get_Lugares();
										foreach ($vector as  $value) 
										{
											?>
											<option value="<?php echo $value['id_lugares'] ?>"><?php echo $value['nombre'] ?></option>
											<?php 
										}
										?>	
									</select>
								</div>
							</div>
							<h4 class="card-inside-title">Estado</h4>
							<div class="row clearfix">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<select class="form-control show-tick select-estado">
										<option value="">--Selecciona un estado --</option>
										<?php
										$vector = Array_Get_Estados();
										foreach ($vector as  $value) 
										{
											?>
											<option value="<?php echo $value['id_estado'] ?>"><?php echo $value['nombre'] ?></option>
											<?php 
										} 
										?>	
									</select>
								</div>
							</div>
							<h4 class="card-inside-title">Fecha o ronda </h4>
							<div class="row clearfix">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="ronda" class="form-control"  placeholder="Ingresa una fecha o ronda">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>

				</div>
				<div class="modal-footer">
				<input type="hidden" id="partido" value=""/>
					<button type="button" class="btn btn-info waves-effect modificar">Guardar cambios</button>
					<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	


	<?php
}else
{
	require("../sinpermiso.php");
}
?>