<script type="text/javascript">
  $(function(){
    $("#fec_nac").datepicker({
      format: 'dd/mm/yyyy'
    });
    $('#btn_id_prof').tooltip();
    
    $("#btn_info_personal").click(function (e){
      var btn = $(this);
      btn.button('loading');
    });

    $("#form_info_personal").submit(function (e){
      e.preventDefault();
      $.post(this.action, $(this).serialize(), function(data){
        console.log(data);
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
            <input type="text" class="form-control" name="nombre" placeholder="Nombre(s)" required value="<?php echo $user_info["nombre"]?>">
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
            <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno" required value="<?php echo $user_info["apellido_paterno"]?>">
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
            <input type="text" class="form-control" name="apellido_materno" placeholder="Apellido Materno" required value="<?php echo $user_info["apellido_materno"]?>">
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
            <input type="text" id="fec_nac" class="form-control" name="fecha_nacimiento" data-date-viewmode="years" placeholder="dd/mm/yyyy" required value="<?php  echo $user_info["fecha_nacimiento"]?>">
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
            <input type="text" class="form-control" name="nacionalidad" placeholder="Nacionalidad" required value="<?php echo $user_info["nacionalidad"]?>">
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
            <input type="text" class="form-control" name="edo_civil" placeholder="Estado Civil" required value="<?php echo $user_info["edo_civil"]?>">
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
             <input type="text" class="form-control" name="curp" placeholder="CUPR" required value="<?php echo $user_info["curp"]?>">
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
            <input type="text" class="form-control" name="rfc" placeholder="RFC" required value="<?php echo $user_info["rfc"]?>">
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
            <input type="text" class="form-control" name="imss" placeholder="Núm. IMSS" required value="<?php echo $user_info["imss"]?>">
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
            <input type="text" id="btn_id_prof" class="form-control" name="profesor_id" placeholder="ID Profesor" value="<?php echo $user_info["profesor_id"]?>"  data-toggle="tooltip" data-placement="bottom" title="Este campo es para los profesores registros en la UPA, si usted es nuevo puede dejarlo en blanco">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
    </div>
    <br>
    <button id="btn_info_personal" type="submit" data-loading-text="Espere..." class="btn btn-primary">Guardar</button>
  </form>
</div>
<div id="info_domi">
  <form id="form_info_personal" method="post" action="<?php echo site_url(array("main","set_info_personal"))?>" role="form">
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
            <input type="text" class="form-control" name="estado" placeholder="Estado" required value="<?php echo $user_info["estado"]?>">
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
            <input type="text" class="form-control" name="municipio" placeholder="Municipio" required value="<?php echo $user_info["municipio"]?>">
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
            <input type="text" class="form-control" name="fracc" placeholder="Fraccionamiento" required value="<?php echo $user_info["fracc"]?>">
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
            <input type="text" class="form-control" name="calle" placeholder="Calle" required value="<?php echo $user_info["calle"]?>">
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
            <input type="number" class="form-control" name="num_exterior_domicilio" placeholder="Numero Domic" required value="<?php echo $user_info["num_exterior_domicilio"]?>">
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
             <input type="text" class="form-control" name="cod_postal" placeholder="Código Postal" required value="<?php echo $user_info["cod_postal"]?>">
          </div>
        </div>
      </div>
      <div class="visible-md-block"></div>
      <!---->
    </div>
    <br>
    <button id="btn_info_personal" type="submit" data-loading-text="Espere..." class="btn btn-primary">Guardar</button>
  </form>
</div>
<div id="info_contacto">
  <form id="form_info_personal" method="post" action="<?php echo site_url(array("main","set_info_personal"))?>" role="form">
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
              <input type="text" class="form-control" name="correo_institucion" placeholder="Correo Inst." required readonly value="<?php echo $user_info["correo_institucion"]?>">
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
            <input type="email" class="form-control" name="correo_personal" placeholder="Correo Personal" required value="<?php echo $user_info["correo_personal"]?>">
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
            <input type="number" class="form-control" name="celular" placeholder="Celular" required value="<?php echo $user_info["celular"]?>">
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
            <input type="number" class="form-control" name="tel" placeholder="Tel. Fijo" required value="<?php echo $user_info["tel"]?>">
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
            <input type="text" class="form-control" name="puesto_solicitado" placeholder="Puesto Solicitado" required value="<?php echo $user_info["puesto_solicitado"]?>">
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
    <button id="btn_info_personal" type="submit" data-loading-text="Espere..." class="btn btn-primary">Guardar</button>
  </form>
</div>
