$(function() {
	$.ajax({
		type: "GET",
		url: "../api/teacher",
		data: { id: $('#hid_id').val() }
	})
	.done(function( ret ) {
		drawForm(ret);
	});
});

function drawForm(ret) {
	$('#title').val(ret.title);
	$('#text').val(ret.text);
	$('select[name=country]').selectpicker('val', ret.country);
}

var $form1 = $('#form1');

$('#btn_submit').click(function() {
	if($("form")[0].checkValidity()) {
		$.ajax({
			type: "PUT",
			url: "../api/teacher",
			data: $form1.serialize(),
			statusCode: {
				200: function() {
					alert("成功修改");
					history.back();
				}
			},
			error: function() {
				alert('修改失敗');
			}
		})
	} else {
		console.log("invalid form");
	}
});