<div class='container-fluid'>


	<div class='row'>
		<div class='col-md-8 col-lg-9'>
			<div class='row text-right'>
				<div class='col-md-8'>
				</div>
				<div class='col-md-4'>
					<button type='button' class='btn btn-warning hero-unit' onclick="window.location = window.location.pathname + '/create';"><span class='glyphicon glyphicon-plus'></span> Create</button>
				</div>
			</div>
			<table id='tbl_main' data-toggle="table" data-url='api/teachers' data-sort-name="id" data-sort-order="asc" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-row-style="rowStyle" data-side-pagination="client" data-pagination="true" data-page-list="[10, 50, 100]">
				<thead>
					<tr>
						<th data-halign="center" data-align="left" data-sortable="true" data-formatter="noFormatter" data-width="5">#</th>
						<th data-field='id' data-halign="center" data-align="left" data-sortable="true" data-width="5">UID</th>
						<th data-field='country' data-halign="center" data-align="center" data-formatter="countryFormatter" data-width="5">Nation</th>
						<th data-field='title' data-halign="center" data-align="left" data-sortable="true">Name</th>
						<th data-field='text' data-halign="center" data-align="left" data-formatter="textFormatter">Text</th>
						<th data-halign="center" data-align="center" data-formatter="operateFormatter" data-events="operateEvents" data-width="5">Operation</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		<div class='col-md-4  col-lg-3'>
			<div class='row'>
				<div class='col-md-12'>
					<button type='button' class='btn btn-primary form-control mb10' onclick=""><span class='glyphicon glyphicon-trash'></span> Clear All Filters</button>
				</div>

			<div class="form-group">
				<label class="col-sm-12 control-label">Employed Status</label>
				<div class="col-sm-12">
					<select class="form-control">
						<option>Probationary</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-12 control-label">聯絡窗口</label>
				<div class="col-sm-12">
					<select class="form-control">
						<option>Beatrice</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-12 control-label">Nation</label>
				<div class="col-sm-12">
					<select class="form-control">
						<option>Japan</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-12 control-label">語言</label>
				<div class="col-sm-12">
					<select class="form-control">
						<option>日文</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-12 control-label">學位</label>
				<div class="col-sm-12 mb10">
					<select class="form-control">
						<option>學士</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>

			</div>


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
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
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <span class='glyphicon glyphicon-filter'></span> Filter by 師資狀態
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
Tim 很帥
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <span class='glyphicon glyphicon-filter'></span> Filter by Attribute
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
Fisher 也是
      </div>
    </div>
  </div>
</div>







		</div>
	</div>


</div>


<input type='hidden' id='hid_baseurl' value='<?=base_url(); ?>'>
<script src="<?php echo base_url(); ?>assets/js/teacher_index.js"></script>