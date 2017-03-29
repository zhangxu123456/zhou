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

<article class="header news"></article>

<div class="main question blog">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-4"></div>
            <div class="col-md-4 col-lg-4 text-center"><h2>公司公告</h2></div>
            <div class="col-md-4 col-lg-4"></div>
        </div>
        <div id="user">
            <?php if(is_array($ne)): $i = 0; $__LIST__ = $ne;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row new-list">
                    <a href="<?php echo U('/newsdetail/'.$vo['news_id']);?>" target="_blank" title="<?php echo ($vo["title"]); ?>">
                        <div class="col-sm-2">
                            <h5><?php echo (msubstr($vo["date"],5,5,'utf-8',false)); ?></h5>
                            <h6><?php echo (msubstr($vo["date"],0,4,'utf-8',false)); ?></h6>
                        </div>
                        <div class="col-sm-3">
                            <img src="/theguide/uploads/image/<?php echo ($vo["image"]); ?>" alt="">
                        </div>
                        <div class="col-sm-7">
                            <dl>
                                <dt><?php echo ($vo["title"]); ?></dt>
                                <dd><?php echo ($vo["summary"]); ?></dd>
                            </dl>
                        </div>
                    </a>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <nav aria-label="Page navigation" style="text-align:center">
                <ul class="pagination">
                    <?php echo ($page); ?>
                </ul>
            </nav>
        </div>
        <script type="text/javascript">
            function user(id){    //page函数名 一定要和action中的第三个参数一致上面有
                var id = id;
                // var pan_cid="<?php echo $pan_cid;?>";
                // alert(pan_cid);,'cid':pan_cid
                $.get('indexnews',{'p':id},function(data){
                    $("#user").replaceWith("<div id='user'>"+data+"</div>"); 
                });
            }
        </script>
    </div>
    
</div>

<div class="foot">
    <div class="top">
        <ul class="clearfix">
            <li><a href="<?php echo U('/profile');?>">公司简介</a><span>|</span></li>
            <li><a href="<?php echo U('/product');?>">产品中心</a><span>|</span></li>
            <li><a href="<?php echo U('/news');?>">公司公告</a><span>|</span></li>
            <li><a href="<?php echo U('/contact');?>">联系我们</a></li>
            <!-- <li><a href="">友情链接</a></li> -->
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
        © 2015 NEXTEV LIMITED All Rights Reserved <?php echo C('SITE_ICP'); ?>
    </div>
</div>
<script src="/theguide/Themes/Home/default/Public/js/jquery.min.js"></script>
<script src="/theguide/Common/js/jquery/jquery-1.10.2.min.js"></script>
<script src="/theguide/Common/js/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="/theguide/Common/bt/js/bootstrap.min.js"></script>

</body>
</html>