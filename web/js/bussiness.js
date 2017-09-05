$(document).ready(function($) {
	$('.nav_list li').click(function(event) {
		$('.nav_list li').removeClass('selected');
		$(this).addClass('selected');
		var id_str = $(this).attr('id');
		var title_cn;
		switch(id_str){
			case 'li_alipay':
				title_cn = '支付宝支付';
				break;
			case 'li_wechat':
				title_cn = '微信支付';
				break;
			case 'li_offline':
				title_cn = '线下支付';
				break;
			default:
				break;
		}
		$('#title_cn').html(title_cn);
	});	
	$('.nav_list li a').mouseleave(function(event) {
		$(this).css('textDecoration','none');
	});
});