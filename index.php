<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$data = file_get_contents("http://www.universosodexo.com/incentivos-y-reconocimientos/?json=get_recent_posts");
$control = json_decode($data, true);
$data = file_get_contents("http://www.universosodexo.com/control-de-gastos/?json=get_recent_posts");
$incentivos = json_decode($data, true);

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="include/css/style.css"> 
	<link rel="stylesheet" type="text/css" href="include/css/modal.css">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<body>

<section class="header">
  <div style="border-bottom: solid 5px;
border-bottom-color: #F00;"><img src="include/images/icon-header.png">
  	</div>
</section>

<section class="body">
	<div><img class="image-body"src="include/images/body.png">
  	</div>

  	<div>
  		<table>
  		<tr>
  		<td>
  				<div>
		  		<a href="http://www.universosodexo.com/control-de-gastos">
		  		<img class="image-body"src="include/images/gastos.png">	</a>
		  		</div>
		  		
	  	</td>
  		<td>
		  		

		  		<div>
		  		<a href="http://www.universosodexo.com/incentivos-y-reconocimientos">
		  		<img class="image-body"src="include/images/incentivos.png">	</a>
		  		</div>


		</td>
		</tr>
		<tr>

		<td>
			<table>
					<tr>
				

					<?php for($i=0;$i<=3;$i++){ ?>
				   <td><div> 

							<div class="post-content left-float" style="position:relative" >
									<div class="hover">
					  				<a href="<?php echo ($incentivos['posts'][$i]['url']);?>">
						  				<img src="<?php echo ($incentivos['posts'][$i]['thumbnail']);?>"><br>
						  				<div class="text"><p><?php echo ($incentivos['posts'][$i]['title'])?></p></div>
					  				</a>
					  				<div>
				  			</div>
				  	<?php if($i == 0 || $i == 2 ) {?> </div></td> <?php } ?>
					<?php if($i == 1 || $i == 3 ) {?> </div></td></tr> <?php } ?>
				  
					<?php }?>
				   
			</table>
		</td>
		
		<td>
			<table>

				<tr>
				   	   <?php for($i=0;$i<=3;$i++){ ?>
				   <td><div> 

								<div class="post-content left-float" >
									<div class="hover">
				  				<a href="<?php echo ($control['posts'][$i]['url']);?>">
					  				<img src="<?php echo ($control['posts'][$i]['thumbnail']);?>"><br>
					  				<div class="text"><p><?php echo ($control['posts'][$i]['title'])?></p></div>
				  				</a>
				  			</div>
				  			</div>
				  	<?php if($i == 0 || $i == 2 ) {?> </div></td> <?php } ?>
					<?php if($i == 1 || $i == 3 ) {?> </div></td></tr> <?php } ?>
				  
					<?php }?>


			</table>

		</td>
		</tr>  		
			
			
	  	
		<tr>
			<td class="boton"><div class="boton"><a href="http://www.universosodexo.com/control-de-gastos/#modal1">SUSCRÍBASE A NUESTRO BLOG</a></div></td>
			<td class="boton"><div class="boton1"><a href="http://www.universosodexo.com/incentivos-y-reconocimientos/#modal1">SUSCRÍBASE A NUESTRO BLOG</a></div></td>
			
		</tr>
  		</table>	
  	</div>	

<div id="modal1" class="modalmask" tabindex="-1">
	<div class="wpcf7" id="wpcf7-f2324-o1" lang="es-ES" dir="ltr">
		<div class="screen-reader-response"></div>

		<p><a href="#close" title="Close" class="close">X</a></p>
		<p>Su nombre (requerido)<br>
		    <input type="text" name="your-name" id="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></p>
		<p>Su e-mail (requerido)<br>
		    <input type="email" name="your-email" id="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"> </p>
		<p>Terminos<br><br>
		<span class="wpcf7-form-control-wrap acceptance-246"><input type="checkbox" name="acceptance-246" value="1" class="wpcf7-form-control wpcf7-acceptance" aria-invalid="false"></span></p>
		<p>Si esta de acuerdo con esto acepte los términos y condiciones...</p>
		<p>
		<input type="hidden" value="control" id="control">	
		<input type="button" href="javascript:;" onclick="realizaProceso($('#name').val(),$('#email').val());return false;" value="Enviar"><img class="ajax-loader" src="http://www.universosodexo.com/Desarrollo/dev-control-de-gastos/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Enviando..." style="visibility: hidden;"></p>
		
		<div id="resultado">
		</div>
	</div>
</div>


<div id="modal2" class="modalmask" tabindex="-1">
	<div class="wpcf7" id="wpcf7-f2324-o1" lang="es-ES" dir="ltr">
		<div class="screen-reader-response"></div>

		<p><a href="#close" title="Close" class="close">X</a></p>
		<p>Su nombre (requerido)<br>
		    <input type="text" name="your-name" id="name1" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></p>
		<p>Su e-mail (requerido)<br>
		    <input type="email" name="your-email" id="email1" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"> </p>
		<p>Terminos<br><br>
		<span class="wpcf7-form-control-wrap acceptance-246"><input type="checkbox" name="acceptance-246" value="1" class="wpcf7-form-control wpcf7-acceptance" aria-invalid="false"></span></p>
		<p>Si esta de acuerdo con esto acepte los términos y condiciones...</p>
		<p>
		<input type="hidden" value="incentivos" id="incentivos">	
		<input type="button" href="javascript:;" onclick="realizaProceso1($('#name1').val(),$('#email1').val());return false;" value="Enviar"><img class="ajax-loader" src="http://www.universosodexo.com/Desarrollo/dev-control-de-gastos/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Enviando..." style="visibility: hidden;"></p>
		
		<div id="resultado1">
		</div>
	</div>
</div>


</section>

<section  class="footer">

	<div > 
		<p >© by SODEXO, Inc All rigths reserved.<br> Sodexo, Líder mundial en Soluciones de Calidad de Vida Diaria</p>
	</div>

</section>

<script>
$(function () {
	var i=0;
      $(document).ready(function () {
          $("table .post-content").each(function (index) {
			i=i+1
            $(this).addClass("color-font"+i);
           })
      })
  })


</script>
<script>

function realizaProceso(name, email){
  var parametros = {
                "name" : name,
                "email" : email,
        		};


		$.ajax({
                data:  parametros,
                url:   'http://www.universosodexo.com/registro-control.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
}

function realizaProceso1(name, email){
  var parametros = {
                "name" : name,
                "email" : email,
        		};


		$.ajax({
                data:  parametros,
                url:   'http://www.universosodexo.com/registro-incentivos.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado1").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado1").html(response);
                }
        });
}



</script>



</body>
</html>