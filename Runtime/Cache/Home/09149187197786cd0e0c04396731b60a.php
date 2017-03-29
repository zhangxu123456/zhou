<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>上海信木投资有限公司</title>
	<meta http-equiv=X-UA-Compatible content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/style.css"/>
	<link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/default.css"/>
	<link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/swiper.css">
	<link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/bootstrap.css">
	<link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/main.css">
	<link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/animation.css">
	<link type="image/x-icon" href="<?php echo resize(C('SITE_ICON'),16,16); ?>" rel="icon">
    <link type="image/x-icon" href="<?php echo resize(C('SITE_ICON'),16,16); ?>" rel="bookmark">
</head>

<body class="clearfix">
<div id="wrapper">
<div class="header-top">
	<header class="navbar navbar-default navbar-fixed-top">
		<div class="container" style="padding-right:0;padding-left:0;box-sizing:border-box">
			<nav class="navbar navbar-default">
				<div class="container-fluid" style="padding-right:0;padding-left:0;box-sizing:border-box">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header" style="margin-right:15px;margin-left:15px;box-sizing:border-box">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><img src="/theguide/Themes/Home/default/Public/images/logo.png" alt=""></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right" style="margin:0;">
							<li><a href="/theguide/">首页</a></li>
							<li><a href="<?php echo U('/profile');?>">公司简介</a></li>
							<li><a href="<?php echo U('/goods/g6nyzx239w');?>">产品中心</a></li>
							<li><a href="<?php echo U('/question');?>">常见问题</a></li>
							<li><a href="<?php echo U('/news');?>">公司公告</a></li>
							<li><a href="<?php echo U('/contact');?>">联系我们</a></li>
							<!-- <li><button style="margin-right:10px;" type="submit" class="btn btn-default"><a style="width:30px;height:20px;display:block" href="<?php echo U('/register');?>">注册</a></button></li>
                            <li><button type="submit" class="btn btn-default"><a href="<?php echo U('/login');?>">登录</a></button></li> -->
							<li><strong><a class="btn btn-default" href="<?php echo U('/register');?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>注册</a></strong></li>

							<?php if(is_login()){ ?>
							<li><strong><a class="btn btn-default" href="<?php echo U('/information');?>"><?php echo session('user_auth.username') ?></a></strong></li>
							<?php }else{ ?>
							<li><strong><a class="btn btn-default" href="<?php echo U('/login');?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>登录</a></strong></li>
							<?php } ?>

							<li><strong><a class="btn btn-default" href="<?php echo U('/cart');?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
								<span id="cart-total"> <?php $t=session('cart_total');if(isset($t)){echo $t;}else{echo 0;} ?> </span></a></strong>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
	</header>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<div class="swiper-slide" style="background:url('/theguide/Themes/Home/default/Public/images/onepage-01-04.jpg') center center no-repeat;background-size:cover">
				<div class="edge-slide-content">
					<div class="edge-title-area">
						<div class="edge-title edge-title1" style="font-size : 3.125em;font-weight:bold;letter-spacing:1px;"></div>
						<div class="edge-desc edge-desc1" style=""></div>
					</div>
					<div class="edge-buttons edge-buttons1">
						<div class="mk-button mk-button-2 ">
							<a href="" >现在下载</a>
						</div>
						<div class="mk-button mk-button-3">
							<a href="">了解更多</a>
						</div>
					</div>
				</div>
			</div>
			<div class="swiper-slide" style="background:url('/theguide/Themes/Home/default/Public/images/onepage-01-021.jpg') center center no-repeat;background-size:cover">
				<div class="edge-slide-content">
					<div class="edge-title-area">
						<div class="edge-title edge-title2" style="font-size : 3.125em;font-weight:bold;letter-spacing:1px;">探索、梦想并创造</div>
						<div class="edge-desc edge-desc2" style="">未来星精准性交易系统,上海信木投资管理有限公司</div>
					</div>
					<div class="edge-buttons edge-buttons2">
						<div class="mk-button mk-button-2">
							<a href="">现在下载</a>
						</div>
						<div class="mk-button mk-button-3">
							<a href="">了解更多</a>
						</div>
					</div>
				</div>
			</div>
			<div class="swiper-slide" style="background:url('/theguide/Themes/Home/default/Public/images/main-slide-prev.jpg') center center no-repeat;background-size:cover">
				<div class="edge-slide-content">
					<div class="edge-title-area">
						<div class="edge-title edge-title3" style="font-size : 3.125em;font-weight:bold;letter-spacing:1px;">领路者</div>
						<div class="edge-desc edge-desc3" style="">未来星精准性交易系统,上海信木投资管理有限公司</div>
					</div>
					<div class="edge-buttons edge-buttons3">
						<div class="mk-button mk-button-2">
							<a href="">现在下载</a>
						</div>
						<div class="mk-button mk-button-3">
							<a href="">了解更多</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="swiper-pagination"></div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>
</div>

<div class="main clearfix">
	<div class="js-intro-scene clearfix">
		<div class="content">
			<h3>未来星</h3>
			<h4>The Guide</h4>
			<div class="scene-text">
				未来星精准性交易系统，是由上海信木投资管理有限公司投入巨资历时数载研制开发出的一款创新型交易系统。基于时空理论和分界线原理，应用混沌理论、碎花瓶理论的幂律分布，从计量经济学的横截面数据（Cross-sectional Data）和时间序列数据（Time-series Data）角度,运用以下方法通过大数据高速云计算。
			</div>
			<div class="scene-icon">
				<dl>
					<dt class="hi-icon">
						<img src="/theguide/Themes/Home/default/Public/images/hi-icon-one.png" alt="">
					</dt>
					<dd>概率论与数理统计</dd>
				</dl>
				<dl>
					<dt class="hi-icon">
						<img src="/theguide/Themes/Home/default/Public/images/hi-icon-two.png" alt="">
					</dt>
					<dd>数值分析</dd>
				</dl>
				<dl>
					<dt class="hi-icon">
						<img src="/theguide/Themes/Home/default/Public/images/hi-icon-three.png" alt="">
					</dt>
					<dd>随机过程</dd>
				</dl>
			</div>
		</div>
	</div>
	<!--look 浏览量-->
	<div class="js-intro-look clearfix">
		<div class="browse clearfix">
			<dl>
				<dt>1120</dt>
				<dd>浏览</dd>
			</dl>
			<dl>
				<dt>2350</dt>
				<dd>关注</dd>
			</dl>
			<dl>
				<dt>5410</dt>
				<dd>投入</dd>
			</dl>
		</div>
		<div class="content clearfix">
			<div class="numbers__card numbers__card--01 js-numbers-card">
				<img src="/theguide/Themes/Home/default/Public/images/iphones.png" alt="iphone mockup free" class="numbers__card_img">
			</div>
			<div class="numbers__card numbers__card--02 js-numbers-card">
				<img src="/theguide/Themes/Home/default/Public/images/mountain.png" alt="free ipad mockup" class="numbers__card_img">
			</div>
			<div class="numbers__card numbers__card--03 js-numbers-card">
				<img src="/theguide/Themes/Home/default/Public/images/track.png" alt="free bootstrap 4 uikit" class="numbers__card_img">
			</div>
			<div class="numbers__card numbers__card--04">
				<img src="/theguide/Themes/Home/default/Public/images/iPad-snow.png" alt="">
			</div>
			<div class="numbers__card numbers__card--05 js-numbers-card">
				<img src="/theguide/Themes/Home/default/Public/images/macbook.png" alt="download bootstrap 3 uikit" class="numbers__card_img">
			</div>
			<div class="numbers__card numbers__card--06 js-numbers-card">
				<img src="/theguide/Themes/Home/default/Public/images/space.png" alt="1170px grid uikit" class="numbers__card_img">
			</div>
			<div class="numbers__card numbers__card--07">
				<img src="/theguide/Themes/Home/default/Public/images/golden_mac_acne.png" alt="sass scss uikit" class="numbers__card_img">
			</div>
			<div class="link"></div>
		</div>
	</div>
	<!---->
	<div class="categories clearfix">
		<h2 class="title">两大原理</h2>
		<?php if(is_array($princ)): $i = 0; $__LIST__ = $princ;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key == 0): ?><div class="content clearfix">
					<?php if(is_array($vo["lv1"])): $i = 0; $__LIST__ = $vo["lv1"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><div class="categories__card categories__card--0<?php echo ($key+1); ?>">
							<img src="/theguide/uploads/image/<?php echo ($vv["image"]); ?>" alt="">
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
					<h3><?php echo ($vo["title"]); ?></h3>
					<div class="categories__card categories__card--06">
						<?php echo ($vo["content"]); ?>
					</div>
				</div>
			<?php else: ?>
				<div class="frequency clearfix">
					<div class="content clearfix">
						<h3><?php echo ($vo["title"]); ?></h3>
						<div class="frequency__card--01">
							<?php echo ($vo["content"]); ?>
						</div>
						<?php if(is_array($vo["lv1"])): $i = 0; $__LIST__ = $vo["lv1"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><div class="frequency__card frequency__card--0<?php echo ($key+2); ?>">
								<img src="/theguide/uploads/image/<?php echo ($vv["image"]); ?>" alt="">
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		
	</div>

	<div class="advantage clearfix">
		<div class="content clearfix">
			<h2 class="title">三大优势</h2>
			<div class="box-con clearfix">
				<div class="left">01</div>
				<div class="center">
					<h5><?php echo ($advan[0]["title"]); ?></h5>
					<div class="text">
						<?php echo ($advan[0]["content"]); ?>
					</div>
					<div class="icon"></div>
				</div>
				<div class="right">
					<img src="/theguide/uploads/image/<?php echo ($advan[0]["image"]); ?>" alt=""/>
				</div>
			</div>
		</div>
		<div class="content content-two clearfix">
			<div class="box-con clearfix">
				<div class="left">02</div>
				<div class="center">
					<h5><?php echo ($advan[1]["title"]); ?></h5>
					<div class="text">
						<?php echo ($advan[1]["content"]); ?>
					</div>
					<div class="icon"></div>
				</div>
				<div class="right">
					<img src="/theguide/uploads/image/<?php echo ($advan[1]["image"]); ?>" alt=""/>
				</div>
			</div>
		</div>
		<div class="content content-three clearfix">
			<div class="box-con clearfix">
				<div class="left">03</div>
				<div class="center">
					<h5><?php echo ($advan[2]["title"]); ?></h5>
					<div class="text">
						<?php echo ($advan[2]["content"]); ?>
					</div>
					<div class="icon"></div>
				</div>
				<div class="right">
					<img src="/theguide/uploads/image/<?php echo ($advan[2]["image"]); ?>" alt=""/>
				</div>
			</div>
		</div>
	</div>
	<!---->
	<div class="Strategy">
		<div class="title">三剑合一策略</div>
		<div class="content">
			<ul class="clearfix">
				<li>
					<dt><h6>穿剑:建仓</h6></dt>
					<dd>
						<p>有信号：趋势不阻挡信号</p>
						<p>多头建仓：黑屏后，出现向上箭头且趋势线不为橙色（银色或蓝色）</p>
						<p>空头建仓：黑屏后，出现向下的箭头且趋势线不为蓝色（银色或橙色）</p>
						<p>无信号：根据趋势建仓</p>
						<p>多头建仓：黑屏后，没有箭头，趋势线为蓝色且价格出现在趋势线上方</p>
						<p>空头建仓：黑屏后，没有箭头，趋势线为橙色且价格出现在趋势线下方</p>
					</dd>
				</li>
				<li>
					<dt><h6>破剑：止损</h6></dt>
					<dd>
						<p>手动止损：出现完全的反向建仓条件</p>
						<p>多头止损：出现向下箭头，且趋势线由蓝变灰、由蓝变橙、由灰变橙</p>
						<p>空头止损：出现向上箭头，且趋势线由橙变灰、由橙变蓝、由灰变蓝。</p>
						<p>自动止损：30满额保护止损</p>
						<p>多头建仓：黑屏后，没有箭头，趋势线为蓝色且价格出现在趋势线上方</p>
					</dd>
				</li>
				<li>
					<dt><h6>收剑</h6></dt>
					<dd>
						<p>收剑-26点止盈</p>
					</dd>
				</li>
			</ul>
		</div>
		<div class="tandem__box">
			<div class="tandem__photo photo-one">
				<img src="/theguide/Themes/Home/default/Public/images/feature_design.png" alt=""/>
			</div>
			<div class="tandem__photo photo-two">
				<img src="/theguide/Themes/Home/default/Public/images/feature_code.png" alt=""/>
			</div>
			<div class="tandem__box--black"></div>
			<div class="tandem__box--blue"></div>
		</div>
	</div>
	<!---->
	<div class="jumbotron--black clearfix">
		<div class="title">ATOM质子交易</div>
		<div class="content clearfix">
			<ul class="clearfix">
				<li>
					<dt><img src="/theguide/Themes/Home/default/Public/images/jumbotron-one.png" alt=""></dt>
					<dd>微型交易，交易不超过500美元</dd>
				</li>
				<li>
					<dt><img src="/theguide/Themes/Home/default/Public/images/jumbotron-two.png" alt=""></dt>
					<dd>初次面对外汇的客户，增加客户的体验</dd>
				</li>
				<li>
					<dt><img src="/theguide/Themes/Home/default/Public/images/jumbotron-three.png" alt=""></dt>
					<dd>在符合条件的前提下领两层客户的佣金</dd>
				</li>
			</ul>
		</div>
		<p class="more">了解更多</p>
	</div>
	<div class="jumbotron-video">

	</div>
	<div class="jumbotron-node">
		<div class="title">
			<h2>软件试用重要提示</h2>
			<p>Software trial important note</p>
		</div>
		<div class="content">
			<h3>建议新客户先到视频课堂听讲并配合微直播学习15天之后，再下载软件试用，以避免在免费试用期内未掌握未来星基本原理和技巧，无规则进场交易产生不必要的损失</h3>
			<ul>
				<a href="http://www.cmcgc.live" target="_blank"><li><p>视频直播</p></li></a>
				<li><p>85qv</p></li>
				<li><p>微直播</p></li>
			</ul>
			<a href="https://pan.baidu.com/s/1bpA8Lp9" target="_blank"><p class="more">立即下载未来星</p></a>
		</div>
	</div>
</div>

<div class="foot">
	<div class="top">
		<ul class="clearfix">
			<li><a href="">关于我们</a><span>|</span></li>
			<li><a href="">产品中心</a><span>|</span></li>
			<li><a href="">动态专栏</a><span>|</span></li>
			<li><a href="">联系我们</a><span>|</span></li>
			<li><a href="">友情链接</a></li>
		</ul>
		<p>
			<span>上海</span>
			<span>无锡</span>
			<span>济南</span>
			<span>武汉</span>
			<span>广州</span>
		</p>
	</div>
	<div class="center">
		<img src="/theguide/Themes/Home/default/Public/images/senmous-img.jpg" alt="">
	</div>
	<div class="bootom">
		© 2015 NEXTEV LIMITED All Rights Reserved 沪ICP备15026264号-1
	</div>
</div>
</div>
<script src='/theguide/Themes/Home/default/Public/js/jquery.min.js'></script>
<script src="/theguide/Themes/Home/default/Public/js/Preload.js"></script>
<script src="/theguide/Themes/Home/default/Public/js/bootstrap.js"></script>
<script src="/theguide/Themes/Home/default/Public/js/swiper.js"></script>
<script src="/theguide/Themes/Home/default/Public/js/main.js"></script>
<script>
	var elements = [
		'/theguide/Themes/Home/default/Public/images/onepage-01-04.jpg',
		'/theguide/Themes/Home/default/Public/images/onepage-01-04.jpg',
		'/theguide/Themes/Home/default/Public/images/main-slide-prev.jpg',
		'/theguide/Themes/Home/default/Public/images/iphones.png',
		'/theguide/Themes/Home/default/Public/images/mountain.png',
		'/theguide/Themes/Home/default/Public/images/track.png',
		'/theguide/Themes/Home/default/Public/images/iPad-snow.png',
		'/theguide/Themes/Home/default/Public/images/macbook.png',
		'/theguide/Themes/Home/default/Public/images/space.png',
		'/theguide/Themes/Home/default/Public/images/golden_mac_acne.png',
		'/theguide/Themes/Home/default/Public/images/feature_design.png',
		'/theguide/Themes/Home/default/Public/images/feature_code.png'

	];
	var preload = new Preload();
	preload.init( 'wrapper', elements, function() {

	});
</script>

</body>
</html>