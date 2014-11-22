<?php
 require_once("../../../../Conection/db.php");
 require_once("../../../../Controller/perfil_empresa.controller.php");
?> 


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Perfil Empresa</title>
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


    $("#btn_editar").click(function(e) {
    	$(location).attr("href", "editar.php");
    });


	$('#table_id').DataTable();	

	$("#table_id tbody tr").each(function(index, element) {

	        $(this).find('td').eq(2).attr("align","center");
	    });

    /*
    $("#table_id tbody tr").each(function(index, element)
    {
    	$(this).find("#btn_editar").eq(0).click(function(e)
    	{

    		$(location).attr("href", "editar_perfil.html");
    	});
    });*/



    	

} );


</script>



<style type="text/css">
	
.espacio
{
	margin-right: 12px;
}

</style>


</head>
<body>
	<article class="module width_full">
			<header><h3 style="padding-left: 22px;">Perfil Empresa</h3></header>
			<div class="module_content">
            
			
			<?php 
					$rut_empresa = existe();
					if (empty($rut_empresa)) {
					?>		

				<table id="table_id"  class="display">
				    <thead>
				        <tr>
				            <th>Campos</th>
				            <th>Datos</th>
				         
				        </tr>
				    </thead>
				    <tbody>
				        <tr>
				            <td>Rut Empresa</td>
				            <td></td>

				        </tr>
				        <tr>
				            <td>Nombre Empresa</td>
				            <td></td>

						</tr>

				        <tr>
				            <td>Region</td>
				            <td></td>

				        </tr>                        
				        <tr>
				            <td>Ciudad</td>
				            <td></td>

				        </tr>
						<tr>
				            <td>Dirección</td>
				            <td></td>

						</tr>   
						<tr>
				            <td>Email</td>
				            <td></td>

						</tr>                                                
                                           
                                             
				        <tr>
				            <td>Logo</td>
				            <td></td>

				        </tr>
				        <tr>
				            <td>Representante Legal</td>
				            <td></td>

						</tr>
 						<tr>
				            <td>Slogan</td>
				            <td></td>

						</tr>   
						<tr>
				            <td>Teléfono</td>
				            <td></td>

						</tr>

				    </tbody>
				</table>


				<?php
        
                }else
                {
        foreach (buscar_perfil_empresa() as $dato) {
                    
                    ?>    

				<table id="table_id"  class="display">
				    <thead>
				        <tr>
				            <th>Campos</th>
				            <th>Datos</th>
				         
				        </tr>
				    </thead>
				    <tbody>
				        <tr>
				            <td>Rut Empresa</td>
				            <td><?php echo $dato['rut_empresa'] ?></td>

				        </tr>
				        <tr>
				            <td>Nombre Empresa</td>
				            <td><?php echo $dato['nombre_empresa'] ?></td>

						</tr>

				        <tr>
				            <td>Region</td>
				            <td><?php echo $dato['nombre_region'] ?></td>

				        </tr>                        
				        <tr>
				            <td>Ciudad</td>
				            <td><?php echo $dato['nombre_ciudad'] ?></td>

				        </tr>
						<tr>
				            <td>Dirección</td>
				            <td><?php echo $dato['direccion'] ?></td>

						</tr>   
						<tr>
				            <td>Email</td>
				            <td><?php echo $dato['email'] ?></td>

						</tr>                                                
                                           
                                             
				        <tr>
				            <td>Logo</td>
				            <td><img src="../../../../images/Logos/<?php echo $dato['logo'] ?>" height="100" width="100"> </td>

				        </tr>
				        <tr>
				            <td>Representante Legal</td>
				            <td><?php echo $dato['representante'] ?></td>

						</tr>
 						<tr>
				            <td>Slogan</td>
				            <td><?php echo $dato['slogan'] ?></td>

						</tr>   
						<tr>
				            <td>Teléfono</td>
				            <td><?php echo $dato['telefono'] ?></td>

						</tr>

				    </tbody>
				</table>





			<?php 
				}
			} ?>	
				<fieldset style="padding:10px" id="cont_btn">
					
					<input type="button" class="ui-button" id="btn_editar" style="float:right" value="Editar Datos">

				</fieldset>

				<div class="clear"></div>
			</div>
		</article>
</body>
</html>