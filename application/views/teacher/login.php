<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/login.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/common.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<div class="container">
	<div class='word'>
		<h1 class="heading text-center">Dewey Teacher Database</h1>
		<p class="heading-desc text-center">Sign in to continue</p>
	</div>
	<div class='down'>
	<form class="form form-signin">
		<img src="<?=base_url(); ?>/assets/img/logo2.jpg" style="margin-left: 40px; margin-top: 40px;" />
		<input type="text" name='account' class="form-control" placeholder="Email" style="margin-top: 100px;" autofocus required>
		<input type="password" name='password' class="form-control" placeholder="Password" required>
		<button class="btn btn-lg btn-primary btn-block" type="button" id='btn_submit'>Sign in<br>
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <small><em>SSO Enabled</em></small>
		</button>
<!-- 
		<input type="checkbox" value="remember-me"> Remember me
		<a href="#" class="pull-right help">Need help? </a><span class="clearfix"></span>
 -->
	</form>
	<a href="<?=base_url(); ?>teacher/reg/1" class="text-center account-creation">Create an account </a>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h1><strong>Processing...</strong></h1>
				<div class="progress">
					<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h1><strong>Authentication Failed</strong></h1>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/login.js"></script>