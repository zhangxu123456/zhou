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

<div class="container" style="padding-top:100px;">

	<div class="row col-sm-3">
		<div class="page-title">
			<h1 style="margin-bottom:70px;"></h1>
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
	<div class="col-sm-9">
		<div class="page-title">
			<h1 style="margin-left:10px;">订单信息</h1>
		</div>
		<div id="content" class="col-sm-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
					<tr>
						<td class="text-left"><a>订单</a></td>
						<td></td>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td class="text-left" style="width: 50%;">
							<b>订单号：</b><?php echo $order['order'][0]['order_num_alias'] ?> <br />
							<b>支付方式：</b><?php echo get_payment_name($order['order'][0]['payment_code']); ?>
						</td>
						<td><b>下单时间：</b><?php echo date("Y-m-d H:i:s",$order['order'][0]['date_added']) ?><br />
						</td>
					</tr>
					</tbody>
				</table>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
					<tr>
						<td colspan="2" class="text-left">邮寄地址</td>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td colspan="2" class="text-left">
							<b>收货人：</b><?php echo $order['address']['name']; ?>，
							<b>联系电话：</b><?php echo $order['address']['telephone']; ?>，
							<b>邮寄地址：</b><?php echo $order['address']['address']; ?>
						</td>

					</tr>
					</tbody>
				</table>
			</div>

			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
					<tr>
						<td class="text-left">名称</td>
						<!-- <td class="text-left">型号</td> -->
						<td class="text-left">数量</td>
						<td class="text-left">价格</td>
						<td class="text-left">总计</td>
					</tr>
					</thead>
					<tbody>
					<?php if(is_array($order['goods'])): $i = 0; $__LIST__ = $order['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?><tr>
							<td><a href="<?php echo U('/goods');?>" target="_blank"><?php echo ($d["name"]); ?></a>
								<?php if($option_list=M()->query('select * from '.C('DB_PREFIX').'order_option where order_goods_id='.$d['order_goods_id'].' and order_id='.$d['order_id'])){ ?>
								<?php foreach ($option_list as $option) { ?>
								<br />
								&nbsp;<small> - <?php echo $option['name']; ?>: <?php echo $option['value']; ?></small>
								<?php } ?>
								<?php } ?>
							</td>
							<!-- <td><?php echo ($d["model"]); ?></td> -->
							<td><?php echo ($d["quantity"]); ?></td>
							<td>￥<?php echo round($d['price'],2); ?></td>
							<td>￥<?php echo round($d['total'],2); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>

					</tbody>
					<tfoot>
					<tr>
						<td colspan="2"></td>
						<td class="text-left"><b><?php echo $order['total'][0]['title']; ?></b></td>
						<td><?php echo $order['total'][0]['text']; ?></td>
					</tr>
					
					<tr>
						<td colspan="2"></td>
						<td class="text-left"><b><?php echo $order['total'][2]['title']; ?></b></td>
						<td><?php echo $order['total'][2]['text']; ?></td>
					</tr>
					</tfoot>
				</table>
			</div>
			<div class="page-title">
				<h1>订单历史</h1>
			</div>

			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
					<tr>
						<td class="text-left">时间</td>
						<td class="text-left">状态</td>
						<td class="text-left">留言</td>
					</tr>
					</thead>
					<tbody>
					<?php if(is_array($order['history'])): $i = 0; $__LIST__ = $order['history'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo date("Y-m-d H:i:s",$d['date_added']) ?></td>
							<td><?php echo get_order_status_name($d['order_status_id']); ?> </td>
							<td><?php echo ($d["comment"]); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
			<?php if($order['order'][0]['order_status_id']==C('default_order_status_id')){ ?>

			<div class="buttons clearfix">
				<div class="left">
					<a style="background:#da2c2a;" onclick="window.location = '<?php echo U('Payment/confirm_pay',array('token'=>pay_token('pay_token'),'id'=>$_GET['id'])); ?>'" class="btn btn-primary btn-continue">去付款</a>
					<a style="float:right;" id="cancel" class="btn btn-primary btn-continue right" href="<?php echo U('/cancel_order/'.$_GET['id']);?>">取消订单</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<script src="/theguide/Themes/Home/default/Public/js/jquery.min.js"></script>
<script type="text/javascript">

$('#cancel').click(function(){
	var f=confirm('确认要取消订单吗？');
	if(f==false){
		return false;
	}	
});
</script>