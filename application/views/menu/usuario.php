<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#">Home</a></li>
  <li><a href="#">Profile</a></li>
  <li><a href="#">Messages</a></li>
</ul>
<div id="bienvenido_message_wrap">
	<br>
    <div  id="bienvenido_message" class="text-center">Bienvenido <?php echo $user_info["nombre"] ." ". $user_info["apellido_paterno"]?></div>
    <a href="<?php echo site_url("login/out")?>"><button type="button">Salir</button></a>
    <br>
</div>
<br>
<br>
