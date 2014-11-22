<?php

class usuarios_model{


		private $db;
		private $usuarios;
	
	 
	 
		public function __construct(){
	
			$this->db=Conectar::conexion();
			$this->usuarios=array();
			
		}
		
		
		
		
//obtener usuarios activos---------------------------------------------------------------------------------
		public function get_usuarios(){
	
			$consulta=$this->db->query("SELECT * FROM usuarios WHERE usuario_activo = 'true';");
	
			while($filas=$consulta->fetch_assoc()){
	
				$this->usuarios[]=$filas;
	
			}
	
			return $this->usuarios;
	
		}
//---------------------------------------------------------------------------------------------------------






//obtener usuarios no activos-------------------------------------------------------------------------------
	
	    public function get_usuarios_inactivos(){

        $consulta=$this->db->query("SELECT * FROM usuarios WHERE usuario_activo = 'false';");

        while($filas=$consulta->fetch_assoc()){

            $this->usuarios[]=$filas;

        }

        return $this->usuarios;

    	}
//-----------------------------------------------------------------------------------------------------------
	
	
	
	
	
	
	
//registrar usuarios como inactivos-------------------------------------------------------------------------

		public function set_usuarios($rut, $nombres, $apellido_paterno, $apellido_materno, $tipo_cuenta, $direccion, $id_region, $id_ciudad, $email, $telefono, $password, $estado, $usuario_activo)
		{
			
		$consulta=$this->db->prepare("INSERT INTO `usuarios`(`rut`, `nombres`, `apellido_paterno`, `apellido_materno`, `tipo_cuenta`, `direccion`, `id_region`, `id_ciudad`, `email`, `telefono`, `password`, `estado`, `usuario_activo`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);");
		$consulta->bind_param('ssssssiisisss', $rut, $nombres, $apellido_paterno, $apellido_materno, $tipo_cuenta, $direccion, $id_region, $id_ciudad, $email, $telefono, $password, $estado, $usuario_activo);
		
		
		//ejecutar consulta
        $consulta->execute();
			
		
		}
	
//------------------------------------------------------------------------------------------------------------



	

}