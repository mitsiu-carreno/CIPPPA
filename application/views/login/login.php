<style>
    body{
        background-image: url('<?php echo base_url();?>img/login-background.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<script>
    $(function(){
        $("#error").hide();
        $("#register_form").hide();
        $("#error_registro").hide();

        $("#signin_btn").click(function(e){
            var btn = $(this);
            btn.button('loading');
        });

        //ENVIAR FORMULARIO SIGN IN
        $('#signin').submit(function (e){
            e.preventDefault();
            $.post(this.action,$(this).serialize(), function(data){
                console.log(data);
                if(data > 0)
                    window.location = "<?php echo site_url(array("main")) ?>";
                else{
                    var btn = $("#signin_btn");
                    btn.button('reset');
                    $("#error").show("fade");
                        setTimeout(function(){
                            $("#error").hide("fade");
                        }, 3000);
                }
                  
            });
        });
        
        $('#registro').click(function(e){
            e.preventDefault();
            $("#signin_form").hide('fade');
            $("#register_form").show('fade');
        });
        $("#back_login").click(function(e){
            e.preventDefault();
            $("#register_form").hide('fade');
            $("#signin_form").show("fade");
        });
        
        //Valida que se llene al menos un correo
        $("#form_reg_listo").click(function(){
            var btn = $(this);
            btn.button('loading');
            if($("#registro_email_inst").val()==false){
                $("#registro_email_inst").attr("required", false);
                $("#registro_email_pers").attr("required", true);
            }
            else{
                $("#registro_email_pers").attr("required", false);
            }
        });

        $("#register-form").submit(function(e){
            //Validación que contraseñas coincidan
            if($("#registro_pass").val()!=$("#registro_pass2").val()){
                $("#error_registro").show("fade");
                        setTimeout(function(){
                            $("#error_registro").hide("fade");
                        }, 3000);
                return false;
            }
            e.preventDefault();
            $.post(this.action, $(this).serialize(), function(data){
                console.log(data);
                if(data > 0)
                    window.location = "<?php echo site_url(array("main")) ?>";
                else{
                    var btn = $("#form_reg_listo");
                    btn.button('reset');
                    $("#error").show("fade");
                        setTimeout(function(){
                            $("#error").hide("fade");
                        }, 3000);
                }
                    
            });
        });
    });
</script>
<br>
<div id="error" class="alert alert-danger">Usuario o contraseña invalidos</div>
<div id="error_registro" class="alert alert-danger">Las contraseñas no coinciden</div>

<!--Formulario-Login-->
<div class="login_wrapper" id="signin_form">
    <form id="signin" method="post" action="<?php echo site_url(array("login", "in"))?>" role="form">
        <h1 class="text-center"><b>BIENVENIDO</b></h1>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-md-2">
                <label>Correo</label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-9">
                <div class="input-group">
                    <input class="form-control" type="text" name="correo_institucion" placeholder="Enter email" autofocus>
                    <div class="input-group-addon">@upa.edu.mx</div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-md-2">
                <label>Contraseña</label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">   </div>
            <div class="col-sm-9">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
        </div>
        <br>    
        <br>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-md-2">
                <button id="signin_btn" type="submit" data-loading-text="Espere..." class="btn btn-primary">Ingresar</button>
            </div>
        </div>
        
        <br>
        <br>
    </form>    
    <button type="button" class="pull-right btn btn-info" style="margin-right: 5%" id="registro"><b>Registrarse</b></button>
</div>

<!--Formulario-Registro-->
<div id="register_form" class="login_wrapper"> 
    <form id="register-form" method="post" action="<?php echo site_url(array("login","registro")) ?>" role="form">
        <h1 class="text-center"><b>REGISTRESE</b></h1>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-md-3">
                <label>Nombre(s)</label>
            </div>
        </div>  
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre(s)" autofocus required value="Mitsiu Alejandro">
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-md-3">
                <label>Apellido Paterno</label>
            </div>
        </div>          
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno" required value="Carreño">
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-md-3">
                <label>Apellido Materno</label>
            </div>
        </div>  
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="apellido_materno" placeholder="Apellido Materno" required value="Sarabia">
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-md-3">
                <label>Correo Institucional</label>
            </div>
        </div>  
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-9">
                <div class="input-group">
                    <input class="form-control" type="text" name="correo_institucion" id="registro_email_inst" placeholder="Correo Institucional" required value="mitsiu.carreno">
                            <div class="input-group-addon">@upa.edu.mx</div>
                </div>
                <p>En caso que aún no cuente con un correo institucional deje este espacio en blanco</p>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-md-3">
                <label>Correo Personal</label>
            </div>
        </div>  
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-9">
                <input type="email" class="form-control" name="correo_personal" id="registro_email_pers" placeholder="Correo Personal" required value="mitsiu.carreno@gmail.com">
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-md-3">
                <label>Contraseña</label>
            </div>
        </div>  
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-9">
                <input type="password" class="form-control" name="password" id="registro_pass" placeholder="Contraseña" required value="1234">
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-md-3">
                <label>Repetir Contraseña</label>
            </div>
        </div>  
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-9">
                <input type="password" class="form-control" name="password2" id="registro_pass2" placeholder="Repetir contraseña" required value="1234">
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-md-2">
                <button id="form_reg_listo" type="submit" data-loading-text="Espere..." class="btn btn-primary">Registrarse</button>
            </div>
        </div>
        <br>
        <br>
    </form>
    <button type="button" class="pull-right btn btn-info" style="margin-right: 5%" id="back_login"><b>Ya estoy registrado</b></button>
</div>
<br>
<br>
<br>
<br>
<!-- //USAR EN CASO QUE SE PONGA LENTO
<div id="cargando">
    <span>ESPERE</span>
    <br>
    <img src="<?php echo base_url();?>img/load.gif" style="width: 80px; height: 80px"/>
</div>-->
