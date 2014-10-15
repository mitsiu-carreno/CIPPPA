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

		    $('.btn_info_personal').popover({   
		        placement: 'right',
		        html: 'true',
		        title : '<span class="text-info"><strong>Importante:</strong></span>',
		        content : 'Si usted no tiene toda la información puede guardar su progreso presionando este boton y regresar más tarde. <br><button type="button" id="close" class="close" onclick="$(&quot;.btn_info_personal&quot;).popover(&quot;hide&quot;);">Continuar</button>',
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
		    $("#fondo-transparente").addClass('transparent_overlay');
		    $(".nav-pills").css('z-index', '1010');
		    $(".nav-pills").css('position', 'relative');
		    $(".nav-pills").css('background-color', 'white');

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
	      	destroy_animate_show_popover('#step1', '#label_nombre');
	      	$(".nav-pills").css('z-index', '11');
	      	$("#label_nombre").css('color', 'white');
	      	$("#label_nombre").css('position', 'relative');
	      	$("#label_nombre").css('z-index', '1010');
	    });

	    $('#label_nombre').on('hidden.bs.popover', function (){
	    	$(".btn_info_personal").css('position', 'relative');
	    	$(".btn_info_personal").css('z-index', '1010');
	    	destroy_animate_show_popover('#label_nombre', '.btn_info_personal')
	    	$("#label_nombre").css('color', '#333');
	    });

	    $('.btn_info_personal').on('hidden.bs.popover', function(){
	    	$(".btn_info_personal").css('z-index', '11');
	    	$(".nav-pills").css('z-index', '1010');
	    	
	    	destroy_animate_show_popover('.btn_info_personal', '#btn_profile_first_steps');
	    });

	    $('#btn_profile_first_steps').on('hidden.bs.popover', function(){
	    	console.log("hidding_&_destroy btn_profile_first_steps");
	    	$('#btn_profile_first_steps').popover('destroy');
	    	$('#fondo').removeClass('overlay');
	    	$('#fondo-transparente').removeClass('transparent_overlay');
	    	$(".nav-pills").css('z-index', '11');
	    	
	    });

	    function destroy_animate_show_popover(destroy_popver, animate_btn){
		    console.log("hidding_&_destroy");
		    $(destroy_popver).popover('destroy');
		    $("html, body").animate({
		      	scrollTop: $(animate_btn).offset().top -200
		    }, 1000);

		    setTimeout(function(){
		      	$(animate_btn).popover('show');
		    }, 900);
		}	
	});
</script>

<h1 class="text-center"><strong>Perfil</strong></h1>
<ul class="nav nav-pills nav-pills-my">

	<li class="active"><a href='#step1' data-toggle="tab" id="step1" >Paso 1 - Información Personal</a></li>

  	<li><a href='#step2' data-toggle="tab" id="step2">Paso 2 - Datos Domiciliarios</a></li>

  	<li><a href='#step3' data-toggle="tab" id="step3">Paso 3 - Datos de Contacto</a></li>

  	<li><a href='#step4' data-toggle="tab" id="step4">Paso 4 - Fotografía</a></li>
  	
  	<li id="btn_profile_first_steps" class="dropdown pull-right">
    	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
      		<span class="glyphicon glyphicon-user"></span>
  			<?php echo $user_info["nombre"]?>
  			<span class="caret"></span>
    	</a>
    	<ul class="dropdown-menu" role="menu">
    		<li class="active"><a href="<?php echo site_url(array("main"))?>">Perfil</a></li>
    		<li><a href="#">Configuración</a></li>
    		<li class="divider"></li>
    		<li><a href="<?php echo site_url(array("login", "out"))?>">Salir</a></li>
    	</ul>
  	</li>
</ul>


<!--BUG-NOT-RESPONSIVE
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
-->

<!--Se usa para bloquear la página y hacer el tutorial first steps-->
<div id="fondo"></div>
<!--Se usa para que se resalten los botones pero no se pueda hacer click-->
<div id="fondo-transparente"></div>
