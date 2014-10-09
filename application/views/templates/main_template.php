<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title><?=$title?></title>
	
	<!-- referencia a jquery -->
	<script type="text/javascript" src="/<?= base_url(); ?>www/bootstrap/js/bootstrap.js"></script>
	
	<!-- refrencias a estilos -->
		<!-- referencia bootstrap -->
		<link rel="stylesheet" type="text/css" href="/<?= base_url(); ?>www/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/<?= base_url();?>www/css/main_template_styles.css">
		<!-- estilos referenciados -->
		<?php foreach($styles as $style): ?>
			<link rel="stylesheet" type="text/css" href="/<?= base_url();?>www/css/<?=$style;?>.css">
		<?php endforeach; ?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<!-- javascript referenciados -->
		<?php foreach ($js as $script): ?>
			<script type="text/javascript" src="/<?= base_url(); ?>www/js/<?=$script;?>.js"></script>
		<?php endforeach; ?>

</head>
<body>
		<header class="container header-container">
			
			<div class="row">
				<img src="www/img/time-line/default.jpg" alt="" width="100%">
			</div>
			
			<nav class="row">
				<div class="navbar navbar-default">
				    <div class="container">
				        <div class="navbar-header">
				            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				            </button>
				            <a class="navbar-brand navbar-page-title" href="#">Sistema de nutrición</a>
				        </div>
				        <center>
				            <div class="navbar-collapse collapse" id="navbar-main">
				                <ul class="nav navbar-nav">
				                    <li class="navbar-item first <?=(isset($isAlimentation) && $isAlimentation)?'active':''?>"><a href="#">Alimentación</a>
				                    <li class="navbar-item <?= (isset($isPerfil) && $isPerfil)?'active':'' ?>"><a href="">Perfil</a></li>
				                </ul>

			                	<ul class="nav navbar-nav navbar-right">
			                		<li> <a href="<?= base_url()?>login/logout">
			                			<span class="glyphicon glyphicon-off"></span>
			                		</a></li>
			                	</ul>
				            </div>
				        </center>
				    </div>
				</div>
			</nav>

		</header>

		<div class="page-container container">
			<div class="content">
				<?= $this->load->view($content_view, $dataContent); ?>
			</div>
		</div>

		<footer class="footer">
			<div class="container">
				<span>lol</span>
			</div>			
		</footer>
</body>
</html>