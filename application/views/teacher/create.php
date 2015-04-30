<meta charset="utf-8"> 

<link href="<?php echo base_url(); ?>assets/css/bootstrap-select.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-nav-wizard.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bs-tab.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/common.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/fileinput.min.css" rel="stylesheet">

<div class='container'>
	<div class='row'>
		<h2><?=$title?></h2>
	</div>

<?php if ($u_s->prev->func_t_list != 0): ?>
	<div class='row'>
		<ol class="breadcrumb">
			<li><a href="<?=base_url();?>"><?= $lang->line('msg_home') ?></a></li>
			<li><a href="<?=base_url();?>teacher"><?= $lang->line('msg_teacher_data') ?></a></li>
			<li class='active'><?=isset($t) ? $t['name_full'] : '-'?></li>
		</ol>
	</div>
<?php endif; ?>

	<form name='form1' id='form1' class='form'>
	<input type='hidden' id='hid_id' name='id' value="<?= isset($t) ? $t['id'] : ''?>">
	<input type='hidden' id='hid_forms' name='hid_forms' value="<?= isset($hid_forms) ? $hid_forms : ''?>">
	<input type='hidden' id='hid_base_url' value="<?=base_url(); ?>">

	<input type='hidden' name='attachment_1_0' value="<?= isset($attachment[1]) ? $attachment[1][0] : ''?>">
	<input type='hidden' name='attachment_1_1' value="<?= isset($attachment[1]) ? $attachment[1][1] : ''?>">
	<input type='hidden' name='attachment_2_0' value="<?= isset($attachment[2]) ? $attachment[2][0] : ''?>">
	<input type='hidden' name='attachment_3_0' value="<?= isset($attachment[3]) ? $attachment[3][0] : ''?>">
	<input type='hidden' name='attachment_4_0' value="<?= isset($attachment[4]) ? $attachment[4][0] : ''?>">
	<input type='hidden' name='attachment_5_0' value="<?= isset($attachment[5]) ? $attachment[5][0] : ''?>">
	<input type='hidden' name='attachment_6_0' value="<?= isset($attachment[6]) ? $attachment[6][0] : ''?>">
	<input type='hidden' name='attachment_7_0' value="<?= isset($attachment[7]) ? $attachment[7][0] : ''?>">

	<div class='row' style='margin-bottom: 20px;'>
		<div class='col-sm-3'>
			<!--
			<img src='http://lorempixel.com/255/255/cats/7' class='img-responsive img-rounded inline-block'>
			 -->
			<input name='input_attachment_1_0' type='file' class='file file-photo form-control'>
		</div>
		<div class='col-sm-3'>
			<input name='input_attachment_1_1' type='file' class='file file-photo form-control'>
		</div>
		<div class='col-sm-6'>
			#<?=isset($t) ? $t['id'] : '-'?>
		</div>
		<div class='col-sm-6'>
			<h2><input type="text" name="name_full" placeholder='FULL NAME only' value='<?= isset($t) ? $t['name_full'] : ''?>' class="form-control input-lg" <?php echo isset($t) ? 'readonly' : '' ?> required></h2>
		</div>
		<div class='col-sm-6'>
			<div class="form-group">
				<label class="radio-inline">
					<input type="radio" name="sex" id="inlineRadio1" value="0" <?=isset($t) ? (0 == $t['sex'] ? "checked='checked'" : '') : "checked='checked'"; ?>> <?= $lang->line('msg_female') ?>
				</label>
				<label class="radio-inline">
					<input type="radio" name="sex" id="inlineRadio1" value="1" <?=isset($t) ? (1 == $t['sex'] ? "checked='checked'" : '') : ''; ?>> <?= $lang->line('msg_male') ?>
				</label>
			</div>
		</div>
		<div class='col-sm-6'>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox ">
						<label class="radio-inline">
							<input type='checkbox' name='is_enable' value='1' <?=isset($t) ? ($t['is_enable'] == 1 ? 'checked' : '') : '' ?>> <?= $lang->line('msg_enabled') ?>
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox ">
						<label class="radio-inline">
							<input type='checkbox' name='is_blacklist' value='1' <?=isset($t) ? ($t['is_blacklist'] == 1 ? 'checked' : '') : '' ?>> <?= $lang->line('msg_blacklist') ?>
						</label>
					</div>
				</div>	
			</div>	
		</div>
		<div class='col-sm-6 text-right'>
			<h6><small>
				<?= $lang->line('msg_created') ?>: <?=isset($t) ? $t['create_date'] : '-'?><br>
				<?= $lang->line('msg_lastmodified') ?>: <?=isset($t) ? $t['modify_date'] : '-'?>
			</small></h6>
		</div>
	</div>


    <!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li id='li_basic' class="active">
			<a href="#basic" role="tab" data-toggle="tab">
			<span class="glyphicon glyphicon-book"></span> <?= $lang->line('msg_basic') ?>
			</a>
		</li>
		<li id='li_hi' class='hi'>
			<a href="#hi" role="tab" data-toggle="tab">
			<span class="glyphicon glyphicon-cloud"></span> <?= $lang->line('msg_online') ?>
			</a>
		</li>
		<li id='li_fo' class='fo'>
			<a href="#fo" role="tab" data-toggle="tab">
			<span class="glyphicon glyphicon-education"></span> <?= $lang->line('msg_offline') ?>
			</a>
		</li>
	</ul>
    
	<!-- Tab panes -->
	<div class="tab-content">
		<div class="tab-pane fade active in" id="basic">
			<div class='row'>
				<div class='col-sm-3'>
					<div class="form-group">
						<label for="recruiter" class='form-label'><?= $lang->line('msg_recruiter') ?></label><br />
						<?=form_dropdown('recruiter', $ary_e, (isset($t) ? $t['recruiter'] : ''), " class='form-control'"); ?>
					</div>
				</div>
				<div class='col-sm-3'>
					<div class="form-group">
						<label for="contact" class='form-label'><?= $lang->line('msg_contact_window') ?></label><br />
						<?=form_dropdown('contact', $ary_e, (isset($t) ? $t['contact'] : ''), " class='form-control'"); ?>
					</div>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-3'>
					<div class="form-group">
						<label for="birth_date" class='control-label'><?= $lang->line('msg_dob') ?></label>
						<div class="input-group date">
							<input required type="text" name="birth_date" value='<?php echo isset($t) ? date('Y-m-d',strtotime($t['birth_date'])) : '' ?>' class="form-control" <?php echo isset($t) ? 'readonly' : '' ?>><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
						</div>
					</div>
				</div>
				<div class='col-sm-3'>
					<div class="form-group">
						<label for="location" class='form-label'><?= $lang->line('msg_current_location') ?></label><br />
						<?=form_dropdown('location', $ary_cou, (isset($t) ? $t['location'] : ''), " class='form-control'"); ?>
					</div>
				</div>
				<div class='col-sm-3'>
					<div class="form-group">
						<label for="nation" class='form-label'><?= $lang->line('msg_nationality') ?></label><br />
						<?=form_dropdown('nation', $ary_cou, (isset($t) ? $t['nation'] : ''), " class='form-control'"); ?>
					</div>
				</div>
				<div class='col-sm-3'>
					<div class="form-group">
						<label for="available_start_date" class='control-label'><?= $lang->line('msg_available_start_date') ?></label>
						<div class="input-group date">
							<input required type="text" name="available_start_date" value='<?php echo isset($t) ? date('Y-m-d',strtotime($t['available_start_date'])) : '' ?>' class="form-control" <?php echo isset($t) ? 'readonly' : '' ?>><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-3'>
					<div class="form-group">
						<label for="current_employment_status" class='form-label'><?= $lang->line('msg_current_employment_status') ?></label><br />
						<?=form_dropdown('current_employment_status', $ary_current_employment_status, (isset($t) ? $t['current_employment_status'] : ''), " class='form-control'"); ?>
					</div>
				</div>
				<div class='col-sm-9'>
					<div class="form-group">
						<label for="address_permanent" class='form-label'><?= $lang->line('msg_permanent_address') ?></label><br />
						<input required type='text' name='address_permanent' class='form-control' value="<?=isset($t) ? $t['address_permanent'] : '' ?>">
					</div>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-6'>
					<div class="form-group">
						<label for="mail" class='form-label'><?= $lang->line('msg_email') ?></label><br />
						<input required type='text' name='mail' class='form-control' value="<?=isset($t) ? $t['mail'] : '' ?>">
					</div>
				</div>
				<div class='col-sm-6'>
					<div class="form-group">
						<label for="phone_current" class='form-label'><?= $lang->line('msg_phone') ?></label><br />
						<input required type='text' name='phone_current' class='form-control' value="<?=isset($t) ? $t['phone_current'] : '' ?>">
					</div>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-6'>
					<div class="form-group">
						<label for="skype" class='form-label'><?= $lang->line('msg_skype') ?></label><br />
						<input required type='text' name='skype' class='form-control' value="<?=isset($t) ? $t['skype'] : '' ?>">
					</div>
				</div>

			</div>
			<div class='row'>
				<div class='col-sm-12'>
					<label for="cbx_visa" class='form-label'><?= $lang->line('msg_visa') ?></label><br />
					<div class="checkbox">
					<label class="checkbox-inline">
						<input type="checkbox" id="cbx_visa_none" value="0"> <?= $lang->line('msg_none') ?>
					</label>
					</div>
<?php foreach ($ary_visa as $key => $val): ?>
					<div class="checkbox">
					<label class="checkbox-inline">
						<input type="checkbox" name='cbx_visa[]' value="<?=$key?>" <?=(isset($t) ? (in_array($key, $visa) ? "checked='checked'" : '') : '')?>> <?=$val?>
					</label>
					</div>
<?php endforeach; ?>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-12'>
					<label for="cbx_certificate" class='form-label'><?= $lang->line('msg_teaching_certificate') ?></label><br />
					<div class="checkbox">
					<label class="checkbox-inline">
						<input type="checkbox" id='cbx_certificate_none' value="0"> <?= $lang->line('msg_none') ?>
					</label>
					</div>
<?php foreach ($ary_certificate as $key => $val): ?>
					<div class="checkbox">
					<label class="checkbox-inline">
						<input type="checkbox" name='cbx_certificate[]' id="" value="<?=$key?>" <?=(isset($t) ? (in_array($key, $certificate) ? "checked='checked'" : '') : '')?>> <?=$val?>
					</label>
					</div>
<?php endforeach; ?>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-12'>
					<label for="cbx_lang" class='form-label'><?= $lang->line('TargetTeachingLanguage') ?></label><br />
<?php for($i=1; $i <= count($ary_lang); $i++): ?>
<?php if ($i % 5 == 1): ?>
					<div class='row'>
<?php endif; ?>
					<div class='col-sm-2'>
					<label class="checkbox-inline">
						<input type="checkbox" name='cbx_lang[]' id="" value="<?=$i?>" <?=(isset($t) ? (in_array($i, $val_lang) ? "checked='checked'" : '') : '')?>> <?=$ary_lang[$i]?>
					</label>
					</div>
<?php if (($i % 5 == 0) || ($i == count($ary_lang))): ?>
					</div>
<?php endif; ?>						
<?php endfor; ?>
				</div>
			</div>

			<div class='row'>
				<div class='col-sm-12'>
					<label for="cbx_degree" class='form-label'><?= $lang->line('msg_educational_degree') ?></label><br />
<?php foreach ($ary_degree as $key => $val): ?>					
					<div class='row'>
						<div class='col-sm-3'>
						<label class="checkbox-inline">
							<input type="checkbox" name="cbx_degree[]" class='cbx_degree' value="<?=$key?>" <?=(isset($t) ? (in_array($key, $val_degree[0]) ? "checked='checked'" : '') : '')?>> <?=$val?>
						</label>
						</div>
						<div class='col-sm-3'>
							<div class="form-group">
								<label for="degree_year" class='form-label'><?= $lang->line('msg_year_graduation') ?></label><br />
								<input type='text' name="degree_year_<?=$key?>" class='form-control' value="<?=isset($t) ? (in_array($key, $val_degree[0]) ? $val_degree[1]['degree_year_'.$key] : '') : ''?>" <?=isset($t) ? (in_array($key, $val_degree[0]) ? 'required' : '') : ''?>>
							</div>
						</div>
						<div class='col-sm-3'>
							<div class="form-group">
								<label for="degree_nation" class='form-label'><?= $lang->line('msg_nation') ?></label><br />
								<?=form_dropdown('degree_nation_'.$key, $ary_cou, (isset($t) ? (in_array($key, $val_degree[0]) ? $val_degree[1]['degree_nation_'.$key] : '')  : ''), " class='form-control'"); ?>
							</div>
						</div>
						<div class='col-sm-3'>
							<div class="form-group">
								<label for="degree_school" class='form-label'><?= $lang->line('msg_school_name') ?></label><br />
								<input type='text' name='degree_school_<?=$key?>' class='form-control' value="<?=isset($t) ? (in_array($key, $val_degree[0]) ? $val_degree[1]['degree_school_'.$key] : '') : ''?>" <?=isset($t) ? (in_array($key, $val_degree[0]) ? 'required' : '') : ''?>>
							</div>
						</div>
					</div>
<?php endforeach; ?>
				</div>
			</div>
		</div>
	</form>
		<!-- hi div start .................................................................... -->
		<div class="tab-pane fade" id="hi">
			<form name='form_hi' id='form_hi' class='form'>
				<div class='row'>
					<div class="form-group">
						<div class="col-md-2">
							<div class="checkbox ">
								<label class="radio-inline">
									<input type='checkbox' name='is_validate_hi' value='1' <?=isset($t_hi) ? ($t_hi['is_validate'] == 1 ? 'checked' : '') : '' ?>><?= $lang->line('msg_hi_validated') ?>
								</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="checkbox ">
								<label class="radio-inline">
									<input type='checkbox' name='is_ignore_hi' value='1' <?=isset($t_hi) ? ($t_hi['is_ignore'] == 1 ? 'checked' : '') : '' ?>><?= $lang->line('msg_paused') ?>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-3'>
						<div class="form-group">
							<label for="employment_status" class='form-label'><?= $lang->line('msg_hi_employment_status') ?></label><br />
							<?=form_dropdown('employment_status', $ary_employment_status, (isset($t_hi) ? $t_hi['employment_status'] : ''), " class='form-control'"); ?>
						</div>
					</div>
					<div class='col-sm-3'>
						<div class="form-group">
							<label for="location" class='form-label'><?= $lang->line('msg_tone') ?></label><br />
							<input required type='text' name='sound' class='form-control' value="<?=isset($t_hi) ? $t_hi['sound'] : '' ?>">
						</div>
					</div>
					<div class='col-sm-3'>
						<div class="form-group">
							<label for="nation" class='form-label'><?= $lang->line('msg_alias_name') ?></label><br />
							<input required type='text' name='name_alias' class='form-control' value="<?=isset($t_hi) ? $t_hi['name_alias'] : '' ?>">
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12'>
						<label for="cbx_lang" class='form-label'><?= $lang->line('msg_wish_lesson') ?></label><br />
<?php for($j=1; $j <= count($ary_lang_hi); $j++): ?>
<?php $count = 0; ?>
<?php foreach($ary_lang_hi[$j]['data'] as $key => $item): ?>
<?php $count ++; ?>
<?php if ($item === reset($ary_lang_hi[$j]['data'])): ?>
						<div class='well well-lg'>
						<div class='row'>
							<div class='col-sm-2'>
								<label for="" class='form-label text-center'><?=$ary_lang_hi[$j]['name']?></label>
							</div>
						</div>
<?php endif; ?>
<?php if ($count % 5 == 1): ?>
						<div class='row'>
<?php endif; ?>
						<div class='col-sm-2'>
						<label class="checkbox-inline">
							<input type="checkbox" name='cbx_lang_hi_wish[]' id="" value="<?=$key?>" <?=(isset($t_hi) ? (in_array($key, $val_lang_hi[1]) ? "checked='checked'" : '') : '')?>> <?=$item?>
						</label>
						</div>
<?php if (($count % 5 == 0) || ($item === end($ary_lang_hi[$j]['data']))): ?>
						</div>
<?php endif; ?>
<?php if ($item === end($ary_lang_hi[$j]['data'])): ?>
	<?php if ($j == 1): ?>
							<div class='row hi_eng_ent'>
								<div class='col-sm-2'>
									<label for="" class='form-label text-center'><?= $lang->line('msg_enterprise_class') ?></label>
								</div>
							</div>
							<div class='row hi_eng_ent'>
								<div class='col-sm-3'>
									<label for="employment_status" class='form-label'><?= $lang->line('msg_weekday') ?></label><br />
								</div>
							</div>
							<div class="row hi_eng_ent">
								<div class="col-sm-2">
								<label class="checkbox-inline">
									<input type="checkbox" <?= isset($t_hi) ? (($t_hi['ent_week'] & 1) == 1 ? "checked='checked'" : '') : "checked='checked'" ?> value="1" id="" name="cbx_ent_week[]"> <?= $lang->line('msg_monday') ?></label>
								</div>
								<div class="col-sm-2">
								<label class="checkbox-inline">
									<input type="checkbox" <?= isset($t_hi) ? (($t_hi['ent_week'] & 2) == 2 ? "checked='checked'" : '') : "checked='checked'" ?> value="2" id="" name="cbx_ent_week[]"> <?= $lang->line('msg_tuesday') ?></label>
								</div>
								<div class="col-sm-2">
								<label class="checkbox-inline">
									<input type="checkbox" <?= isset($t_hi) ? (($t_hi['ent_week'] & 4) == 4 ? "checked='checked'" : '') : "checked='checked'" ?> value="4" id="" name="cbx_ent_week[]"> <?= $lang->line('msg_wedenesday') ?></label>
								</div>
								<div class="col-sm-2">
								<label class="checkbox-inline">
									<input type="checkbox" <?= isset($t_hi) ? (($t_hi['ent_week'] & 8) == 8 ? "checked='checked'" : '') : "checked='checked'" ?> value="8" id="" name="cbx_ent_week[]"> <?= $lang->line('msg_thursday') ?></label>
								</div>
								<div class="col-sm-2">
								<label class="checkbox-inline">
									<input type="checkbox" <?= isset($t_hi) ? (($t_hi['ent_week'] & 16) == 16 ? "checked='checked'" : '') : "checked='checked'" ?> value="16" id="" name="cbx_ent_week[]"> <?= $lang->line('msg_friday') ?></label>
								</div>
							</div>
							<div class="row hi_eng_ent">
								<div class="col-sm-2">
								<label class="checkbox-inline">
									<input type="checkbox" <?= isset($t_hi) ? (($t_hi['ent_week'] & 32) == 32 ? "checked='checked'" : '') : "checked='checked'" ?> value="32" id="" name="cbx_ent_week[]"> <?= $lang->line('msg_saturday') ?></label>
								</div>
								<div class="col-sm-2">
								<label class="checkbox-inline">
									<input type="checkbox" <?= isset($t_hi) ? (($t_hi['ent_week'] & 64) == 64 ? "checked='checked'" : '') : "checked='checked'" ?> value="64" id="" name="cbx_ent_week[]"> <?= $lang->line('msg_sunday') ?></label>
								</div>
							</div>
							<div class='row hi_eng_ent'>
								<div class='col-sm-3'>
									<div class="form-group">
										<label for="location" class='form-label'><?= $lang->line('msg_start_time') ?></label><br />
										<div class="input-group bootstrap-timepicker">
											<input name='ent_time_start' type="text" class="input-small form-control timepicker">
											<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
										</div>
									</div>
								</div>
								<div class='col-sm-3'>
									<div class="form-group">
										<label for="location" class='form-label'><?= $lang->line('msg_end_time') ?></label><br />
										<div class="input-group bootstrap-timepicker">
											<input name='ent_time_end' type="text" class="input-small form-control timepicker">
											<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
										</div>
									</div>
								</div>
								<div class='col-sm-3'>
									<div class="form-group">
										<label for="nation" class='form-label'><?= $lang->line('msg_ps') ?></label><br />
										<input type='text' name='ent_remark' class='form-control' value="<?=isset($t_hi) ? $t_hi['ent_remark'] : '' ?>">
									</div>
								</div>
							</div>
	<?php endif; ?>
						</div>
<?php endif; ?>
<?php endforeach; ?>




<?php endfor; ?>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12'>
						<label for="cbx_lang" class='form-label'><?= $lang->line('msg_already_lesson') ?></label><br />
<?php for($j=1; $j <= count($ary_lang_hi); $j++): ?>
<?php $count = 0; ?>
<?php foreach($ary_lang_hi[$j]['data'] as $key => $item): ?>
<?php $count ++; ?>
<?php if ($item === reset($ary_lang_hi[$j]['data'])): ?>
						<div class='well well-lg'>
						<div class='row'>
							<div class='col-sm-2'>
								<label for="" class='form-label text-center'><?=$ary_lang_hi[$j]['name']?></label>
							</div>
						</div>
<?php endif; ?>
<?php if ($count % 5 == 1): ?>
						<div class='row'>
<?php endif; ?>
						<div class='col-sm-2'>
						<label class="checkbox-inline">
							<input type="checkbox" name='cbx_lang_hi_already[]' id="" value="<?=$key?>" <?=(isset($t_hi) ? (in_array($key, $val_lang_hi[2]) ? "checked='checked'" : '') : '')?>> <?=$item?>
						</label>
						</div>
<?php if (($count % 5 == 0) || ($item === end($ary_lang_hi[$j]['data']))): ?>
						</div>
<?php endif; ?>	
<?php if ($item === end($ary_lang_hi[$j]['data'])): ?>
						</div>
<?php endif; ?>						
<?php endforeach; ?>
<?php endfor; ?>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-3'>
						<div class="form-group">
							<label for="nation" class='form-label'><?= $lang->line('msg_tin_no') ?></label><br />
							<input required type='text' name='tin_no' class='form-control' value="<?=isset($t_hi) ? $t_hi['tin_no'] : '' ?>">
						</div>
					</div>
					<div class='col-sm-3'>
						<div class="form-group">
							<label for="location" class='form-label'>Facebook</label><br />
							<input required type='text' name='facebook' class='form-control' value="<?=isset($t_hi) ? $t_hi['facebook'] : '' ?>">
						</div>
					</div>
					<div class='col-sm-3'>
						<div class="form-group">
							<label for="nation" class='form-label'>LINE</label><br />
							<input required type='text' name='line' class='form-control' value="<?=isset($t_hi) ? $t_hi['line'] : '' ?>">
						</div>
					</div>
					<div class='col-sm-3'>
						<div class="form-group">
							<label for="nation" class='form-label'><?= $lang->line('msg_other_sns') ?></label><br />
							<input required type='text' name='contact_other' class='form-control' value="<?=isset($t_hi) ? $t_hi['contact_other'] : '' ?>">
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-6'>
						<div class="form-group">
							<label for="nation" class='form-label'><?= $lang->line('msg_sale_self') ?></label><br />
							<input required type='text' name='sale_self' class='form-control' value="<?=isset($t_hi) ? $t_hi['sale_self'] : '' ?>" placeholder='150 words max'>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12'>
						<label for="cbx_personality" class='form-label'><?= $lang->line('msg_personality') ?></label><br />
<?php for($i=1; $i <= count($ary_personality); $i++): ?>
<?php if ($i % 5 == 1): ?>
						<div class='row'>
<?php endif; ?>
						<div class='col-sm-2'>
						<label class="checkbox-inline">
							<input type="checkbox" name='cbx_personality[]' id="" value="<?=$i?>" <?=(isset($t_hi) ? (in_array($i, $val_personality) ? "checked='checked'" : '') : '')?>> <?=$ary_personality[$i]?>
						</label>
						</div>
<?php if (($i % 5 == 0) || ($i == count($ary_personality))): ?>
						</div>
<?php endif; ?>						
<?php endfor; ?>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12'>
						<label for="cbx_interest" class='form-label'><?= $lang->line('msg_interest') ?></label><br />
<?php for($i=1; $i <= count($ary_interest); $i++): ?>
<?php if ($i % 5 == 1): ?>
						<div class='row'>
<?php endif; ?>
						<div class='col-sm-2'>
						<label class="checkbox-inline">
							<input type="checkbox" name='cbx_interest[]' id="" value="<?=$i?>" <?=(isset($t_hi) ? (in_array($i, $val_interest) ? "checked='checked'" : '') : '')?>> <?=$ary_interest[$i]?>
						</label>
						</div>
<?php if (($i % 5 == 0) || ($i == count($ary_interest))): ?>
						</div>
<?php endif; ?>						
<?php endfor; ?>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12'>
						<label for="cbx_good" class='form-label'><?= $lang->line('msg_good') ?></label><br />
<?php for($i=1; $i <= count($ary_good); $i++): ?>
<?php if ($i % 5 == 1): ?>
						<div class='row'>
<?php endif; ?>
						<div class='col-sm-2'>
						<label class="checkbox-inline">
							<input type="checkbox" name='cbx_good[]' id="" value="<?=$i?>" <?=(isset($t_hi) ? (in_array($i, $val_good) ? "checked='checked'" : '') : '')?>> <?=$ary_good[$i]?>
						</label>
						</div>
<?php if (($i % 5 == 0) || ($i == count($ary_good))): ?>
						</div>
<?php endif; ?>						
<?php endfor; ?>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-md-12 column">
						<label for="tab_reward" class='form-label'> <?= $lang->line('msg_reward_record') ?></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_reward">
							<thead>
								<tr >
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_date') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_reward_reason') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_reward_method') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_admin_word') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_ps') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(isset($t_record_reward)): ?>
<?php foreach ($t_record_reward as $item): ?>
								<tr id="<?= 'addr_reward'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_reward[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<?= date('Y-m-d', strtotime($item['date'])) ?>
									</td>
									<td>
										<input type="text" name='reason[]' placeholder='' class="form-control" value="<?= ($item['reason']) ?>"/>
									</td>
									<td>
										<input type="text" name='method[]' placeholder='' class="form-control" value="<?= ($item['method']) ?>"/>
									</td>
									<td>
										<input type="text" name='comment_reward[]' placeholder='' class="form-control" value="<?= ($item['comment']) ?>"/>
									</td>
									<td>
										<input type="text" name='remark_reward[]' placeholder='' class="form-control" value="<?= ($item['remark']) ?>"/>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_reward'.count($t_record_reward) ?>'></tr>
<?php else: ?>
								<tr id='addr_reward0'>
									<td>
										1
										<input type='hidden' name='row_reward[]' value='1'>
									</td>
									<td>
										<?=date('Y-m-d'); ?>
									</td>
									<td>
										<input type="text" name='reason[]' placeholder='' class="form-control" required/>
									</td>
									<td>
										<input type="text" name='method[]' placeholder='' class="form-control" required/>
									</td>
									<td>
										<input type="text" name='comment_reward[]' placeholder='' class="form-control" required/>
									</td>
									<td>
										<input type="text" name='remark_reward[]' placeholder='' class="form-control" required/>
									</td>
								</tr>
								<tr id='addr_reward1'></tr>
<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
				<a class="add_row btn btn-default pull-left" prefix='reward'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				<a class="delete_row pull-right btn btn-default" prefix='reward'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
				<div class='row mb20' ps='for_add_del_button'>
				</div>

				<div class="row clearfix">
					<div class="col-md-12 column">
						<label for="tab_warning" class='form-label'> <?= $lang->line('msg_warning_record') ?></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_warning">
							<thead>
								<tr >
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_date') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_warning_type') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_warning_explain') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_warning_plan') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_admin_word') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_ps') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(isset($t_record_warning)): ?>
<?php foreach ($t_record_warning as $item): ?>
								<tr id="<?= 'addr_warning'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_warning[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<?= date('Y-m-d', strtotime($item['date'])) ?>
									</td>
									<td>
										<?=form_dropdown('type_warning[]', $ary_type_warning, (isset($t_record_warning) ? $item['type'] : ''), " class='form-control'"); ?>
									</td>
									<td>
										<input type="text" name='explain[]' placeholder='' class="form-control" value="<?= ($item['explain']) ?>"/>
									</td>
									<td>
										<input type="text" name='plan[]' placeholder='' class="form-control" value="<?= ($item['plan']) ?>"/>
									</td>
									<td>
										<input type="text" name='comment_warning[]' placeholder='' class="form-control" value="<?= ($item['comment']) ?>"/>
									</td>
									<td>
										<input type="text" name='remark_warning[]' placeholder='' class="form-control" value="<?= ($item['remark']) ?>"/>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_warning'.count($t_record_warning) ?>'></tr>
<?php else: ?>
								<tr id='addr_warning0'>
									<td>
										1
										<input type='hidden' name='row_warning[]' value='1'>
									</td>
									<td>
										<?=date('Y-m-d'); ?>
									</td>
									<td>
										<?=form_dropdown('type_warning[]', $ary_type_warning, '', " class='form-control'"); ?>
									</td>
									<td>
										<input type="text" name='explain[]' placeholder='' class="form-control" required/>
									</td>
									<td>
										<input type="text" name='plan[]' placeholder='' class="form-control" required/>
									</td>
									<td>
										<input type="text" name='comment_warning[]' placeholder='' class="form-control" required/>
									</td>
									<td>
										<input type="text" name='remark_warning[]' placeholder='' class="form-control" required/>
									</td>
								</tr>
								<tr id='addr_warning1'></tr>
<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
				<a class="add_row btn btn-default pull-left" prefix='warning'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				<a class="delete_row pull-right btn btn-default" prefix='warning'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
				<div class='row mb20' ps='for_add_del_button'>
				</div>

				<div class="row clearfix">
					<div class="col-md-12 column">
						<label for="tab_contact" class='form-label'> <?= $lang->line('msg_contact') ?></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_contact">
							<thead>
								<tr >
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_date') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_contact_type') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_contact_topic') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_contact_detail') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_ps') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(isset($t_record_contact)): ?>
<?php foreach ($t_record_contact as $item): ?>
								<tr id="<?= 'addr_contact'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_contact[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<?= date('Y-m-d', strtotime($item['date'])) ?>
									</td>
									<td>
										<?=form_dropdown('type_contact[]', $ary_type_contact, (isset($t_record_contact) ? $item['type'] : ''), " class='form-control'"); ?>
									</td>
									<td>
										<input type="text" name='topic[]' placeholder='' class="form-control" value="<?= ($item['topic']) ?>"/>
									</td>
									<td>
										<input type="text" name='content[]' placeholder='' class="form-control" value="<?= ($item['content']) ?>"/>
									</td>
									<td>
										<input type="text" name='remark_contact[]' placeholder='' class="form-control" value="<?= ($item['remark']) ?>"/>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_contact'.count($t_record_contact) ?>'></tr>
<?php else: ?>
								<tr id='addr_contact0'>
									<td>
										1
										<input type='hidden' name='row_contact[]' value='1'>
									</td>
									<td>
										<?=date('Y-m-d'); ?>
									</td>
									<td>
										<?=form_dropdown('type_contact[]', $ary_type_contact, '', " class='form-control'"); ?>
									</td>
									<td>
										<input type="text" name='topic[]' placeholder='' class="form-control" required/>
									</td>
									<td>
										<input type="text" name='content[]' placeholder='' class="form-control" required/>
									</td>
									<td>
										<input type="text" name='remark_contact[]' placeholder='' class="form-control" required/>
									</td>
								</tr>
								<tr id='addr_contact1'></tr>
<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
				<a class="add_row btn btn-default pull-left" prefix='contact'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				<a class="delete_row pull-right btn btn-default" prefix='contact'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
				<div class='row mb20' ps='for_add_del_button'>
				</div>

<!--
				<div class='row'>
					<ul class="nav nav-wizard nav-justified" style="margin-bottom:10px">
						<li class="active"><a href="#">0. New Data</a></li>
						<li><a href="#">1. 審核</a></li>
						<li><a href="#">2. 訓練</a></li>
						<li><a href="#">3. 評核</a></li>
						<li><a href="#">4. 認證</a></li>
						<li><a href="#">5. 回訓</a></li>
					</ul>
				</div>
 -->
			</form>
		</div>
		<!-- fo div start .................................................................... -->
		<div class="tab-pane fade" id="fo">
			<form name='form_fo' id='form_fo' class='form'>	

				<div class='row'>
					<div class="form-group">
						<div class="col-md-2">
							<div class="checkbox ">
								<label class="radio-inline">
									<input type='checkbox' name='is_validate_fo' value='1' <?=isset($t_fo) ? ($t_fo['is_validate'] == 1 ? 'checked' : '') : '' ?>><?= $lang->line('msg_fo_validated') ?>
								</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="checkbox ">
								<label class="radio-inline">
									<input type='checkbox' name='is_ignore_fo' value='1' <?=isset($t_fo) ? ($t_fo['is_ignore'] == 1 ? 'checked' : '') : '' ?>><?= $lang->line('msg_ignored') ?>
								</label>
							</div>
						</div>
					</div>
				</div>

				<div class='row'>
					<div class='col-sm-3'>
						<div class="form-group">
							<label for="work_hour" class='form-label'><?= $lang->line('msg_position_seeking') ?></label><br />
							<div class="radio">
								<label>
									<input type="radio" name="rdo_work_hour" id="rdo_work_hour_0" value="0" <?=isset($t_fo) ? (0 == $t_fo['work_hour'] ? "checked='checked'" : '') : "checked='checked'"; ?>> <?= $lang->line('msg_fulltime') ?>
								</label>
								<label>
									<input type="radio" name="rdo_work_hour" id="rdo_work_hour_n0" value="not0" <?=isset($t_fo) ? (0 != $t_fo['work_hour'] ? "checked='checked'" : '') : ''; ?>> <?= $lang->line('msg_parttime') ?><br>
								</label>
									<input type='text' name="work_hour" id='txt_work_hour' class='form-control' value="<?=isset($t_fo) ? ($t_fo['work_hour'] == 0 ? '' : $t_fo['work_hour']) : ''?>" placeholder='0 - 168'>
							</div>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12'>
						<label for="cbx_location_preference" class='form-label'> <?= $lang->line('msg_location_preference') ?></label><br />
						<div class="checkbox">
						<label class="checkbox-inline">
							<input type="checkbox" name="cbx_location_preference[]" value="1" <?=isset($t_fo) ? (((intval($t_fo['location_preference']) & 1) == 0) ? '' : "checked='checked'") : ''?>> <?= $lang->line('msg_city') ?>
						</label>
						</div>
						<div class="checkbox">
						<label class="checkbox-inline">
							<input type="checkbox" name="cbx_location_preference[]" value="2" <?=isset($t_fo) ? (((intval($t_fo['location_preference']) & 2) == 0) ? '' : "checked='checked'") : ''?>> <?= $lang->line('msg_suburban') ?>
						</label>
						</div>
						<div class="checkbox">
						<label class="checkbox-inline">
							<input type="checkbox" name="cbx_location_preference[]" value="4" <?=isset($t_fo) ? (((intval($t_fo['location_preference']) & 4) == 0) ? '' : "checked='checked'") : ''?>> <?= $lang->line('msg_countryside') ?>
						</label>
						</div>

					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12'>
						<label for="cbx_teaching_preference" class='form-label'> <?= $lang->line('msg_teaching_preference') ?></label><br />
						<div class="checkbox">
						<label class="checkbox-inline">
							<input type="checkbox" name="cbx_teaching_preference[]" value="1" <?=isset($t_fo) ? (((intval($t_fo['teaching_preference']) & 1) == 0) ? '' : "checked='checked'") : ''?>> <?= $lang->line('msg_s1') ?>
						</label>
						</div>
						<div class="checkbox">
						<label class="checkbox-inline">
							<input type="checkbox" name="cbx_teaching_preference[]" value="2" <?=isset($t_fo) ? (((intval($t_fo['teaching_preference']) & 2) == 0) ? '' : "checked='checked'") : ''?>> <?= $lang->line('msg_s2') ?>
						</label>
						</div>
						<div class="checkbox">
						<label class="checkbox-inline">
							<input type="checkbox" name="cbx_teaching_preference[]" value="4" <?=isset($t_fo) ? (((intval($t_fo['teaching_preference']) & 4) == 0) ? '' : "checked='checked'") : ''?>> <?= $lang->line('msg_s3') ?>
						</label>
						</div>
						<div class="checkbox">
						<label class="checkbox-inline">
							<input type="checkbox" name="cbx_teaching_preference[]" value="8" <?=isset($t_fo) ? (((intval($t_fo['teaching_preference']) & 8) == 0) ? '' : "checked='checked'") : ''?>> <?= $lang->line('msg_s4') ?>
						</label>
						</div>
						<div class="checkbox">
						<label class="checkbox-inline">
							<input type="checkbox" name="cbx_teaching_preference[]" value="16" <?=isset($t_fo) ? (((intval($t_fo['teaching_preference']) & 16) == 0) ? '' : "checked='checked'") : ''?>> <?= $lang->line('msg_s5') ?>
						</label>
						</div>
						<div class="checkbox">
						<label class="checkbox-inline">
							<input type="checkbox" name="cbx_teaching_preference[]" value="32" <?=isset($t_fo) ? (((intval($t_fo['teaching_preference']) & 32) == 0) ? '' : "checked='checked'") : ''?>> <?= $lang->line('msg_s6') ?>
						</label>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-6'>
						<label for="cover_letter" class='form-label'> <?= $lang->line('msg_cover_letter') ?></label><br />
						<input id='cover_letter' name='input_attachment_3_0' type='file' class='file file-doc form-control'>
					</div>
					<div class='col-sm-6'>
						<label for="passport" class='form-label'> <?= $lang->line('msg_passport') ?></label><br />
						<input id='passport' name='input_attachment_4_0' type='file' class='file file-doc form-control'>
					</div>
				</div>

				<div class='row'>
					<div class='col-sm-6'>
						<label for="recommendation_letters" class='form-label'> <?= $lang->line('msg_recommendation_letters') ?></label><br />
						<input id='recommendation_letters' name='input_attachment_5_0' type='file' class='file file-doc form-control'>
					</div>
					<div class='col-sm-6'>
						<label for="self_introduction" class='form-label'> <?= $lang->line('msg_3min') ?></label><br />
						<input id='self_introduction' name='input_attachment_6_0' type='file' class='file file-vdo form-control'>
					</div>
				</div>

				<div class='row'>
					<div class='col-sm-6'>
						<label for="teach_demo" class='form-label'> <?= $lang->line('msg_10min') ?></label><br />
						<input id='teach_demo' type='file' name='input_attachment_7_0' class='file file-vdo form-control'>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12'>
						<label for="q1" class='form-label'> <?= $lang->line('msg_fo_q1') ?></label><br />
						<textarea name='q1' class='form-control'><?=isset($t_fo) ? $t_fo['q1'] : ''?></textarea>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12'>
						<label for="q2" class='form-label'> <?= $lang->line('msg_fo_q2') ?></label><br />
						<textarea name='q2' class='form-control'><?=isset($t_fo) ? $t_fo['q2'] : ''?></textarea>
					</div>
				</div>	
				<div class='row'>
					<div class='col-sm-12'>
						<label for="q3" class='form-label'> <?= $lang->line('msg_fo_q3') ?></label><br />
						<textarea name='q3' class='form-control'><?=isset($t_fo) ? $t_fo['q3'] : ''?></textarea>
					</div>
				</div>	
				<div class='row'>
					<div class='col-sm-12'>
						<label for="q4" class='form-label'> <?= $lang->line('msg_fo_q4') ?></label><br />
						<textarea name='q4' class='form-control'><?=isset($t_fo) ? $t_fo['q4'] : ''?></textarea>
					</div>
				</div>	
				<div class='row'>
					<div class='col-sm-12'>
						<label for="q5" class='form-label'> <?= $lang->line('msg_fo_q5') ?></label><br />
						<textarea name='q5' class='form-control'><?=isset($t_fo) ? $t_fo['q5'] : ''?></textarea>
					</div>
				</div>	
				<div class='row'>
					<div class='col-sm-12'>
						<label for="q6" class='form-label'> <?= $lang->line('msg_fo_q6') ?></label><br />
						<textarea name='q6' class='form-control'><?=isset($t_fo) ? $t_fo['q6'] : ''?></textarea>
					</div>
				</div>	
				<div class='row'>
					<div class='col-sm-12'>
						<label for="sp_need" class='form-label'> <?= $lang->line('msg_special_needs') ?></label><br />
						<textarea name='sp_need' class='form-control'><?=isset($t_fo) ? $t_fo['sp_need'] : ''?></textarea>
					</div>
				</div>	
				<div class="row clearfix">
					<div class="col-md-12 column">
						<label for="tab_exp" class='form-label'> <?= $lang->line('msg_teaching_experience') ?></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_exp">
							<thead>
								<tr >
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_school_name') ?></th>
									<th class="text-center text-nowrap col-md-1"><?= $lang->line('msg_nation') ?></th>
									<th class="text-center text-nowrap col-md-1"><?= $lang->line('msg_level') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_position_held') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('msg_responsibilities') ?></th>
									<th class="text-center text-nowrap col-md-2"><?= $lang->line('msg_employment_start') ?></th>
									<th class="text-center text-nowrap col-md-2"><?= $lang->line('msg_employment_end') ?></th>
									<th class="text-center"><?= $lang->line('msg_contact_information') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(isset($t_teaching_exp)): ?>
<?php foreach ($t_teaching_exp as $item): ?>
								<tr id="<?= 'addr_exp'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_exp[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<input type="text" name='school_name[]' placeholder='School Name' class="form-control" value="<?= ($item['school_name']) ?>"/>
									</td>
									<td>
										<?=form_dropdown('teaching_exp_nation[]', $ary_cou, (isset($t_teaching_exp) ? $item['nation'] : ''), " class='form-control'"); ?>
									</td>
									<td>
										<?=form_dropdown('teaching_exp_level[]', $teaching_preference, (isset($t_teaching_exp) ? $item['level'] : ''), " class='form-control'"); ?>
									</td>
									<td>
										<input type="text" name='position_hold[]' placeholder='Position Held' class="form-control" value="<?= ($item['position_hold']) ?>"/>
									</td>
									<td>
										<input type="text" name='responsibilities[]' placeholder='Responsibilities' class="form-control" value="<?= ($item['responsibilities']) ?>"/>
									</td>
									<td>
										<div class="input-group date">
											<input type="text" name="employment_start[]" value='<?php echo isset($t_teaching_exp) ? date('Y-m-d',strtotime($item['employment_start'])) : '' ?>' class="form-control" readonly><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
										</div>
									</td>
									<td>
										<div class="input-group date">
											<input type="text" name="employment_end[]" value='<?php echo isset($t_teaching_exp) ? date('Y-m-d',strtotime($item['employment_end'])) : '' ?>' class="form-control" readonly><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
										</div>
									</td>
									<td>
										<input type="text" name='contact_fo[]' placeholder='Contact Information of Previous Supervisor' class="form-control" value="<?= ($item['contact']) ?>"/>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_exp'.count($t_teaching_exp) ?>'></tr>
<?php else: ?>
								<tr id='addr_exp0'>
									<td>
										1
										<input type='hidden' name='row_exp[]' value='1'>
									</td>
									<td>
										<input type="text" name='school_name[]' placeholder='School Name' class="form-control" required/>
									</td>
									<td>
										<?=form_dropdown('teaching_exp_nation[]', $ary_cou, '', " class='form-control' row='1'"); ?>
									</td>
									<td>
										<input type="text" name='position_hold[]' placeholder='Position Held' class="form-control" required/>
									</td>
									<td>
										<input type="text" name='responsibilities[]' placeholder='Responsibilities' class="form-control" required/>
									</td>
									<td>
										<div class="input-group date">
											<input type="text" name="employment_start[]" value='' class="form-control" required readonly><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
										</div>
									</td>
									<td><div class="input-group date">
											<input type="text" name="employment_end[]" value='' class="form-control" required readonly><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
										</div>
									</td>
									<td>
										<input type="text" name='contact_fo[]' placeholder='Contact Information of Previous Supervisor' class="form-control" required/>
									</td>
								</tr>
								<tr id='addr_exp1'></tr>
<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
				<a class="add_row btn btn-default pull-left" prefix='exp'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				<a class="delete_row pull-right btn btn-default" prefix='exp'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
				<div class='row mb20' ps='for_add_del_button'>
				</div>

			</form>
		</div>

	</div>

	<div class='row' style='margin-top:20px;margin-left:0px;'>
		<button id='btn_submit' required type="button" class="btn btn-primary">Save</button>
<!--
		<button type="button" class="btn btn-primary" onclick="history.back();">Back</button>
 -->
	</div>
	<!-- Modal -->
	<div class="modal fade" id="invalidModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Error!</h4>
				</div>
				<div class="modal-body">
					Please Check Input.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
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

<script src="<?php echo base_url(); ?>assets/js/teacher_create.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.zh-TW.js" charset="UTF-8"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fileinput.min.js"></script>
<script type="text/javascript">
<?php for($i=0; $i <2; $i++): ?>
	$("input[name=input_attachment_1_<?=$i ?>]").fileinput({
		dropZoneEnabled: true,
		dropZoneTitle: 'Drag & drop photo here',
		uploadUrl: "../upload/do_upload",
		showUpload: false,
		previewFileType: "image",
		allowedFileExtensions: ["jpg","jpeg","gif","png"],
	<?php if (isset($attachment[1])): ?>
		initialPreview: "<img src='<?php echo base_url(); ?>/uploads/<?= isset($t) ? $attachment[1][$i] : ''?>' class='file-preview-image'>",
	<?php endif; ?>
		uploadExtraData: function() {
			var obj = {};
			$('.file-photo').each(function() {
				var id = $(this).attr('id');
				obj['file_for'] = id;
				obj['func'] = 'create';
			});
			return obj;
		}
	});
<?php endfor; ?>
</script>

<?php if (isset($t)): ?>
<script type="text/javascript">
<?php for($i=2; $i <=5; $i++): ?>
	$("input[name=input_attachment_<?=$i ?>_0]").fileinput({
		dropZoneEnabled: false,
		uploadUrl: "../upload/do_upload",
		showUpload: false,
		previewFileType: "image",
		allowedFileExtensions: ["jpg","jpeg","gif","png","txt","pdf"],
	<?php if (isset($attachment[$i][0])): ?>
		initialPreview: "<img src='<?php echo base_url(); ?>/uploads/<?= isset($attachment[$i][0]) ? $attachment[$i][0] : ''?>' class='file-preview-image'>",
	<?php endif; ?>
		uploadExtraData: function() {
			var obj = {};
			$('.file').each(function() {
				var id = $(this).attr('id');
				obj['file_for'] = id;
				obj['func'] = 'create';
			});
			return obj;
		}
	});
<?php endfor; ?>
</script>
<?php endif; ?>

<?php if (isset($t)): ?>
<script type="text/javascript">
<?php for($i=6; $i <=7; $i++): ?>
	$("input[name=input_attachment_<?=$i ?>_0]").fileinput({
		dropZoneEnabled: false,
		uploadUrl: "../upload/do_upload",
		showUpload: false,
		previewFileType: "video",
		allowedFileTypes: ["video"],
	<?php if (isset($attachment[$i][0])): ?>
		initialPreview: 
			"<div class='file-preview-frame' id='' data-fileindex='' title=''>"+
				"<video width='375px' height='' controls>"+
					"<source src='<?php echo base_url(); ?>/uploads/<?= isset($attachment[$i][0]) ? $attachment[$i][0] : ''?>' type='video/mp4'>"+
				"</video>"+
			"</div>",
	<?php endif; ?>
		uploadExtraData: function() {
			var obj = {};
			$('.file').each(function() {
				var id = $(this).attr('id');
				obj['file_for'] = id;
				obj['func'] = 'create';
			});
			return obj;
		}
	});
<?php endfor; ?>
</script>
<?php endif; ?>


<script type="text/javascript">
<?php if (isset($t_hi)): ?>
	$('input[name=ent_time_start]').timepicker({
		showMeridian: false,
		minuteStep: 30,
		defaultTime: '<?= $t_hi['ent_time_start'] ?>'
	});
	$('input[name=ent_time_end]').timepicker({
		showMeridian: false,
		minuteStep: 30,
		defaultTime: '<?= $t_hi['ent_time_end'] ?>'
	});
<?php else: ?>
	$('.timepicker').timepicker({
		showMeridian: false,
		minuteStep: 30
	});
<?php endif; ?>
</script>