$(document).ready(function($) {
	$('.page_summary li').click(function(event) {
		$('.page_summary li').removeClass('selected');
		$(this).addClass('selected');
		var id_str = $(this).attr('id');
		var title_cn;
		switch(id_str){
			case 'li_one':
				title_cn = '企业介绍';
				break;
			case 'li_two':
				title_cn = '企业风采';
				break;
			default:
				break;
		}
		$('#title_cn').html(title_cn);
	});	
	$('.page_summary li a').mouseleave(function(event) {
		$(this).css('textDecoration','none');
	});
});