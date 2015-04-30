var $form1 = $('#form1');

$('#btn_submit').click(function() {
	var step_now	= $('#btn_submit').attr('step_now');
	var step_next	= $('#btn_submit').attr('step_next');
	var is_check = false;

	if(step_now == 1) {
		var is_check_cbx = false;
		var is_repass	 = false;

		if($("input[name='cbx_type[]']:checked").length != 0) is_check_cbx = true;
		if($("#txt_password").val() == $("#txt_repass").val()) is_repass = true;

		is_check = is_check_cbx & is_repass & $("form")[0].checkValidity();
	} else {
		is_check = $("form")[0].checkValidity();
	}

	if(is_check) {
		$('#myModal').modal('toggle');
//		$.ajax({
//			type: "POST",
//			url: "./" + step_now.toString() + "e",
//			data: $form1.serialize(),
//			statusCode: {
//				200: function() {
//					window.location = step_next;
//				}
//			},
//			error: function() {
//			}
//		});
		$.ajax({
			type: "POST",
			url: "./" + step_now.toString() + "e",
			data: $form1.serialize(),
			statusCode: {
				200: function(ret) {
					if(ret.toString() === '0') {
						$('#myModal').modal('toggle');
						alert('Duplicate Account!');
					} else {
						window.location = $('#hid_base_url').val() + "teacher/create";
					}
					//window.location = step_next;
				}
			},
			error: function() {
			}
		});
	} else {
		$('.alert').show();
	}
});

if($('#btn_back')) {
	$('#btn_back').click(function() {
		var step_back	= parseInt($('#btn_submit').attr('step_now')) - 1;
		window.location = step_back;
	});
}