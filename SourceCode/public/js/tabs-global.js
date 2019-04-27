$(document).ready(function(){
	$('.tabs-global-content:not(:first)').hide();
	$('.tabs-global li a').click(function(){

		
		$('.tabs-global li a').removeClass('pick');
		$(this).addClass('pick');
		$('.tabs-global-content').hide();

		var pickTab = $(this).attr('href');
		$(pickTab).fadeIn();
		return false
		
	})

})			