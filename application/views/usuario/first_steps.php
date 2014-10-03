<script type="text/javascript">
	

	$(function(){
		$("#info_domi").hide();
		$("#info_contacto").hide();

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

	    //Evento cuando el modal se cierra
	    $('#myModal').on('hidden.bs.modal', function (e) {
	      	console.log("create popovers");
	      
	      	//Define las propiedades de los popover
		    $("#step1").popover({
		    	container : 'body',  //Para que este fuera del nav
		    	placement : 'bottom',
		    	html : 'true',
		    	title : '<span class="text-info"><strong>Bienvendio:</strong></span>',
		    	content : 'REFORMULAR-->Usted puede navegar a través de este menu para completar su registro. <br> <button type="button" id="close" class="close" onclick="$(&quot;#step1&quot;).popover(&quot;hide&quot;);">Continuar</button>',
		    	animation : 'true'
		    });

		    $("#label_nombre").popover({
		    	placement : 'right',
		    	html : 'true',
		    	title : '<span class="text-info"><strong>Importante:</strong></span>',
		    	content : 'Recuerde que debe llenar todos los campos marcados con * <br> <button type="button" id="close" class="close" onclick="$(&quot;#label_nombre&quot;).popover(&quot;hide&quot;);">Continuar</button>',
		    	animation : 'true'
		    });

		    $('#btn_info_personal').popover({   
		        placement: 'right',
		        html: 'true',
		        title : '<span class="text-info"><strong>Importante:</strong></span>',
		        content : 'Si usted no tiene toda la información puede guardar su progreso presionando este boton y regresar más tarde. <br><button type="button" id="close" class="close" onclick="$(&quot;#btn_info_personal&quot;).popover(&quot;hide&quot;);">Continuar</button>',
		        animation : 'true'
		    });

		    $("#btn_profile_first_steps").popover({
		    	container : 'body',  //Para que este fuera del nav
		    	placement : 'bottom',
		    	html : 'true',
		    	title : '<span class="text-info"><strong>Importante:</strong></span>'+
		    			'<button type="button" id="close" class="close" onclick="$(&quot;#btn_profile_first_steps&quot;).popover(&quot;hide&quot;);">&times;</button>',
		    	content : 'Para cerrar sesión haga clic en este boton <br><button type="button" id="close" class="close" onclick="$(&quot;#btn_profile_first_steps&quot;).popover(&quot;hide&quot;);">Finalizar</button>',
		    	animation : 'true'
		    });
		    $("#fondo").addClass('overlay');
		    $(".nav-wizard").css('z-index', '1010');
		    console.log("auto-scroll");
	      	$('html, body').animate({     //Animación para auto scroll hasta el boton
	      		scrollTop: $("#step1").offset().top -200
	      	}, 500);

	      	console.log("show popover");
	      	setTimeout(function(){    //Delay para mostrar el popover (match tiempo de auto scroll)
	        	$("#step1").popover('show');
	      	}, 300);
	    });
	    
	    $('#step1').on('hidden.bs.popover', function () {
	      	console.log("hidding_&_destroy step1");
	      	$('#step1').popover('destroy');
	      	$(".nav-wizard").css('z-index', '11');
	      	$("html, body").animate({
	      		scrollTop: $("#label_nombre").offset().top -200
	      	}, 500);

	      	setTimeout(function(){
	      		$(".lay").css('position', 'relative');
	      		$(".lay").css('z-index', '1010');
	      		$("#label_nombre").popover('show');
	      	}, 300);
	      	
	    });

	    $('#label_nombre').on('hidden.bs.popover', function (){
	    	console.log("hidding_&_destroy label_nombre");
	    	$("#label_nombre").popover('destroy');
	    	$('html, body').animate({
	    		scrollTop: $("#btn_info_personal").offset().top -200
	    	}, 500);

	    	setTimeout(function(){
	    		$("#btn_info_personal").css('position', 'relative');
	    		$("#btn_info_personal").css('z-index', '1010');
	    		$('#btn_info_personal').popover('show');
	    	}, 500);
	    	
	    });

	    $('#btn_info_personal').on('hidden.bs.popover', function(){
	    	console.log("hidding_&_destroy btn_info_personal");
	    	$("#btn_info_personal").popover('destroy');
	    	$('html, body').animate({
	    		scrollTop: $("#btn_profile_first_steps").offset().top -300
	    	}, 500);

	    	setTimeout(function(){
	    		
	    		$(".nav-wizard").css('z-index', '1010');
	    		$("#btn_profile_first_steps").popover('show');
	    	}, 500);
	    	
	    	//test();
	    });

	    $('#btn_profile_first_steps').on('hidden.bs.popover', function(){
	    	console.log("hidding_&_destroy btn_profile_first_steps");
	    	$('#btn_profile_first_steps').popover('destroy');
	    	$('#fondo').removeClass('overlay');
	    	$(".nav-wizard").css('z-index', '11');
	    	
	    });

	    //test();
	    function on_hidden_and_animate_popover(hidding){
			$('#step1').on('hidden.bs.popover', function () {
		      	console.log("hidding_&_destroy step1");
		      	$('#step1').popover('destroy');
		      	$("html, body").animate({
		      		scrollTop: $("#label_nombre").offset().top -200
		      	}, 500);

		      	setTimeout(function(){
		      		$("#label_nombre").popover('show');
		      	}, 300);
		      	
		    });
		}	
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

<!--Se usa para bloquear la página y hacer el tutorial first steps-->
<div id="fondo"></div>
