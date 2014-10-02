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

	    //Evento cuando el modal se cierra
	    $('#myModal').on('hidden.bs.modal', function (e) {
	      console.log("show popovers");
	      $('#btn_info_personal').popover({   //Define las propiedades del popover
	        placement: 'right',
	        html: 'true',
	        title : '<span class="text-info"><strong>Importante:</strong></span>'+
	                '<button type="button" id="close" class="close" onclick="$(&quot;#btn_info_personal&quot;).popover(&quot;hide&quot;);">&times;</button>',
	        content : 'Si usted no tiene toda la información puede guardar su progreso presionando este boton y regresar más tarde. <button type="button" id="close" class="close" onclick="$(&quot;#btn_info_personal&quot;).popover(&quot;hide&quot;);">Continuar</button>',
	        animation : 'true'
	      });
	      $('html, body').animate({     //Animación para auto scroll hasta el boton
	                        scrollTop: $("#btn_info_personal").offset().top
	                       
	      }, 2000);
	      setTimeout(function(){    //Delay para mostrar el popover (match tiempo de auto scroll)
	        $("#btn_info_personal").popover('show');
	      }, 1800);
	    });
	    
	    $('#btn_info_personal').on('hidden.bs.popover', function () {
	      console.log("hidding");
	    });
	});
</script>
<ul class='nav nav-wizard'>
  
  <li class="active"><a href='#step1' data-toggle="tab" id="step1">Paso 1 - Información Personal</a></li>

  <li><a href='#step2' data-toggle="tab" id="step2">Paso 2 - Datos Domiciliarios</a></li>

  <li><a href='#step3' data-toggle="tab" id="step3">Paso 3 - Datos de Contacto</a></li>

  <li><a href='#step4' data-toggle="tab" id="step4">Paso 4 - Fotografía</a></li>
  
  <button type="button" id="btn_salir_first_steps" class="btn btn-default pull-right">
  	<span class="glyphicon glyphicon-user"></span>
  	<?php echo $user_info["nombre"]?>
  </button>
</ul>
