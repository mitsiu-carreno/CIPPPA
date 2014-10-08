<script type="text/javascript">
  $(function(){
    console.log(<?php echo $user_info["profesor_id"]?>);
    $("#fec_nac").datepicker({
      format: 'dd/mm/yyyy'
    });
    $('#btn_id_prof').tooltip();
    
    /*
    $(".btn_info_personal").click(function (e){
      var btn = $(this);
      btn.button('loading');
    });
    */

    //Envio de formularios
    $("#form_info_personal").submit(function (e){
      e.preventDefault();
      var btn = $(".btn_info_personal");
      $.post(this.action, $(this).serialize(), function(data){
        //console.log(data);
        btn.button('loading');
        if(data>0){
          //console.log("ok");
          btn.button('reset');
        }
        else{
          //console.log("error");
          btn.button('reset');
        }
      });
    });

    $("#form_info_domi").submit(function (e){
      e.preventDefault();
      $.post(this.action, $(this).serialize(), function(data){
        console.log(data);
        $("#info_domi").hide("fade");
        $("#info_contacto").show("fade");
      });
    });

    $("#form_info_contacto").submit(function (e){
      e.preventDefault();
      $.post(this.action, $(this).serialize(), function(data){
        console.log(data);
        $("#info_contacto").hide("fade");
        $("#info_personal").show("fade");
      });
    });
  });
</script>
<!--Modal oculto, mostrar en caso que sea un usuario nuevo y no tenga correo institucional previo-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Bienvenido</h4>
      </div>
      <div class="modal-body">
        Felicidades por haber ingresado al sistema de la Comisión de Ingreso, Promoción y Permanencia del Personal 
        Académico (CIPPPA). 
        <br>
        <br>
        Este es el primer paso para completar su registro en el sistema a continuación se le solicitará llene la información siguiente.
        <br>
        <br>
        El siguiente correo es el que debe usar para acceder a este sistema: <h1><center><?php echo $user_info["correo_institucion"]?>@upa.edu.mx</center></h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<!--Fin del modal-->
<br>
<br>

<div id="info_personal">
  <form id="form_info_personal" method="post" action="<?php echo site_url(array("main","set_info_personal"))?>" role="form">
    <h1 class="text-center">Información Personal</h1>
    <div class="row"> <!--Crea un renglon con tres columnas-->
      <div class="col-md-4 col-sm-5"> <!--Esta es la primer columna-->
        <div class="row lay"> <!--Se anida otro renglon para separar el layer del input-->
          <div class="col-sm-offset-1">
            <hr>
            
            <label id="label_nombre">*Nombre</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="text" class="form-control required-input" name="nombre" placeholder="Nombre(s)" value="<?php echo $user_info["nombre"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Apellido Paterno</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno" value="<?php echo $user_info["apellido_paterno"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Apellido Materno</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="text" class="form-control" name="apellido_materno" placeholder="Apellido Materno" value="<?php echo $user_info["apellido_materno"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Fecha de Nacimiento</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input id="fec_nac" class="form-control" name="fecha_nacimiento" data-date-viewmode="years" placeholder="dd/mm/yyyy" value="<?php  echo $user_info["fecha_nacimiento"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Nacionalidad</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="text" class="form-control" name="nacionalidad" placeholder="Nacionalidad" value="<?php echo $user_info["nacionalidad"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Estado Civil</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <!--<input type="text" class="form-control" name="edo_civil" placeholder="Estado Civil" value="<?php echo $user_info["edo_civil"]?>">-->
            <select class="form-control" name="edo_civil">
              <?php echo ($user_info["edo_civil"]==null)?"<option hidden selected></option>":""?>
                <option <?php echo ($user_info["edo_civil"]=="s")?"selected":""; ?> value="s">Soltero</option>
                <option <?php echo ($user_info["edo_civil"]=="c")?"selected":""; ?> value="c">Casado</option>
            </select>
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>CURP</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
             <input type="text" class="form-control" maxlength="18"  pattern=".{18}" name="curp" spellcheck="false" placeholder="CUPR" value="<?php echo $user_info["curp"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>RFC</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="text" class="form-control" maxlength="10" pattern=".{10}" spellcheck="false" name="rfc" placeholder="RFC" value="<?php echo $user_info["rfc"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Número IMSSS</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="text" class="form-control" maxlength="10" pattern="[0-9]{10}" name="imss" placeholder="Núm. IMSS" value="<?php echo $user_info["imss"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>ID Profesor</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="text" id="btn_id_prof" class="form-control" maxlength="6" pattern="[0-9]{6}" name="profesor_id" placeholder="ID Profesor" value="<?php echo $user_info["profesor_id"]?>"  
            data-toggle="tooltip" data-placement="bottom" title="Este campo es para los profesores registrados en la UPA, si usted es nuevo debe dejarlo en blanco">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
    </div>
    <br>
    <button type="submit" data-loading-text="Espere..." class="btn btn-primary btn_info_personal">Guardar</button>
  </form>
</div>
<div id="info_domi">
  <form id="form_info_domi" method="post" action="<?php echo site_url(array("main","set_info_personal"))?>" role="form">
    <h1 class="text-center">Información Domiciliaria</h1>
    <div class="row">
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Estado</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="text" class="form-control" name="estado" placeholder="Estado" value="<?php echo $user_info["estado"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Municipio</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="text" class="form-control" name="municipio" placeholder="Municipio" value="<?php echo $user_info["municipio"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Fraccionamiento</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="text" class="form-control" name="fracc" placeholder="Fraccionamiento" value="<?php echo $user_info["fracc"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Calle</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="text" class="form-control" name="calle" placeholder="Calle" value="<?php echo $user_info["calle"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Núm. Domicilio</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="number" class="form-control" name="num_exterior_domicilio" placeholder="Numero Domic" value="<?php echo $user_info["num_exterior_domicilio"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Número Interior de Domicilio</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="number" class="form-control" name="num_interior_domicilio" placeholder="Número Interior" value="<?php echo $user_info["num_interior_domicilio"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Código Postal</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
             <input type="text" class="form-control" maxlength="5" pattern="[0-9]{5}" name="cod_postal" placeholder="Código Postal" value="<?php echo $user_info["cod_postal"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
    </div>
  
    <br>
    <button type="submit" data-loading-text="Espere..." class="btn btn-primary btn_info_personal">Guardar</button>
  </form>
</div>
<div id="info_contacto">
  <form id="form_info_contacto" method="post" action="<?php echo site_url(array("main","set_info_personal"))?>" role="form">
    <h1 class="text-center">Datos de Contacto</h1>
    <div class="row">
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Correo Institucional</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <div class="input-group">
              <input type="text" class="form-control" name="correo_institucion" placeholder="Correo Inst." readonly value="<?php echo $user_info["correo_institucion"]?>">
              <div class="input-group-addon">@upa.edu.mx</div>
            </div>
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Correo Personal</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="email" class="form-control" name="correo_personal" placeholder="Correo Personal" value="<?php echo $user_info["correo_personal"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Celular</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="number" class="form-control" name="celular" placeholder="Celular" value="<?php echo $user_info["celular"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Teléfono Fijo</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="number" class="form-control" name="tel" placeholder="Tel. Fijo" value="<?php echo $user_info["tel"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Teléfono Oficina</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="number" class="form-control" name="tel_oficina" placeholder="Tel. Oficina" value="<?php echo $user_info["tel_oficina"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            
            <label>Puesto Solicitado</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <!--<input type="text" class="form-control" name="puesto_solicitado" placeholder="Puesto Solicitado" value="<?php echo $user_info["puesto_solicitado"]?>">-->
            <select class="form-control" name="puesto_solicitado">
              <?php echo ($user_info["puesto_solicitado"]==null)?"<option hidden selected></option>":"";?>
              <option <?php echo ($user_info["puesto_solicitado"]=="pa")?"selected":""; ?> value="pa">Profesor de Asignatura</option>
              <option <?php echo ($user_info["puesto_solicitado"]=="ptc")?"selected":""; ?> value="ptc">Prof. Tiempo C</option>
            </select>
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!--SAMPLE de layer/input
      <div class="col-md-4 col-sm-5">
        <div class="row lay">
          <div class="col-sm-offset-1">
            <hr>
            <br>
            <label></label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-2">
            <input type="text"></input>
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      -->
      
    </div>
    <br>
    <button type="submit" data-loading-text="Espere..." class="btn btn-primary btn_info_personal">Guardar</button>
  </form>
</div>

<ul class="pager">
  <li><a href="#">Previous</a></li>
  <li><a href="#">Next</a></li>
</ul>


<br>
<div id="the-basics">
  <input class="typeahead form-control" type="text" placeholder="States of USA">
</div>

<script type="text/javascript">
  var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substrRegex;
 
    // an array that will be populated with substring matches
    matches = [];
 
    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');
 
    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        // the typeahead jQuery plugin expects suggestions to a
        // JavaScript object, refer to typeahead docs for more info
        matches.push({ value: str });
      }
    });
 
    cb(matches);
  };
};

var test = {"id":"31","name":"Elankeeran","email":"ekeeran@yahoo.com","activated":"0","phone":""};
var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
  'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
  'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
  'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
  'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
  'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
  'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
  'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
  'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
];
 
$('#the-basics .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'test',
  displayKey: 'value',
  source: substringMatcher(test)
});
</script>

<!--CUstom
<style type="text/css">
  #custom-templates .empty-message {
  padding: 5px 10px;
 text-align: center;
}
</style>

<div id="custom-templates">
  <input class="typeahead" type="text" placeholder="Oscar winners for Best Picture">
</div>

<script type="text/javascript">
$('#custom-templates .typeahead').typeahead(null, {
  name: 'best-pictures',
  displayKey: 'value',
  source: substringMatcher(test)
  templates: {
    empty: [
      '<div class="empty-message">',
      'unable to find any Best Picture winners that match the current query',
      '</div>'
    ].join('\n'),
    suggestion: Handlebars.compile('<p><strong>{{value}}</strong> – {{year}}</p>')
  }
});
</script>
-->