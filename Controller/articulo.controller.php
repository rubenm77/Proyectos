<?php 
//Llamada al modelo
require_once("../../../../Model/articulo.model.php");

	function lista_Articulos(){
		
		$articulo=new articulo_model();
		$datos=$articulo->get_articulos();
		
		return $datos;
		
	}
	
	function buscar_articulo($id){
		
		$articulo=new articulo_model();
		$datos=$articulo->buscar($id);
		
		return $datos;
		
	}
	
	//Inserta Articulos
	function agregar($nombre_articulo, $tipo_articulo, $decripcion, $rut, $fecha, $nombre_imagen, $tipo_imagen, $id_pagina){

		$articulo=new articulo_model();
		$datos=$articulo->set_articulo($nombre_articulo, $tipo_articulo, $decripcion, $rut, $fecha, $nombre_imagen, $tipo_imagen, $id_pagina);

	}
	
	
	
	//Actualiza articulos
	
	function editar($nombre_imagen, $tipo_imagen, $nombre_articulo, $tipo_articulo, $descripcion, $fecha, $id_pagina, $id_imagen, $id_articulo)
	{
		$articulo=new articulo_model();
		$datos=$articulo->actualizar($nombre_imagen, $tipo_imagen, $nombre_articulo, $tipo_articulo, $descripcion, $fecha, $id_pagina, $id_imagen, $id_articulo);
		
		
		
	}
	
	function eliminar($id_articulo, $id_imagen)
	{
		$articulo=new articulo_model();
		$datos=$articulo->eliminar_articulo($id_articulo, $id_imagen);
		
	}
	

?>