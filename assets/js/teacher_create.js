var $form1 = $('#form1');

$('#btn_submit').click(function() {
	if($("form")[0].checkValidity()) {
		$.ajax({
			type: "POST",
			url: "../api/teacher",
			data: $form1.serialize(),
			statusCode: {
				200: function() {
					alert("成功新增");
					history.back();
				}
			},
			error: function() {
				alert('新增失敗');
			}
		})
	} else {
		console.log("invalid form");
	}
});