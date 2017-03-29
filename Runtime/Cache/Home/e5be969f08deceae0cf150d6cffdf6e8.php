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
<article class="header question">
</article>

<div class="main question register">
    <div class="container" style="max-width:960px">
        <div class="panel panel-default">
            <div class="panel-heading"><h2 class="text-center">用户登录</h2></div>
            <?php if(isset($error)) { ?>		
				<div class="alert alert-danger" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <div id="fail"><?php echo $error; ?></div>
				</div>		
			<?php } ?>
            <div class="panel-body">
	            <form class="register" method="post" action="<?php echo U('/login');?>">
	                <div class="form-horizontal">
	                    <!--用户名-->
	                    <div class="form-group">
	                        <label for="inputEmail1" class="col-sm-4 control-label">用户名：</label>
	                        <div class="col-sm-4">
	                            <input type="text" name="uname" value="<?php echo ($uname); ?>" class="form-control" id="inputEmail1" placeholder="用户名">
	                        </div>
	                        <p class="col-sm-4"></p>
	                    </div>
	                    <!--密码-->
	                    <div class="form-group">
	                        <label for="inputEmail2" class="col-sm-4 control-label">密&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
	                        <div class="col-sm-4">
	                            <input type="password" name="pwd" value="<?php echo ($pwd); ?>" class="form-control" id="inputEmail2" placeholder="密码">
	                        </div>
	                        <p class="col-sm-4"></p>
	                    </div>
	                    <!--验证码-->
	                    <div class="form-group">
	                        <label for="inputEmail2" class="col-sm-4 control-label">验证码：</label>
	                        <div class="col-sm-2">
	                            <input type="text" name="code" class="form-control" id="inputEmail3" placeholder="验证码">
	                        </div>
	                        <p class="col-sm-4">
	                        	<img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('Public/verify');?>" width="120">
	                        </p>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-sm-4">
	                        </div>
	                        <div class="col-sm-4">
	                            <label><a href="<?php echo U('/forgot');?>"><span>&nbsp;&nbsp;忘记密码</span></a></label>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-sm-4">
	                        </div>
	                        <div class="col-sm-4">
	                            <input type="submit" value="登录" class="btn btn-primary col-lg-offset-6" />
	                        </div>
	                    </div>
	                </div>
                </form>
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

<script src="/theguide/Themes/Home/default/Public/js/jquery.min.js"></script>
<script src="/theguide/Themes/Home/default/Public/js/bootstrap.js"></script>


<style>
	.verifyimg{cursor:pointer;}
</style>
<script>
	//刷新验证码
	var verifyimg = $(".verifyimg").attr("src");
    $(".reloadverify").click(function(){
        if( verifyimg.indexOf('?')>0){
            $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
        }else{
            $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
        }
    });	
</script>
</body>
</html>