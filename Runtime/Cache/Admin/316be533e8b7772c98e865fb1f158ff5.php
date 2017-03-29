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
	<a href="<?php echo U('Member/add');?>" class="btn btn-primary">新增用户</a>
</div>		
	
<table class="table table-striped table-bordered table-hover search-form">
	<thead>
		<th><input name="name" type="text" placeholder="输入用户名" value="<?php echo I('name');?>" /></th>
		<th><input name="email" type="text" placeholder="输入邮箱" value="<?php echo I('email');?>" /></th>
		<th><input name="tel" type="text" placeholder="输入手机号码" value="<?php echo I('tel');?>" /></th>
		<th>
			<a class="btn btn-primary" href="javascript:;" id="search" url="<?php echo U('Member/index');?>">查询</a>
		</th>
	</thead>
</table>	
	
<div class="row">
	<div class="col-xs-12">	
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>											
						<th>UID</th>
						<th>PID</th>
						<th>SID</th>
						<th>用户名</th>
						<th>联系人姓名</th>
						<th>联系人身份证</th>
                        <th>联系人邮箱</th>
						<th>推荐人邀请码</th>
                        <th>个人邀请码</th>
                        <th>居住地址</th>
                        <th width="5%">省市</th>

                        <th>身份证正面</th>
                        <th>身份证反面</th>
                        <th>居住地址证明</th>
                        
						<th>手机号码</th>  
						<th>登录次数</th>
						<th>登录IP</th>
						<th>创建时间</th>
						<th>最后登录</th>
						<th>状态</th>
						<th>操作</th>				
						<th>查看</th>				
					</tr>
				</thead>
				<tbody>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?><tr>							
							<td><?php echo ($m["member_id"]); ?></td>
							<td><?php echo ($m["pid"]); ?></td>
							<td><?php echo ($m["sid"]); ?></td>
							<td><?php echo ($m["uname"]); ?></td>
							<td><?php echo ($m["name"]); ?></td>
							<td><?php echo ($m["id_card"]); ?></td>
							<td><?php echo ($m["email"]); ?></td>
							<td><?php echo ($m["referee_code"]); ?></td>
							<td><?php echo ($m["invite_code"]); ?></td>
							<td><?php echo ($m["addressall"]); ?></td>
							<td><?php echo ($m["loc_province"]); ?></td>

							<td><img src="/theguide/uploads/image/regimage/<?php echo ($m["idcadeimage1"]); ?>" border="0" height="60" width="100"></td>
                            <td><img src="/theguide/uploads/image/regimage/<?php echo ($m["idcadeimage2"]); ?>" border="0" height="60" width="100"></td>
                            <td><img src="/theguide/uploads/image/regimage/<?php echo ($m["addressimage"]); ?>" border="0" height="60" width="100"></td>

							<td><?php echo ($m["telephone"]); ?></td>
							<td><?php echo ($m["login_count"]); ?></td>
							<td><?php echo ($m["last_ip_region"]); ?></td>
							
							<td><?php echo empty($m['create_time'])?'无':date('Y-m-d H:i:s',$m['create_time']); ?></td>
							
							<td><?php echo empty($m['last_login_time'])?'无':date('Y-m-d H:i:s',$m['last_login_time']); ?></td>

							<td><a href='javascript:void(0);' onclick="changestatus_vip(<?php echo ($m["member_id"]); ?>, this)"><?php echo ($m["status"]); ?></a></td>

							<script type="text/javascript">
								function changestatus_vip(member_id,v){
								    $.get('<?php echo U("Member/changestatus_vip");?>/member_id/' + member_id, function(data){
								    	var data=JSON.parse(data);
								        if (data.status == 1){
								             $(v).html(data.info);
								         }
								    });
								}
							</script>

							<td>
								<?php if($m["num"] == 1): ?><a href="<?php echo U('Member/erji',array('member_id'=>$m['member_id']));?>">查看</a>
                                <?php else: ?>
                                	无<?php endif; ?>
                            </td>

							<td>
								<a  class="btn btn-xs btn-info" href='<?php echo U("Member/info",array("id"=>$m["member_id"]));?>'>
									<i class="icon-eye-open bigger-120"></i>
								</a> 

								<a style="width:32px;margin-top:2px;" class="delete btn btn-xs btn-danger" href='<?php echo U("Member/del",array("id"=>$m["member_id"]));?>'>
									<i class="icon-trash bigger-120"></i>
								</a>
							</td>
						</tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>	
						
						<tr>
							<td colspan="21" class="page"><?php echo ($page); ?></td>
						</tr>
				</tbody>
				
			</table>
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
		

<script type="text/javascript">
$(function(){
	$("#search").click(function () {
        var url = $(this).attr('url');
        var query = $('.search-form').find('input,select').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g, '');
        query = query.replace(/^&/g, '');
        if (url.indexOf('?') > 0) {
            url += '&' + query;
        } else {
            url += '?' + query;
        }
        window.location.href = url;
    });
});		
</script>
		
	</body>
</html>