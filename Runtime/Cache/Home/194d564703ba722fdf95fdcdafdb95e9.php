<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>公司简介</title>
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <script src="/theguide/Common/bt/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/style.css"/>
    <link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/default.css"/>
    <link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/bootstrap.css">
    <link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/main.css">
    <link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/animation.css">
    <!-- <link rel="shortcut icon" href="/bitbug_favicon.ico"> -->
    <link type="image/x-icon" href="<?php echo resize(C('SITE_ICON'),16,16); ?>" rel="icon">
    <link type="image/x-icon" href="<?php echo resize(C('SITE_ICON'),16,16); ?>" rel="bookmark">
</head>
<body>
<header class="navbar navbar-default navbar-fixed-top" style="border-bottom:1px solid red; height:100px;">
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
                        <li><a class="active" href="<?php echo U('/profile');?>">公司简介</a></li>
                        <li><a href="<?php echo U('/goods');?>">产品中心</a></li>
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

  <script src="/theguide/Common/js/jquery/jquery-1.10.2.min.js"></script>
  <script src="/theguide/Common/js/jquery/jquery-migrate-1.2.1.min.js"></script>
  <script src="/theguide/Common/bt/js/bootstrap.min.js"></script>
<article class="header question">
</article>
<div class="main itemlist">
    <div class="container">
        <div class="row">
            <!-- <column class="col-sm-3 col-xs-12">
	<div class="block block-account">
		<div class="block-title">
			<span>会员中心</span>
		</div>
		<div class="block-content">
			<ul>
				<li>
					<a href="<?php echo U('/order');?>">我的订单</a>
				</li>
				<li>
					<a href="<?php echo U('/account');?>">联系方式</a>
				</li>
				<li>
					<a href="<?php echo U('/password');?>">修改密码</a>
				</li>
				<li>
					<a href="<?php echo U('/address');?>">地址簿</a>
				</li>
				<li>
                    <a href="<?php echo U('/information');?>">个人资料</a>
                </li>
				<li>
					<a href="<?php echo U('/logout');?>">退出</a>
				</li>
			</ul>
		</div>
	</div>
</column> -->


<div class="lt">
    <ul class="list-group">
        <li class="list-group-item icon">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            <a href="<?php echo U('/order');?>">我的订单</a>
        </li>
        <li class="list-group-item icon">
            <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
            <a href="<?php echo U('/add_address');?>">新增地址</a>
        </li>
        <li class="list-group-item icon">
            <span class="glyphicon glyphicon-cloud" aria-hidden="true"></span>
            <a href="<?php echo U('/address');?>">邮寄地址</a>
        </li>
        <li class="list-group-item icon">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            <a href="<?php echo U('/information');?>">个人资料</a>
        </li>
        <li class="list-group-item icon">
            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
            <a href="<?php echo U('/logout');?>">退出</a>
        </li>

        <!-- <li class="list-group-item active">
            <h5><span class="glyphicon glyphicon-th" aria-hidden="true" style="margin-right:10px;font-size:20px;vertical-align:bottom"></span>我的产品</h5>
        </li> -->
        <!-- <li class="list-group-item icon">
            <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
            <a href="<?php echo U('/cart');?>">未付款订单</a>
        </li>
        <li class="list-group-item icon">
            <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
            <a href="./have-deliver.html">已付款订单</a>
        </li>
        <li class="list-group-item icon">
            <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
            <a href="./no-goods.html">未发货</a>
        </li>
        <li class="list-group-item icon">
            <span class="glyphicon glyphicon-cloud" aria-hidden="true"></span>
            <a href="./invoice.html">发票</a>
        </li>
        <li class="list-group-item icon">
            <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
            <a href="./cdkey.html">领取激活码</a>
        </li>
        <li class="list-group-item icon active">
            <h5>
                <span id="glyphicon-cog" class="glyphicon glyphicon-user" aria-hidden="true" style="margin-right:10px;font-size:20px;vertical-align:bottom"></span>
                <a href="<?php echo U('/information');?>" style="color:#fff;">个人资料</a>
            </h5>
        </li>
        <li class="list-group-item icon ">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            <a href="<?php echo U('/information');?>">账户设置</a>
        </li>
        <li class="list-group-item icon">
            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
            <a href="./security.html">安全设置</a>
        </li> -->
        
    </ul>
</div>
            <div class="ct  w100">
                <pre><h4><?php echo ($action_title); ?></h4></pre>
                <div class="form-horizontal" style="width:60%;margin:0 auto;">
                	<fieldset>
						 <?php if(!empty($_GET['id'])): ?><input name="address_id" type="hidden" value="<?php echo ($_GET['id']); ?>" /><?php endif; ?>
						<div class="form-group required clearfix">
							<label class="col-sm-2 control-label">收货人:</label>
							<div class="col-sm-5">
								<input type="text" class="form-control"  value="<?php echo ((isset($address["name"]) && ($address["name"] !== ""))?($address["name"]):''); ?>" name="name">
							</div>
						</div>
						<div class="form-group required clearfix">
							<label class="col-sm-2 control-label">联系电话:</label>
							<div class="col-sm-5">
								<input type="text"  class="form-control" value="<?php echo ((isset($address["telephone"]) && ($address["telephone"] !== ""))?($address["telephone"]):''); ?>" name="telephone">
							</div>
						</div>
						<div class="form-group required clearfix">
							<label class="col-sm-2 control-label">收货地址:</label>
							<div class="col-sm-5">
								<input type="text" class="form-control"  value="<?php echo ((isset($address["address"]) && ($address["address"] !== ""))?($address["address"]):''); ?>" name="address">
							</div>
						</div>
						<div class="form-group required clearfix">
							<label class="col-sm-2 control-label">发票抬头:</label>
							<div class="col-sm-5">
								<input type="text" class="form-control"  value="<?php echo ((isset($address["invoice"]) && ($address["invoice"] !== ""))?($address["invoice"]):''); ?>" name="invoice">
							</div>
						</div>
					</fieldset>
					<div class="buttons clearfix">
						<div class="left" style="margin-left:15px;width:60%;text-align:center">
							<button class="btn btn-primary " id="submit" type="submit">提交</button>
						</div>
					</div>
                </div>
            </div>
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
<script type="text/javascript">
	$('#submit').live('click', function() {
		$.ajax({
			url: '<?php echo ($action); ?>',
			type: 'post',
			data: $('input[type=\'text\'],input[type=\'hidden\']'),
			dataType: 'json',
			beforeSend: function() {
				$('#submit').attr('disabled', true);
				$('#submit').after('<span class="wait">&nbsp;<img src="/theguide/Themes/Home/default/Public/images/loading.gif" alt="" /></span>');
			},	
			complete: function() {
				$('#submit').attr('disabled', false); 
				$('.wait').remove();
			},			
			success: function(json) {
				$('.warning, .error').remove();
						
				if (json['redirect']) {		
						
					location = json['redirect'];
					
				} else if (json['error']) {		
								
					if (json['error']['name']) {
						$("input[name='name']").after('<span class="error">' + json['error']['name'] + '</span>');
					}							
					
					if (json['error']['telephone']) {
						$("input[name='telephone']").after('<span class="error">' + json['error']['telephone'] + '</span>');
					}				
																			
					if (json['error']['address']) {
						$("input[name='address']").after('<span class="error">' + json['error']['address'] + '</span>');
					}	
					
					if (json['error']['area']) {
						$('#area').after('<span class="error">' + json['error']['area'] + '</span>');
					}
																																				
				}  
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});	
	});

</script>

</body>
</html>