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
    #error{
        display: none;
    }
    #new{
        display: none;
    }
    body{
        background-image: url('<?php echo base_url();?>img/login-background.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<script>
    $(function(){
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
            $(".container").hide('fade');
            $("#new").show('fade');
        });
    });
</script>

<form class="form-horizontal" id="signin"  method="post" action="<?php echo site_url(array("login","in")) ?>" role="form">
    <br>
    <h1 class="text-center"><b>BIENVENIDO</b></h1>
    <br>
  <div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label">Email</label>
    <div class="col-md-7">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Enter email">
            <div class="input-group-addon">@upa.edu.mx</div>
        </div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-md-3 control-label">Password</label>
    <div class="col-md-7">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
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
      <button type="submit" class="btn btn-default">Ingresar</button>
    </div>
  </div>
  <br>
  <a href="#" class="pull-right" ><b>Registrarse</b></a>
</form>



<!--Formulario de Registro-->
<div id="new">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <form class="form-signin" id="register-form"  method="post" action="<?php echo site_url(array("login","registro")) ?>" role="form">
                    Elija un nombre de usuario:
                    <input name="nombre" type="text" class="form-control" placeholder="Usuario" required autofocus>
                    Elija una contraseña
                    <input name="password" type="password" class="form-control" placeholder="Contraseña" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="error" class="alert alert-danger">Usuario o contraseña invalidos</div>
