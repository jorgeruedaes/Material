<?php
/**
 * [valores Obtiene los valores de la configuración de cada una de las paginas]
 * @param  [String] $solicitud [Nombre del valor solicitado]
 * @return [type]            [description]
 */
function String_Get_Valores($solicitud){

	if ($solicitud == "titulo") {
		return "Copa Amistad Profesional";
	}else if ($solicitud == "copyright") {
		return "DevelopersTeam - Material Design";
	}else if ($solicitud == "version") {
		return "1.0";
	}else if ($solicitud == "año") {
		return "2017";
	}else if ($solicitud == "favicon") {
		return "Logo.png";
	}else if ($solicitud == "server") {
		return "localhost";
	}else if ($solicitud == "username") {
		return "root";
	}else if ($solicitud == "password") {
		return "";
	}else if ($solicitud == "basededatos") {
		return "Control";
	}else if ($solicitud == "color") { // color de todo el form
		return "#00A859";
	}else if ($solicitud == "letracolor") {// color de el encabezado de las tablas
		return "white";
	}else if ($solicitud == "colortitulo") {// color de los titulos de las tablas
		return "#C0392B";
	}else if ($solicitud == "letratitulo") {// letra de el encabezado 
		return "white";
	}

}
/**
 * [base_url Base de las paginas]
 * @return [String] [Base para las paginas]
 */
function base_url()
{
	$pagina = "localhost";
	return "http://".$pagina."/Admin/";
}
function base_url_usuarios()
{
	$pagina = "localhost";
	return "http://".$pagina."/COPIATOTALHOSTIGER/";
}	

/*   
----------------------------------------------------
--------INFORMACIÓN ESTANDARES----------------------
----------------------------------------------------

----------------------------------------------------
Estandar para el manejo de funciones y variables PHP
-------------------------><-------------------------
Funciones-->
El NOMBRE debe empezar por el tipo de dato que retorna,
seguido por el tipo de funcion y finalizando con un nombre
que descriptivo de la función de la misma.

Ejemplo : Array_Get_Elementos();

Variables-->
Las variables deben ser en minuscula, siempre muy descriptivas
además deben ser en singular o plurar dependiendo el caso de uso.

Ejemplo : $query;

----------------------------------------------------
Estandar para el manejo de la BASE DE DATOS
-------------------------><-------------------------

Tablas -->
El NOMBRE debe ser en plural, definiendo claramente el tipo de información 
que contendra, además debe empezar por tb en caso de ser una tabla maestra 
y tr en caso de ser una relación entre tablas.

Ejemplo : tb_usuarios ||  tr_usuariosxtorneo

Campos-->
Los campos dentro de la bd deben ser en singular, y la llave primaria de 
cada una de las tablas debe empezar por id_nombretabla.

Ejemplo : id_modulos --> PK de la tabla modulos 

-----------------------------------------------------
Estandar para el nombre de las paginas y archivos
-----------------------------------------------------

Archivos,carpetas y paginas PHP-->
Los archivos se guardaran en la respectiva carpeta padre de la respectiva 
pagina o archivo, los nombres de la misma seran escritos SIEMPRE en 
minuscula y en singular.

Ejemplo : php/administracion.php 

 */
?>
