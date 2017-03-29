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

<div class="main product">
    <div class="container">

        <div class="container">
            <div class="alert alert-success hidden" role="alert">
              <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
              <div id="success"></div>
            </div>
                
            <div class="alert alert-danger hidden" role="alert">
              <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
              <div id="fail"></div>
            </div>
        </div>

        <div class="row" id="content">
            <div class="col-lg-6 col-md-6 product-img"><img src="/theguide/uploads/image/<?php echo ($goods["image"]); ?>" alt=""></div>
            <div class="col-lg-6 col-md-6 product-txt">
                <div class="future-txt">
                    <h2><?php echo ($goods["name"]); ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;The guide</h2>
                    <h2>￥：<span id="Price"><?php echo ($goods["price"]); ?></span>元</h2>
                    <h3>优惠 ：<?php echo ($goods["ms"]); ?></h3>
                </div>
                
                <!-- 加入购物车 -->
                <div class="pull-leftt">

                    <div class="select_number">
                        <div class="row">
                            <li class="col-sm-4"></li>
                            <li class="col-sm-1"><button class="decrease btn  btn-default" onclick="changeQty(0); return false;">-</button></li>
                            <li class="col-sm-2">
                                <input class="text form-control text-center" type="text" id="quantity" value="1" size="2" name="quantity">
                            </li>
                            <li class="col-sm-1" style="padding-left:0"><button class="increase btn  btn-default" onclick="changeQty(1); return false;">+</button></li>
                            <li class="col-sm-4"></li>
                        </div>
                    </div>
                        <input type="hidden" value="<?php echo ($goods["goods_id"]); ?>" size="2" name="goods_id">
                </div> 
    
                <div class="pull-leftt">
                    <a href="<?php echo U('/cart');?>">
                        <button id="button-cart" class="button btn-cart btn btn-primary" data-loading-text="Loading..." type="button">
                            <span>加入购物车</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>


        <div class="row regulation">
            <div class="col-lg-6  col-md-6">
                <h3>未来星购买规则 :</h3>
                <hr>
                <?php echo ($filegoods[0][lv][0]["description"]); ?>
                <!-- <p>荐朋友购买可返给你10%的奖励。</p>
                <p>累积主第11名客户将返利15%的奖励。</p>
                <p>可在IB办公室下载未来星软件免费试用一个月。</p>
                <p>每个在电脑上安装的未来星软件仅限一次。</p>
                <p>CMC视频直播室听课学习。</p> -->
            </div>
            <div class="col-lg-6  col-md-6">
                <h3>未来星特性 : </h3>
                <hr>
                <?php echo ($filegoods[0][lv][0]["summary"]); ?>
                <!-- <p>微型交易软件。</p>
                <p>针对刚接触外汇的用户，增加体验度。</p>
                <p>在符合条件的情况下，领两层客户的佣金。</p> -->
            </div>
        </div>
    </div>
    <div class="future-flow clearfix">
        <!--<img src="./images/future-flow.jpg" alt="">-->
        <div class="container">
            <div class="row">
                <li class="col-sm-4 flow path">已购买未来星安装流程 ：</li>
                <li class="col-sm-6"></li>
                <li class="col-sm-2"></li>
            </div>
            <div class="row blink">
                <li class="col-sm-6"></li>
                <li class="col-sm-6"><b class="icon-local"></b><p></p><span>收到客户购买未来星的汇款凭证</span><strong></strong><i class="glyphicon glyphicon-paste"></i></li>
            </div>
            <div class="row blink">
                <li class="col-sm-6" style="text-align:right;position:relative;right:-20px;"><i class="glyphicon glyphicon-link"></i><strong></strong><span>发送序列号和未来星的下载链接（以邮箱的形式发送）</span><p></p><b class="icon-local"></b></li>
                <li class="col-sm-6"></li>
            </div>
            <div class="row blink">
                <li class="col-sm-6"></li>
                <li class="col-sm-6"><b class="icon-local"></b><p></p><span>安装成功，如实填写基本信息，并把序列号及密码填上</span><strong></strong><i class="glyphicon glyphicon-edit"></i></li>
            </div>
            <div class="row blink">
                <li class="col-sm-6" style="text-align:right;position:relative;right:-20px;"><i class="glyphicon glyphicon-hand-up"></i><strong></strong><span>点击正式版注册</span><p></p><b class="icon-local"></b></li>
                <li class="col-sm-6"></li>
            </div>
            <div class="row blink">
                <li class="col-sm-6"></li>
                <li class="col-sm-6"><b class="icon-local"></b><p></p><span>注册模拟账户</span><strong></strong><i class="glyphicon glyphicon-user"></i></li>
            </div>
            <div class="blink">
                <li class="col-sm-6"></li>
                <li class="col-sm-6"><span>模拟账户注册：点击平台左上角文件 > 开新模拟账户 > 点击下一步</span></li>
            </div>
        </div>
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


<script>
    var icon_local=$('.future-flow .container .blink b'),num=-1;
    setInterval(function () {
        num==4 ? num=-1 : num;
        num++;
        icon_local.removeClass('icon-local');
        icon_local.eq(num).addClass('icon-local');

    },2000);
function changeQty(increase) {
    var qty = parseInt($('.select_number').find("input").val());
    if ( !isNaN(qty) ) {
        qty = increase ? qty+1 : (qty > <?php echo $goods['minimum']; ?> ? qty-1 : <?php echo $goods['minimum']; ?>);
        $('.select_number').find("input").val(qty);
    }
}   
$('#button-cart').bind('click', function() {
    $.ajax({
        url: "<?php echo U('/cart_add');?>",
        type: 'post',
        data: $('#content input[type=\'text\'],#content input[type=\'hidden\']'),
        dataType: 'json',
        success: function(json) {
            $('.alert').addClass('hidden');
            $('.box-check').removeClass('text-error');
            $('.text-danger').remove();
            if (json['error']) {
                 if (json['error']['option']) {
                  for (i in json['error']['option']) {
                    var element = $('#option-'+i);
                    if (element.parent().hasClass('box-check')) {
                      element.parent().addClass('text-error').after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
                    } else {
                      element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
                    }
                  }
                    }
                    // $('.text-danger').parent().addClass('has-error');
        }   
            
            if (json['success']) {              
                $('.alert-success').removeClass('hidden');
                $('#success').text(json['success']);
                $('#cart-total').text(json['total']);
            }else if(json['error']['quantity']){
                $('.alert-danger').removeClass('hidden');
                $('#fail').text(json['error']['quantity']);
            }   
            
        }
    }); 
});

$('.close').click(function(){
    $(this).parent().addClass('hidden');
});
</script>


</body>
</html>