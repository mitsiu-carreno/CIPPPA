<style type="text/css">
	*{
		color:black;
	}
  .lay{
    
  }
  #in{
    background-color: green;
  }
</style>

<script type="text/javascript">
  $(function(){
    //Función para mostrar modal si el profesor es nuevo
    var show_modal = <?php echo $user_info["new"];?>;
    if (show_modal){
      //$('#myModal').modal('show');
    }
  });
</script>
<!--Modal oculto, mostrar en caso que sea un usuario nuevo y no tenga correo institucional previo-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<div class="row"> <!--Crea un renglon con tres columnas-->
  <div class="col-md-4 col-sm-5 lay"> <!--Esta es la primer columna-->
    <div class="row"> <!--Se anida otro renglon para separar el layer del input-->
      <div class="col-sm-offset-1">
        <label>Nombre</label>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-offset-2">
        <input type="text" class="form-control" name="nombre" placeholder="Nombre(s)" autofocus required value="<?php if(isset($user_info["nombre"])){echo $user_info["nombre"];} else{echo '';}?>">
      </div>
    </div>
  </div>
  <div class="visible-md-block"></div>
  <!---->
  <div class="col-md-4 col-sm-5 lay">
    <div class="row">
      <div class="col-sm-offset-1">
        <label>Nombre</label>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-offset-2">
        <input type="text" class="form-control" name="nombre" placeholder="Nombre(s)" autofocus required value="<?php if(isset($user_info["nombre"])){echo $user_info["nombre"];} else{echo '';}?>">
      </div>
    </div>
  </div>
  <div class="visible-md-block"></div>
  <!---->
  <div class="col-md-4 col-sm-5 lay">
    <div class="row">
      <div class="col-sm-offset-1">
        <label>Nombre</label>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-offset-2">
        <input type="text" class="form-control" name="nombre" placeholder="Nombre(s)" autofocus required value="<?php if(isset($user_info["nombre"])){echo $user_info["nombre"];} else{echo '';}?>">
      </div>
    </div>
  </div>
  <div class="visible-md-block"></div>
  <!---->
</div>

<!--
<form id="info_personal" method="post" action="" role="form">
  <div class="row"> 
    <label class="col-md-2 col-sm-2 lay">Nombre(s)</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="nombre" placeholder="Nombre(s)" autofocus required value="<?php if(isset($user_info["nombre"])){echo $user_info["nombre"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Apellido Pat.</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno" required value="<?php if(isset($user_info["apellido_paterno"])){echo $user_info["apellido_paterno"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Apellido Mat.</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="apellido_materno placeholder="Apellido Materno" required value="<?php if(isset($user_info["apellido_materno"])){echo $user_info["apellido_materno"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Fecha de Nac.</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required value="<?php if(isset($user_info["fecha_nacimiento"])){echo $user_info["fecha_nacimiento"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Estado Civil</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="estado_civil" placeholder="Estado Civil" required value="<?php if(isset($user_info["estado_civil"])){echo $user_info["estado_civil"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Teléfono Fijo</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="number" class="form-control" name="tel" placeholder="Tel. Fijo" required value="<?php if(isset($user_info["telefono"])){echo $user_info["telefono"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Teléfono Oficina</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="number" class="form-control" name="tel_oficina" placeholder="Tel. Oficina" value="<?php if(isset($user_info["tel_oficina"])){echo $user_info["tel_oficina"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Celular</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="number" class="form-control" name="celular" placeholder="Celular" required value="<?php if(isset($user_info["celular"])){echo $user_info["celular"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Correo Personal</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="correo_personal" placeholder="Correo Personal" required value="<?php if(isset($user_info["correo_personal"])){echo $user_info["correo_personal"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Correo Inst.</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <div class="input-group">
        <input type="text" class="form-control" name="correo_institucion" placeholder="Correo Inst." required value="<?php if(isset($user_info["correo_institucion"])){echo $user_info["correo_institucion"];} else{echo '';}?>">
        <div class="input-group-addon">@upa.edu.mx</div>
      </div>
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Código Postal</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="cod_postal" placeholder="Código Postal" required value="<?php if(isset($user_info["cod_postal"])){echo $user_info["cod_postal"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Fraccionamiento</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="fracc" placeholder="Fraccionamiento" required value="<?php if(isset($user_info["fraccionamiento"])){echo $user_info["fraccionamiento"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Calle</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="calle" placeholder="Calle" required value="<?php if(isset($user_info["calle"])){echo $user_info["calle"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Núm. Domicilio</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="number" class="form-control" name="num_domicilio_exterior" placeholder="Numero Domic" required value="<?php if(isset($user_info["num_domicilio"])){echo $user_info["num_domicilio"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>   

    <label class="col-md-2 col-sm-2 lay">Número Interior</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="number" class="form-control" name="num_domicilio_interior" placeholder="Número Interior" value="<?php if(isset($user_info["num_interior"])){echo $user_info["num_interior"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">CURP</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="curp" placeholder="CUPR" required value="<?php if(isset($user_info["curp"])){echo $user_info["curp"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">RFC</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="rfc" placeholder="RFC" required value="<?php if(isset($user_info["rfc"])){echo $user_info["rfc"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Nacionalidad</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="nacionalidad" placeholder="Nacionalidad" required value="<?php if(isset($user_info["nacionalidad"])){echo $user_info["nacionalidad"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Número IMSS</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="imss" placeholder="Núm. IMSS" required value="<?php if(isset($user_info["num_imss"])){echo $user_info["num_imss"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Núm. Profesor</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="profesor_id" placeholder="Núm Profesor" required value="<?php if(isset($user_info["num_prof"])){echo $user_info["num_prof"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Municipio</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="municipio" placeholder="Municipio" required value="<?php if(isset($user_info["municipio"])){echo $user_info["municipio"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

    <label class="col-md-2 col-sm-2 lay">Puesto Solicitado</label>     
    <div class="visible-md-block"></div>
    
    <div class="col-md-2 col-sm-4">
      <input type="text" class="form-control" name="puesto_solicitado" placeholder="Puesto Solicitado" required value="<?php if(isset($user_info["puesto"])){echo $user_info["puesto"];} else{echo '';}?>">
    </div>
    <div class="visible-md-block"></div>

  </div>
</form>
-->
<a href="<?php echo site_url("login/out")?>"><button type="button">Salir</button></a>

