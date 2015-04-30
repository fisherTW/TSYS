$(function(){ 
	/* center modal */
	$('.modal').on('show.bs.modal', centerModals);
	$(window).on('resize', centerModals);
	
	$(window).on('keyup', function(e) {
		if (e.which == 13) {
			$("#btn_submit").click();
		}
	});
	$("#btn_submit").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;
		$('#myModal').modal('show');
		
		$.ajax({
			type: 'post',
			url: "teacher/t_dologin",
			data: $('.form-signin').serialize(),
			statusCode: {
				200: function(data) {
					f_200(data);
				},
				401: function(data) {
					f_401(data);
				}
			},
			error: function() {
			}
		});
	});
});

function f_200(data) {
	$('#myModal').modal('hide');

	var obj = JSON.parse(data);
	window.location = obj.prev.home_path;
}

function f_401(data) {
	$('#myModal').modal('hide');
	$('#authModal').modal('toggle');
}

/* center modal */
function centerModals(){
	$('.modal').each(function(i){
		var $clone = $(this).clone().css('display', 'block').appendTo('body');
		var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
		top = top > 0 ? top : 0;
		$clone.remove();
		$(this).find('.modal-content').css("margin-top", top);
	});
}