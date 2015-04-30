<div id="drawerExample" class="drawer dw-xs-10 dw-sm-9 dw-md-8 fold" aria-labelledby="drawerExample">
	<div class="drawer-controls">
		<a href="#drawerExample" data-toggle="drawer" href="#drawerExample" aria-foldedopen="false" aria-controls="drawerExample" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> <span class="badge">8</span></a>
	</div>
	<div class="drawer-contents">
		<div class="drawer-heading">
			<h2 class="drawer-title text-center"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></h2>
		</div>
		<div class="drawer-body">

			<div class="row">
<?php for($i=1; $i <= 12; $i++): ?>
				<div class='col-md-3'>
					<div class="card small">
						<div class="card-image">
							<img src="<?php echo base_url(); ?>assets/img/girl1.jpg">
							<span class="card-title">Card Title</span>
						</div>
						<div class="card-content">

						</div>
					</div>
				</div>
<?php endfor; ?>
			</div>

		</div>
	</div>
</div>

<div class='container-fluid'>
	<div class='row'>
		<div class='col-md-8 col-lg-9'>
			<table id='tbl_main'>
			</table>
		</div>
		<div class='col-md-4  col-lg-3'>
			<div class='row'>
				<div class='col-md-12'>
					<button type='button' id='btn_clear' class='btn btn-primary form-control mb10'><span class='glyphicon glyphicon-trash'></span> <?= $lang->line('ClearAllFilters') ?></button>
				</div>

			<div class="form-group">
				<label class="col-sm-12 control-label"> <?= $lang->line('msg_sex') ?></label>
				<div class="col-sm-12">
					<?=form_dropdown('sex', $ary_sex, '', " class='form-control' role='criteria'"); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-12 control-label"> <?= $lang->line('msg_visa') ?></label>
				<div class="col-sm-12">
					<?=form_dropdown('visa', $ary_visa, '', " class='form-control' role='criteria'"); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-12 control-label"> <?= $lang->line('msg_position_seeking') ?></label>
				<div class="col-sm-12">
					<?=form_dropdown('pos_seeking', $pos_seeking, '', " class='form-control' role='criteria'"); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-12 control-label"> <?= $lang->line('msg_teaching_preference') ?></label>
				<div class="col-sm-12">
					<?=form_dropdown('teaching_preference', $teaching_preference, '', " class='form-control' role='criteria'"); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-12 control-label"> <?= $lang->line('msg_recruiter') ?></label>
				<div class="col-sm-12">
					<?=form_dropdown('recruiter', $ary_e, '', " class='form-control' role='criteria'"); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-12 control-label"> <?= $lang->line('msg_contact_window') ?></label>
				<div class="col-sm-12">
					<?=form_dropdown('contact', $ary_e, '', " class='form-control' role='criteria'"); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-12 control-label"> <?= $lang->line('msg_nationality') ?></label>
				<div class="col-sm-12">
					<?=form_dropdown('nation', $ary_cou, '', " class='form-control' role='criteria'"); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-12 control-label"> <?= $lang->line('msg_current_location') ?></label>
				<div class="col-sm-12">
					<?=form_dropdown('current_location', $ary_cou, '', " class='form-control' role='criteria'"); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-12 control-label"> <?= $lang->line('msg_current_employment_status') ?></label>
				<div class="col-sm-12">
					<?=form_dropdown('current_employment_status', $ary_current_employment_status, '', " class='form-control' role='criteria'"); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-12 control-label"><?= $lang->line('TargetTeachingLanguage') ?></label>
				<div class="col-sm-12">
					<?=form_dropdown('lang', $ary_lang, '', " class='form-control' role='criteria'"); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-12 control-label"> <?= $lang->line('msg_educational_degree') ?></label>
				<div class="col-sm-12 mb10">
					
					<?=form_dropdown('degree', $ary_degree, '', " class='form-control' role='criteria'"); ?>
				</div>
			</div>

			</div>


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<form class='form'>

	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
			<span class='glyphicon glyphicon-filter'></span><?= $lang->line('msg_personality') ?></a></h4>
		</div>
		<div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
<?php for($i=1; $i <= count($ary_personality); $i++): ?>
				<div class="checkbox">
					<label>
					<input type="checkbox" value="<?=$i?>" name='cbx_personality[]' role='criteria'>
					<?=$ary_personality[$i]?>
					</label>
				</div>
<?php endfor; ?>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
			<span class='glyphicon glyphicon-filter'></span><?= $lang->line('msg_interest') ?></a></h4>
		</div>
		<div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
<?php for($i=1; $i <= count($ary_interest); $i++): ?>
				<div class="checkbox">
					<label>
					<input type="checkbox" value="<?=$i?>" name='cbx_interest[]' role='criteria'>
					<?=$ary_interest[$i]?>
					</label>
				</div>
<?php endfor; ?>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
			<span class='glyphicon glyphicon-filter'></span><?= $lang->line('msg_good') ?></a></h4>
		</div>
		<div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
<?php for($i=1; $i <= count($ary_good); $i++): ?>
				<div class="checkbox">
					<label>
					<input type="checkbox" value="<?=$i?>" name='cbx_good[]' role='criteria'>
					<?=$ary_good[$i]?>
					</label>
				</div>
<?php endfor; ?>
			</div>
		</div>
	</div>

	</form>

<!-- 
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <span class='glyphicon glyphicon-filter'></span> Filter by 工作性質
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
			<div class="checkbox">
				<label>
				<input type="checkbox" value="">
				HB 線上老師
				</label>
			</div>
			<div class="checkbox">
				<label>
				<input type="checkbox" value="">
				OB 線上菲師Full Time
				</label>
			</div>
			<div class="checkbox">
				<label>
				<input type="checkbox" value="">
				OB 線上菲師Part Time
				</label>
			</div>
			<div class="checkbox">
				<label>
				<input type="checkbox" value="">
				企業班講師
				</label>
			</div>
			<div class="checkbox">
				<label>
				<input type="checkbox" value="">
				中小學外師
				</label>
			</div>
			<div class="checkbox">
				<label>
				<input type="checkbox" value="">
				補習班外師
				</label>
			</div>
			<div class="checkbox">
				<label>
				<input type="checkbox" value="">
				校園種子師資
				</label>
			</div>
      </div>
    </div>
  </div>
 -->

</div>







		</div>
	</div>


</div>


<input type='hidden' id='hid_baseurl' value='<?=base_url(); ?>'>
<script src="<?php echo base_url(); ?>assets/js/teacher_index.js"></script>
<script src="<?php echo base_url(); ?>assets/js/drawer.min.js"></script>
<script type="text/javascript">
$(function () {
	$('#tbl_main').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url:'api/teachers',
		sortName:"id",
		sortOrder:"desc",
		showRefresh:"true",
		showToggle:"true",
		showColumns:"true",
		search:"true",
		clickToSelect: true,
		selectItemName:"toolbar1",
		rowStyle:"rowStyle",
		toolbar: "#custom-toolbar",
		sidePagination:"client",
		pagination:"true",
		pageSize: 50,
		pageList:"[10, 50, 100]",
		queryParams: function(p) {
			return {
				sex: $("select[name=sex]").val(),
				visa: $("select[name=visa]").val(),
				pos_seeking: $("select[name=pos_seeking]").val(),
				teaching_preference: $("select[name=teaching_preference]").val(),
				recruiter: $("select[name=recruiter]").val(),
				contact: $("select[name=contact]").val(),
				nation: $("select[name=nation]").val(),
				current_location: $("select[name=current_location]").val(),
				current_employment_status: $("select[name=current_employment_status]").val(),
				lang: $("select[name=lang]").val(),
				degree: $("select[name=degree]").val(),
				good: $("input[name='cbx_good[]']:checked")
					.map(function() { return $(this).val() })
					.get()
					.join(","),
				interest: $("input[name='cbx_interest[]']:checked")
					.map(function() { return $(this).val() })
					.get()
					.join(","),
				personality: $("input[name='cbx_personality[]']:checked")
					.map(function() { return $(this).val() })
					.get()
					.join(",")
			};
		},
		columns: [{
			checkbox: true
		},{
			field:'id' ,
			title:'<?= $lang->line('t_id') ?>',
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5",
			class:"text-nowrap"
		},{
			field:'sex' ,
			title: '<?= $lang->line('msg_sex') ?>',
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			formatter: sexFormatter,
			width:"5",
			class:"text-nowrap"
		},{
			field:'nation' ,
			title: '<?= $lang->line('msg_nation') ?>',
			halign:"center" ,
			align:"center" ,
			sortable:"true" ,
			formatter: countryFormatter,
			width:"5",
			class:"text-nowrap"
		},{
			field:'name_full' ,
			title: '<?= $lang->line('msg_full_name') ?>',
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			class:"text-nowrap"
		},{
			field:'is_enable' ,
			title: '<?= $lang->line('msg_enabled') ?>',
			halign:"center" ,
			align:"center" ,
			sortable:"true" ,
			width:"5",
			formatter: boolFormatter,
			class:"text-nowrap"
		},{
			field:'is_blacklist' ,
			title: '<?= $lang->line('msg_blacklist') ?>',
			halign:"center" ,
			align:"center" ,
			sortable:"true" ,
			width:"5",
			formatter: boolFormatter,
			class:"text-nowrap"
		},{
			field:'' ,
			title: '<?= $lang->line('msg_operation') ?>',
			halign:"center" ,
			align:"center",
			events: operateEvents,
			formatter: operateFormatter,
			width:"10",
			class:"text-nowrap"
		}]
	}).on('all.bs.table', function (e, data) {
		$('[data-toggle="tooltip"]').tooltip();
	});
})
</script>