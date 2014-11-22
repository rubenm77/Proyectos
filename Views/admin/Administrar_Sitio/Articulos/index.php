<?php
 require_once("../../../../Conection/db.php");
 require_once("../../../../Controller/articulo.controller.php");
?> 
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Articulos</title>
	<link rel="stylesheet" href="../../../../css/layout.css" type="text/css" media="screen" />


	<!-- css -->
	
	<link rel="stylesheet" href="../../../../css/jquery-ui.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../../../../css/dataTables.jqueryui.css" type="text/css" media="screen" />



	<!-- Scripts -->

	<script src="../../../../js/jquery-1.11.1.min.js" type="text/javascript"></script>

	<script src="../../../../js/jquery.dataTables.min.js" type="text/javascript"></script>


	<script src="../../../../js/dataTables.jqueryui.js" type="text/javascript"></script>

<script type="text/javascript">
	
	$(document).ready( function () {


	function editar()
	{
			
	}


    $("#btnGuardar").click(function(e) {
    	$(location).attr("href", "agregar.html");
    });
	
	$('#table_id').DataTable();	

	$("#table_id tbody tr").each(function(index, element) {

	        $(this).find('td').eq(3).attr("align","center");
	    });

    
    $("#table_id tbody tr").each(function(index, element)
    {
    	$(this).find("input").eq(0).click(function(e)
    	{

    		$(location).attr("href", "editar.html");
    	});
    });



    	

} );


</script>



<style type="text/css">
	


</style>


</head>
<body>
	<article class="module width_full">
			<header><h3 style="padding-left: 22px;">Articulos</h3></header>
			<div class="module_content">

				<table id="table_id"  class="display">
				    <thead>
				        <tr>
							<th style="display:none">ID</th>
				            <th>Titulo Articulo</th>
				            <th>Tipo Articulo</th>
				            <th>Imagen del Articulo</th>
							<th>Autor</th>
				            <th>Fecha</th>
                            <th>Ubicación</th>
                            <th>Opciones</th>
				        </tr>
				    </thead>
				    <tbody>
        <?php

            foreach (lista_Articulos() as $dato) {
?>
            <tr>
                <td style="display:none"><?php echo $dato["id_articulo"] ?></td>
                <td><?php echo $dato["nombre_articulo"] ?></td>
                <td><?php echo $dato["tipo_articulo"] ?></td>
                <td><img src="../../../../images/user_img/<?php echo $dato['nombre_imagen'] ?>" height="100" width="100"></td>
                <td><?php echo $dato["rut"] ?></td>
                <td><?php echo $dato["fecha"] ?></td>
                <td><?php echo $dato["nombre_pagina"] ?></td>
                <td> <a href="editar.php?id=<?php echo $dato['id_articulo'] ?>" >
           <input type="image" src="../../../../images/icn_edit.png" title="Editar" /> </a>
&nbsp;&nbsp;&nbsp;<a href="request_articulo_eliminar.php?id_articulo=<?php echo $dato['id_articulo'] ?>&id_imagen=<?php echo $dato['id_imagen'] ?>" ><input type="image" src="../../../../images/icn_trash.png" title="Eliminar"></a>

				</td> 
                
            </tr>
            <?php }?>
				    </tbody>
				</table>


				<fieldset style="padding:10px" id="cont_btn">
					
					<input type="button" class="ui-button confirm" id="btnGuardar" style="float:right" value="Nuevo Articulo">

				</fieldset>

				<div class="clear"></div>
			</div>
		</article>
</body>
</html>
