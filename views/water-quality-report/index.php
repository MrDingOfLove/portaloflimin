<?php
	use yii\helpers\Url;
	//设置title
	$this->title = '水质报告';
?>
<link rel="stylesheet" type="text/css" href="./plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/water_quality.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">

<div class="main_content">
	<div class="content_top">
		<p  class="float_left">水质报告/</p>
		<span>Water Quality Report</span>
		<p class="float_right location"><img src="img/location.png" alt="">当前位置:&nbsp;&nbsp;<a href="<?php echo Url::to(['home/index']); ?>">首页</a>><span id="title_cn">水质报告</span></p>
	</div>
	<div class="content_middle">
		<div class="page_content">
			<div class="page_top">
				<ul class="page_summary">
					<li id="li_one" class="<?php if ($category == 'quality-report') echo "selected";?>" data-target="#div_one" data-toggle="tab"><a href="" >水质报告</a></li>
					<li id="li_two" class="<?php if ($category == 'common-sense') echo "selected";?>" data-target="#div_two" data-toggle="tab"><a href="">用水常识</a></li>
					<li id="li_three" class="<?php if ($category == 'supply-system') echo "selected";?>" data-target="#div_three" data-toggle="tab"><a href="" >给水系统</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="page_middle tab-pane fade in <?php if ($category == 'quality-report') echo "active";?>" id="div_one">
					<h3 class="report_title">利民开发区自来水出厂水水质监测报表</h3>
					<table class="report_table">
						<tr>
							<th rowspan="2">项目</th>
							<th rowspan="2">限值</th>
							<th colspan="2">监测点</th>
						</tr>
						<tr class="align_center">
							<th>A水样</th>
							<th>B水样</th>
						</tr>
						<tr>
							<td>色(度)</td>
							<td>15</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>浑浊度</td>
							<td>1</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>臭和味</td>
							<td>无异色异味</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>肉眼可见物</td>
							<td>无</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>PH值</td>
							<td>小于6.5大于8.5</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>总硬度 (以CaCO3计) (mg/L)</td>
							<td>450</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>铁 (mg/L)</td>
							<td>0.3</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>锰 (mg/L)</td>
							<td>0.1</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>硫酸盐 (mg/L)</td>
							<td>250</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>氧化物 (mg/L)</td>
							<td>250</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>溶解性总固体 (mg/L)</td>
							<td>1000</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>耗氧量 (mg/L)</td>
							<td>3</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>铬 (六价) (mg/L)</td>
							<td>0.05</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>硝酸盐 (以N计) (mg/L)</td>
							<td>10</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>亚硝酸盐氮 (mg/L)</td>
							<td>0.7</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>挥发酚类 (以苯酚) (mg/L)</td>
							<td>0.002</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>二氧化氯 (mg/L)</td>
							<td>≥0.1</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>阴离子洗涤剂 (mg/L)</td>
							<td>0.3</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>氟化物 (mg/L)</td>
							<td>1</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>菌落总数 (CFU/ml)</td>
							<td>100</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>总大肠杆菌 (100/ml)</td>
							<td>不得检出</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>粪大肠杆菌 (100/ml)</td>
							<td>不得检出</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>三氯甲烷 (mg/L)</td>
							<td>0.06</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>四氯化碳 (mg/L)</td>
							<td>0.002</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>氨氮 (mg/L)</td>
							<td>0.5</td>
							<td></td>
							<td></td>
						</tr>
					</table>
				</div>
				<div class="page_middle tab-pane fade in <?php if ($category == 'common-sense') echo "active";?>" id="div_two">
					<div class="kno_para">
						<h5 class="para_title" id="question1">一、为什么不得私自移动水表位置</h5>
						<p>水表装置部位是根据建筑设计而定的，产权属自来水公司所有，如私自移动表位，不仅违反《宁波市城市供水和节水用水管理条例》有关规定，而且会影响日常的抄表养护，甚至会损坏水表，造成用水困难。</p>
					</div>
					<div class="kno_para">
						<h5 class="para_title">二、如何查看水表用量</h5>
						<p class="para_list">1．水表计量单位为立方米(即吨)。以本月水表指示数减去上月水表指示数,就得出本月实用水量。<br />
							2．传统水表为指针式水表，十进位累进计数。水表指示数有个、十、 百、千四位数(黑盘),计算单位为立方米(吨),立方米以下有1/l0、1/l00、l/1000三位数(红盘)。读表时要掌握好进位方法,个位指针没走到0,十位表示数不得进位,其它各位的进位方法以此类推。<br />
							3．目前已有很多小区采用了直读式水表可从左到右按黑色指示数直读，计量单位为立方米（吨），红色示数可不读。</p>
					</div>
					<div class="kno_para">
						<h5 class="para_title">三、为什么自来水有时会发黄</h5>
						<p class="para_list">1．黄水现象在早晨刚开始用水时尤为明显，这主要是用户户内管道年久失修或使用了劣质的管材所致。用户应考虑更新户内管道。<br />
							2．发现一幢楼或几幢楼每户都发生水质发黄，而且长时间不能排清，主要原因是这部分用户处在室外共用配水管的末稍部位（未环网）。如果为用户配水的室外管道处在供水管道末稍，管网中的锈蚀水质进入，靠用户的用水量又不能排清，日积月累就形成了一段锈水区，在此段管道上用水的用户就会同时感到水质发黄，无法用水。出现这种情况，用户应及时与自来水公司联系，采取相应措施解决。
	                    </p>
					</div>
					<div class="kno_para">
						<h5 class="para_title" id="question2">四、水表冻坏、烫坏、砸坏怎么办</h5>
						<p>《宁波市城市供水和节约用水管理条例》规定用户有义务维护水表井卫生和水表的正常运行。总水表损坏后，用户不得自行维修，应关闭表前阀门，避免水量损失，即时通知自来水公司更换。</p>
					</div>
					<div class="kno_para">
						<h5 class="para_title">五、如何发现漏水</h5>
						<p>室内漏水：首先检查所有用水设备(水龙头、淋浴器、坐便器等)、阀门以及表井内有无漏水现象,如果以上设备无漏水现象, 再看计费水表走动情况,如不用水时水表继续匀速转动,说明有漏水，请通知产权单位检漏。<br /></p>
						<p>抽水马桶漏水：除有明显滴水声响可断定抽水马桶漏水。一般不易发觉，简单检查办法是在马桶水箱内滴入蓝墨水，搅匀后看马桶出水处有无蓝色水流出，如有则说明马桶有漏水。	</p>
					</div>
					<div class="kno_para">
						<h5 class="para_title">六、自来水为何有消毒水味</h5>
						<p>为确保自来水符合安全卫生要求，避免发生水媒传染病，自来水在净水处理过程经加氯消毒，且符合《饮用水水质标准》规定的余氯范围。对一般人而言，这种浓度的自来水闻起来或喝起来不会有明显的味道，只有少数嗅觉或味觉较敏感的人才会感觉到有消毒水味，这对人体健康并无影响。自来水有轻微的消毒水味，表示水质是卫生安全的。</p>
					</div>
					<div class="kno_para">
						<h5 class="para_title" id="question3">七、为什么自来水有时发浑、发白</h5>
						<p class="para_list">1．发浑的原因主要是因城市供水管道实发性爆管，抢修通水后由于水流方向、水压发生变化，可能造成局部、短时的浑水现象，很快就会恢复正常。<br />
							2．发白的原因主要是供水管网中溶入了空气，经压力作用分解成微小气泡（凭肉眼观察不到），气泡的紧密排列就会感觉到流出的水呈乳白色，当在容		器中静止数分钟后，随着气泡消失，水就会变清。这种现象不会影响到自来水水质。
						</p>
					</div>
					<div class="kno_para">
						<h5 class="para_title">八、室内水管震动、噪声的一般原因</h5>
						<p class="para_list">居民室内用水管有时会发生震动，产生噪声，影响居民的生活环境。发生震动产生噪声的原因实际上很复杂，一般有以下几种原因：<br />
							1、高层建筑内的减压阀失灵，用水管内压力过高。<br />
							2、地区水压间接性过高，造成室内用水管间接性震动。<br />
							3、室内管改装时，管道走向不合理，敷设在天花板或高位的用水管内积有空气。<br />
							4、抽水马桶闸门漏水、空气从抽水马桶进入用水管道。<br />
							5、多层屋顶水箱浮球阀失灵，造成连续撞击声，从管道上传到室内。<br />
							6、小区泵房之泵管的单向阀门阀板失灵，造成间接性抖动，噪声从管道上传入室内。<br />
							7、管道尽头积聚空气，水压变化时引起震动，传入室内管道。<br />
							8、室外进水管漏水，当室内突然大量用水，造成室外进水管瞬时负压，空气随水流进入室内管并积聚。</p>
					</div>
					<div class="kno_para">
						<h5 class="para_title" id="question4">九、如何做好用水设备的防冻保暖工作</h5>
						<p class="para_list">1．室外水管、龙头的防冻可用棉、麻织物或保暖材质包扎。<br />
							2．寒冷季节，请在临睡前关闭走廊和室内门窗，保持室温，同时关闭户表阀门，打开水龙头，放尽水管中剩水。<br />
							3．对已冷冻的龙头、水表、水管，宜先用热毛巾包裹水龙头，然后浇温水，使龙头解冻，再拧开龙头，用温水沿水龙头慢慢向管子浇洒，使水管解冻。		若浇至水表处仍不见有水流出，则说明水表也冻住了，此时再用热毛巾包在水表上。用温水（不高于30℃）浇洒，使水表解冻。切忌用火烘烤。</p>
					</div>
					<div class="kno_para">
						<h5 class="para_title">十、家里突然停水如何处理</h5>
						<p>若用户在没有接到通知的情况下突然停水（有计划停水会提前24小时在“宁波晚报”刊登“停水通知”或通知小区物业；突然性爆管停水，会在抢修的同时通知重大用户），首先应向左邻右舍询问是否有水，再检查水表阀门是否正常开启，或拨打我公司清泉热线96390进行查询。</p>
					</div>
				</div>
				<div class="page_middle tab-pane fade in <?php if ($category == 'supply-system') echo "active";?>" id="div_three">
					<p class="page_summary">给水系统的功能与组成</p>
					<span class="pic_title">给水系统是为人们的生活、生产和消防提供用水的设施总称</span>
					<img src="img/water_supply_1.png" alt="">
					<p class="page_summary">给水处理方法概述</p>
					<span class="pic_title">给水处理典型工艺流程</span>
					<img src="img/water_supply_2.png" alt="">
					<ul class="supply_promtp">
						<li><p>水处理方法的确定应根据水源水质和用水对象对水质的要求确定。</p></li>
						<li><p>给水处理的任务：是通过必要的出来方法去除水中对的杂质，使之符合生活应用或工业所要求的水质。</p></li>
					</ul>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- jQuery -->
<script src="./plugins/jQuery/jquery-3.2.0.min.js"></script>
<!-- Bootstrap -->
<script src="./plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/water-report.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#four').addClass('li_active');
	});
</script>