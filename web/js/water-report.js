$(document).ready(function($) {
	$('.page_summary li').click(function(event) {
		$('.page_summary li').removeClass('selected');
		$(this).addClass('selected');
		var id_str = $(this).attr('id');
		var title_cn;
		switch(id_str){
			case 'li_one':
				title_cn = '水质报告';
				break;
			case 'li_two':
				title_cn = '用水常识';
				break;
			case 'li_three':
				title_cn = '给水系统';
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