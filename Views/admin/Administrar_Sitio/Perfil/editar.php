<?php
 require_once("../../../../Conection/db.php");
 require_once("../../../../Controller/perfil_empresa.controller.php");
?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Perfil Empresa</title>
<link rel="stylesheet" href="../../../../css/layout.css" type="text/css" media="screen" />
<script src="../../../../js/jquery-1.9.1.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    $(".submit_link").find("input").eq(0).click(function(e) {
		//esto se hace porq no es un formulario, se crea el formulario
		
		var datos = new FormData();
		datos.append('rut_empresa', $("#rut_empresa").val());
		datos.append('nombre_empresa', $("#nombre_empresa").val());
		datos.append('id_region', $("#id_region").val());
		datos.append('id_ciudad', $("#id_ciudad").val());
		datos.append('imagen', $("#imagen")[0].files[0]);
		datos.append('direccion', $("#direccion").val());
		datos.append('email', $("#email").val());
		datos.append('logo', $("#logo").val());
		datos.append('id_articulo', $("#id_articulo").val());
		datos.append('representante', $("#representante").val());
		datos.append('slogan', $("#slogan").val());
		datos.append('telefono', $("#telefono").val());
	    
		
		
		var miAjax = $.ajax({
			async: false,
			type: 'POST',
			url: 'request_perfil_editar.php',
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
		
		
		
		
		
		//Regiones y ciudades
		
		
		
	//regiones	
		

		
		
		
		
		
	//ciudades	

		
		
		
		
	
});
</script>
</head>

<body>

<article class="module width_full">
			<header><h3 style="padding-left: 22px;">Editar Perfil Empresa</h3></header>
				<div class="module_content">
                
            <?php 
			$rut_empresa = existe();
					if (empty($rut_empresa)) {
					?>			
						


<fieldset>
							<label>Rut Empresa</label>
							<input type="text" value="" id="rut_empresa" required="required">
						</fieldset>
                        
                       
         
         
                        <fieldset>
							<label>Nombre Empresa</label>
							<input type="text" value="" id="nombre_empresa" required="required">
						</fieldset>
                        
                                 
                        
<!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->                 		<fieldset>      
                            <label>Región</label>
                            <select name="id_region" id="id_region">
                              <option value="Seleccionar">Seleccionar</option>
                              <option value="15">Arica</option>
                            </select>                                               
                        </fieldset> 


                 
						<fieldset>
                             <label>Ciudad</label>
                            <select name="id_ciudad" id="id_ciudad">
                              <option value="Seleccionar">Seleccionar</option>
                              <option value="14">Arica</option>
                            </select>                                               

                        </fieldset> 
                        
             
 
<!--||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --> 


                        <fieldset>
							<label>Dirección</label>
							<input type="text" value="" id="direccion" required="required">
						</fieldset>
                        

                        <fieldset>
							<label>Email</label>
							<input type="text" value="" id="email" required="required">
						</fieldset>
                
                
                
                            
 <!--||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->                                           
                        <fieldset>
							<label>Logo Empresa</label>
                            <img src="../../../../images/Logos/" id="img" height="200" width="250" style="margin:10px" />
							<input style="float:right;" type="file" class="file-input" size="32" id="imagen" required="required">
                            
 
 <!--||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --> 
  
 
                         <fieldset>
							<label>Representante Legal</label>
							<input type="text" value="" id="representante" required="required">
						</fieldset>
 
 
                          <fieldset>
							<label>Slogan</label>
							<input type="text" value="" id="slogan" required="required">
						</fieldset>
 
 
                           <fieldset>
							<label>Teléfono</label>
							<input type="text" value="" id="telefono" required="required">
						</fieldset>
		




		
		
		<?php

		}else
		{
foreach (buscar_perfil_empresa() as $dato) {
			
			?>    
                
                  
                        <fieldset>
							<label>Rut Empresa</label>
							<input type="text" value="<?php echo $dato['rut_empresa'] ?>" id="rut_empresa" required="required">
						</fieldset>
                        
                       
         
         
                        <fieldset>
							<label>Nombre Empresa</label>
							<input type="text" value="<?php echo $dato['nombre_empresa'] ?>" id="nombre_empresa" required="required">
						</fieldset>
                        
                                 
                        
<!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->                 		<fieldset>      
                            <label>Región</label>
                            <select name="id_region" id="id_region">
                              <option value="Seleccionar">Seleccionar</option>
                              <option value="15">Arica</option>
                            </select>                                               
                        </fieldset> 


                 
						<fieldset>
                             <label>Ciudad</label>
                            <select name="id_ciudad" id="id_ciudad">
                              <option value="Seleccionar">Seleccionar</option>
                              <option value="14">Arica</option>
                            </select>                                               

                        </fieldset> 
                        
             
 
<!--||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --> 


                        <fieldset>
							<label>Dirección</label>
							<input type="text" value="<?php echo $dato['direccion'] ?>" id="direccion" required="required">
						</fieldset>
                        

                        <fieldset>
							<label>Email</label>
							<input type="text" value="<?php echo $dato['email'] ?>" id="email" required="required">
						</fieldset>
                
                
                
                            
 <!--||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->                                           
                        <fieldset>
							<label>Logo Empresa</label>
                            <img src="../../../../images/Logos/<?php echo $dato["logo"] ?>" id="img" height="200" width="250" style="margin:10px" />
							<input style="float:right;" type="file" class="file-input" size="32" id="imagen" required="required">
                            
                            <input type="hidden" value="<?php echo $dato["logo"] ?>" id="logo" />
                            
 
 <!--||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --> 
  
 
                         <fieldset>
							<label>Representante Legal</label>
							<input type="text" value="<?php echo $dato['representante'] ?>" id="representante" required="required">
						</fieldset>
 
 
                          <fieldset>
							<label>Slogan</label>
							<input type="text" value="<?php echo $dato['slogan'] ?>" id="slogan" required="required">
						</fieldset>
 
 
                           <fieldset>
							<label>Teléfono</label>
							<input type="text" value="<?php echo $dato['telefono'] ?>" id="telefono" required="required">
						</fieldset>
		
			
			
			
                        
                      
 
 
			<?php 
				}
			} ?>	  
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