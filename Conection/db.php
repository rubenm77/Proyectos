<?php

class Conectar{

    public static function conexion(){

        $conexion=new mysqli("localhost", "root", "", "securepay_bd");
		if ($conexion->connect_errno){
			printf("Connect failed: %s\n", $conexion->connect_error);
		}
		
        $conexion->query("SET NAMES 'utf8'");

        return $conexion;

    }

}

?>