<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo C('SITE_NAME'); ?>-后台管理中心</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link href="./Themes/Admin/Public/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="./Themes/Admin/Public/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="./Themes/Admin/Public/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->
		
		<link type="image/x-icon" href="<?php echo resize(C('SITE_ICON'),16,16); ?>" rel="icon">
		<link type="image/x-icon" href="<?php echo resize(C('SITE_ICON'),16,16); ?>" rel="bookmark">
		
		
		<link rel="stylesheet" href="./Themes/Admin/Public/css/ace.min.css" />
		<link rel="stylesheet" href="./Themes/Admin/Public/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="./Themes/Admin/Public/css/ace-skins.min.css" />
		
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="./Themes/Admin/Public/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="./Themes/Admin/Public/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="./Themes/Admin/Public/js/html5shiv.js"></script>
		<script src="./Themes/Admin/Public/js/respond.min.js"></script>
		<![endif]-->
		
		
			
				
		
	</head>

	<body class="navbar-fixed">
		<div class="navbar navbar-default navbar-fixed-top" id="navbar">
			
			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="<?php echo U('Index/index');?>" class="navbar-brand">
						<small>
							<!--
							<i class="icon-leaf"></i>
							-->
							<?php echo C('SITE_NAME'); ?> 后台管理
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">						

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							
								<span class="user-info">
									<?php echo session('user_auth.username'); ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								

								<li class="divider"></li>

								<li>
									<a target="_blank" href="/theguide/">网站前台</a>
									<a href="<?php echo U('Public/clear');?>">清空缓存</a>
									<a href="<?php echo U('Public/logout');?>">退出系统</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar sidebar-fixed" id="sidebar">					
				
					<?php W('Menu/menu_show');?>
					

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#"><?php echo ($breadcrumb1); ?></a>
							</li>
							<li class="active"><?php echo ($breadcrumb2); ?></li>
							
						</ul><!-- .breadcrumb -->

						
					</div>

					<div class="page-content">
						
<div class="page-header">
	<h1>
		<?php echo ($breadcrumb2); ?>
		<small>
			<i class="icon-double-angle-right"></i>
			基本信息
		</small>
	</h1>
</div>
<div class="row">
	<div class="col-xs-12">	
		<form class="form-horizontal"  id="form" method="post" action="<?php echo U('Settings/save');?>">	
		
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left">网站ICON </label>
			<div class="col-sm-10">
				 <div class="col-sm-10" id="thumb">
                  	<a href="#" data-toggle="image" class="img-thumbnail">
                  		<img osctype="image" <?php if($site['SITE_ICON']['value']): ?>src="/theguide/<?php echo resize($site['SITE_ICON']['value'],100,100); ?>" 
						<?php else: ?> 
							src="/theguide/Common/image/no_image_40x40.jpg"<?php endif; ?>  />
					</a>
	                <input osctype="image_input" type="hidden" name="SITE_ICON" value="<?php echo ((isset($site["SITE_ICON"]["value"]) && ($site["SITE_ICON"]["value"] !== ""))?($site["SITE_ICON"]["value"]):''); ?>" id="input-image" />
	            </div>
			</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> * 网站标题 </label>
			<div class="col-sm-10">
				<div class="clearfix">
					<input name="SITE_TITLE" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["SITE_TITLE"]["value"]) && ($site["SITE_TITLE"]["value"] !== ""))?($site["SITE_TITLE"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> * 网站名称 </label>
			<div class="col-sm-10">
				<div class="clearfix">
					<input name="SITE_NAME" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["SITE_NAME"]["value"]) && ($site["SITE_NAME"]["value"] !== ""))?($site["SITE_NAME"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> * 网站描述 </label>
			<div class="col-sm-10">
				<div class="clearfix">
					<textarea name="SITE_DESCRIPTION" id="input-meta-description2" class="form-control" rows="5" ><?php echo ((isset($site["SITE_DESCRIPTION"]["value"]) && ($site["SITE_DESCRIPTION"]["value"] !== ""))?($site["SITE_DESCRIPTION"]["value"]):''); ?></textarea>
				</div>
			</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> * 网站关键字 </label>
			<div class="col-sm-10">
				<div class="clearfix">
					<input name="SITE_KEYWORDS" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["SITE_KEYWORDS"]["value"]) && ($site["SITE_KEYWORDS"]["value"] !== ""))?($site["SITE_KEYWORDS"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label" for="input-tag2">
					网站slogan
				</label>
			<div class="col-sm-10">
				<div class="clearfix">
					<input name="SITE_SLOGAN" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["SITE_SLOGAN"]["value"]) && ($site["SITE_SLOGAN"]["value"] !== ""))?($site["SITE_SLOGAN"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> 网址 </label>
			<div class="col-sm-10">
				<div class="clearfix">
					<input name="SITE_URL" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["SITE_URL"]["value"]) && ($site["SITE_URL"]["value"] !== ""))?($site["SITE_URL"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> 短网址 </label>
			<div class="col-sm-10">
				<div class="clearfix">
					<input name="SHORT_URL" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["SHORT_URL"]["value"]) && ($site["SHORT_URL"]["value"] !== ""))?($site["SHORT_URL"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left">  备案号</label>
			<div class="col-sm-10">
				<div class="clearfix">
					<input name="SITE_ICP" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["SITE_ICP"]["value"]) && ($site["SITE_ICP"]["value"] !== ""))?($site["SITE_ICP"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left">  邮箱</label>
			<div class="col-sm-10">
				<div class="clearfix">
					<input name="EMAIL" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["EMAIL"]["value"]) && ($site["EMAIL"]["value"] !== ""))?($site["EMAIL"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left">  联系电话</label>
			<div class="col-sm-10">
				<div class="clearfix">
					<input name="TELEPHONE" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["TELEPHONE"]["value"]) && ($site["TELEPHONE"]["value"] !== ""))?($site["TELEPHONE"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> 站点状态</label>
			<div class="col-sm-10">
				<div class="clearfix">					
						<label class="radio-inline"><input <?php if($site['WEB_SITE_CLOSE']['value']==1){echo ' checked="checked"';} ?> type="radio" value="1" name="WEB_SITE_CLOSE">开启</label>	
						<label class="radio-inline"><input <?php if($site['WEB_SITE_CLOSE']['value']==0){echo ' checked="checked"';} ?> type="radio" value="0" name="WEB_SITE_CLOSE">关闭</label>				
				</div>
			</div>
			</div>
			
			
		</form>
		<div class="form-group">
			<label class="col-sm-1 control-label no-padding-left"> </label>	
			<div class="col-sm-11">
				<button form="form" type="submit"   class="btn btn-sm btn-primary">提交</button>		
			</div>
		</div>
	</div>
</div>

					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
				
				
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		
		<script src="/theguide/Common/js/jquery/jquery-2.0.3.min.js"></script>
		<script src="/theguide/Common/js/jquery/jquery-migrate-1.2.1.min.js"></script>
			
		<!-- <![endif]-->

		<!--[if IE]>
		<script src="/theguide/Common/js/jquery/jquery-1.10.2.min.js"></script>
		<script src="/theguide/Common/js/jquery/jquery-migrate-1.2.1.min.js"></script>
		<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='./Themes/Admin/Public/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="./Themes/Admin/Public/js/bootstrap.min.js"></script>
		<script src="./Themes/Admin/Public/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="./Themes/Admin/Public/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="./Themes/Admin/Public/js/ace-elements.min.js"></script>
		<script src="./Themes/Admin/Public/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script src="/theguide/Common/js/oscshop_common.js"></script>
		
<script src="/theguide/Common/fileupload/jquery.ui.widget.js"></script>
<script src="/theguide/Common/fileupload/jquery.fileupload.js"></script>
<script>	
$(function(){	
	
	// tooltips on hover button-upload
	$('[data-toggle=\'tooltip\']').tooltip({container: 'body', html: true});

	// Makes tooltips work on ajax generated content
	$(document).ajaxStop(function() {
		$('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
	});	
	
	
	
	$(document).delegate('a[data-toggle=\'image\']', 'click', function(e) {
		e.preventDefault();
		
		var index=$(this).attr('num');
		
		//alert(index);
		
		var element = this;
		
		if(index==undefined){
			$(element).popover({
				html: true,
				placement: 'right',
				trigger: 'manual',
				content: function() {
					return '<button type="button" id="thumb-image"  class="btn btn-primary"><i class="icon-edit"></i></button> <button type="button" id="button-clear" class="btn btn-danger"><i class="icon-trash"></i></button>';
				}
			});
		}
		

		
		$(element).popover('toggle');	
		
		//商品图片
		$('#thumb-image').on('click', function() {
			
			//alert('333');
			
			$('#modal-image').remove();
			
			$('#form-upload').remove();
			
			$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input osctype="btn_upload_image" type="file" name="file" /></form>');
	
			$('#form-upload input[name=\'file\']').trigger('click');
			
			$(element).popover('hide');
			
			$('[osctype="btn_upload_image"]').fileupload({
				
	        	dataType: 'json',
	            url: "<?php echo U('Image/upload_image',array('dir'=>'shop'));?>",
	            add: function(e, data) {
	                $parent = $('#thumb');
	                $input = $parent.find('[osctype="image_input"]');
	                $img = $parent.find('[osctype="image"]');
	                data.formData = {old_goods_image:$input.val()};
	                $img.attr('src', "./Themes/Admin/Public/img/loading.gif");
	                data.submit();
	            },
	            done: function (e,data) {
					
	            	var image=data.result;	            	
	            	
	                $parent = $('#thumb');
	                $input = $parent.find('[osctype="image_input"]');
	                $img = $parent.find('[osctype="image"]');
	                if(image) {
	                   // $img.prev('i').hide();
	                    $img.attr('src', '/theguide'+image.image_thumb);
	                    $img.show();
	                    $input.val(image.image);
	                } else {
	                    alert('上传失败');
	                }
	            }
   		 });
		});

			
		
	
		$('#button-clear').on('click', function() {
			$(element).find('img').attr('src', $(element).find('img').attr('data-placeholder'));
			
			$(element).parent().find('input').attr('value', '');
	
			$(element).popover('hide');
		});
	});
});
	
</script>
		
	</body>
</html>