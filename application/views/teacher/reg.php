<meta charset="utf-8"> 

<link href="<?php echo base_url(); ?>assets/css/bootstrap-select.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-nav-wizard.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/common.css" rel="stylesheet">

<div class='container'>
<h2>Register</h2>

<!-- 
	<ul class="nav nav-wizard nav-justified" style="margin-bottom:10px">
		<li <?php echo (strval($step_now) == '1' ? "class='active'" : ''); ?>><a>1. Select Type</a></li>
		<li <?php echo (strval($step_now) == '2' ? "class='active'" : ''); ?>><a>2. Fill Profile 1</a></li>
		<li <?php echo (strval($step_now) == '3' ? "class='active'" : ''); ?>><a>3. Fill Profile 2</a></li>
		<li <?php echo (strval($step_now) == '4' ? "class='active'" : ''); ?>><a>4. Finish</a></li>
	</ul>
 -->

<form id='form1' class='form'>
	<input type='hidden' id='hid_base_url' value="<?=base_url(); ?>">
	
	<?= $content ?>
	<div class='row'>
		<div class='col-md-12'>
			<div class="alert alert-danger" role="alert" style='display:none;'><strong>Oops!</strong> Please check form input again.</div>
		</div>
	</div>

	<?php if (strval($step_now) != '1'): ?>
		<button id='btn_back' required type="button" class="btn btn-default" step_now=<?= $step_now ?>>Back</button>
	<?php endif; ?>
	<button id='btn_submit' required type="button" class="btn btn-warning" step_now=<?= $step_now ?> step_next=<?= $step_next ?>>Next</button>
</form>
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

<script src="<?php echo base_url(); ?>assets/js/teacher_reg.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>