<style type="text/css">
	*{
		color:black;
	}
  .lay{
    background-color: red;
  }
  #in{
    background-color: green;
  }
</style>
<br>
<br>
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
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["apellido_paterno"])){echo $user_info["apellido_paterno"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Apellido Mat.</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["apellido_materno"])){echo $user_info["apellido_materno"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Fecha de Nac.</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="input" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["fecha_nacimiento"])){echo $user_info["fecha_nacimiento"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Estado Civil</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["estado_civil"])){echo $user_info["estado_civil"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Teléfono Fijo</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["telefono"])){echo $user_info["telefono"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Teléfono Oficina</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["tel_oficina"])){echo $user_info["tel_oficina"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Celular</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["celular"])){echo $user_info["celular"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Correo Personal</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["correo_personal"])){echo $user_info["correo_personal"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Correo Inst.</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["correo_institucion"])){echo $user_info["correo_institucion"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Codigo Postal</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["cod_postal"])){echo $user_info["cod_postal"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Fraccionamiento</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["fraccionamiento"])){echo $user_info["fraccionamiento"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Calle</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["calle"])){echo $user_info["calle"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Número Domic.</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["num_domicilio"])){echo $user_info["num_domicilio"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>   

  <label class="col-md-2 col-sm-2 lay">Número Interior</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" value="<?php if(isset($user_info["num_interior"])){echo $user_info["num_interior"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">CURP</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["curp"])){echo $user_info["curp"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">RFC</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["rfc"])){echo $user_info["rfc"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Nacionalidad</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["nacionalidad"])){echo $user_info["nacionalidad"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Número IMSS</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["num_imss"])){echo $user_info["num_imss"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Núm. Profesor</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["num_prof"])){echo $user_info["num_prof"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Municipio</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["municipio"])){echo $user_info["municipio"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Puesto Solicitado</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php if(isset($user_info["puesto"])){echo $user_info["puesto"];} else{echo '';}?>">
  </div>
  <div class="visible-md-block"></div>

</div>

<a href="<?php echo site_url("login/out")?>"><button type="button">Salir</button></a>

