<?php
include('menuinicial.php');
$ipvisitante=$_SERVER["REMOTE_ADDR"];
ContadorVisitas($ipvisitante,'principal');
?>
	<div class="content-info">
		<div class="container">
			<div class="content-bottom-grids">
				<div class="col-md-4 welcome-pic">	
					<h3 class="colortitulos">Calendario</h3>
					<table style="width:100% " class="table table-condensed">
						<thead>
							<tr >
								<th style="width:40%"></th>
								<th style="width:20%"></th>
								<th style="width:30%"></th>

							</tr>
						</thead>
						<tbody>
							<?php
							//contador para manejar cantidad en inicial
							$contador=0;
							$vector = ObtenerFechasdePartidos('1','asc');
							echo (empty($vector)) ? '<cite>No hay partidos programos.</cite>' :'';
							foreach ($vector as $value)
							{
								if($contador<=5){
									$Lugar = $value['lugar'];
									$fecha =$value['fecha'];

									?>
									<tr class="background"  >
										<td colspan="2">Cancha : <?php echo $value['nombre']; ?></td>
										<td colspan="2"><?php echo FormatoFecha($fecha); ?>
										</td>
									</tr>
									<?php
									$vectores = ObtenerPartidoDeUnaFecha($fecha,'1',$Lugar);
									foreach ($vectores  as $values)
									{
										$hora =$values['hora'];
										$equipo1=$values['equipo1'];
										$equipo2=$values['equipo2'];
										$idpartido=$values['id_partido'];
										?>
										<tr style="cursor : all-scroll;" onclick="location.href='web/Calendario/calendario.php?id=<?php echo $idpartido ?>'">
											<td><?php echo NombreEquipo($equipo1); ?></td>
											<td><?php echo FormatoHora($hora); ?></td>
											<td><?php echo NombreEquipo($equipo2); ?></td>

										</tr>
										<?php
										$contador=$contador+1;
									}
								}
							}
							?>

						</tbody>
					</table>

					<a class="linkeados" href="web/calendario.php">Ver más..</a>
				</div>
				<div class="col-md-4 welcome-pic">
					<h3>Resultados</h3>
					<table style="width:100% " class="table table-condensed">
						<thead>
							<tr >
								<th style="width:40%"></th>
								<th style="width:20%"></th>
								<th style="width:30%"></th>

							</tr>
						</thead>
						<tbody>
							<?php
							//contador para manejar cantidad en inicial
							$contador=0;
							$vector = ObtenerFechasdePartidos('2','desc');
							foreach ($vector  as $value)
							{
								if($contador<=3){
									$fecha =$value['fecha'];
									$Lugar = $value['lugar'];
									?>
									<tr class="background" >
										<td colspan="3"><?php echo FormatoFecha($fecha);?></td>
									</tr>
									<?php
									$vectores = ObtenerPartidoDeUnaFecha($fecha,'2',$Lugar);
									foreach ($vectores as $values) 
									{
										$hora =$values['hora'];
										$equipo1=$values['equipo1'];
										$equipo2=$values['equipo2'];
										$idpartido=$values['id_partido'];
										?>
										<tr style="cursor : all-scroll;" onclick="location.href='web/Resultados/resultados.php?id=<?php echo $idpartido ?>'">
											<td style="width:auto;"><?php echo NombreEquipo($equipo1); ?></td>
											<td style="width:15px;"><?php echo $values['resultado1'].""."-"."".$values['resultado2']; ?></td>
											<td style="width:auto;"><?php echo NombreEquipo($equipo2); ?></td>
										</tr>
										<?php
										$contador=$contador+1;
									}}}
									?>
								</tbody>
							</table>
							<a class="linkeados" href="web/calendario.php">Ver más..</a>
				</div>
				<div class="col-md-4 welcome-pic">
							<h3>Posiciones</h3>
							<table style="width:100% " class="table table-condensed">
								<thead>
									<tr class="background">
										<th style="width:5%">Pos</th>
										<th >Equipo</th>
										<th style="width:5%">PT</th>
										<th style="width:5%">PJ</th>
										<th style="width:5%">PG</th>

									</tr>
								</thead>  
								
								<tbody>
									<?php
									$vector = ObtenerTablaPosiciones('8');
									$contador = 1;
									foreach ($vector as  $value)
									{     
										?>
										<tr>
											<td><?php echo $contador; ?> </td>
											<td><?php echo $value['equipo']; ?></td>
											<td><?php echo $value['puntos']; ?> </td>
											<td><?php echo $value['pj']; ?> </td>
											<td> <?php echo $value['pg']; ?></td>
										</tr>
										<?php
										$contador = $contador + 1;
									}
									?>
								</tbody>
							</table>
							<a class="linkeados" href="web/estadisticas.php#goleadores">Ver más..</a>	  
				</div>

				<div class="clearfix"></div>
				</div>
		</div>
	</div>
	<?php
include('footerinicial.php');
	?>

