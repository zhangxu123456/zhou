<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ((isset($title) && ($title !== ""))?($title):''); echo C('SITE_TITLE'); ?></title>
  <meta name="keywords" content="<?php echo ((isset($meta_keywords) && ($meta_keywords !== ""))?($meta_keywords):''); ?>" />
  <meta name="description" content="<?php echo ((isset($meta_description) && ($meta_description !== ""))?($meta_description):''); ?>" />  
  
  <link type="image/x-icon" href="/theguide/<?php echo resize(C('SITE_ICON'),16,16); ?>" rel="icon">
  <link type="image/x-icon" href="/theguide/<?php echo resize(C('SITE_ICON'),16,16); ?>" rel="bookmark">

  <link href="/theguide/Common/bt/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="/theguide/Themes/Home/default/Public/css/style.css" rel="stylesheet" type="text/css">   -->
  <script src="/theguide/Common/js/jquery/jquery-1.10.2.min.js"></script>
  <script src="/theguide/Common/js/jquery/jquery-migrate-1.2.1.min.js"></script>
  <script src="/theguide/Common/bt/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/style.css"/>
  <link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/default.css"/>
  <link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/bootstrap.css">
  <link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/main.css">
  <link rel="stylesheet" href="/theguide/Themes/Home/default/Public/css/animation.css">
 
<link href="/theguide/Themes/Home/default/Public/css/member.css" rel="stylesheet" type="text/css">  
<link href="/theguide/Common/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 	

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
                  <li><a href="<?php echo U('/profile');?>">公司简介</a></li>
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
              </ul>
          </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>
</header>
     
<div>
	<div class="container">
		<div class="row">
			
			<div id="content" class="col-sm-9">
				<div class="page-title">
					<h1>下单成功</h1>
				</div>
				<h3>下单成功，感谢您购买<?php echo C('SITE_NAME'); ?>的产品</h3>
				<p>您可以查看<a style="color:#f60;" href="<?php echo U('/order');?>">订单列表</a></p>
							
			</div>
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
		</div>
	</div>
</div>	 
  
  <!-- <footer>
    <div class="container">        
      <div class="credit">
        <p id="templatemo_cr_bar">
          Copyright © 2015 <a id="ypc" href=<?php echo C('SITE_URL'); ?>><?php echo C('SITE_NAME'); ?></a> <a id="bei" target="_blank" href="http://www.miitbeian.gov.cn"><?php echo C('SITE_ICP'); ?></a>
        </p>
      </div>
    </div>
  </footer>  -->  
  
</body>
<html>