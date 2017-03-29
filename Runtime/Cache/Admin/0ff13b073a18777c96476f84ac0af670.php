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
				图片尺寸
			</small>
		</h1>
	</div>
<div class="row">
	<div class="col-xs-12">	
		<form class="form-horizontal"  id="form" method="post" action="<?php echo U('Settings/save');?>">	
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> * 商品通用缩略图 </label>
			<div class="col-sm-10">
				<div class="col-sm-6">
					<input name="common_image_thumb_width" class="form-control"  value="<?php echo ((isset($image["common_image_thumb_width"]["value"]) && ($image["common_image_thumb_width"]["value"] !== ""))?($image["common_image_thumb_width"]["value"]):''); ?>" type="text">
				</div>
				<div class="col-sm-6">
					<input name="common_image_thumb_height" class="form-control"  value="<?php echo ((isset($image["common_image_thumb_height"]["value"]) && ($image["common_image_thumb_height"]["value"] !== ""))?($image["common_image_thumb_height"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> * 图册右侧缩略图 </label>
			<div class="col-sm-10">
				<div class="col-sm-6">
					<input name="gallery_thumb_width" class="form-control"  value="<?php echo ((isset($image["gallery_thumb_width"]["value"]) && ($image["gallery_thumb_width"]["value"] !== ""))?($image["gallery_thumb_width"]["value"]):''); ?>" type="text">
				</div>
				<div class="col-sm-6">
					<input name="gallery_thumb_height" class="form-control"  value="<?php echo ((isset($image["gallery_thumb_height"]["value"]) && ($image["gallery_thumb_height"]["value"] !== ""))?($image["gallery_thumb_height"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> * 图册关联商品缩略图 </label>
			<div class="col-sm-10">
				<div class="col-sm-6">
					<input name="gallery_related_thumb_width" class="form-control"  value="<?php echo ((isset($image["gallery_related_thumb_width"]["value"]) && ($image["gallery_related_thumb_width"]["value"] !== ""))?($image["gallery_related_thumb_width"]["value"]):''); ?>" type="text">
				</div>
				<div class="col-sm-6">
					<input name="gallery_related_thumb_height" class="form-control"  value="<?php echo ((isset($image["gallery_related_thumb_height"]["value"]) && ($image["gallery_related_thumb_height"]["value"] !== ""))?($image["gallery_related_thumb_height"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> * 博客列表缩略图 </label>
			<div class="col-sm-10">
				<div class="col-sm-6">
					<input name="blog_list_thumb_width" class="form-control"  value="<?php echo ((isset($image["blog_list_thumb_width"]["value"]) && ($image["blog_list_thumb_width"]["value"] !== ""))?($image["blog_list_thumb_width"]["value"]):''); ?>" type="text">
				</div>
				<div class="col-sm-6">
					<input name="blog_list_thumb_height" class="form-control"  value="<?php echo ((isset($image["blog_list_thumb_height"]["value"]) && ($image["blog_list_thumb_height"]["value"] !== ""))?($image["blog_list_thumb_height"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>			
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> * 商品详情放大镜底图 </label>
			<div class="col-sm-10">
				<div class="col-sm-6">
					<input name="goods_thumb_width" class="form-control"  value="<?php echo ((isset($image["goods_thumb_width"]["value"]) && ($image["goods_thumb_width"]["value"] !== ""))?($image["goods_thumb_width"]["value"]):''); ?>" type="text">
				</div>
				<div class="col-sm-6">
					<input name="goods_thumb_height" class="form-control"  value="<?php echo ((isset($image["goods_thumb_height"]["value"]) && ($image["goods_thumb_height"]["value"] !== ""))?($image["goods_thumb_height"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> * 商品放大镜下左右移动小图 </label>
			<div class="col-sm-10">
				<div class="col-sm-6">
					<input name="goods_gallery_thumb_width" class="form-control"  value="<?php echo ((isset($image["goods_gallery_thumb_width"]["value"]) && ($image["goods_gallery_thumb_width"]["value"] !== ""))?($image["goods_gallery_thumb_width"]["value"]):''); ?>" type="text">
				</div>
				<div class="col-sm-6">
					<input name="goods_gallery_thumb_height" class="form-control"  value="<?php echo ((isset($image["goods_gallery_thumb_height"]["value"]) && ($image["goods_gallery_thumb_height"]["value"] !== ""))?($image["goods_gallery_thumb_height"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> * 商品详情关联商品缩略图 </label>
			<div class="col-sm-10">
				<div class="col-sm-6">
					<input name="goods_related_thumb_width" class="form-control"  value="<?php echo ((isset($image["goods_related_thumb_width"]["value"]) && ($image["goods_related_thumb_width"]["value"] !== ""))?($image["goods_related_thumb_width"]["value"]):''); ?>" type="text">
				</div>
				<div class="col-sm-6">
					<input name="goods_related_thumb_height" class="form-control"  value="<?php echo ((isset($image["goods_related_thumb_height"]["value"]) && ($image["goods_related_thumb_height"]["value"] !== ""))?($image["goods_related_thumb_height"]["value"]):''); ?>" type="text">
				</div>
			</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-left"> * 购物车商品缩略图 </label>
			<div class="col-sm-10">
				<div class="col-sm-6">
					<input name="goods_cart_thumb_width" class="form-control"  value="<?php echo ((isset($image["goods_cart_thumb_width"]["value"]) && ($image["goods_cart_thumb_width"]["value"] !== ""))?($image["goods_cart_thumb_width"]["value"]):''); ?>" type="text">
				</div>
				<div class="col-sm-6">
					<input name="goods_cart_thumb_height" class="form-control"  value="<?php echo ((isset($image["goods_cart_thumb_height"]["value"]) && ($image["goods_cart_thumb_height"]["value"] !== ""))?($image["goods_cart_thumb_height"]["value"]):''); ?>" type="text">
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
		
								
				
	</body>
</html>