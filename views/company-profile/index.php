<?php
	use yii\helpers\Url;
	//设置title
	$this->title = '企业简介';
?>
<link rel="stylesheet" type="text/css" href="./plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/company_profile.css">

<div class="main_content">
	<div class="content_top">
		<p class="float_left">企业简介/</p>
		<span>Company Profile</span>
		<p class="float_right location"><img src="img/location.png" alt="">当前位置:&nbsp;&nbsp;<a href="<?php echo Url::to(['home/index']); ?>">首页</a>><span id="title_cn">企业简介</span></p>
	</div>
	<div class="content_middle">
		<div class="page_content btm_margin">
			<div class="page_top">
				<ul class="page_summary">
					<li id="li_one" data-target="#div_one" data-toggle="tab" class="selected"><a href="">企业介绍</a></li>
					<li id="li_two" data-target="#div_two" data-toggle="tab"><a href="">企业风采</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div id="div_one" class="page_middle tab-pane fade in active">
					<article>
						<img src="img/company_profile_1.png" alt="" class="float_left company_img1">
						<div class="split_div"></div>
						<img src="img/company_profile_2.png" alt="" class="float_right company_img2">
						<span class="article_title">哈尔滨利民经济开发区自来水公司</span>
						<span class="article_subTitle">HARBIN ECONOMIC DEVELOPMENT ZONE WARER COMPANY LIMITED</span>
						<hr>
						<p class="article_para">利民自来水公司成立于1995年，公司坐落于哈尔滨市江北利民开发区利民大道上，承担着整个利民开发区内的居民、企事业单位和大专院校的供水职能。公司始终以服务广大用户、服务地方经济社会发展为使命，把确保优质安全供水作为中心工作来抓，为区域经济发展、社会进步和人民生活质量的提高提供了有力的支持。</p>
						<p class="article_para">目前，公司现有正式职工215人，临时职工72人。下设收费、生产、稽查、业务、技术等部门和机构。公司现有第一水厂、第二水厂二个水厂，三个收费大厅，供水主管网(DN300以上)达130公里。为了满足供水需求，政府投入资金在二水厂院内新建一座日供水量为3万吨的现代化二期水厂，连同先期的两个自来水水厂，日供水能力达5.8万吨。供水区域30多平方公里，供水人口20多万。自公司合并以来，在公司资金紧张的情况下，每年投入资金用于旧管网的维修和改造，完善供水设施，并新建了现代化的水质检测化验室，能够检测12项常规指标，确保出厂水质100％符合国家标准。</p>

						<p class="article_para">公司经过多年的积淀和发展，在生产经营，供水服务、思想政治建设等方面硕果累累，曾获得呼兰区第二届、第四届劳动模范大会“模范集体”、“省级卫生先进单位”等荣誉称号。</p>
						<p class="article_para">千里之行，始于足下，我们将继续秉承优质供水，诚信服务的宗旨，以高度的责任感和使命感，群策群力，团结奋进，不懈努力，积极探索供水事业科学发展的新路子，以实际行动为区域经济发展、为供水事业撑起一片蓝天！</p>
	            	</article>
				</div>
				<div id="div_two" class="page_middle tab-pane fade in">
					<p class="mien_content">
						2017年5月23日为全力配合松江避暑城和波塞冬建设运营。我公司新增一条供水主管线。结合实际制定了合理的施工方案，并提前做好设备、材料、人员安排。针对时间紧、任务重的情况，公司调集雄厚的技术力量和施工力量，周密部署。争取6月16日彻底施工完毕恢复路面。在确保工程进度的同时，公司领导多次到现场督查施工情况，要求按规定做好安全防护措施强化安装质量责任意识。经员工加班加点施工工程于6月16日管线对接完工开始供水。工程完工后，彻底解决北京东路处企业以及日后城区建设居民用水量大的问题。
					</p>
					<div class="imgs_mien">
						<img src="img/company_mien_1.png" alt="">
						<img src="img/company_mien_2.png" alt="">
						<img src="img/company_mien_3.png" alt="">
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- jQuery -->
<script src="./plugins/jQuery/jquery-3.2.0.min.js"></script>
<!-- Bootstrap -->
<script src="./plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/company.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#three').addClass('li_active');
	});
</script>
