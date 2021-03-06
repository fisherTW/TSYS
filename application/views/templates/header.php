<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title ?></title>

		<!-- Latest compiled and minified CSS -->
		<!-- 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.7.0/bootstrap-table.min.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/main.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap-nav-custom-color.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap-drawer.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/sticky-footer.css">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.7.0/bootstrap-table.min.js"></script>

	</head>

	<body class='has-drawer'>

<?php if($func != 'login' && $func != 'reg' && $func !='create'):?>
<nav class="navbar navbar-custom" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#" style='font-family: "Book Antiqua",Palatino,"Palatino Linotype","Palatino LT STD",Georgia,serif'>Dewey</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<?php $json=json_decode($this->session->userdata('u_s'));if($json->prev->func_t_list == 1):?>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#"><?= $lang->line('msg_teacher_data') ?> <span class="sr-only">(current)</span></a></li>
			</ul>
<?php endif;?>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class='glyphicon glyphicon-globe'></span> Language <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href='<?=base_url(); ?>langswitch/switchLanguage/tw'><?php if($site_lang == 'tw'):?><span class="glyphicon glyphicon-ok"></span><?php endif;?> 正體中文</a></li>
						<li><a href='<?=base_url(); ?>langswitch/switchLanguage/en'><?php if($site_lang == 'en'):?><span class="glyphicon glyphicon-ok"></span><?php endif;?> English</a></li>
						<li><a href='<?=base_url(); ?>langswitch/switchLanguage/cn'><?php if($site_lang == 'cn'):?><span class="glyphicon glyphicon-ok"></span><?php endif;?> 简体中文</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class='glyphicon glyphicon-user'></span> <?= $u_s->erp->name ?> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<!-- 
						<li><a href="#"><span class='glyphicon glyphicon-cog'></span> Setting</a></li>
						<li><a href="#"><span class='glyphicon glyphicon-user'></span> My Account</a></li>
						<li class="divider"></li>
						 -->
						<li><a href='<?=base_url(); ?>teacher/t_dologout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<?php endif;?>