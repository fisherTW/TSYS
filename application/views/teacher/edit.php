<meta charset="utf-8"> 

<link href="<?php echo base_url(); ?>assets/css/bootstrap-select.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-nav-wizard.css" rel="stylesheet">

<div class='container'>
<h2>Edit data</h2>

	<ul class="nav nav-wizard nav-justified" style="margin-bottom:10px">
		<li class="done"><a href="#">0. New Data</a></li>
		<li class="done"><a href="#">1. 審核</a></li>
		<li class="active"><a href="#">2. 訓練</a></li>
		<li><a href="#">3. 評核</a></li>
		<li><a href="#">4. 認證</a></li>
		<li><a href="#">5. 回訓</a></li>
	</ul>

<?php echo validation_errors(); ?>

<form id='form1'>
	<input type='hidden' id='hid_id' name='id' value='<?=$id?>'>
	<div class="form-group">
		<label for="title">Name</label> 
		<input required id='title' type="input" name="title" class="form-control" placeholder="Input here" value=''><br />
	</div>
	<div class="form-group">
		<label for="text">Nation</label>
		<?= form_dropdown('country', $ary_cou, '', "class='selectpicker'");?><br />
	</div>
	<div class="form-group">
		<label for="text">Text</label>
		<textarea required id='text' name="text" class="form-control" placeholder="Input here"></textarea><br />
	</div>
	<button required type="button" class="btn btn-warning" id='btn_submit'>Submit</button>
	<button type="button" class="btn btn-primary" onclick="history.back();">Back</button>
</form>
</div>

<script src="<?php echo base_url(); ?>assets/js/teacher_edit.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>