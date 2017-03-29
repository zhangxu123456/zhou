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
            <div class="panel-heading"><h2 class="text-center">忘记密码</h2></div>
            <div class="panel-body">
                <div class="col-sm-4"></div>


                <div class="alert alert-success hidden" role="alert">
				  <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
				  <div id="success">提交成功11</div>
				</div>

                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-6 text-right">
                            <h6>通过手机号重设密码</h6>
                        </div>
                    </div>
                    <!--用户名-->
                    <div class="form-group">
                        <label class="col-sm-4 control-label">用户名</label>
                        <div class="col-sm-4">
                            <input type="text" name="uname" id="uname" class="form-control"  placeholder="用户名">
                        </div>
                        <p class="col-sm-3" style="padding-left:41px;"></p>
                    </div>
                    <!--注册的邮箱或者手机号-->
                    <div class="form-group">
                        <label class="col-sm-4 control-label">请输入手机号</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="telephone" id="regName" placeholder="手机号">
                        </div>
                        <p class="col-sm-3" style="padding-left:41px;"></p>
                    </div>
                    <!-- 密码 -->
                    <div class="form-group">
                        <label class="col-sm-4 control-label">密码</label>
                        <div class="col-sm-4">
                            <input type="password" name="password" class="form-control"  placeholder="密码">
                        </div>
                        <p class="col-sm-3" style="padding-left:41px;"></p>
                    </div>
                    <!--密码确认-->
                    <div class="form-group">
                        <label class="col-sm-4 control-label">密码确认</label>
                        <div class="col-sm-4">
                            <input type="password" name="password_re" class="form-control" placeholder="密码确认">
                        </div>
                        <p class="col-sm-3" style="padding-left:41px;"></p>
                    </div>


                    <!-- 验证码 -->
                    <!-- <div class="form-group">
                        <label for="inputEmail2" class="col-sm-4 control-label">验&nbsp;&nbsp;证&nbsp;&nbsp;码：</label>
                        <div class="col-sm-2">
                            <input type="email" class="form-control" id="inputEmail2" placeholder="验证码">
                        </div>
                        <p class="col-sm-1 icon-refresh"><img width="100" class="verifyimg reloadverify" alt="点击切换" src="http://localhost:88/oscshop/public/verify.html"></p>
                        <p class="col-sm-1 js-change-verify-code"><a href="javascript:void(0)" class="glyphicon glyphicon-refresh"></a></p>
                        <p class="col-sm-2">*验证码错误</p>
                    </div> -->

                    <!--验证码-->
                        <div class="form-group">
                            <label for="inputEmail10" class="col-sm-4 control-label">验证码：</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="mobile_code" id="securityCode">
                            </div>
                            <div class="col-sm-2" id="mobile_code">
                                <input class="btn btn-success" id="zphone" type="button" value=" 获取手机验证码 "  onclick="get_mobile_code();">
                            </div>
                            <p class="col-sm-4" style="padding-left:41px;"></p>
                        </div>

                        <script type="text/javascript">
                            function get_mobile_code(){
                                $.post("<?php echo U('Public/sms');?>", {mobile:jQuery.trim($('#regName').val()),send_code:<?php echo $_SESSION['send_code'];?>}, 
                                    function(msg) {
                                    alert(jQuery.trim(unescape(msg)));
                                    if(msg=='提交成功'){
                                        RemainTime();
                                    }
                                });
                            };

                            var iTime = 59;
                            var Account;
                            function RemainTime(){
                                document.getElementById('zphone').disabled = true;
                                var iSecond,sSecond="",sTime="";
                                if (iTime >= 0){
                                    iSecond = parseInt(iTime%60);
                                    iMinute = parseInt(iTime/60)
                                    if (iSecond >= 0){
                                        if(iMinute>0){
                                        sSecond = iMinute + "分" + iSecond + "秒";
                                    }else{
                                        sSecond = iSecond + "秒后重新发送";
                                    }
                                }
                                    sTime=sSecond;
                                    if(iTime==0){
                                        clearTimeout(Account);
                                        sTime='获取手机验证码';
                                        iTime = 59;
                                        document.getElementById('zphone').disabled = false;
                                    }else{
                                        Account = setTimeout("RemainTime()",1000);
                                        iTime=iTime-1;
                                    }
                                }else{
                                    sTime='没有倒计时';
                                }
                                document.getElementById('zphone').value = sTime;
                            } 
                        </script>




                    <div class="form-group">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <button  type="submit" id="button" class="btn btn-primary col-lg-offset-6 button">提&nbsp;&nbsp;交</button>
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

<script src="/theguide/Themes/Home/default/Public/js/jquery.min.js"></script>
<script src="/theguide/Themes/Home/default/Public/js/bootstrap.js"></script> 
<!-- ,input[type=\'password\'] -->
<script type="text/javascript">
    $('#button').click(function(){

        $.ajax({
            url: '<?php echo ($action); ?>',
            type: 'post',
            data: $('input[type=\'text\'],input[type=\'password\']'),
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
                    $('.alert-success').removeClass('hidden');
                    setTimeout(function(){
                        location = json['redirect']
                    },2000);                
                } else if (json['error']) {     
                                
                    if (json['error']['uname']) {
                        $("input[name='uname']").parent().next().append('<span class="error">' + json['error']['uname'] + '</span>');
                    }                           
                    
                    if (json['error']['telephone']) {
                        $("input[name='telephone']").parent().next().append('<span class="error">' + json['error']['telephone'] + '</span>');
                    }     

                    if (json['error']['password']) {
					$("input[name='password']").parent().next().append('<span class="error">' + json['error']['password'] + '</span>');
					}							
					
					if (json['error']['password_re']) {
						$("input[name='password_re']").parent().next().append('<span class="error">' + json['error']['password_re'] + '</span>');
					}  

                    if (json['error']['mobile_code']) {
                        $("#mobile_code").next().append('<span class="error">' + json['error']['mobile_code'] + '</span>');
                    }                                                                                                                  
                }  
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert('提交失败111');
            }
        });     
    });
    $('.close').click(function(){
            $(this).parent().addClass('hidden');
        });
</script>

</body>
</html>