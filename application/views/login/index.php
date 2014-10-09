<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nutrición para toddos</title>

	<link rel="stylesheet" type="text/css" href="/<?= base_url(); ?>www/bootstrap/css/bootstrap.css">

	<link rel="stylesheet" type="text/css" href="/<?= base_url(); ?>www/css/style.css">

	<style> body { 
		background-image: url("<?= base_url(); ?>www/img/fondo_login.jpg"); 
		background-size: 1550px 800px;
	} </style>

	<!-- scripts -->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<script type="text/javascript" src="/<?= base_url(); ?>www/js/loginfunctions.js"></script>

</head>
<body>

<!-- aqui inicia -->

<div class="container">
	<div class="row">
    	<div class="col-md-6 col-md-offset-3">
    		<div class="modal-dialog modal-content login-content">
			  	<h4 style="border-bottom: 1px solid #c5c5c5;">
			    	<i class="glyphicon glyphicon-user">
			    	</i>
			    	Inicia sesión
			  	</h4>
	  			<div style="padding: 20px;" id="form-olvidado">
	  				<?php if(validation_errors() || $msg!='') { ?>
							<div class="alert alert-warning">
							    <strong>Error!</strong> <br>
							    <?= validation_errors(); ?>
								<?php if($msg!='') echo $msg ?>
							</div>
	    			<?php } ?>
					<form accept-charset="UTF-8" role="form" id="login-form" method="post" action="<?= base_url()?>login/init">
						<fieldset>
					        <div class="form-group input-group">
					          <span class="input-group-addon">
					            <i class="glyphicon glyphicon-user">
			    				</i>
					          </span>
					          <input class="form-control" placeholder="Nombre de usuario" name="username" type="text" value="<?= set_value('username'); ?>" required="" autofocus="">
					        </div>
					        <div class="form-group input-group">
					          <span class="input-group-addon">
					            <i class="glyphicon glyphicon-lock">
					            </i>
					          </span>
					          <input class="form-control" placeholder="Contraseña" name="password" value="<?= set_value('password'); ?>" type="password" value="" required="">
					        </div>
					        <div class="form-group">
					          <button type="submit" class="btn btn-primary btn-block">
					            Iniciar sesión
					          </button>
					          <p class="help-block">
					          	<a class="text-muted" href="#"><small>Registrarse</small></a>
					            <a class="pull-right text-muted" href="#" id="olvidado"><small>Olvide mi contraseña</small></a>
					          </p>
					        </div>
					    </fieldset>
					</form>
				</div>
	    		<div style="display: none;" id="form-olvidado">
	    		  <h4 class="">
	    		    ¿Olvidaste tu contraseña?
	    		  </h4>
	    		  <form accept-charset="UTF-8" role="form" id="login-recordar" method="post" action="<?= base_url()?>login/forgot_password">
	    		    <fieldset>
	    		      <span class="help-block">
	    		        Escribe el EMail con el que registraste tu cuenta
	    		        <br>
	    		        Te enviaremos las instrucciones para reestablecer la contraseña lo mas pronto posible.
	    		      </span>
	    		      <div class="form-group input-group">
					          <span class="input-group-addon">
					            <i class="glyphicon glyphicon-user">
			    				</i>
					          </span>
					          <input class="form-control" placeholder="Nombre de usuario" name="username" value="<?= set_value('username'); ?>" type="text" required="" autofocus="">
					  </div>
	    		      <div class="form-group input-group">
	    		        <span class="input-group-addon">
	    		          @
	    		        </span>
	    		        <input class="form-control" placeholder="Email" value="<?= set_value('email'); ?>" name="email" type="email" required="">
	    		      </div>
	    		      <button type="submit" class="btn btn-primary btn-block" id="btn-olvidado">
	    		        Continuar
	    		      </button>
	    		      <p class="help-block">
	    		        <a class="text-muted" href="#" id="acceso"><small>&laquo;Inicio sesión</small></a>
	    		      </p>
	    		    </fieldset>
	    		  </form>
	    		</div>
    		</div>
		</div>
	</div>
</div>
<!-- aqui termina -->
</body>
</html>