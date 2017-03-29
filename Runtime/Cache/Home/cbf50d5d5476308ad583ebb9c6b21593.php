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
<article class="header question"></article>
 
	<div id="cart">
		<div class="container">
			<div class="row" style="padding:30px 0">
				<div class="clearfix col-md-12 panel panel-default" style="padding: 0">
				<div class="page-title panel-heading">
					<h1 class="text-center">购物车<!--  (<span id="weight"><?php echo ($weight); ?></span><?php echo get_weight_name(C('WEIGHT_ID')); ?> ) --></h1>
				</div>
				<div class="alert alert-danger hidden" role="alert">
				  <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
				  <div id="fail"></div>
				</div>
				<form>
					<div class="table-responsive">
						<table class="table table-bordered table-condensed" style="border:0;">
							<thead>
								<tr>									
									<th colspan="1" class="text-center">商品图片</th>
									<th colspan="1" class="text-center">商品名称</th>
									<th class="text-center">型号</th>
									<th class="text-center">数量</th>
									<th class="text-center">单价</th>
									<th class="text-center">总计</th>
									<th class="text-center remove">操作</th>
								</tr>
							</thead>
							
							<tbody>
								<?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?><tr class="goods<?php echo md5($key); ?>">
										<td style="width:100px;padding:20px;"><a href="<?php echo U('/goods/'.$d['goods_id']);?>"><img src="/theguide/<?php echo ($d["image"]); ?>" /></a></td>
										<td class="text-center"><?php echo ($d["name"]); ?>
											<?php if (!$d['stock']) { ?>
											  <span class="stock">***</span>
											  <?php } ?>
											  <div>
												<?php foreach ($d['option'] as $option) { ?>
												<small><?php echo $option['name']; ?>: <?php echo $option['value']; ?></small><br />
												<?php } ?>
											  </div>
										</td>
										<td class="text-center" style="display: table-cell;vertical-align: middle;"><?php echo ($d["model"]); ?></td>
										<td class="quantity text-center" style="width:200px;">
											<div id="select_number<?php echo md5($key); ?>" class="select_number">
												<div class="row">
													<li class="col-sm-3" style="margin-left:20px;"><button onclick='changeQty(0,"<?php echo ($d["goods_id"]); ?>","<?php echo ($key); ?>","<?php echo md5($key); ?>"); return false;' class="decrease btn  btn-default">-</button></li>
													<li class="col-sm-4"><input class="text form-control" type="text" name="quantity<?php echo ($d["goods_id"]); ?>"  onkeyup='change_quantity("<?php echo ($d["goods_id"]); ?>",this,"<?php echo ($key); ?>","<?php echo md5($key); ?>");' value="<?php echo ($d["quantity"]); ?>" size="1" /></li>
													<li class="col-sm-3" style="padding-left:0"><button onclick='changeQty(1,"<?php echo ($d["goods_id"]); ?>","<?php echo ($key); ?>","<?php echo md5($key); ?>"); return false;' class="increase btn  btn-default">+</button></li>
												</div>
											</div>						
										</td>		
										
										<td class="price text-center">￥<?php echo round($d['price'] ,2); ?></td>
										<td class="total text-center">￥<?php echo round($d['total'] ,2); ?></td>
										
										<td class="text-center">
											<a href="<?php echo U('/remove/'.$key);?>">
												<button type="button" class="btn btn-danger">
													删除
												</button>
											</a>
										</td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
					</div>
				</form>
				<div class="row" style="padding-bottom: 20px;">
					<li class="col-sm-3"></li>
					<li class="col-sm-3">
						<div class="cart-total pull-left">
							<table id="total">
								<tr>
									<td class="right price last" style="font-size:30px;">总计：<span style="font-size:16px;">￥</span><?php echo $total_price; ?></td>
								</tr>
							</table>
						</div>
					</li>
					<li class="col-sm-3">
						<div class="buttons cart-buttons pull-right">
							<a href="<?php echo U('/checkout');?>" class="btn btn-primary btn-checkout">结算</a>
							<a href="<?php echo U('/goods');?>" class="btn btn-primary btn-continue">继续购物</a>
						</div>
					</li>
					<li class="col-sm-3"></li>
				</div>
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

function update_cart(id,qty,option,key){
	$.post(
		'<?php echo U("/cart_update");?>',
		{id:id,q:qty,o:option},
		function(json){
		
			$('.alert').addClass('hidden');
			
			if (json['success']) {				
				
				$('#cart-total').text(json['success']);
				
				$('#select_number' + key).find("input").val(qty);
				
				$('.goods' + key).find("td.price").text('￥ '+json['price']);
				
				$('.goods' + key).find("td.total").text('￥ '+json['total_price']);
				
				$('.last').text('总计： ￥ '+json['total_all_price']);
				
				$('#weight').text(json['weight']);
				
			}else if(json['error']){
				
				$('.alert-danger').removeClass('hidden');
				
				$('#fail').text(json['error']);				
				
			}	
		}
	);
}

function change_quantity(key,input,option,key){
	var qty=input.value;	
	update_cart(key,qty,option,key);
}

function changeQty(increase,goods_id,option,key) {
    var qty = parseInt($('#select_number' + key).find("input").val());  

    if ( !isNaN(qty) ) {
    	//增加
		if(increase){			
			update_cart(goods_id,(qty+1),option,key);
		}else{
			update_cart(goods_id,(qty-1),option,key);
		}     
    }
}	
$('.close').click(function(){
		$(this).parent().addClass('hidden');
});
</script>