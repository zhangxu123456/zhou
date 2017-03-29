<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
	<title>微信支付测试</title>
    <base href="<?php echo request()->domain();?>" />
    <link href="/theguide/Themes/Home/default/Public/static/css/bootstrap.css" rel="stylesheet">
    <link href="/theguide/Themes/Home/default/Public/static/css/common.css" rel="stylesheet">
    <link href="/theguide/Themes/Home/default/Public/static/css/admin.css" rel="stylesheet">
	<script src="/theguide/Themes/Home/default/Public/static/js/jquery-1.12.0.min.js"></script>
    <script src="/theguide/Themes/Home/default/Public/static/js/bootstrap.min.js"></script>
    <script src="/theguide/Themes/Home/default/Public/static/js/jquery.qrcode.min.js"></script>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
</head>
<body>
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>微信支付测试</strong>
		</div>
		<div class="panel-body">
			<form class="form-horizontal weixin-form" method="post" action="<?php echo U('Pay/weixin');?>">
				<div class="form-group">
					<label class="col-sm-2 control-label">订单编号</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="order_num_alias" value="<?php echo ($order_num_alias); ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">支付标题</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="attach" value="账户余额充值">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">支付描述</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="body" value="在线充值金额到账户余额">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">支付金额</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="total_fee" value="0.01">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">立即支付</button>
					</div>
				</div>
			</form>
		</div>
		<div class="panel-footer">&nbsp;</div>
	</div>
</div>
<script>
	$(function(){
		$('.weixin-form').submit(function(){
			var $this = $(this);
			if(!$this.hasClass('lock-form')){
				$this.addClass('lock-form');//锁定表单
				var formData = new FormData($this[0]);<?php echo U('User/weixin');?>
				$.ajax({
					url:$this.attr("action"),
					type:'POST',
					data:formData,
					dataType:'json',
					cache: false,
					contentType: false,
					processData: false,
					success:function(s){
						$this.removeClass('lock-form');//解锁表单
						if(s.code != 1){
							$('.panel-footer').html(s.msg);
							return false;
						}
						if(!s.msg){
							$('.panel-footer').html('二维码生成失败，请重新提交！');
							return false;
						}
						var html = '<div class="modal-header"><a class="close" data-dismiss="modal" aria-label="Close" href="javascript:;"><span aria-hidden="true">&times;</span></a><h4 class="modal-title">微信支付</h4></div>';
						html += '<div class="modal-body weixin-qrcode text-center"></div>';
						html += '<div class="modal-footer"><p class="text-center">请使用微信扫描二维码完成支付</p></div>';
						if($('.ajax-form-modal').length > 0){
							content = $('.ajax-form-modal .modal-content');
						}else{
							fade = $('<div></div>').addClass('modal fade ajax-form-modal').appendTo('body');
							dialog = $('<div></div>').addClass('modal-dialog').appendTo(fade);
							content = $('<div></div>').addClass('modal-content').appendTo(dialog);
						}
						content.html(html);
						$('.weixin-qrcode').qrcode({width:300,height: 300,text: s.msg});
						$('.ajax-form-modal').modal('show');
						return false;
					}
				});
			}
			return false;
		});
	});
</script>
</body>
</html>