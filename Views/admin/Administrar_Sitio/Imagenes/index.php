
<?php
// require_once("../../../../Conection/db.php");
// require_once("../../../../Controller/articulo.controller.php");
?> 
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Imagenes</title>
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


    $("#btnGuardarInformacion").click(function(e) {
    	$(location).attr("href", "nuevaInformacion.html");
    });
	
	$('#table_id').DataTable();	

	$("#table_id tbody tr").each(function(index, element) {

	        $(this).find('td').eq(3).attr("align","center");
	    });

    
    $("#table_id tbody tr").each(function(index, element)
    {
    	$(this).find("input").eq(0).click(function(e)
    	{

    		$(location).attr("href", "Editar.html");
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
							<th>ID</th>
				            <th>Nombre Imagen</th>
				            <th>Tipo Imagen</th>
				            <th>Imagen</th>
							<th>Autor</th>
				            <th>Fecha</th>
                            <th>Opciones</th>
				        </tr>
				    </thead>
				    <tbody>

				        <tr>
				            <td>Row 1 Data 1</td>
				            <td>Row 1 Data 2</td>
				            <td>Row 1 Data 3</td>
							<td>Row 1 Data 4</td>
							<td>Row 1 Data 5</td>
							<td>Row 1 Data 6</td>
				            <td><input type="image" id='editar1' src="../../../../images/icn_edit.png" title="Edit" class="espacio">

				            <input type="image" src="../../../../images/icn_trash.png" title="Trash" class="espacio"></td>
				        </tr>
				        <tr>
				            <td>Row 2 Data 1</td>
				            <td>Row 2 Data 2</td>
				            <td>Row 2 Data 3</td>
							<td>Row 2 Data 4</td>
							<td>Row 2 Data 5</td>
							<td>Row 2 Data 6</td>
				            <td>

				            <input type="image" id="editar2" src="../../../../images/icn_edit.png" title="Edit" class="espacio">


				            <input type="image" src="../../../../images/icn_trash.png" title="Trash" class="espacio"></td>
				        </tr>

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