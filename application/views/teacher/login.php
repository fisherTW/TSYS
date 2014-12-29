<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/login.css">

<div class="container">
	<div class='ha'>
		<h1 class="heading text-center">Dewey Teacher Database</h1>
		<p class="heading-desc text-center">Sign in to continue</p>
	</div>
	<div class='down'>
	<form class="form-signin">
		<img src="<?=base_url(); ?>/assets/img/logo2.jpg" style="margin-left: 40px; margin-top: 40px;" />
		<input type="text" class="form-control" placeholder="Email" style="margin-top: 100px;" autofocus>
		<input type="password" class="form-control" placeholder="Password">
		<button class="btn btn-lg btn-primary btn-block" type="button">Sign in</button>
			<input type="checkbox" value="remember-me"> Remember me
		<a href="#" class="pull-right help">Need help? </a><span class="clearfix"></span> 
	</form>
	<a href="#" class="text-center account-creation">Create an account </a>
	</div>
</div>
<img class='fiximg' src="<?=base_url(); ?>/assets/img/abstergo_loading.gif">

<script src="<?php echo base_url(); ?>assets/js/login.js"></script>