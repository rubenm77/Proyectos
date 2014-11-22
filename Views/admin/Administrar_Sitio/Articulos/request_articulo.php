<?php
require_once("../../../../Conection/db.php");
require_once("../../../../Controller/articulo.controller.php");

// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
   date_default_timezone_set('America/Santiago');
        

//carpeta donde vamos a guardar la imagen
  $carpeta = '../../../../images/user_img/';
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


//capturar datos del formulario

	$nombre_articulo = $_POST['nombre_articulo'];
	$tipo_articulo = $_POST['tipo_articulo'];
	$descripcion = $_POST['descripcion'];
	$rut = '18788855-7';
	$fecha = date("Y-m-d");
	$nombre_imagen = $nombre_nuevo;
	$tipo_imagen = $tipo_articulo;
	$id_pagina = $_POST['id_pagina'];
	
agregar($nombre_articulo, $tipo_articulo, $descripcion, $rut, $fecha, $nombre_imagen, $tipo_imagen, $id_pagina);


?>
