<?php
include('../conexion.php');
include('../posiciones.php');
include('../funciones.php');
$ipvisitante=$_SERVER["REMOTE_ADDR"];
ContadorVisitas($ipvisitante,'principal');
date_default_timezone_set('America/Bogota');
setlocale(LC_TIME, 'es_ES.UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Copa Amistad Profesional</title>
	<!--fonts-->
		<link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>	
	   <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>		
	<!--//fonts-->		
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="shortcut icon" href="images/Logo.png">
	<!-- for-mobile-apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<!-- js -->
		<script src="js/jquery.min.js"></script>
	<!-- js -->
</head>
<body>
<!-- header -->
<div class="header">
	 <div class="container">
		 <div class="logo">
			   <h1><a href="index.php">
			   <img  style=" width :100%; max-width:50px;" src="images/Logo.png" alt=""></a></h1>
		 </div>	
		 <div class="top-menu">
			 <span class="menu"></span>
			  <ul>
				 <li class="active"><a href="index.php">Inicio</a></li>
				 <li><a href="calendario.php">Calendario y Resultados</a></li>
				 <li><a href="estadisticas.php">Estadisticas</a></li>
				 <li><a href="equipos.php">Equipos</a></li>
				 <li><a href="eventos.php">Noticias y Eventos</a></li>
				 <li><a href="galeria.php">Galeria</a></li>
				 <li><a href="nosotros.php">Nosotros</a></li>
				 <li><a href="contacto.php">Contactenos</a></li>
			 </ul>			 
		 </div>			
		 <!-- script-for-menu -->
		 <script>
				$("span.menu").click(function(){
					$(".top-menu ul").slideToggle("slow" , function(){
					});
				});
		 </script>
		 <!-- script-for-menu -->	  	

		 <div class="clearfix"></div>
	 </div>
</div>
<!-- //header -->
<!-- banner -->
<div class="strip">
				<MARQUEE WIDTH=100% HEIGHT=20 SCROLLDELAY =200 SCROLLAMOUNT=12>
				 <?php
                $vector = ObtenerEquipos();
                 foreach ($vector as $value)
                 {?>
					<a style="color:white;cursor:all-scroll;font-family:'Audiowide', cursive" 
					href="Equipos/principal.php?id=<?php echo $value['id_equipo']; ?>">
					<?php echo $value['nombre_equipo']; ?><a/>-
					<?php
					}
					?>
				</MARQUEE>
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
							$vector = ObtenerFechasdePartidos('1','asc');
							 echo (empty($vector)) ? '<cite>No hay partidos programos.</cite>' :'';
							foreach ($vector as $value)
							{
							if($contador<=5){
							$Lugar = $value['lugar'];
							$fecha =$value['fecha'];
							
							?>
  						   <tr style="background : #00A859; color: white;" >
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
     						 <tr style="cursor : all-scroll;" onclick="location.href='Calendario/calendario.php?id=<?php echo $idpartido ?>'">
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
				 
				  <a class="linkeados" href="calendario.php">Ver más..</a>
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
							//contador para manejar cantidad en inicial
							$contador=0;
							$vector = ObtenerFechasdePartidos('2','desc');
							foreach ($vector  as $value)
							{
							if($contador<=3){
							$fecha =$value['fecha'];
							$Lugar = $value['lugar'];
							?>
  						   <tr style="background : #00A859; color: white;" >
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
				  <a class="linkeados" href="calendario.php">Ver más..</a>
			</div>
			<div class="col-md-4 welcome-pic">
				 <h3>Posiciones</h3>
				 <table style="width:100% " class="table table-condensed">
   						 <thead>
     						 <tr  style="background : #00A859; color: white;">
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
					 <a class="linkeados" href="estadisticas.php#goleadores">Ver más..</a>	  
			</div>

			<div class="clearfix"></div>
		 </div>
		
	 </div>
</div>
<!-- //content-bottom -->
<!-- banner -->
<div class="banner">
		<script src="js/responsiveslides.min.js"></script>
  <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	speed: 300,
        manualControls: '#slider3-pager',
      });
    });
  </script>

 <div class="slider">
	  <div class="callbacks_container">
	     <ul class="rslides" id="slider">
	         <li>
				  <img src="images/04.png" alt="">
				  <div class="banner-info">
				  <h3>Copa Amistad profesional</h3>
				  <p>Bienvenidos a la pagina de nuestro torneo, encontraras toda la información relacionado con tu equipo favorito y jugadores; Has parte de nuestro torneo y informate con nosotros.</p>
				  </div>
	         </li>
	     <!--    <li>
				 <img src="images/bnr2.jpg" alt="">
	        	 <div class="banner-info">
				  <h3>Curabitur turpis posuere rutrum.</h3>
				  <p>Lorem Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec a odio quam. Aenean ipsum arcu, 
				  luctus vel ultricies ut, commodo sed turpis. Phasellus tristique lorem sit amet tellus dignissim hendrerit.
				  In hac habitasse platea dictumst. Sed vehicula volutpat varius elit. consectetur adipiscing elit.</p>
				  </div>
			 </li>
	         <li>
	             <img src="images/bnr1.jpg" alt="">
	        	 <div class="banner-info">
				  <h3>Publicidad dos</h3>
				  <p>Bienvenidos a la pagina de nuestro torneo, encontraras toda la información relacionado con tu equipo favorito y jugadores; Has parte de nuestro torneo y informate con nosotros..</p>
				  </div>
	         </li> -->
	      </ul>
	  </div>
  </div>
<!---->
				
	 <!---start-content-->
	 <div class="banner-bottom-grids">
		 
	 </div>
</div>
<!-- //banner -->

<!-- content -->
<div class="content">
	 <div class="container">
		  <div class="clearfix"></div>
	 </div>
</div>
<!--- //content--->

<!-footer-->
<div class="footer" style="background: black;color: white;">
	 <div class="container">
		 <div class="copywrite">
			 <p>© 2016 Todos los derechos reservados</a> </p>
		 </div>
		 <div class="footer-menu">
			 <ul>
				<li class="active"><a href="index.php">Inicio</a></li>
				 <li><a href="eventos.php">Noticias y Eventos</a></li>
				 <li><a href="galeria.php">Galeria</a></li>
				 <li><a href="nosotros.php">Nosotros</a></li>
				 <li><a href="contacto.php">Contactenos</a></li>
			 </ul>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<!-- //footer -->
</body>
</html>