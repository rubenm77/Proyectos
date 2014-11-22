<?php
require_once("../../../../Conection/db.php");
require_once("../../../../Controller/perfil_empresa.controller.php");

// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
   date_default_timezone_set('America/Santiago');
 
//capturar datos del formulario


$rut_empresa = $_POST['rut_empresa'];
$nombre_empresa = $_POST['nombre_empresa'];
$id_region = $_POST['id_region'];
$id_ciudad = $_POST['id_ciudad'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$logo = $_POST['logo'];
$representante = $_POST['representante'];
$slogan = $_POST['slogan'];
$telefono = $_POST['telefono'];
$rut = '18788855-7';
$fecha = date("Y-m-d");


	
	
	if(empty($_FILES['imagen']['tmp_name'])){//preguntamos si el input file viene vacío

	diferenciar($rut_empresa, $nombre_empresa, $id_region, $id_ciudad, $direccion, $email, $logo, $representante, $slogan, $telefono, $rut, $fecha);
	
	}else{
	//borramos la imagen antigua
		unlink("../../../../images/Logos/".$logo);
	//carpteta donde vamos a guardar la imagen
	  $carpeta = '../../../../images/Logos/';
	  //recibimos el campo de imagen
	  $imagen = $_FILES['imagen']['tmp_name'];
	  //guardamos el nombre original de la imagen en una variable
	  $nombrebre_orig = $_FILES['imagen']['name'];
	  //el proximo codigo es para ver que extension es la imagen
	  $array_nombre = explode('.',$nombrebre_orig);
	  $cuenta_arr_nombre = count($array_nombre);
	  $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
	  //creamos nuevo nombre para que tenga nombre unico
	  $nombre_nuevo = time().'_'.rand(0,100).'.'.$extension;
	  //nombre nuevo con la carpeta
	  $nombre_nuevo_con_carpeta = $carpeta.$nombre_nuevo;
	  //por fin movemos el archivo a la carpeta de imagenes
	  $mover_archivos = move_uploaded_file($imagen , $nombre_nuevo_con_carpeta);
	  //de damos permisos 777
	  chmod($nombre_nuevo_con_carpeta,0777);

	diferenciar($rut_empresa, $nombre_empresa, $id_region, $id_ciudad, $direccion, $email, $nombre_nuevo, $representante, $slogan, $telefono, $rut, $fecha);
	}
	
?>