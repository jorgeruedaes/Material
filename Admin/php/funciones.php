<?php
// Recibe : id del equipo 
// Retorna : Nombre del equipo.
function NombreEquipo($identificador)
{
    global $conexion;
    $valor = mysqli_fetch_array(mysqli_query($conexion, "SELECT nombre_equipo 
      FROM tb_equipos WHERE id_equipo=$identificador"));
    $valor = $valor['nombre_equipo'];
    
    return $valor;
}
// Recibe : id de cancha
// Retorna : Nombre de cancha.
function NombreCancha($identificador)
{
    global $conexion;
    $valor = mysqli_fetch_array(mysqli_query($conexion, "SELECT nombre 
      FROM tb_lugares WHERE id_lugar=$identificador"));
    $valor = $valor['nombre'];
    
    return $valor;
}

// Recibe : Hora
// Retorna : 3:30 pm formato de hora .
function FormatoHora($hora)
{
    $valor = date("g", strtotime($hora)) . ":" . date("i", strtotime($hora)) . " " . date("a", strtotime($hora));
    
    return $valor;
}
// Recibe : Fecha 2016-05-12
// Retorna : 12 de Mayo .
function FormatoFecha($fecha)
{
    $meses = array(
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre"
        );
    $valor = date("d", strtotime($fecha)) . " de " . $meses[date("m", strtotime($fecha)) - 1];
    
    return $valor;
}
// Recibe : id del partido 
// Retorna : Infomacion del paritdo en un array
function DatosPartido($identificador)
{
    global $conexion;
    $valor      = mysqli_fetch_array(mysqli_query($conexion, "SELECT * 
      FROM tb_partidos WHERE id_partido=$identificador"));
    $equipo1    = $valor['equipo1'];
    $equipo2    = $valor['equipo2'];
    $estado     = $valor['Estado'];
    $fecha      = $valor['fecha'];
    $hora       = $valor['hora'];
    $lugar      = $valor['Lugar'];
    $Nfecha     = $valor['numero_fecha'];
    $resultado1 = $valor['resultado1'];
    $resultado2 = $valor['resultado2'];
    
    return array(
        "equipo1" => "$equipo1",
        "equipo2" => "$equipo2",
        "estado" => "$estado",
        "fecha" => "$fecha",
        "hora" => "$hora",
        "lugar" => "$lugar",
        "Nfecha" => "$Nfecha",
        "resultado1" => "$resultado1",
        "resultado2" => "$resultado2"
        );
}
// Recibe : id de equipo
// Retorna : retorna un array con los jugadores del equipo de cancha.
function ObtenerJugadoresEquipo($identificador)
{
    global $conexion;
    Get_Tabla_Posiciones();
    $jugadores = mysqli_query($conexion, "SELECT *FROM tb_jugadores WHERE equipo=$identificador ORDER BY fecha_nacimiento desc");
    $vector    = array();
    while ($valor = mysqli_fetch_array($jugadores)) {
        $id_jugador       = $valor['id_jugadores'];
        $nombre1          = $valor['nombre1'];
        $nombre2          = $valor['nombre2'];
        $apellido1        = $valor['apellido1'];
        $apellido2        = $valor['apellido2'];
        $estado_jugador   = $valor['estado_jugador'];
        $fecha_ingreso    = $valor['fecha_ingreso'];
        $fecha_nacimiento = $valor['fecha_nacimiento'];
        $telefono         = $valor['telefono'];
        $profesion        = $valor['profesion'];
        $datos            = array(
            'id_jugador' => "$id_jugador",
            'nombre1' => "$nombre1",
            'nombre2' => "$nombre2",
            'apellido1' => "$apellido1",
            'apellido2' => "$apellido2",
            'estado_jugador' => "$estado_jugador",
            'fecha_ingreso' => "$fecha_ingreso",
            'fecha_nacimiento' => "$fecha_nacimiento",
            'telefono' => "$telefono",
            'profesion' => "$profesion"
            
            );
        array_push($vector, $datos);
    }
    
    return $vector;
}

// Recibe : id de equipo
// Retorna : retorna un array con los jugadores del equipo de cancha.
function Array_Jugadores_Equipo($identificador)
{
    global $conexion;
    $jugadores = mysqli_query($conexion, "SELECT *FROM tb_jugadores WHERE equipo=$identificador ORDER BY nombre1 desc");
    $vector    = array();
    while ($valor = mysqli_fetch_array($jugadores)) {
        $id_jugador       = $valor['id_jugadores'];
        $nombre1          = $valor['nombre1'];
        $nombre2          = $valor['nombre2'];
        $apellido1        = $valor['apellido1'];
        $apellido2        = $valor['apellido2'];
        $estado_jugador   = $valor['estado_jugador'];
        $fecha_ingreso    = $valor['fecha_ingreso'];
        $fecha_nacimiento = $valor['fecha_nacimiento'];
        $telefono         = $valor['telefono'];
        $profesion        = $valor['profesion'];
        $datos            = array(
            'id_jugador' => "$id_jugador",
            'nombre1' => "$nombre1",
            'nombre2' => "$nombre2",
            'apellido1' => "$apellido1",
            'apellido2' => "$apellido2",
            'estado_jugador' => "$estado_jugador",
            'fecha_ingreso' => "$fecha_ingreso",
            'fecha_nacimiento' => "$fecha_nacimiento",
            'telefono' => "$telefono",
            'profesion' => "$profesion"
            
            );
        array_push($vector, $datos);
    }
    
    return $vector;
}
// Recibe : id del jugador 
// Retorna : Primer nombre y primer apellido.
function ObtenerNombreCompletoJugador($identificador)
{
    global $conexion;
    $valor = mysqli_fetch_array(mysqli_query($conexion, "SELECT nombre1,apellido1 
      FROM tb_jugadores WHERE id_jugadores=$identificador"));
    $valor = $valor['nombre1'] . " " . $valor['apellido1'];
    ;
    
    return $valor;
}

// Recibe : id del jugador 
// Retorna : Nombre completo.
function Obtener_Nombre_Jugador($identificador)
{
    global $conexion;
    $valor = mysqli_fetch_array(mysqli_query($conexion, "SELECT nombre1,nombre2,apellido1 
      ,apellido2  FROM tb_jugadores WHERE id_jugadores=$identificador"));
    $valor = $valor['nombre1'] ." ". $valor['nombre2'] ." " . $valor['apellido1']." ".$valor['apellido2'];
    ;
    
    return $valor;
}

// Recibe : Id del equipo 
// Retorna : Array con los datos del equipo.
function ObtenerEquipo($identificador)
{
    global $conexion;
    $valor         = mysqli_fetch_array(mysqli_query($conexion, "SELECT * 
      FROM tb_equipos WHERE id_equipo=$identificador ORDER BY nombre_equipo desc"));
    $nombre_equipo = $valor['nombre_equipo'];
    $puntos        = $valor['puntos'];
    $tecnico1      = $valor['tecnico1'];
    $tecnico2      = $valor['tecnico2'];
    $imagen_equipo = $valor['imagen_escudo'];
    
    return array(
        "nombre_equipo" => "$nombre_equipo",
        "puntos" => "$puntos",
        "tecnico1" => "$tecnico1",
        "tecnico2" => "$tecnico2",
        "imagen_equipo" => "$imagen_equipo",
        "id_equipo" => "$identificador"
        );
}
// Recibe : Id del jugador
// Retorna : Numero con partidos asistidos por un jugador.
function ObtenerPartidosAsistidos($identificador)
{
    global $conexion;
    $valor = mysqli_num_rows(mysqli_query($conexion, "SELECT jugador FROM tr_jugadoresxpartido WHERE jugador=$identificador and partido In (SELECT id_partido FROM tb_partidos WHERE Estado=2)  "));
    
    return $valor;
}
// Recibe : Id del jugador 
// Retorna : Infomacion del jugador en un array
function ObtenerDatosJugador($identificador)
{
    global $conexion;
    $valor            = mysqli_fetch_array(mysqli_query($conexion, "SELECT * 
      FROM tb_jugadores WHERE id_jugadores=$identificador"));
    $id_jugador       = $valor['id_jugadores'];
    $nombre1          = $valor['nombre1'];
    $nombre2          = $valor['nombre2'];
    $apellido1        = $valor['apellido1'];
    $apellido2        = $valor['apellido2'];
    $estado_jugador   = $valor['estado_jugador'];
    $fecha_ingreso    = $valor['fecha_ingreso'];
    $fecha_nacimiento = $valor['fecha_nacimiento'];
    $telefono         = $valor['telefono'];
    $profesion        = $valor['profesion'];
    $datos            = array(
        'id_jugador' => "$id_jugador",
        'nombre1' => "$nombre1",
        'nombre2' => "$nombre2",
        'apellido1' => "$apellido1",
        'apellido2' => "$apellido2",
        'estado_jugador' => "$estado_jugador",
        'fecha_ingreso' => "$fecha_ingreso",
        'fecha_nacimiento' => "$fecha_nacimiento",
        'telefono' => "$telefono",
        'profesion' => "$profesion"
        
        );
    
    return $datos;
}
// Recibe : Id equipo
// Retorna : Grupo de goleadores en un array
function ObtenerGoleadoresEquipo($equipo)
{
    global $conexion;
    $valor = mysqli_query($conexion, "SELECT jugador,SUM(goles) AS numero from tr_jugadoresxpartido WHERE goles!=0 and partido IN(SELECT id_partido FROM tb_partidos WHERE Estado=2) and jugador IN (SELECT id_jugadores FROM tb_jugadores WHERE equipo=$equipo) GROUP BY jugador order by numero desc");
    $datos = array();
    while ($informacion = mysqli_fetch_array($valor)) {
        $jugador = $informacion['jugador'];
        $goles   = $informacion['numero'];
        $vector  = array(
            'jugador' => "$jugador",
            'goles' => "$goles"
            );
        array_push($datos, $vector);
    }
    
    return $datos;
}
// Recibe un limite para la consulta.
// Retorna : Tabla de posiciones en  un array
function ObtenerTablaPosiciones($limite)
{
   global $conexion;
   $valor = mysqli_query($conexion, "SELECT * FROM te_posiciones order by  puntos desc, pg desc,dg desc,gf desc limit $limite");
 
   $datos = array();
   while ($informacion = mysqli_fetch_array($valor)) {
    $equipo = $informacion['equipo'];
    $puntos = $informacion['puntos'];
    $pj     = $informacion['pj'];
    $pg     = $informacion['pg'];
    $pe     = $informacion['pe'];
    $pp     = $informacion['pp'];
    $gf     = $informacion['gf'];
    $gc     = $informacion['gc'];
    $dg     = $informacion['dg'];
    $vector = array(
        'equipo' => "$equipo",
        'puntos' => "$puntos",
        'pj' => "$pj",
        'pg' => "$pg",
        'pe' => "$pe",
        'pp' => "$pp",
        'gf' => "$gf",
        'gc' => "$gc",
        'dg' => "$dg"
        );
    array_push($datos, $vector);
}

return $datos;
}
// Recibe : Estado de los partidos y orden.
// Retorna : Array con diferentes fechas.
function ObtenerFechasdePartidos($estado, $orden)
{
    global $conexion;
    $valor = mysqli_query($conexion, "SELECT DISTINCT fecha,nombre,Lugar 
       FROM `tb_partidos`,tb_lugares WHERE Estado=$estado and id_lugar=Lugar 
       ORDER BY fecha $orden,Lugar asc ,hora asc");
    $datos = array();
    while ($informacion = mysqli_fetch_array($valor)) {
        $fecha  = $informacion['fecha'];
        $nombre = $informacion['nombre'];
        $lugar  = $informacion['Lugar'];
        $vector = array(
            'fecha' => "$fecha",
            'nombre' => "$nombre",
            'lugar' => "$lugar"
            );
        array_push($datos, $vector);
    }
    
    return $datos;
}
// Recibe : Estado de los partidos, orden y el equipos.
// Retorna : Array con diferentes fechas.
function ObtenerFechasdePartidosDeUnEquipo($estado, $orden, $equipo)
{
    global $conexion;
    $valor = mysqli_query($conexion, "SELECT DISTINCT fecha,nombre,Lugar 
       FROM `tb_partidos`,tb_lugares WHERE Estado=$estado and id_lugar=Lugar 
       and   (equipo1=$equipo OR equipo2=$equipo)
       ORDER BY Lugar asc,fecha $orden ,hora asc");
    $datos = array();
    while ($informacion = mysqli_fetch_array($valor)) {
        $fecha  = $informacion['fecha'];
        $nombre = $informacion['nombre'];
        $lugar  = $informacion['Lugar'];
        $vector = array(
            'fecha' => "$fecha",
            'nombre' => "$nombre",
            'lugar' => "$lugar"
            );
        array_push($datos, $vector);
    }
    
    return $datos;
}
// Recibe : Estado de los partidos y Fecha.
// Retorna : Array con diferentes partidos de ese estado y fecha.
function ObtenerPartidoDeUnaFecha($fecha, $estado, $lugar)
{
    global $conexion;
    $valor = mysqli_query($conexion, "SELECT * 
      FROM tb_partidos WHERE fecha='$fecha' and Lugar=$lugar
      and Estado=$estado   ORDER BY hora asc ");
    $datos = array();
    while ($informacion = mysqli_fetch_array($valor)) {
        $id_partido = $informacion['id_partido'];
        $equipo1    = $informacion['equipo1'];
        $equipo2    = $informacion['equipo2'];
        $estado     = $informacion['Estado'];
        $fecha      = $informacion['fecha'];
        $hora       = $informacion['hora'];
        $lugar      = $informacion['Lugar'];
        $Nfecha     = $informacion['numero_fecha'];
        $resultado1 = $informacion['resultado1'];
        $resultado2 = $informacion['resultado2'];
        $vector     = array(
            "id_partido" => "$id_partido",
            "equipo1" => "$equipo1",
            "equipo2" => "$equipo2",
            "estado" => "$estado",
            "fecha" => "$fecha",
            "hora" => "$hora",
            "lugar" => "$lugar",
            "Nfecha" => "$Nfecha",
            "resultado1" => "$resultado1",
            "resultado2" => "$resultado2"
            );
        array_push($datos, $vector);
    }
    
    return $datos;
}

// Recibe : Estado de los partidos y orden.
// Retorna : Array con partidos en fechas dadas.
function ObtenerFechasdePartidosConFechas($estado, $orden, $menosdias, $masdias)
{
    $menosdias = ObtenerFechaModificada($menosdias);
    $masdias   = ObtenerFechaModificada($masdias);
    global $conexion;
    
    $valor = mysqli_query($conexion, "SELECT DISTINCT fecha,nombre,Lugar 
       FROM `tb_partidos`,tb_lugares WHERE Estado=$estado and id_lugar=Lugar
       and fecha between '$menosdias' and '$masdias'  
       ORDER BY fecha $orden, Lugar asc,hora asc");
    $datos = array();
    while ($informacion = mysqli_fetch_array($valor)) {
        $fecha  = $informacion['fecha'];
        $nombre = $informacion['nombre'];
        $lugar  = $informacion['Lugar'];
        $vector = array(
            'fecha' => "$fecha",
            'nombre' => "$nombre",
            'lugar' => "$lugar"
            );
        array_push($datos, $vector);
    }
    
    return $datos;
}
//Recibe la fecha y los dias a agregar o quitar 
//Retorna una fecha +1 day o -1 day
function ObtenerFechaModificada($agregado)
{
    $fecha = date("Y-m-d");
    return date('Y-m-d', strtotime($agregado, strtotime($fecha)));
}
// Retorna : Los equipos con su información
function ObtenerEquipos()
{
    global $conexion;
    
    $query = mysqli_query($conexion, "SELECT  * FROM tb_equipos ORDER BY nombre_equipo ASC ");
    $vector    = array();
    while ($valor = mysqli_fetch_array($query)) {
        $arreglo = ObtenerEquipo($valor['id_equipo']);
        array_push($vector, $arreglo);
    }
    
    return $vector;
}
// Recibe : Fecha de nacimiento
// Retorna : Carnet
function ObtenerCarnet($fechaNacimiento)
{
    $horanow  = date("Y-m-d");
    $edadreal = $horanow - $fechaNacimiento;
    if ($edadreal >= 40) {
        return 'verde.png';
    } elseif ($edadreal < 40 && $edadreal >= 35) {
        return 'azul.png';
    } elseif ($edadreal < 35 && $edadreal >= 32) {
        return 'rojo.png';
    } elseif ($edadreal < 32) {
        return 'amarillo.png';
    }
}
// Recibe : Codigo Tarjeta
// Retorna : Imagen tarjeta
function ObtenerTipoTarjeta($codigo)
{
    if ($codigo == 1) {
        return "<img src=\"images/amarilla.png\" style=\"width: 15px;\">";
    } elseif ($codigo == 2) {
        return "<img src=\"images/roja.png\" style=\"width: 15px;\">";
    } else {
        return "";
    }
    
}
//Recibe el equipo y un partido
// retorna lista de asistentes,goles y targetas.
function ObtenerPlanillaPartido($equipo, $partido)
{
    global $conexion;
    $consulta = mysqli_query($conexion, "SELECT * FROM `tr_jugadoresxpartido` WHERE jugador
      IN(SELECT id_jugadores FROM tb_jugadores WHERE equipo=$equipo) and partido=$partido");
    $datos    = array();
    while ($informacion = mysqli_fetch_array($consulta)) {
        $jugador      = $informacion['jugador'];
        $amonestacion = $informacion['amonestacion'];
        $goles        = $informacion['goles'];
        $autogoles    = $informacion['autogoles'];
        $vector       = array(
            'jugador' => "$jugador",
            'amonestacion' => "$amonestacion",
            'goles' => "$goles",
            'autogoles' => "$autogoles"
            );
        array_push($datos, $vector);
    }
    
    return $datos;
}
// Recibe : Estado de los partidos,euipo y orden
// Retorna : Array con diferentes partidos de ese estado y fecha.
function ObtenerPartidoDeEquipo($estado, $equipo, $orden)
{
    global $conexion;
    $valor = mysqli_query($conexion, "SELECT * 
      FROM tb_partidos WHERE 
      Estado=$estado and (equipo1=$equipo or equipo2=$equipo) ORDER BY fecha $orden,hora asc ");
    $datos = array();
    while ($informacion = mysqli_fetch_array($valor)) {
        $id_partido = $informacion['id_partido'];
        $equipo1    = $informacion['equipo1'];
        $equipo2    = $informacion['equipo2'];
        $estado     = $informacion['Estado'];
        $fecha      = $informacion['fecha'];
        $hora       = $informacion['hora'];
        $lugar      = $informacion['Lugar'];
        $Nfecha     = $informacion['numero_fecha'];
        $resultado1 = $informacion['resultado1'];
        $resultado2 = $informacion['resultado2'];
        $vector     = array(
            "id_partido" => "$id_partido",
            "equipo1" => "$equipo1",
            "equipo2" => "$equipo2",
            "estado" => "$estado",
            "fecha" => "$fecha",
            "hora" => "$hora",
            "lugar" => "$lugar",
            "Nfecha" => "$Nfecha",
            "resultado1" => "$resultado1",
            "resultado2" => "$resultado2"
            );
        array_push($datos, $vector);
    }
    
    return $datos;
}

// Recibe : id del lugar
// Retorna : Nombre del lugar.
function ObtenerNombreCancha($identificador)
{
    global $conexion;
    $valor = mysqli_fetch_array(mysqli_query($conexion, "SELECT nombre
      FROM tb_lugares WHERE id_lugar=$identificador"));
    
    return $valor['nombre'];
}

// Recibe : IP
// Retorna : nada.
function ContadorVisitas($ipvisitante,$lugar)
{
    global $conexion;
    $valor = mysqli_query($conexion, "INSERT INTO `tb_contador`(`visitas`, `fecha`,`ip`,`lugar`) VALUES (NULL,NOW(),'$ipvisitante','$lugar')");
}
// Recibe : CargadordeImagenes
// Retorna : nada.
function CargarImagenes()
{
    global $conexion;
    $valor = mysqli_query($conexion, "SELECT * 
      FROM tb_galeria LIMIT 12");
    $datos = array();
    while ($informacion = mysqli_fetch_array($valor)) {
        $id_imagen = $informacion['codigo'];
        $imagen    = $informacion['imagen'];
        $vector    = array(
            "id_imagen" => "$id_imagen",
            "imagen" => "$imagen"
            );
        array_push($datos, $vector);
    }
    
    return $datos;
}

// Establecer desde que dispositivo estamos navegando 
// para el manejo de publicidad.
function TipoNavegador()
{
    $tablet_browser = 0;
    $mobile_browser = 0;
    $body_class     = 'desktop';
    
    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
        $tablet_browser++;
        $body_class = "tablet";
    }
    
    if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
        $mobile_browser++;
        $body_class = "mobile";
    }
    
    if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
        $mobile_browser++;
        $body_class = "mobile";
    }
    
    $mobile_ua     = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
    $mobile_agents = array(
        'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','ipaq','java',
        'jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','maui','maxo','midp','mits','mmef','mobi','mot-','moto',
        'mwbp','nec-','newt','noki','palm','pana','pant','phil','play','port','prox','qwap','sage',
        'sams','sany','sch-','sec-','send','seri','sgh-','shar','sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
        'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp','wapr','webc','winw','winw','xda ','xda-'
        );
    
    if (in_array($mobile_ua, $mobile_agents)) {
        $mobile_browser++;
    }
    
    if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
        $mobile_browser++;
        //Check for tablets on opera mini alternative headers
        $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
            $tablet_browser++;
        }
    }
    
    return array(
        $mobile_browser,
        $tablet_browser
        );
}

//Recibe el id del equipo para consultar los amonestado vigentes
//
// Retorna un array con los amonestados

function AmonestadoFechaeEquipo($equipo)
{
    global $conexion;
    $datos = array();
    $query = mysqli_query($conexion, "SELECT jugador,amonestacion from tr_amonestacionesxjugador WHERE estado_amonestacion='1' AND amonestacion!=5  and jugador IN ( SELECT id_jugadores FROM tb_jugadores WHERE equipo=$equipo ) ");
    while ($amonestados = mysqli_fetch_array($query)) {
        $jugador      = $amonestados['jugador'];
        $amonestacion = $amonestados['amonestacion'];
        $vector       = array(
            "jugador" => "$jugador",
            "amonestacion" => "$amonestacion"
            );
        
        array_push($datos, $vector);
    }
    
    
    return $datos;
}
// Obtener las diferentes fechas de los partidos que estan en estado 2 --- Termminados

function Array_ObtenerNumeroFechas($equipo, $estado)
{
    global $conexion;
    $fechas = mysqli_query($conexion, "SELECT  distinct numero_fecha FROM tb_partidos WHERE Estado=$estado AND (equipo1=$equipo or equipo2=$equipo)");
    $datos  = array();
    while ($valor = mysqli_fetch_array($fechas)) {
        $numero_fecha = $valor['numero_fecha'];
        $vector       = array(
            "numero_fecha" => "$numero_fecha"
            );
        array_push($datos, $vector);
    }
    
    return $datos;
}
// Obtiene los partidos asistidos por un jugador
//
function Int_PartidosAsistidos_Jugador($jugador)
{
    global $conexion;
    $calculo = mysqli_query($conexion, "SELECT * FROM tr_jugadoresxpartido  WHERE jugador=$jugador and partido IN (SELECT id_partido FROM tb_partidos WHERE Estado='2')");
    
    return mysqli_num_rows($calculo);
}
// Obtiene los partidos jugados por un jugador
//
function Int_PartidosJugados_Equipo($equipo)
{
    global $conexion;
    $calculo = mysqli_query($conexion, "SELECT * FROM tb_partidos WHERE  (equipo1=$equipo || equipo2 = $equipo) AND Estado='2'");
    
    return mysqli_num_rows($calculo);
}
// Obtiene los partidos que podria haber jugado dependiendo la fecha de ingreso por un jugador
//
function Int_PartidosPosibles_Jugador($equipo, $fechaingreso)
{
    global $conexion;
    $calculo = mysqli_query($conexion, "SELECT id_partido FROM tb_partidos WHERE fecha>'$fechaingreso' AND (equipo1=$equipo || equipo2 =$equipo)  AND Estado='2'");
    
    return mysqli_num_rows($calculo);
}
// Obtiene los partidos que podria haber jugado dependiendo la fecha de ingreso por un jugador
//
function Int_PorcentajeAsistencia_Jugador($asistidos, $partidos)
{

    return round(($asistidos / $partidos) * 100) . ' %';
}

// Saber si un jugador jugo o no en una determinada fecha
//
function Bole_SabersiAsistio_Partidos($jugador, $numerofecha)
{
    global $conexion;
    $calculo  = mysqli_query($conexion, "SELECT * FROM  tr_jugadoresxpartido where jugador=$jugador and partido in (SELECT id_partido FROM tb_partidos WHERE numero_fecha=$numerofecha) ");
    $columnas = (int) mysqli_num_rows($calculo);
    if ($columnas > 0) {
        $resultado = 'images/icons-png/check-black.png';
    } else {
        $resultado = 'images/icons-png/star-white.png';
    }
    
    return $resultado;
}
//Recibe la cantidad de jugadores a mostrar
//
function Array_Goleadores_Jugadores($cantidad)
{
    global $conexion;
    $calculo  = mysqli_query($conexion, "SELECT jugador,SUM(goles) AS goles1, id_equipo 
      from tr_jugadoresxpartido,tb_jugadores,tb_equipos 
      WHERE goles>=1 and jugador=id_jugadores and equipo=id_equipo and partido IN (SELECT id_partido FROM tb_partidos WHERE Estado=2 ) GROUP BY jugador ORDER BY `goles1` DESC, nombre_equipo asc limit $cantidad");
    $datos  = array();
    while ($valor = mysqli_fetch_array($calculo)) {
        $goles = $valor['goles1'];
        $jugador = $valor['jugador'];
        $id_equipo = $valor['id_equipo'];

        $vector       = array(
            "goles" => "$goles",
            "jugador" => "$jugador",
            "id_equipo" => "$id_equipo"
            );
        array_push($datos, $vector);
    }
    return $datos;

}

//
//

function Array_Amonestados_Jugadores($equipo)
{
    global $conexion;
    $calculo  = mysqli_query($conexion, "SELECT * from tr_jugadoresxpartido WHERE 
       amonestacion!=5 and partido IN(SELECT id_partido FROM tb_partidos WHERE Estado=2) and jugador 
       in (SELECT id_jugadores FROM tb_jugadores WHERE equipo=$equipo) GROUP BY jugador");
    $datos  = array();
    while ($valor = mysqli_fetch_array($calculo)) {
        $jugador = $valor['jugador'];

        $vector       = array(
           "jugador" => "$jugador"
           );
        array_push($datos, $vector);
    }
    return $datos;

}

// numeroo0 de amonestaciones que tiene un jugador
function Int_Amonestaciones_Jugadores($jugador,$amonestacion)
{
    global $conexion;
    $calculo  = mysqli_query($conexion, "SELECT COUNT(amonestacion) as cantidad FROM tr_jugadoresxpartido 
        WHERE  jugador=$jugador and amonestacion=$amonestacion");
    $valor = mysqli_fetch_array($calculo);
    return $valor['cantidad'];

}

// Recibe un limite para la consulta.
// Retorna : Tabla de valla menos vencida en  un array
function ObtenerTablaVayaMenovencida()
{
    global $conexion;
    $valor = mysqli_query($conexion, "SELECT equipo,gc 
        FROM te_posiciones 
        order by gc asc");
    $datos = array();
    while ($informacion = mysqli_fetch_array($valor)) {
        $equipo = $informacion['equipo'];
        $gc     = $informacion['gc'];

        $vector = array(
            'equipo' => "$equipo",
            'gc' => "$gc"


            );
        array_push($datos, $vector);
    }
    
    return $datos;
}
// Tabla de equipos m��s goleadores
function ObtenerTablaEquipoGoleador()
{
    global $conexion;
    $valor = mysqli_query($conexion, "SELECT equipo,gf 
        FROM te_posiciones 
        order by gf desc");
    $datos = array();
    while ($informacion = mysqli_fetch_array($valor)) {
        $equipo = $informacion['equipo'];
        $gf     = $informacion['gf'];

        $vector = array(
            'equipo' => "$equipo",
            'gf' => "$gf"


            );
        array_push($datos, $vector);
    }
    
    return $datos;
}
// goleadores de la ultima fecha Jugada
function Goleadores_De_Fecha()
{
    global $conexion;
    $valor = mysqli_query($conexion, "SELECT jugador,goles,equipo FROM `tr_jugadoresxpartido`,tb_jugadores WHERE partido in (select id_partido from tb_partidos where numero_fecha in (select max(numero_fecha) from tb_partidos where estado='2')and estado='2') and goles >=2 and id_jugadores=jugador order by goles desc");
    $datos = array();
    while ($informacion = mysqli_fetch_array($valor)) {
        $jugador = $informacion['jugador'];
        $goles     = $informacion['goles'];
        $equipo     = $informacion['equipo'];

        $vector = array(
            'jugador' => "$jugador",
            'goles' => "$goles",
            'equipo' => "$equipo"


            );
        array_push($datos, $vector);
    }
    
    return $datos;
}
/**
 * [Array_Get_Modulos_All_Users Obtiene el menu principal]
 */
function Array_Get_Modulos_All_Users()
{
    global $conexion;
    $consulta = mysqli_query($conexion,"SELECT * FROM `tb_modulos` where tipo='users' 
        and estado='activo' Order by orden asc");   
    $datos = array();
    while ($informacion = mysqli_fetch_array($consulta)) {
        $id_modulos  = $informacion['id_modulos'];
        $nombre  = $informacion['nombre'];
        $ruta  = $informacion['ruta'];
        $vector = array(
            'id_modulos' => "$id_modulos",
            'nombre' => "$nombre",
            'ruta' =>"$ruta"
            );
        array_push($datos, $vector);
    }
    return $datos;

}

/**
 * [Array_Get_PadreHijo Obtiene la informaci�n del modulo con la de su respectivo padre]
 * @param [type] $hijo [Identificador del sub modulo]
 */
function Array_Get_PadreHijo($hijo)
{
    global $conexion;
    $consulta = mysqli_query($conexion,"(SELECT * from tb_modulos WHERE id_modulos=$hijo) union (SELECT * FROM tb_modulos WHERE id_modulos IN (SELECT padre from tb_modulos WHERE id_modulos=$hijo)) ORDER BY padre");
    $datos = array();
    while ($informacion = mysqli_fetch_array($consulta)) {
        $id_modulos  = $informacion['id_modulos'];
        $padre = $informacion['padre'];
        $nombre  = $informacion['nombre'];
        $ruta  = $informacion['ruta'];
        $icono =  $informacion['icono'];
        $vector = array(
            'id_modulos' => "$id_modulos",
            'padre' => "$padre",
            'nombre' => "$nombre",
            'ruta' =>"$ruta",
            'icono' => "$icono"
            );
        array_push($datos, $vector);
    }
    return $datos;

}
function Get_Tabla_Posiciones()
{
    global $conexion;
/// Consulta de numero de equipos que han jugado para generar la Tabla de posiciones
    $equiposquehanjugado = mysqli_query($conexion,"SELECT id_equipo,nombre_equipo,puntos,grupo
        FROM tb_equipos,tb_partidos 
        WHERE tb_equipos.id_equipo = tb_partidos.equipo1
        OR tb_equipos.id_equipo = tb_partidos.equipo2
        AND  tb_partidos.Estado='2'
        GROUP BY id_equipo");

// se realiza la busqueda equipo por equipo con el fin de que se guarden los datos en una matrix , esto ayudara a organizar la informacion
// se calcula el numero de equipos que han jugado hasta ahora con una nueva variable que define el numero de columnas creadas (numero de equipos que ha jugado)
    $numerodeequiposparaeltama�odelamatriz = mysqli_num_rows($equiposquehanjugado);

    $matriz[$numerodeequiposparaeltama�odelamatriz]['13'] = 0;
    $i = 0;
    while ($identificaciones = mysqli_fetch_array($equiposquehanjugado)) {
    $matriz[$i]['3'] = 0;  // GOLES A FAVOR
    $matriz[$i]['4'] = 0; // GOLES CONTRA
    $matriz[$i]['5'] = 0;  // PARTIDOS PERDIOS
    $matriz[$i]['6'] = 0;  // PARTIDOS GANADOS
    $matriz[$i]['7'] = 0; // EMPATES


    $matriz[$i]['0'] = $identificaciones['id_equipo'];
    $matriz[$i]['1'] = $identificaciones['nombre_equipo'];
    $matriz[$i]['2'] = $identificaciones['puntos'];
    $matriz[$i]['11'] = $identificaciones['grupo'];


// // saber en que lugar esta si en el equipo1 o equipo2 para tomar los valores de los goles 
    $lugardentrodelospartidos = mysqli_query($conexion,"SELECT  distinct equipo1,equipo2,resultado1,resultado2
     FROM  tb_partidos WHERE tb_partidos.Estado='2' AND numero_fecha <18
     ");

    while ($equipoparticipante = mysqli_fetch_array($lugardentrodelospartidos)) {
        if ($equipoparticipante['equipo1'] == $identificaciones['id_equipo'] || $equipoparticipante['equipo2'] == $identificaciones['id_equipo']) {


            // se incluira el codigo para saber que partidos se han ganado perdido o empatado por el respectivo equipo
// ifs para definir el ganador perdedor o empate
            if ($equipoparticipante['equipo1'] == $identificaciones['id_equipo']) {

                if ($equipoparticipante['resultado1'] == $equipoparticipante['resultado2']) {
                    // EMPATE
                    $matriz[$i]['7'] = $matriz[$i]['7'] + 1;
                }

                if ($equipoparticipante['resultado1'] > $equipoparticipante['resultado2']) {
                    // GANA EQUIPO 1
                    $matriz[$i]['6'] = $matriz[$i]['6'] + 1;
                }

                if ($equipoparticipante['resultado1'] < $equipoparticipante['resultado2']) {
                    // GANA EQUIPO 2
                    $matriz[$i]['5'] = $matriz[$i]['5'] + 1;
                }
            }    ///---------------> PARA EQUIPO 1 ARRIBA


            if ($equipoparticipante['equipo2'] == $identificaciones['id_equipo']) {

                if ($equipoparticipante['resultado1'] == $equipoparticipante['resultado2']) {
                    // EMPATE
                    $matriz[$i]['7'] = $matriz[$i]['7'] + 1;
                }

                if ($equipoparticipante['resultado1'] > $equipoparticipante['resultado2']) {
                    // GANA EQUIPO 1
                    $matriz[$i]['5'] = $matriz[$i]['5'] + 1;
                }

                if ($equipoparticipante['resultado1'] < $equipoparticipante['resultado2']) {
                    // GANA EQUIPO 2
                    $matriz[$i]['6'] = $matriz[$i]['6'] + 1;
                }
            }//-------------------> PARA EQUIPO 2 CUANDO GPE ARRIBA
// --->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>AQUI TERMINA CODIGO PARTIDOS GPE


            if ($equipoparticipante['equipo1'] == $identificaciones['id_equipo']) {
                $Golesafavor = $equipoparticipante['resultado1'];
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
                $matriz[$i]['3'] = $matriz[$i]['3'] + $Golesafavor;
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
                $Golescontra = $equipoparticipante['resultado2'];
                $matriz[$i]['4'] = $matriz[$i]['4'] + $Golescontra;
            } else {
                $Golesacontra = $equipoparticipante['resultado1'];
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
                $matriz[$i]['4'] = $matriz[$i]['4'] + $Golesacontra;
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
                $Golesafavor = $equipoparticipante['resultado2'];
                $matriz[$i]['3'] = $matriz[$i]['3'] + $Golesafavor;
            }
        }
    }
    $i++;
}

// Ordenar matriz
$eliminaciondeinfoanterio = mysqli_query($conexion,"DELETE FROM te_posiciones");

for ($i = 0; $i < $numerodeequiposparaeltama�odelamatriz; $i++) {

    $matriz[$i]['8'] = $matriz[$i]['6'] + $matriz[$i]['7'] + $matriz[$i]['5'];
    $matriz[$i]['9'] = $matriz[$i]['3'] - $matriz[$i]['4'];
    $matriz[$i]['10'] = $i + 1;

                            $variable1 = $matriz[$i]['1'];  // nombre equipo
                            $variable11 = $matriz[$i]['0'];  // id
                            $variable2 = (($matriz[$i]['6'] * 2) + $matriz[$i]['7']);  // puntos
                            $variable3 = $matriz[$i]['8'];  // partidos jugados
                            $variable4 = $matriz[$i]['6'];  // partidos ganados
                            $variable5 = $matriz[$i]['7'];  // empates
                            $variable6 = $matriz[$i]['5'];  // partidos perdidos
                            $variable7 = $matriz[$i]['3'];  // goles a favor
                            $variable8 = $matriz[$i]['4'];  // goles en contra
                            $variable9 = $matriz[$i]['9'];  // diferencia de Gol
                            $variable10 = $matriz[$i]['11'];  // Grupo
                            
                                //SITUACIONES ESPECIALES


                            // FIN SITUACIONES ESPECIALES

                            mysqli_query($conexion,"INSERT INTO `te_posiciones`(`equipo`, `puntos`, `pj`, `pg`, `pe`, `pp`, `gf`, `gc`, `dg`,`grupo`,`id`)
                              VALUES ('$variable1','$variable2','$variable3','$variable4','$variable5','$variable6','$variable7','$variable8','$variable9','$variable10','$variable11');")
                            or die(mysql_error());

                        }
                    }
                    
                ?>
