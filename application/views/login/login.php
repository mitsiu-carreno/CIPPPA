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
        $("#new").hide();
        $("#error_registro").hide();

        //ENVIAR FORMULARIO SIGN IN
        $('#signin').submit(function (e){
            e.preventDefault();
            $.post(this.action,$(this).serialize(), function(data){
                console.log(data);
                if(data > 0)
                    window.location = "<?php echo site_url(array("main")) ?>";
                else{
                    $("#error").show("fade");
                        setTimeout(function(){
                            $("#error").hide("fade");
                        }, 3000);
                }
                  
            });
        });
        
        $('#registro').click(function(e){
            e.preventDefault();
            $("#signin").hide('fade');
            $("#new").show('fade');
        });
        $("#back_login").click(function(e){
            e.preventDefault();
            $("#new").hide('fade');
            $("#signin").show("fade");
        });
        
        //Valida que se llene al menos un correo
        $("#form_reg_listo").click(function(){
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
                    window.location = "<?php echo site_url(array("main", "info_personal")) ?>";
                else{
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
<form class="form-horizontal" id="signin"  method="post" action="<?php echo site_url(array("login","in")) ?>" role="form">
    <br>
    <h1 class="text-center"><b>BIENVENIDO</b></h1>
    <br>
    <div class="form-group">
        <label for="inputEmail3" class="col-md-3 control-label">Email</label>
        <div class="col-md-7">
            <div class="input-group">
                <input class="form-control" type="text" name="correo_institucion" placeholder="Enter email" autofocus>
                <div class="input-group-addon">@upa.edu.mx</div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-md-3 control-label">Password</label>
            <div class="col-md-7">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
    </div>
    <!--<div class="form-group">
        <div class="col-sm-offset-2 col-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
        </div>
    </div>-->
    
    <div class="form-group">
        <div class="col-md-offset-3 col-md-10">
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </div>
    </div>
    
    <button type="button" class="pull-right btn btn-info" style="margin-right: 5%" id="registro"><b>Registrarse</b></button>
</form>



<!--Formulario de Registro-->
<div id="new">
    <div class="row">
        <div class="form-horizontal">
            <form class="form-signin" id="register-form"  method="post" action="<?php echo site_url(array("login","registro")) ?>" role="form">
                <br>
                <h1 class="text-center"><b>REGISTRESE</b></h1>
                <br>
                <div class="form-group">
                    <label for="inputPassword3" class="col-md-3 control-label">Nombre(s)</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre(s)" autofocus required value="Mitsiu Alejandro">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-md-3 control-label">Apellido Paterno</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno" required value="Carreño">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-md-3 control-label">Apellido Materno</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="apellido_materno" placeholder="Apellido Materno" required value="Sarabia">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-md-3 control-label">Correo Institucional</label>
                    <div class="col-md-7">
                        <div class="input-group">
                            <input class="form-control" type="text" name="correo_institucion" id="registro_email_inst" placeholder="Correo Institucional" required value="mitsiu.carreno">
                            <div class="input-group-addon">@upa.edu.mx</div>
                        </div>
                        <p>En caso que aún no cuente con un correo institucional deje este espacio en blanco</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-md-3 control-label">Correo Personal</label>
                    <div class="col-md-7">
                        <input type="email" class="form-control" name="correo_personal" id="registro_email_pers" placeholder="Correo Personal" required value="mitsiu.carreno@gmail.com">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-md-3 control-label">Contraseña</label>
                    <div class="col-md-7">
                        <input type="password" class="form-control" name="password" id="registro_pass" placeholder="Contraseña" required value="1234">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-md-3 control-label">Repetir Contraseña</label>
                    <div class="col-md-7">
                        <input type="password" class="form-control" name="password2" id="registro_pass2" placeholder="Repetir contraseña" required value="1234">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-10">
                        <button id="form_reg_listo" type="submit" class="btn btn-primary">Registrarse</button>
                    </div>
                </div>
            </form>
            <button type="button" class="pull-right btn btn-info" style="margin-right: 5%" id="back_login"><b>Ya estoy registrado</b></button>
        </div>
    </div>
</div>
<br>
<br>

