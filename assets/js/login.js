$(function(){ 
	$(".btn").bind("click",function(){
		$(".down").slideUp('slow');
		$(".ha").slideUp('slow', function(){
			window.location='../teacher';
		});
		
	});
});