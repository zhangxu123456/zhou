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
                <pre><h4>个人资料</h4></pre>
                
                <div class="alert alert-success hidden" role="alert">
                    <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
                    <div id="success">修改成功</div>
                </div>

                <div class="form-horizontal">
                    <div class="form-group has-success has-feedback">
                        <label class="control-label col-sm-2 " for="inputSuccess3">用户名：</label>
                        <div class="col-sm-3 ">
                            <span class="control-label col-sm-6"><h3 style="margin-top:0;line-height:16px;"><?php echo ((isset($infor["uname"]) && ($infor["uname"] !== ""))?($infor["uname"]):''); ?></h3></span>

                        </div>
                    </div>
                    
                    <div class="form-group has-success has-feedback">
                        <label class="control-label col-sm-2" for="inputGroupSuccess2">联系人姓名：</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo ((isset($infor["name"]) && ($infor["name"] !== ""))?($infor["name"]):''); ?>" aria-describedby="inputGroupSuccess2Status">

                        </div>
                    </div>

                    <div class="form-group has-success has-feedback">
                        <label class="control-label col-sm-2" for="inputGroupSuccess2">联系人身份证：</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="id_card" name="id_card" value="<?php echo ((isset($infor["id_card"]) && ($infor["id_card"] !== ""))?($infor["id_card"]):''); ?>" aria-describedby="inputGroupSuccess2Status">

                        </div>
                    </div>

                    <div class="form-group has-success has-feedback">
                        <label class="control-label col-sm-2" for="inputGroupSuccess2">输入推荐人邀请码：</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="referee_code" name="referee_code" value="<?php echo ((isset($infor["referee_code"]) && ($infor["referee_code"] !== ""))?($infor["referee_code"]):''); ?>" aria-describedby="inputGroupSuccess2Status">


                        </div>
                    </div>

                    <div class="form-group has-success has-feedback">
                        <label class="control-label col-sm-2" for="inputGroupSuccess2">邮箱：</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo ((isset($infor["email"]) && ($infor["email"] !== ""))?($infor["email"]):''); ?>" aria-describedby="inputGroupSuccess2Status">
                            </div>


                        </div>
                    </div>

                    <link href="/theguide/Common/css/select2.css" rel="stylesheet"/>
                    <script type="text/javascript" src="/theguide/Common/js/jquery.js" ></script>
                    <script type="text/javascript" src="/theguide/Common/js/area/area2.js"></script>
                    <script type="text/javascript" src="/theguide/Common/js/area/location.js"></script>
                    <script type="text/javascript" src="/theguide/Common/js/area/select2.js"></script>
                    <script type="text/javascript" src="/theguide/Common/js/area/select2_locale_zh-CN.js"></script>
                    <p data-add="<?php echo ($infor["loc_province"]); ?>,<?php echo ($infor["loc_city"]); ?>,<?php echo ($infor["loc_town"]); ?>" class="namep"></p>

                    <div class="form-group has-success has-feedback">
                        <label class="control-label col-sm-2" for="inputGroupSuccess2">通信地址：</label>
                        <div class="col-sm-8">
                            <select id="loc_province" name="loc_province_ok" style="width:120px;"></select>&nbsp;&nbsp;
                            <select id="loc_city" name="loc_city_ok" style="width:120px; margin-left: 10px"></select>&nbsp;&nbsp;
                            <select id="loc_town" name="loc_town_ok"  style="width:120px;margin-left: 10px"></select>

                            <input type="hidden" name="loc_province" id="loc_province_ok" >
                            <input type="hidden" name="loc_city" id="loc_city_ok" >
                            <input type="hidden" name="loc_town" id="loc_town_ok" >

                            <!-- <input type="hidden" name="loc_province"> -->
                            <!-- <input type="hidden" name="loc_city" > -->
                            <!-- <input type="hidden" name="loc_town" > -->
                        </div>
                    </div>
                    

                    <div class="form-group has-success has-feedback">
                        <label class="control-label col-sm-2" for="inputGroupSuccess2">具体地址：</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo ((isset($infor["address"]) && ($infor["address"] !== ""))?($infor["address"]):''); ?>" aria-describedby="inputGroupSuccess2Status">

                        </div>
                    </div>

                    <div class="form-group has-success has-feedback">
                        <label class="control-label col-sm-2" for="inputGroupSuccess2">电话：</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo ((isset($infor["telephone"]) && ($infor["telephone"] !== ""))?($infor["telephone"]):''); ?>" aria-describedby="inputGroupSuccess2Status">

                        </div>
                    </div>

                    <!--上传省份证-->
                        <style type="text/css">
                            div.spot {
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

                        <div class="row">
                            <div class="col-sm-2">
                                <h3>上传证件</h3>
                            </div>
                            <div class="col-sm-3">
                                <div class="droparea spot" id="image1" style="background-image: url('/theguide/uploads/image/regimage/<?php echo ($infor["idcadeimage1"]); ?>');background-size: 220px 160px;" >
                                    <div class="instructions" onclick="del_image('1')">删除</div><div id="uparea1"></div>
                                    <input type="hidden" name="idcadeimage1" id="image_1" value="<?php echo ($infor["idcadeimage1"]); ?>" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="droparea spot" id="image2" style="background-image: url('/theguide/uploads/image/regimage/<?php echo ($infor["idcadeimage2"]); ?>');background-size: 220px 160px;" >
                                    <div class="instructions" onclick="del_image('2')">删除</div><div id="uparea2"></div>
                                    <input type="hidden" name="idcadeimage2" id="image_2" value="<?php echo ($infor["idcadeimage2"]); ?>" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="droparea spot" id="image3" style="background-image: url('/theguide/uploads/image/regimage/<?php echo ($infor["addressimage"]); ?>');background-size: 220px 160px;" >
                                    <div class="instructions" onclick="del_image('3')">删除</div><div id="uparea3"></div>
                                    <input type="hidden" name="addressimage" id="image_3" value="<?php echo ($infor["addressimage"]); ?>" />
                                </div>
                            </div>
                        </div>

                        <script type="text/javascript" src="/theguide/Common/kindeditor/kindeditor.js"></script><script type="text/javascript" src="/theguide/Common/kindeditor/lang/zh_CN.js"></script>
                        <script type="text/javascript">
                            function del_image(num) {
                                $('#image' + num).css('background-image', '');
                                $('#image_' + num).val('');
                            }
                            $(function() {

                                // var content;
                                // KindEditor.ready(function(K) {
                                //     content = K.create('#content', {
                                //         allowFileManager: true,
                                //         uploadJson: '/theguide/Common/kindeditor/php/upload_json.php?dirname=joinmessage'
                                //     });
                                // });

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

                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4 text-center"><button class="btn btn-primary" id="btnQuery" type="submit">确认提交</button></div>
                        <div class="col-lg-4"></div>
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
<!-- <script src="/theguide/Themes/Home/default/Public/js/jquery.min.js"></script>     -->
<!-- <script src="/theguide/Themes/Home/default/Public/js/bootstrap.js"></script> -->
<!-- <script src="/theguide/Themes/Home/default/Public/js/main.js"></script> -->



<script type="text/javascript">
    $('#btnQuery').click(function(){

            var select2_chosen_1=$('#select2-chosen-1').html(); //省份
            var select2_chosen_2=$('#select2-chosen-2').html(); //城市
            var select2_chosen_3=$('#select2-chosen-3').html(); //区县

            $('#loc_province_ok').val(select2_chosen_1);
            $('#loc_city_ok').val(select2_chosen_2);
            $('#loc_town_ok').val(select2_chosen_3);
        $.ajax({
            url: '<?php echo ($action); ?>',
            type: 'post',
            data: $('input[type=\'text\'],input[type=\'hidden\']'),
            dataType: 'json',
            beforeSend: function() {
                console.log(111)
                $('#btnQuery').attr('disabled', true);
                $('#btnQuery').after('<div class="modal_loading"><span class="wait">&nbsp;<img src="/theguide/Themes/Home/default/Public/images/loading2.gif" alt="" /></span></div>');
            },  
            complete: function() {
                $('#btnQuery').attr('disabled', false);
                $('.modal_loading').remove();
            },          
            success: function(json) {
                $('.warning, .error').remove();
                        
                if (json['redirect']) {     
                    $('.alert-success').removeClass('hidden');
                    setTimeout(function(){
                        location = json['redirect']
                    },2000);                
                } else if (json['error']) {     
                                
                    /*if (json['error']['email']) {
                        $("input[name='email']").after('<span class="error">' + json['error']['email'] + '</span>');
                    }                           
                    
                    if (json['error']['telephone']) {
                        $("input[name='telephone']").after('<span class="error">' + json['error']['telephone'] + '</span>');
                    }*/
                                                                                                                                                
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