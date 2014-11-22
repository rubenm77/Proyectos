<?php

class articulo_model{

    private $db;
	private $id;
    private $articulo;
	private $id_imagen;
	private $nombre_imagen;
	private $aux;
 
    public function __construct(){

        $this->db=Conectar::conexion();
        $this->articulo=array();
		$this->id_imagen=array();
		$this->nombre_imagen=array();
    }
	
	
//obtener articulos-----------------------------------------------------------------------------------------------
    public function get_articulos(){

        $consulta=$this->db->query("SELECT articulo.id_articulo, articulo.nombre_articulo, articulo.tipo_articulo, imagen.nombre_imagen, articulo.rut, articulo.fecha, paginas.nombre_pagina FROM articulo, imagen, paginas WHERE articulo.id_imagen = imagen.id_imagen AND articulo.id_pagina = paginas.id_pagina;");

        while($filas=$consulta->fetch_assoc()){

            $this->articulo[]=$filas;

        }

        return $this->articulo;

    }
	
	
	    public function buscar($id){

        $consulta=$this->db->query("SELECT articulo.id_articulo, articulo.nombre_articulo, articulo.tipo_articulo, articulo.descripcion, articulo.id_imagen, articulo.id_pagina,imagen.nombre_imagen FROM articulo, imagen WHERE articulo.id_articulo = {$id} AND articulo.id_imagen = imagen.id_imagen;");

        while($filas=$consulta->fetch_assoc()){

            $this->articulo[]=$filas;

        }

        return $this->articulo;

    }
	
	
//----------------------------------------------------------------------------------------------------------------------
	
	
	
	
//Insertar articulos----------------------------------------------------------------------------------------------------	
	
	public function set_articulo($nombre_articulo, $tipo_articulo, $descripcion, $rut, $fecha, $nombre_imagen, $tipo_imagen, $id_pagina){

		//primero insertar en la tabla imagen -------------------------------------------------

		$consulta=$this->db->prepare("INSERT INTO `imagen`(`nombre_imagen`,`tipo_imagen`, `rut`, `fecha`) VALUES (?,?,?,?);");
		$consulta->bind_param('ssss', $nombre_imagen, $tipo_imagen, $rut, $fecha);
		
		
		//ejecutar consulta
        $consulta->execute();
		
		
		//recuperar id de la ultima imagen insertada
		
		$consulta=$this->db->query("SELECT MAX(id_imagen) as id FROM `imagen`;");
		while($data=$consulta->fetch_assoc()){
            $this->id_imagen[]=$data;
        } 


            foreach ($this->id_imagen as $dato) {
				$this->id = $dato["id"];
			}
			
	
		//Ahora se puede insertar en la tabla articulo	----------------------------------------	
		
			
		$consulta=$this->db->prepare("INSERT INTO `articulo`(`nombre_articulo`, `tipo_articulo`, `descripcion`, `rut`, `fecha`, `id_imagen`, `id_pagina`) VALUES (?,?,?,?,?,?,?);");
		$consulta->bind_param('sssssii', $nombre_articulo, $tipo_articulo, $descripcion, $rut, $fecha, $this->id, $id_pagina);
			
		
        $consulta->execute();

		

    }
//-------------------------------------------------------------------------------------------------------------------------
	
	
	
	public function actualizar($nombre_imagen, $tipo_imagen, $nombre_articulo, $tipo_articulo, $descripcion, $fecha, $id_pagina, $id_imagen, $id_articulo)
	{
//primero actualizar la tabla imagen -----------------------------------------------------------------------

		$consulta=$this->db->prepare("UPDATE `imagen` SET `nombre_imagen`= ?,`tipo_imagen`= ?, `fecha`= ? WHERE `id_imagen`= ?;");
		$consulta->bind_param('sssi', $nombre_imagen, $tipo_imagen, $fecha, $id_imagen);
	    $this->aux = $id_articulo;
		echo $this->aux;
		$consulta->execute();
	
	
		
//Después actualizar la tabla articulo----------------------------------------------------------------------		
		
		$consulta=$this->db->prepare("UPDATE `articulo` SET `nombre_articulo`= ?,`tipo_articulo`= ?,`descripcion`= ?,`fecha`= ?, `id_pagina`= ? WHERE `id_articulo` = ?;");
		$consulta->bind_param('ssssii', $nombre_articulo, $tipo_articulo, $descripcion , $fecha, $id_pagina, $id_articulo);
		$consulta->execute();
		
	}	
	
	
	
	public function eliminar_articulo($id_articulo, $id_imagen)
	{
		//eliminar articulo
		$consulta=$this->db->prepare("DELETE FROM `articulo` WHERE  `id_articulo` = ?;");
		$consulta->bind_param('i', $id_articulo);
		$consulta->execute();
		
		
		
		//eliminar imagen
		
		//Sacar el nombre de la imagen para eliminarla de la carpeta

		$consulta=$this->db->query("SELECT `nombre_imagen` FROM `imagen` WHERE `id_imagen` = ".$id_imagen.";");
		while($data=$consulta->fetch_assoc()){
            $this->nombre_imagen[]=$data;
        } 


            foreach ($this->nombre_imagen as $dato) {
				$this->id = $dato["nombre_imagen"];
			}
			
		echo $this->id;
			//borramos la imagen antigua
			unlink("../../../../images/user_img/".$this->id);
		
		$consulta=$this->db->prepare("DELETE FROM `imagen` WHERE  `id_imagen` = ?;");
		$consulta->bind_param('i', $id_imagen);
		$consulta->execute();
	

	}
	
	
	
}






?>