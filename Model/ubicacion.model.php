<?php

class ubicacion_model{

    private $db;
	private $region;
	private $ciudad;
 
    public function __construct(){

        $this->db=Conectar::conexion();
		$this->region=array();
		$this->ciudad=array();
    }
	
	
	
//obtener regiones--------------------------------------------------------------------------------------
    public function get_regiones(){

        $consulta=$this->db->query("SELECT * FROM region;");

        while($filas=$consulta->fetch_assoc()){

            $this->region[]=$filas;

        }

        return $this->region;

    }
//---------------------------------------------------------------------------------------------------------





//obtener ciudades-----------------------------------------------------------------------------------------
	
	    public function get_ciudades(){

        $consulta=$this->db->query("SELECT * FROM ciudad;");

        while($filas=$consulta->fetch_assoc()){

            $this->ciudad[]=$filas;

        }

        return $this->ciudad;

    }
//----------------------------------------------------------------------------------------------------------
	

}



?>