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

            <i id="xunlei" data='<?php echo json_encode($xunlei);?>'></i>

            <div class="ct  w100">
                    <pre><h4>我的订单</h4></pre>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
								<td class="text-center"><h4>订单号</h4></td>
								<td class="text-center"><h4>状态</h4></td>
                                <td class="text-center"><h4>领取激活码</h4></td>
								<td class="text-center"><h4>下单时间</h4></td>
								<td class="text-center"><h4>用户</h4></td>
								<td class="text-center"><h4>总计</h4></td>
                                <td class="text-center"><h4>操作</h4></td>
							</tr>
                        </thead>
                        <tbody class="text-center table-cell"  style="margin:50px 0;">
                            
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                                    <td class="text-center"><?php echo ($data["alias"]); ?></td>
                                    <td class="text-center"><?php echo ($data["status"]); ?></td>
                                    <!-- id="toggle_one" -->
                                    <td class="text-center">    
                                        <?php if($data['status'] == '已付款待发货'): ?><i class="special-num"> 
                                                <p  data-toggle="modal" data-target="#myModal"  class="pop_org" date-title="领取激活码" data="" >领取激活码</p>
                                            </i><?php endif; ?>
                                    </td>

                                    <td class="text-center"><?php echo (toDate($data["date_added"],'Y/m/d H:i:s')); ?></td>
                                    <td class="text-center"><?php echo ($data["name"]); ?></td>
                                    <td class="text-center">￥<?php echo round($data['total'] ,2); ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo U('/info/'.$data['order_id']);?>">
                                            <button class="btn btn-primary">
                                                查看
                                            </button>
                                        </a>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
<script src="/theguide/Themes/Home/default/Public/js/jquery.min.js"></script>
<script src="/theguide/Themes/Home/default/Public/js/bootstrap.js"></script>

<script type="text/javascript">
    $xunlei=$('#xunlei').attr('data');
    $xunlei=JSON.parse($xunlei);
    $('.pop_org').click(function () {
        $('.col_num_total').remove();
        $indexs=$(this).index('.pop_org');
        if(typeof $xunlei[$indexs]=='object'){   //判断有没有 | 线 这是有状态
            $leng=$xunlei[$indexs].length;
            for(var i=0;i<$leng;i++){
                $('#wrap_te').append('<div class="col_num_total clearfix">' +
                        '<li class="col-sm-4">激活码</li>' +
                        '<li class="col-sm-4">'+$xunlei[$indexs][i]+'</li>' +
                        '<li class="col-sm-4">复制</li>' +
                        '</div>');
            }
        }else if(typeof $xunlei[$indexs]=='string'){
                $('#wrap_te').append('<div class="col_num_total clearfix">' +
                        '<li class="col-sm-4">激活码</li>' +
                        '<li class="col-sm-4">'+$xunlei[$indexs]+'</li>' +
                        '<li class="col-sm-4">复制</li>' +
                        '</div>');
        }
    });
</script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:900px;margin: 10vw auto;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">消息</h4>
      </div>
      <div id="modal-body" class="modal-body" style="padding: 15px 15px 60px;">
        <h4><i class="glyphicon glyphicon-ok"></i>已经领取过了</h4>
        <h6>您已成功领取 激活码 请尽快激活</h6>
           <div id="wrap_te">
              <div class="col_num_total clearfix">
                  <li class="col-sm-4">激活码</li>
                  <li class="col-sm-4"><?php echo ($data[key]); ?></li>
                  <li class="col-sm-4">复制</li>
              </div>
           </div>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
        </div>
    </div>
  </div>
</div>
<!-- Modal -->



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

</body>
</html>