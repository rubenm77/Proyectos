<?php
 require_once("../../../../Conection/db.php");
 require_once("../../../../Controller/articulo.controller.php");
?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Articulo</title>
<link rel="stylesheet" href="../../../../css/layout.css" type="text/css" media="screen" />
<script src="../../../../js/jquery-1.9.1.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    $(".submit_link").find("input").eq(0).click(function(e) {
		//esto se hace porq no es un formulario, se crea el formulario
		
		var datos = new FormData();
		datos.append('id_pagina', $("#id_pagina").val());
		datos.append('nombre_articulo', $("#nombre_articulo").val());
		datos.append('tipo_articulo', $("#tipo_articulo").val());
		datos.append('imagen', $("#imagen")[0].files[0]);
		datos.append('nombre_imagen', $("#nombre_imagen").val());
		datos.append('id_imagen', $("#id_imagen").val());
		datos.append('id_articulo', $("#id_articulo").val());
		datos.append('descripcion', $("#descripcion").val());
	    
		
		
		var miAjax = $.ajax({
			async: false,
			type: 'POST',
			url: 'request_articulo_editar.php',
			data:datos,
			contentType:false,
			processData:false,
			cache:false,
			beforeSend: function()
			{
				console.log('enviando datos a la bd...')
				
			},
			success: function(resp)
			{
				console.log(resp)
			}
			
		  })
		  .done(function() {  
		 	
			 $(location).attr("href","index.php");
		 });
		  
	
    });
	
		
		
		    $("#imagen").change(function () {
     			   mostrarImagen(this);
   			 });


    function mostrarImagen(input) {

        //primero se revisa si el navegador es compatible con todas las api
        if (window.File && window.FileReader && window.FileList && window.Blob) {
            //Si pasa no hay problema

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#img').attr('src', e.target.result);
                        
                    }
                    reader.readAsDataURL(input.files[0]);
                    
                }

        } else {
            alert('Error al leer el archivo. Las APIs no son totalmente compatibles con el navegador');
        }
	}
		
	
});
</script>
</head>

<body>

<article class="module width_full">
			<header><h3 style="padding-left: 22px;">Nuevo Articulo</h3></header>
				<div class="module_content">
                
            <?php 
			
			foreach (buscar_articulo( $_GET['id']) as $dato) {
			
			?>    
                
						<fieldset>
							<label>Ubicación</label>
							<select name="id_pagina" id="id_pagina">
                              <option value="1">Nosotros</option>
							  <option value="2">Index</option>
							  
							</select>
						</fieldset>
 <script type="text/javascript">
$(document).ready(function(e) {
    $("#id_pagina option[value='<?php echo $dato["id_pagina"] ?>']").attr('selected', 'selected');
    // yogateu need to specify id of combo to set right combo, if more than one combo
    });
</script>                        
                        <fieldset>
							<label>Titulo</label>
							<input type="text" value="<?php echo $dato['nombre_articulo'] ?>" id="nombre_articulo" required="required">
						</fieldset>
                        
                        <fieldset>
                 
                        <label>Tipo Articulo</label>
                        <select name="tipo_articulo" id="tipo_articulo">
                          <option value="Normal">Normal</option>
                          <option value="Informativo">Informativo</option>
                        </select>                                               
                        </fieldset> 
                        
<script type="text/javascript">
$(document).ready(function(e) {
    $("#tipo_articulo option[value='<?php echo $dato["tipo_articulo"] ?>']").attr('selected', 'selected');
    // yogateu need to specify id of combo to set right combo, if more than one combo
    });
</script>                         
                                            
                        <fieldset>
							<label>Imagen</label>
                            <img src="../../../../images/user_img/<?php echo $dato["nombre_imagen"] ?>" id="img" height="200" width="250" style="margin:10px" />
							<input style="float:right;" type="file" class="file-input" size="32" id="imagen" required="required">
                            
                            <input type="hidden" value="<?php echo $dato['nombre_imagen'] ?>" id="nombre_imagen" />
                            <input type="hidden" value="<?php echo $dato['id_imagen'] ?>" id="id_imagen" />
                            <input type="hidden" value="<?php echo $dato['id_articulo'] ?>" id="id_articulo" />
						</fieldset>
                        
                        
						<fieldset>
							<label>Descripción</label>
		<textarea rows="12" id="descripcion"><?php echo $dato["descripcion"] ?></textarea>
						</fieldset>
			<?php } ?>	  
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
					<input type="button" value="Guardar" class="alt_btn">
				  <input type="button" value="Cancelar">
			  </div>
			</footer>
		</article>

</body>
</html>