<?php 
//Llamada al modelo
require_once("../../../../Model/perfil_empresa.model.php");
require_once("../../../../Model/ubicacion.model.php");



//Busqueda------------------------------------------------------------------------------

	//buscar si existe 
	function existe(){
		$empresa=new perfil_empresa_model();
		$datos=$empresa->buscar_existente();

		return $datos;
		
	}


	//busca los datos de la empresa
	function buscar_perfil_empresa(){
		$empresa=new perfil_empresa_model();
		$datos=$empresa->get_perfil_empresa();
		
		return $datos;
		
	}
	
	
	//busca las regiones
	function buscar_regiones(){
		$region=new ubicacion_model();
		$datos=$region->get_regiones();
		
		return $datos;
		
	}
	
	
	//busca las ciudades
	function buscar_ciudades(){
		$ciudad=new ubicacion_model();
		$datos=$ciudad->get_ciudades();
		
		return $datos;
		
	}
	
//-----------------------------------------------------------------------------------------------------------

	
	//Inserta Empresa
	function insertar_empresa($rut_empresa, $nombre_empresa, $id_region, $id_ciudad, $direccion, $email, $logo, $representante, $slogan, $telefono, $rut, $fecha){
		$empresa=new perfil_empresa_model();
		$datos=$empresa->set_perfil_empresa($rut_empresa, $nombre_empresa, $id_region, $id_ciudad, $direccion, $email, $logo, $representante, $slogan, $telefono, $rut, $fecha);

	}
	

	//Actualiza empresa
	
	function editar_empresa($rut_empresa, $nombre_empresa, $id_region, $id_ciudad, $direccion, $email, $logo, $representante, $slogan, $telefono, $rut, $fecha)
	{
		$empresa=new perfil_empresa_model();
		$datos=$empresa->update_perfil_empresa($rut_empresa, $nombre_empresa, $id_region, $id_ciudad, $direccion, $email, $logo, $representante, $slogan, $telefono, $rut, $fecha);
			
	}



//diferenciar si es un insert si no hay datos existentes o un update si ya habían datos

	function diferenciar($rut_empresa, $nombre_empresa, $id_region, $id_ciudad, $direccion, $email, $logo, $representante, $slogan, $telefono, $rut, $fecha)
	{
		$empresa=new perfil_empresa_model();
		$rut_empresa2=$empresa->buscar_existente();
		
		if (empty($rut_empresa2)) {
    		echo 'Se hara un insert';
			insertar_empresa($rut_empresa, $nombre_empresa, $id_region, $id_ciudad, $direccion, $email, $logo, $representante, $slogan, $telefono, $rut, $fecha);
		}else
		{
			echo 'Se hara un update';
			editar_empresa($rut_empresa, $nombre_empresa, $id_region, $id_ciudad, $direccion, $email, $logo, $representante, $slogan, $telefono, $rut, $fecha);
		}
		
	}


?>