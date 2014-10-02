<script type="text/javascript">
	$(function(){
		$("#step1").click(function(e){
			$("#info_personal").show("fade");
			$("#info_domi").hide("fade");
			$("#info_contacto").hide("fade");
		});

		$("#step2").click(function(e){
			$("#info_personal").hide("fade");
			$("#info_domi").show("fade");
			$("#info_contacto").hide("fade");
		});

		$("#step3").click(function(e){
			$("#info_personal").hide("fade");
			$("#info_domi").hide("fade");
			$("#info_contacto").show("fade");
		});

		//Función para mostrar modal si el profesor es nuevo
	    var show_modal = <?php echo $user_info["new"]?>;
	    if (show_modal){
	      $('#myModal').modal('show');
	    }

	    //Define las propiedades de los popover
	    $("#step1").popover({
	    	container : 'body',  //Para que este fuera del nav
	    	placement : 'right',
	    	html : 'true',
	    	title : '<span class="text-info"><strong>Bienvendio:</strong></span>',
	    	content : 'Usted puede navegar a través de este menu para completar su registro. <br> <button type="button" id="close" class="close" onclick="$(&quot;#step1&quot;).popover(&quot;destroy&quot;);">Continuar</button>',
	    	animation : 'true'
	    });

	    $("#label_nombre").popover({
	    	placement : 'right',
	    	html : 'true',
	    	title : '<span class="text-info"><strong>Importante:</strong></span>',
	    	content : 'Recuerde que debe llenar todos los campos marcados con * <br> <button type="button" id="close" class="close" onclick="$(&quot;#label_nombre&quot;).popover(&quot;destroy&quot;);">Continuar</button>',
	    	animation : 'true'
	    });

	    $('#btn_info_personal').popover({   
	        placement: 'right',
	        html: 'true',
	        title : '<span class="text-info"><strong>Importante:</strong></span>'+
	                '<button type="button" id="close" class="close" onclick="$(&quot;#btn_info_personal&quot;).popover(&quot;destroy&quot;);">&times;</button>',
	        content : 'Si usted no tiene toda la información puede guardar su progreso presionando este boton y regresar más tarde. <button type="button" id="close" class="close" onclick="$(&quot;#btn_info_personal&quot;).popover(&quot;destroy&quot;);">Finalizar</button>',
	        animation : 'true'
	    });

	    $("#btn_profile_first_steps").popover({
	    	container : 'body',  //Para que este fuera del nav
	    	placement : 'left',
	    	html : 'true',
	    	title : '<span class="text-info"><strong>Importante:</strong></span>'+
	    			'<button type="button" id="close" class="close" onclick="$(&quot;#btn_profile_first_steps&quot;).popover(&quot;destroy&quot;);">&times;</button>',
	    	content : 'Para cerrar sesión haga clic en este boton',
	    	animation : 'true'
	    });

	    //Evento cuando el modal se cierra
	    $('#myModal').on('hidden.bs.modal', function (e) {
	      console.log("show popovers");
	      
	      $('html, body').animate({     //Animación para auto scroll hasta el boton
	      	scrollTop: $("#step1").offset().top
	      }, 2000);

	      setTimeout(function(){    //Delay para mostrar el popover (match tiempo de auto scroll)
	        $("#step1").popover('show');
	      }, 1800);
	    });
	    
	    $('#btn_info_personal').on('hidden.bs.popover', function () {
	      console.log("hidding_step1");
	    });
	});
</script>
<ul class='nav nav-wizard' data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
  
  <li class="active"><a href='#step1' data-toggle="tab" id="step1" >Paso 1 - Información Personal</a></li>

  <li><a href='#step2' data-toggle="tab" id="step2">Paso 2 - Datos Domiciliarios</a></li>

  <li><a href='#step3' data-toggle="tab" id="step3">Paso 3 - Datos de Contacto</a></li>

  <li><a href='#step4' data-toggle="tab" id="step4">Paso 4 - Fotografía</a></li>
  
  <button type="button" id="btn_profile_first_steps" class="btn btn-default pull-right">
  	<span class="glyphicon glyphicon-user"></span>
  	<?php echo $user_info["nombre"]?>
  </button>
</ul>
