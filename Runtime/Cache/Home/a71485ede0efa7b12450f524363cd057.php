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
            <div class="panel-heading"><h2 class="text-center">用户注册</h2></div>

            <div class="alert alert-success hidden" role="alert">
                <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
                <div id="success">注册成功</div>
            </div>

            <div class="panel-body">
                <div class="form-horizontal">
                    <!--用户名-->
                    <div class="form-group">
                        <label for="inputEmail1" class="col-sm-4 control-label">用户名：</label>
                        <div class="col-sm-4">
                            <input type="text" name="uname" value="<?php echo ($uname); ?>" class="form-control" id="inputEmail1" placeholder="用户名" >
                        </div>
                        <p class="col-sm-4"></p>
                    </div>
                    <!--联系人姓名-->
                    <div class="form-group">
                        <label for="inputEmail2" class="col-sm-4 control-label">联系人姓名：</label>
                        <div class="col-sm-4">
                            <input type="text" name="name" value="<?php echo ($name); ?>" class="form-control" id="inputEmail2" placeholder="联系人姓名">
                        </div>
                        <p class="col-sm-4"></p>
                    </div>
                    <!--联系人身份证-->
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">联系人身份证：</label>
                        <div class="col-sm-4">
                            <input type="text" name="id_card" value="<?php echo ($id_card); ?>" class="form-control" id="inputEmail3" placeholder="联系人身份证">
                        </div>
                        <p class="col-sm-4"></p>
                    </div>
                    <!--邀请码-->
                    <div class="form-group">
                        <label for="inputEmail4" class="col-sm-4 control-label">输入推荐人邀请码：</label>
                        <div class="col-sm-4">
                            <input type="text" name="referee_code" value="<?php echo ($referee_code); ?>" class="form-control" id="inputEmail4" placeholder="输入推荐人邀请码">
                        </div>
                        <p class="col-sm-4"></p>
                    </div>
                    <!--邮箱-->
                    <div class="form-group">
                        <label for="inputEmail6" class="col-sm-4 control-label">邮箱：</label>
                        <div class="col-sm-4">
                            <input type="text" name="email" value="<?php echo ($email); ?>" class="form-control" id="inputEmail6" placeholder="邮箱">
                        </div>
                        <p class="col-sm-4"></p>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail4" class="col-sm-4 control-label">居住地址：</label>
                        <div class="col-sm-8">
                            <div class="fl item-ifo">
                                <div class="o-intelligent-regName">
                                    <select id="loc_province"  style="width:120px;"></select>&nbsp;&nbsp;
                                    <select id="loc_city"  style="width:120px; margin-left: 10px"></select>&nbsp;&nbsp;
                                    <select id="loc_town"  style="width:120px;margin-left: 10px"></select>

                                    <!-- <input type="hidden" name="loc_province" id="loc_province_ok"> -->
                                    <!-- <input type="hidden" name="loc_city" id="loc_city_ok"> -->
                                    <!-- <input type="hidden" name="loc_town" id="loc_town_ok"> -->

                                    <input type="hidden" name="loc_province">
                                    <input type="hidden" name="loc_city" >
                                    <input type="hidden" name="loc_town" >

                                </div>
                            </div>
                        </div>
                    </div>
    
                    <link href="/theguide/Common/css/select2.css" rel="stylesheet"/>
                    <script src="/theguide/Common/js/jquery.js" type="text/javascript"></script>
                    <script type="text/javascript" src="/theguide/Common/js/area/area.js"></script>
                    <script type="text/javascript" src="/theguide/Common/js/area/location.js"></script>
                    <script src="/theguide/Common/js/area/select2.js"></script>
                    <script src="/theguide/Common/js/area/select2_locale_zh-CN.js"></script>

                    <!--具体地址-->
                        <div class="form-group">
                            <label for="inputEmail5" class="col-sm-4 control-label">具体地址：</label>
                            <div class="col-sm-4">
                                <input type="text" name="address" value="<?php echo ($address); ?>" class="form-control" id="inputEmail5" placeholder="具体地址">
                            </div>
                            <p class="col-sm-4"></p>
                        </div>

                    <!--密码-->
                    <div class="form-group">
                        <label for="inputEmail7" class="col-sm-4 control-label">密码：</label>
                        <div class="col-sm-4">
                            <input type="password" name="pwd" value="<?php echo ($pwd); ?>" class="form-control" id="inputEmail7" placeholder="密码">
                        </div>
                        <p class="col-sm-4"></p>
                    </div>
                    <!--确认密码-->
                    <div class="form-group">
                        <label for="inputEmail8" class="col-sm-4 control-label">确认密码：</label>
                        <div class="col-sm-4">
                            <input type="password" name="repwd" value="<?php echo ($repwd); ?>" class="form-control" id="inputEmail8" placeholder="确认密码">
                        </div>
                        <p class="col-sm-4"></p>
                    </div>
                    <!--手机号-->
                    <div class="form-group">
                        <label for="inputEmail9" class="col-sm-4 control-label">手机号：</label>
                        <div class="col-sm-4">
                            <input type="text" name="telephone" value="<?php echo ($telephone); ?>" class="form-control" id="regName" placeholder="手机号">
                        </div>
                        <p class="col-sm-4"></p>
                    </div>
                    
                    <!--验证码-->
                    <div class="form-group">
                        <label for="inputEmail10" class="col-sm-4 control-label">验证码：</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="mobile_code" id="securityCode">
                        </div>
                        <div class="col-sm-2">
                            <input class="btn btn-success" id="zphone" type="button" value=" 获取手机验证码 "  onclick="get_mobile_code();">
                        </div>
                        <p class="col-sm-4"></p>
                    </div>

                    <script type="text/javascript">
                        function get_mobile_code(){
                            <?php  if(!$_SESSION['send_code']){ $_SESSION['send_code']='true'; } ?>
                            $.post("<?php echo U('Public/sms');?>", {mobile:jQuery.trim($('#regName').val()),send_code:<?php echo $_SESSION['send_code']; ?>}, 
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

                    
                    <!--上传省份证-->
                        <style type="text/css">
                            div.spot{
                                        float: left;
                                        margin: 0 20px 0 0;
                                        width: 220px;
                                        min-height: 160px;
                                        border: 2px dashed #ddd;
                                    }
                                    .droparea {
                                        position: relative;
                                        text-align: center;
                                    }
                                    .droparea .instructions {
                                        opacity: 0.8;
                                        background-color: #cccccc;
                                        height: 25px;
                                        z-index: 10;
                                        zoom: 1;
                                        background-position: initial initial;
                                        background-repeat: initial initial;
                                        cursor: pointer;
                                    }
                                    .droparea div, .droparea input {
                                        position: absolute;
                                        top: 0;
                                        width: 100%;
                                        height: 100%; 
                                    }
                                    .droparea input {
                                        cursor: pointer;
                                        opacity: 0;
                                    }
                                    #uparea1,#uparea2,#uparea3,#uparea4{
                                        height: 170px;
                                        cursor: pointer;
                                    }
                        </style>

                        <div class="row account_idcadeimage">
                            <div class="col-sm-2">
                                <h3>上传证件</h3>
                            </div>
                            <div class="col-sm-3">
                                <div class="droparea spot" id="image1" style="background-image: url('__UPLOAD__/image/regimage/<?php echo ($info["idcadeimage1"]); ?>');background-size: 220px 160px;" >
                                    <div class="instructions" onclick="del_image('1')">删除</div><div id="uparea1"></div>
                                    <input type="hidden" name="idcadeimage1" id="image_1" value="" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="droparea spot" id="image2" style="background-image: url('__UPLOAD__/image/regimage/<?php echo ($info["idcadeimage2"]); ?>');background-size: 220px 160px;" >
                                    <div class="instructions" onclick="del_image('2')">删除</div><div id="uparea2"></div>
                                    <input type="hidden" name="idcadeimage2" id="image_2" value="" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="droparea spot" id="image3" style="background-image: url('__UPLOAD__/image/regimage/<?php echo ($info["addressimage"]); ?>');background-size: 220px 160px;" >
                                    <div class="instructions" onclick="del_image('3')">删除</div><div id="uparea3"></div>
                                    <input type="hidden" name="addressimage" id="image_3" value="" />
                                </div>
                            </div>
                            <div>
                                <p class="col-sm-2"></p>
                                <p class="col-sm-8 drop_eider"></p>
                            </div>
                            
                        </div>

                        <script type="text/javascript" src="/theguide/Common/kindeditor/kindeditor.js"></script><script type="text/javascript" src="/theguide/Common/kindeditor/lang/zh_CN.js"></script>
                        <script type="text/javascript">
                            function del_image(num) {
                                $('#image' + num).css('background-image', '');
                                $('#image_' + num).val('');
                            }
                            $(function() {
                                KindEditor.ready(function(K) {
                                    K.create();
                                    var editor = K.editor({
                                        allowFileManager: true,
                                        uploadJson: '/theguide/Common/kindeditor/php/upload_json.php?dirname=regimage'
                                    });
                                    K('#uparea1').click(function() {
                                        editor.loadPlugin('image', function() {
                                            editor.plugin.imageDialog({
                                                imageUrl: K('#image_1').val(),
                                                clickFn: function(url, title, width, height, border, align) {
                                                    $('#image1').css('background-image', 'url(' + url + ')').css('background-size', '220px 160px');
                                                    K('#image_1').val(url);
                                                    // K('#getImgUrl').val(url);
                                                    editor.hideDialog();
                                                }
                                            });
                                        });
                                    });
                                    K('#uparea2').click(function() {
                                        editor.loadPlugin('image', function() {
                                            editor.plugin.imageDialog({
                                                imageUrl: K('#image_2').val(),
                                                clickFn: function(url, title, width, height, border, align) {
                                                    $('#image2').css('background-image', 'url(' + url + ')').css('background-size', '220px 160px');
                                                    K('#image_2').val(url);
                                                    // K('#getImgUrl').val(url);
                                                    editor.hideDialog();
                                                }
                                            });
                                        });
                                    });
                                    K('#uparea3').click(function() {
                                        editor.loadPlugin('image', function() {
                                            editor.plugin.imageDialog({
                                                imageUrl: K('#image_3').val(),
                                                clickFn: function(url, title, width, height, border, align) {
                                                    $('#image3').css('background-image', 'url(' + url + ')').css('background-size', '220px 160px');
                                                    K('#image_3').val(url);
                                                    // K('#getImgUrl').val(url);
                                                    editor.hideDialog();
                                                }
                                            });
                                        });
                                    });
                                });
                            });
                        </script>

                    <!--用户名协议-->
                    <div class="form-group">
                        <label for="inputEmail9" class="col-sm-4 control-label">用户注册协议：</label>
                        <div class="col-sm-4" style="padding-top:6px;">
                            <label><input type="checkbox" id="isread" name="isread" value="1" checked="checked"><span style="vertical-align: text-bottom;">我已阅读并同意 <a href="javascript:void(0)">《用户注册协议》</a></span></label>
                        </div>
                        <p class="col-sm-4"></p>
                    </div>
                    <button type="submit" value="提交" id="btnQuery" class="button btn-primary btn btn-primary col-lg-offset-6">点击提交</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
   $('.button').click(function(){

            var select2_chosen_1=$('#select2-chosen-1').html(); //省份
            var select2_chosen_2=$('#select2-chosen-2').html(); //城市
            var select2_chosen_3=$('#select2-chosen-3').html(); //区县

            // $('#loc_province_ok').val(select2_chosen_1);
            // $('#loc_city_ok').val(select2_chosen_2);
            // $('#loc_town_ok').val(select2_chosen_3);

            $("input[name='loc_province']").val(select2_chosen_1);
            $("input[name='loc_city']").val(select2_chosen_2);
            $("input[name='loc_town']").val(select2_chosen_3);
        $.ajax({
            url: '<?php echo ($action); ?>',
            type: 'post',
            data: $('input[type=\'text\'],input[type=\'hidden\'],input[type=\'password\'],input[type=\'checkbox\'],select'),
            dataType: 'json',
            /*beforeSend: function() {
                $('#submit').attr('disabled', true);
                $('#submit').after('<span class="wait">&nbsp;<img src="/theguide/Themes/Home/default/Public/images/loading.gif" alt="" /></span>');
            },  
            complete: function() {
                $('#submit').attr('disabled', false); 
                $('.wait').remove();
            },  */        
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
                    
                    if (json['error']['name']) {
                        $("input[name='name']").parent().next().append('<span class="error">' + json['error']['name'] + '</span>');
                    }
                    if (json['error']['id_card']) {
                        $("input[name='id_card']").parent().next().append('<span class="error">' + json['error']['id_card'] + '</span>');
                    }
                    if (json['error']['email']) {
                        $("input[name='email']").parent().next().append('<span class="error">' + json['error']['email'] + '</span>');
                    }
                    if (json['error']['address']) {
                        $("input[name='address']").parent().next().append('<span class="error">' + json['error']['address'] + '</span>');
                    }
                    if (json['error']['telephone']) {
                        $("input[name='telephone']").parent().next().append('<span class="error">' + json['error']['telephone'] + '</span>');
                    }
                    if (json['error']['pwd']) {
                        $("input[name='pwd']").parent().next().append('<span class="error">' + json['error']['pwd'] + '</span>');
                    }
                    if (json['error']['repwd']) {
                        $("input[name='repwd']").parent().next().append('<span class="error">' + json['error']['repwd'] + '</span>');
                    }

                    if (json['error']['mobile_code']) {
                        $("input[name='mobile_code']").parent().next().next().append('<span class="error">' + json['error']['mobile_code'] + '</span>');
                    }
                    if (json['error']['idcadeimage1']) {
                        $(".drop_eider").append('<span class="error">' + json['error']['idcadeimage1'] + '</span>');
                    }
                }  
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert('修改失败');
            }
        });     
    });
    $('.close').click(function(){
            $(this).parent().addClass('hidden');
        });
</script>
</body>
</html>