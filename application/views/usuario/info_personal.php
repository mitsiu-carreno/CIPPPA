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
    <input type="text" class="form-control" name="nombre" placeholder="Nombre(s)" autofocus required value="<?php echo $nombre?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Apellido Pat.</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo $apellido_paterno?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Apellido Mat.</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo $apellido_materno?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Fecha de Nac.</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="input" class="form-control" name="" placeholder="" required value="<?php if($apellido_materno) {echo $apellido_materno;} else {null;}?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Estado Civil</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Teléfono Fijo</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Teléfono Oficina</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Celular</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Correo Personal</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Correo Inst.</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Codigo Postal</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Fraccionamiento</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Calle</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Número Domic.</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>   

  <label class="col-md-2 col-sm-2 lay">Número Interior</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">CURP</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">RFC</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Nacionalidad</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Número IMSS</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Núm. Profesor</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Municipio</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

  <label class="col-md-2 col-sm-2 lay">Puesto Solicitado</label>     
  <div class="visible-md-block"></div>
  
  <div class="col-md-2 col-sm-4">
    <input type="text" class="form-control" name="" placeholder="" required value="<?php echo '' ?>">
  </div>
  <div class="visible-md-block"></div>

</div>

<a href="<?php echo site_url("login/out")?>"><button type="button">Salir</button></a>

