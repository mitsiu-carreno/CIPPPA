<style>
    .form-horizontal{
        margin: 0 auto;
        //background-color: #275420;
        background: linear-gradient(#459e00, #275420); 
        width: 500px;
        border: 2px solid;
        border-radius: 25px;
        opacity: 0.9;
    }
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
        $('#signin').submit(function (e){
            e.preventDefault();
            $.post(this.action,$(this).serialize(), function(data){
                console.log(data)
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
        
        $("#registro_pass").focus(function(e){
            if($("#registro_email_inst").val()==false){
                $("#registro_email_pers").attr("required", true);
            }
        });
        //CAMBIAR-CHECAR
        $("#register-form").submit(function(){
            if($("#registro_pass").val()!=$("#registro_pass2").val()){
                $("#error_registro").show("fade");
                        setTimeout(function(){
                            $("#error_registro").hide("fade");
                        }, 3000);
                return false;
            }
            $.post(this.action,$(this).serialize(), function(data){
                console.log(data)
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
                <input class="form-control" type="text" name="correo_usuario" placeholder="Enter email" autofocus>
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
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre(s)" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-md-3 control-label">Apellido Paterno</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-md-3 control-label">Apellido Materno</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="apellido_materno" placeholder="Apellido Materno" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-md-3 control-label">Correo Institucional</label>
                    <div class="col-md-7">
                        <div class="input-group">
                            <input class="form-control" type="text" name="correo_usuario" id="registro_email_inst" placeholder="Correo Institucional">
                            <div class="input-group-addon">@upa.edu.mx</div>
                        </div>
                        <p>En caso que aún no cuente con un correo institucional deje este espacio en blanco</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-md-3 control-label">Correo Personal</label>
                    <div class="col-md-7">
                        <input type="email" class="form-control" name="correo_personal" id="registro_email_pers" placeholder="Correo Personal">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-md-3 control-label">Contraseña</label>
                    <div class="col-md-7">
                        <input type="password" class="form-control" name="password" id="registro_pass" placeholder="Contraseña" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-md-3 control-label">Repetir Contraseña</label>
                    <div class="col-md-7">
                        <input type="password" class="form-control" name="password2" id="registro_pass2" placeholder="Repetir contraseña" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-10">
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>
                </div>
            </form>
            <button type="button" class="pull-right btn btn-info" style="margin-right: 5%" id="back_login"><b>Ya estoy registrado</b></button>
        </div>
    </div>
</div>
<br>
<br>

