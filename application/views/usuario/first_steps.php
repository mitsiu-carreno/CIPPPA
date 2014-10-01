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
	});
</script>
<ul class='nav nav-wizard'>
  
  <li><a href='#step1' data-toggle="tab" id="step1">Paso 1 - Información Personal</a></li>

  <li class='active'><a href='#step2' data-toggle="tab" id="step2">Paso 2 - Datos Domiciliarios</a></li>

  <li><a id="step3">Paso 3 - Datos de Contacto</a></li>

  <li><a>Paso 4 - Fotografía</a></li>
  
  <button type="button" id="btn_salir_first_steps" class="btn btn-default pull-right">Salir</button>
  <button type="button" id="btn_salir_first_steps" class="btn btn-default pull-right">
  	<span class="glyphicon glyphicon-user"></span>
  	Mitsiu Carreño
  </button>
</ul>
