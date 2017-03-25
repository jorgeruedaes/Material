
<?php
include('../../menuinicial.php');
$id=$_GET['id'];
$ipvisitante=$_SERVER["REMOTE_ADDR"];
ContadorVisitas($ipvisitante,'calendario_'.$id);
$datos =DatosPartido($id);

$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
?>

<div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.php">Inicio</a></li>
		  <li class="active">Calendario</li>
		 </ol>
</div>
<!-- content-bottom -->
<div class="content-info">
	 <div class="container">

		 <div class="content-bottom-grids">
			 <div class="col-md-12 popular">	
				
				  <table style="width:100% " class="table table-condensed">
   						 <thead>
     						 <tr>
						    <th style="width:auto"></th>
						        <th style="width:auto"></th>
						        <th style="width:auto"></th>
     						 </tr>
   						 </thead>
  						  <tbody>
     						 <tr style="color: #C0392B;font-size: 1.4em;font-family: 'Audiowide', cursive;margin: 0 0 10px 0;">
						        <td><?php echo NombreEquipo($datos['equipo1']); ?></td>
						        <td><?php echo FormatoHora($datos['hora']); ?></td>
						        <td><?php echo NombreEquipo($datos['equipo2']); ?></td>
						      </tr>
						        <tr style="background:#DDDDDD">
						      	<td colspan="2">Cancha : <?php echo NombreCancha($datos['lugar']).", el día ".FormatoFecha($datos['fecha']); ?></td>
						      <td>
						      	<a href="whatsapp://send?text=Próximo partido: <?php echo NombreEquipo($datos['equipo1']).' vs '.NombreEquipo($datos['equipo2'])  ?>%20<?php echo $host . $url ?>" data-action="share/whatsapp/share">
    <img style="width: 100%; float:right; max-width: 30px;" src="images/whatsapp.png" >
   								 </a>
						      </td>
						      </tr>
						    </tbody>
						  </table>
				 
				 
			 </div>
			<div class="clearfix"></div>
		 </div>
		
	 </div>
</div>
<!-- //content-bottom -->

<!-- content-2 PARTE  -->
<div class="content-info">
	 <div class="container">

		 <div class="content-bottom-grids">
			 <div class="col-md-6 popular">	
				 <h3> Plantilla <?php echo NombreEquipo($datos['equipo1']); ?></h3>
				 <div style="max-height: 300px; overflow-y:scroll;">
				  <table style="width:100% " class="table table-condensed">
   						 <thead>
     						 <tr class="background">
						        <th >Jugador</th>
						        <th style="width:15%">Carnet</th>
     						 </tr>
   						 </thead>
  						  <tbody>
     						 <?php 
     						 $jugadores = ObtenerJugadoresEquipo($datos['equipo1']);
     						 foreach ($jugadores as $value) 
     						 {
     						 ?>
     						  <tr>
						        <td><?php echo ObtenerNombreCompletoJugador($value['id_jugador']);?></td>
						       <td><img src="web/images/<?php echo ObtenerCarnet($value['fecha_nacimiento']); ?>" whith="10px" heigth="10px" style="width: 15px;">
                                         </td>
						      </tr>
						     <?php
						 	  }
						      ?>
						    </tbody>
						  </table>
						  </div>
			 </div>
			 <div class="col-md-6 welcome-pic">
				 <h3>Plantilla <?php echo NombreEquipo($datos['equipo2']); ?></h3>
				 <div style="max-height: 300px; overflow-y:scroll;">
				   <table style="width:100% " class="table table-condensed">
   						 <thead>
     						 <tr class="background">
						        <th >Jugador</th>
						        <th style="width:15%">Carnet</th>
						       
     						 </tr>
   						 </thead>
  						  <tbody>
     						 <?php 
     						 $jugadores = ObtenerJugadoresEquipo($datos['equipo2']);
     						 foreach ($jugadores as $value) 
     						 {
     						 ?>
     						  <tr>
						        <td><?php echo ObtenerNombreCompletoJugador($value['id_jugador']);?></td>
						       <td><img src="web/images/<?php echo ObtenerCarnet($value['fecha_nacimiento']); ?>" whith="10px" heigth="10px" style="width: 15px;">
                                         </td>
						      </tr>
						     <?php
						 	  }
						      ?>
						    </tbody>
						  </table>
						  </div>
				 
			</div>

			<div class="clearfix"></div>
		 </div>
		
	 </div>
</div>
<?php
include('../../footerinicial.php');
?>
