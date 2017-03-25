<?php
include('../menuinicial.php');
$id_modulos="29";
$ipvisitante=$_SERVER["REMOTE_ADDR"];
ContadorVisitas($ipvisitante,'calendario');
?>
<div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.php">Inicio</a></li>
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
</div>
<!-- content-bottom -->
<div class="content-info">
	 <div class="container">
		 <div class="content-bottom-grids">
			 <div class="col-md-4 popular">	
				 <h3>Calendario</h3>
				 <table style="width:100% " class="table table-condensed">
   						 <thead>
     						 <tr>
						        <th style="width:40%"></th>
						        <th style="width:20%"></th>
						        <th style="width:30%"></th>
     						 </tr>
   						 </thead>
  						  <tbody>
							<?php
							//contador para manejar cantidad en inicial
							$contador=0;
							$vector = ObtenerFechasdePartidosConFechas('1','asc','0 day','+7 day');
							 echo (empty($vector)) ? '<cite>No hay partidos programos.</cite>' :'';
							foreach ($vector as $value)
							{
							
							$Lugar = $value['lugar'];
							$fecha =$value['fecha'];
							
							?>
  						   <tr  class="background" >
						      	<td colspan="2">Cancha : <?php echo $value['nombre']; ?></td>
						      	<td colspan="2"><?php echo FormatoFecha($fecha); ?></td>
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
     						 <tr style="cursor : all-scroll;" onclick="location.href='Calendario/calendario.php?id=<?php echo $idpartido ?>'">
						        <td><?php echo NombreEquipo($equipo1); ?></td>
						        <td><?php echo FormatoHora($hora); ?></td>
						        <td><?php echo NombreEquipo($equipo2); ?></td>
			
						      </tr>
						     <?php
						     $contador=$contador+1;
						 }
						 
						}?>
					</tbody>
				</table>
			
			 </div>
			 <div class="col-md-4 welcome-pic">
				 <h3>Resultados</h3>
				  <table style="width:100% " class="table table-condensed">
   						 <thead>
     						 <tr>
						     <th style="width:40%"></th>
						        <th style="width:20%"></th>
						        <th style="width:30%"></th>
     						 </tr>
   						 </thead>
  						  <tbody>
  						  	<?php
						
							$contador=0;
							$vector = ObtenerFechasdePartidosConFechas('2','desc','-100 day','0 day');
							foreach ($vector  as $value)
							{
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
     						 <tr style="cursor : all-scroll;" onclick="location.href='Resultados/resultados.php?id=<?php echo $idpartido ?>'">
						        <td><?php echo NombreEquipo($equipo1); ?></td>
						        <td><?php echo $values['resultado1'].""."-"."".$values['resultado2']; ?></td>
						        <td><?php echo NombreEquipo($equipo2); ?></td>
						      </tr>
						     <?php
						     $contador=$contador+1;
						 }}
						     ?>
						  </tbody>
					 </table>
			</div>
			 <div class="col-md-4 welcome-pic">
	 		 </div>
		</div>
	</div>
</div>
	<?php
include('../footerinicial.php');
	?>