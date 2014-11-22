<?php

class perfil_empresa_model{

    private $db;
	private $id;
    private $perfil_empresa;
 
 
    public function __construct(){

        $this->db=Conectar::conexion();
        $this->perfil_empresa=array();
    }
	
    public function buscar_existente()
	{
		$consulta=$this->db->query("SELECT rut_empresa FROM perfil_empresa;");

        while($filas=$consulta->fetch_assoc()){

            $this->perfil_empresa[]=$filas;

        }

        return $this->perfil_empresa;
	}
	
	
//obtener datos perfil empresa------------------------------------------------------------------------------
    public function get_perfil_empresa(){

        $consulta=$this->db->query("SELECT perfil_empresa.rut_empresa, perfil_empresa.nombre_empresa, perfil_empresa.direccion, perfil_empresa.email, perfil_empresa.logo, perfil_empresa.representante, perfil_empresa.slogan, perfil_empresa.telefono, region.nombre_region, ciudad.nombre_ciudad FROM perfil_empresa , region, ciudad WHERE perfil_empresa.id_region = region.id_region AND perfil_empresa.id_ciudad = ciudad.id_ciudad;");

        while($filas=$consulta->fetch_assoc()){

            $this->perfil_empresa[]=$filas;

        }

        return $this->perfil_empresa;

    }
//---------------------------------------------------------------------------------------------------------

	
	
	
	
	
//insertar perfil empresa----------------------------------------------------------------------------------	
	
	public function set_perfil_empresa($rut_empresa, $nombre_empresa, $id_region, $id_ciudad, $direccion, $email, $logo, $representante, $slogan, $telefono, $rut, $fecha){

		//insertar en la tabla perfil_empresa
		$consulta=$this->db->prepare("INSERT INTO perfil_empresa (rut_empresa, nombre_empresa, id_region, id_ciudad, direccion, email, logo, representante, slogan, telefono, rut, fecha) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
		
		
		$consulta->bind_param('ssiisssssiss', $rut_empresa, $nombre_empresa, $id_region, $id_ciudad, $direccion, $email, $logo, $representante, $slogan, $telefono, $rut, $fecha);
		
		
		//ejecutar consulta
        $consulta->execute();
		
    }
//------------------------------------------------------------------------------------------------------------------
	
	
	
	public function update_perfil_empresa($rut_empresa, $nombre_empresa, $id_region, $id_ciudad, $direccion, $email, $logo, $representante, $slogan, $telefono, $rut, $fecha)
	{


		$consulta=$this->db->prepare("UPDATE `perfil_empresa` SET `rut_empresa`= ?,`nombre_empresa`= ?,`id_region`= ?,`id_ciudad`= ?,`direccion`= ?,`email`= ?,`logo`= ?,`representante`= ?,`slogan`= ?,`telefono`= ?,`rut`= ?,`fecha`= ?;");


		$consulta->bind_param('ssiisssssiss', $rut_empresa, $nombre_empresa, $id_region, $id_ciudad, $direccion, $email, $logo, $representante, $slogan, $telefono, $rut, $fecha);
		
		
		$consulta->execute();
		
	}	
	
	
	

	
	
	
}






?>