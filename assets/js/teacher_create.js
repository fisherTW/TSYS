var $form1 = $('#form1');
var i_reward = 1;
var i_warning = 1;
var i_contact = 1;
var i_exp = 1;

$(document).ready(function(){
	var i_reward = $("#tab_reward" + " tr").length - 2;
	var i_warning = $("#tab_warning" + " tr").length - 2;
	var i_contact = $("#tab_contact" + " tr").length - 2;
	var i_exp = $("#tab_exp" + " tr").length - 2;
	$('.nav-tabs li').hide();

	$('.file').on('fileuploaded', function(event, data, previewId, index) {
		$('input[name=' + data.response.key + ']').val(data.response.new_name);
		//alert(data.extra);
		//$(".file").fileinput('refresh', {showUpload: false});
	});

	$('.input-group.date').datepicker({
		format: "yyyy-mm-dd",
		todayBtn: "linked",
		language: "zh-TW",
		autoclose: true,
		todayHighlight: true
	});

	var obj_hid_forms = JSON.parse($('#hid_forms').val());
	for(var i=0; i < obj_hid_forms.length; i++) {
		$('#li_' + obj_hid_forms[i]).show();
	}

	if($('input[name=birth_date]').val().length == 0) {
		$('.input-group.date').datepicker('setDate', new Date());
		$('.input-group.date').datepicker('update');
	}

	// 企業班
	$('.hi_eng_ent').hide();
	if($("input[name='cbx_lang_hi_wish[]'][value='14']").is(":checked")) {
		$('.hi_eng_ent').show();	
	}

	// none handle
	$('#cbx_visa_none').change(function () {
		if($('#cbx_visa_none').prop('checked')) {
			$("input[name='cbx_visa[]']").prop('checked',false);
		}
	});
	$("input[name='cbx_visa[]']").change(function () {
		if(checkcheck('cbx_visa[]')) {
			$('#cbx_visa_none').prop('checked',false)
		}
	});
	$('#cbx_certificate_none').change(function () {
		if($('#cbx_certificate_none').prop('checked')) {
			$("input[name='cbx_certificate[]']").prop('checked',false);
		}
	});
	$("input[name='cbx_certificate[]']").change(function () {
		if(checkcheck('cbx_certificate[]')) {
			$('#cbx_certificate_none').prop('checked',false)
		}
	});

	// 企業班
	$("input[name='cbx_lang_hi_wish[]'][value='14']").change(function () {
		$('.hi_eng_ent').toggle();
	});

	// Educational Degree
	$('.cbx_degree').change(function () {
		if($(this).prop('checked')) {
			$("input[name=degree_year_" + $(this).val() + "]").prop('required',"required");
			$("input[name=degree_school_" + $(this).val() + "]").prop('required',"required");
		} else {
			$("input[name=degree_year_" + $(this).val() + "]").removeAttr('required');
			$("input[name=degree_school_" + $(this).val() + "]").removeAttr('required');
		}
	});

	$(".add_row").click(function() {
		var prefix = $(this).attr("prefix");
		var tmp = 'i_' +  prefix;
		var i  = eval(tmp);

		//var i = $("#tab_" + prefix + " tr").length - 2;
		$('#addr_' + prefix + i).html($('#addr_' + prefix +'0').html());
		$('#addr_' + prefix + i).children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().first().html((i + 1) + "<input type='hidden' name='row_" + prefix + "[]' value='" + (i + 1) + "'>");	// replace #

		$("#tab_" + prefix + " input[row=" + (i + 1) + "]").each(function() {
			$(this).val('');
		});

		$('#tab_' + prefix).append('<tr id="addr_'+ prefix + (i+1)+'"></tr>');
		var str = tmp + " = " + eval(tmp) + "+1";
		eval(str);

		$('.input-group.date').datepicker({
			format: "yyyy-mm-dd",
			todayBtn: "linked",
			language: "zh-TW",
			autoclose: true,
			todayHighlight: true
		});
	});

	$(".delete_row").click(function() {
		var prefix = $(this).attr("prefix");
		var tmp = 'i_' +  prefix;
		var i  = eval(tmp);

		if(i>1){
			$("#addr_" + prefix + (i-1)).html('');
			$("#addr_" + prefix + i).remove();
			var str = tmp + " = " + eval(tmp) + "-1";
			eval(str);
		}
	});
});

$('#btn_submit').click(function() {
	var valid_form = true;

	var j=JSON.parse($('#hid_forms').val());
	for(var i=0; i < j.length; i++) {
		switch(j[i]) {
			case 'basic':
				valid_form = valid_form & $("form")[0].checkValidity();
				break;
			case 'hi':
				valid_form = valid_form & $("form")[1].checkValidity();
				break;
			case 'fo':
				valid_form = valid_form & $("form")[2].checkValidity();
				break;
		}
	}

	if(valid_form) {
		$('#myModal').modal('show');

		var submitType = "POST";
		if($('#hid_id').val().length > 0) {
			submitType = "PUT";
		}
		$.ajax({
			type: submitType,
			url: $('#hid_base_url').val() + "api/teacher",
			//data: $form1.serialize(),
			data: $('.form').serialize(),
			statusCode: {
				200: function() {
					alert("操作成功");
					$('#myModal').modal('hide');
					//window.location = $('#hid_base_url').val() + "teacher";
				}
			},
			error: function() {
				$('#myModal').modal('hide');
				alert('操作失敗');
			}
		})
	} else {
		$('#invalidModal').modal('show');
	}
});

$('#rdo_work_hour_0').click(function() {
	$('#txt_work_hour').val('');
	$('#txt_work_hour').prop('required',false);
});
$('#rdo_work_hour_n0').click(function() {
	$('#txt_work_hour').prop('required',true);
});
$('#txt_work_hour').keyup(function() {
	$('#rdo_work_hour_n0').prop('checked','checked');
});

function checkcheck(name) {
	var ret = false;
	$("input[name='" + name + "']").each(function() {
        if ($(this).is(":checked")) {
            ret = true;
        }
    });

    return ret;
}