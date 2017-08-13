<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo ((isset($web_title) && ($web_title !== ""))?($web_title):'后台管理'); ?> - <?php echo ((isset($_page_title) && ($_page_title !== ""))?($_page_title):'操作页面'); ?></title>

		<meta name="keywords" content="<?php echo ((isset($web_title) && ($web_title !== ""))?($web_title):'后台管理'); ?>|<?php echo ((isset($_page_title) && ($_page_title !== ""))?($_page_title):'操作页面'); ?>|<?php echo ($web_keywords); ?>"/>
		<meta name="description" content="<?php echo ((isset($web_title) && ($web_title !== ""))?($web_title):'后台管理'); ?>|<?php echo ((isset($_page_title) && ($_page_title !== ""))?($_page_title):'操作页面'); ?>|<?php echo ($web_description); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		
		<link rel="stylesheet" href="/Public/static/ace/css/bootstrap.css" />
		<link rel="stylesheet" href="/Public/static/components/font-awesome/css/font-awesome.css" />
		
		<link rel="stylesheet" href="/Public/static/components/jquery.gritter/css/jquery.gritter.css" />

		
		
		<link rel="stylesheet" href="/Public/static/ace/css/ace-fonts.css" />
		
	<link rel="stylesheet" type="text/css" href="/Public/static/components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
<!-- 	<link rel="stylesheet" type="text/css" href="/Public/static/components/chosen/chosen.min.css"> -->


		
		<link rel="stylesheet" href="/Public/static/ace/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/Public/static/ace/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="/Public/static/ace/css/ace-skins.css" />
		<link rel="stylesheet" href="/Public/static/ace/css/ace-rtl.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/Public/static/ace/css/ace-ie.css" />
		<![endif]-->
		
		<link rel="stylesheet" href="/Public/static/admin/css/main.css" />
		
		
	

		<link rel="stylesheet" href="/Public/static/ace/css/ace-rtl.css" />
		
		
		<script src="/Public/static/ace/js/ace-extra.js"></script>

		
		<!--[if lte IE 8]>
			<script src="/Public/static/components/html5shiv/dist/html5shiv.min.js"></script>
			<script src="/Public/static/components/respond/dest/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="<?php echo U('Admin/Index/index');?>" class="navbar-brand">
						<small>
							<i class="<?php echo ((isset($web_icon) && ($web_icon !== ""))?($web_icon):'fa fa-paper-plane-o'); ?>"></i>
							<?php echo ((isset($web_title) && ($web_title !== ""))?($web_title):'后台管理'); ?>
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="green">
							<a class="dropdown-toggle" href="http://ace.jeka.by" target="_blank">
								ACE ADMIN
							</a>
						</li>

						<li class="green">
							<a class="dropdown-toggle" href="http://fontawesome.dashgame.com" target="_blank">
								FA 图标
							</a>
						</li>

						<li class="green">
							<a class="dropdown-toggle" href="https://www.kancloud.cn/manual/thinkphp/1678" target="_blank">
								手册
							</a>
						</li>

						<li class="green">
							<a href="<?php echo U('System/cleardata');?>" title="清除缓存" target="_blank">
								<i class="ace-icon fa fa-refresh bigger-150"></i>
							</a>
						</li>

						<li class="grey dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									4 Tasks to complete
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Software Update</span>
													<span class="pull-right">65%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:65%" class="progress-bar"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Hardware Upgrade</span>
													<span class="pull-right">35%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:35%" class="progress-bar progress-bar-danger"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Unit Testing</span>
													<span class="pull-right">15%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:15%" class="progress-bar progress-bar-warning"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Bug Fixes</span>
													<span class="pull-right">90%</span>
												</div>

												<div class="progress progress-mini progress-striped active">
													<div style="width:90%" class="progress-bar progress-bar-success"></div>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifications
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Bob just signed up as an editor ...
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									5 Messages
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#" class="clearfix">
												<img src="/Public/static/ace/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="/Public/static/ace/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="/Public/static/ace/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="/Public/static/ace/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="/Public/static/ace/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="/Public/static/ace/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info center">
									<small><?php echo ($_SESSION["admin"]["nickname"]); ?></small>
									<small>[<?php echo ($_SESSION["admin"]["groupname"]); ?>]</small>
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?php echo U('Admin/edit',array('id'=>$_SESSION['admin']['id']));?>">
										<i class="ace-icon fa fa-cog"></i>
										我的设置
									</a>
								</li>

								<li>
									<a href="<?php echo U('Admin/info',array('id'=>$_SESSION['admin']['id']));?>">
										<i class="ace-icon fa fa-user"></i>
										我的详情
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo U('Login/loginOut');?>">
										<i class="ace-icon fa fa-power-off"></i>
										安全退出
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<!-- #section:basics/sidebar.layout.shortcuts -->
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li <?php if(($nowUrl) == "Admin/Index/index"): ?>class="active"<?php endif; ?>>
						<a href="<?php echo U('Admin/Index/index');?>">
							<i class="menu-icon fa fa-home home-icon"></i>
							<span class="menu-text"> 后台首页 </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if(is_array($leftMenus)): foreach($leftMenus as $key=>$vo): ?><li <?php echo ((isset($vo["active"]) && ($vo["active"] !== ""))?($vo["active"]):''); ?>>
							<a href="javascript:void(0);" class="dropdown-toggle">
								<i class="menu-icon <?php echo ($vo["icon"]); ?>"></i>
								<span class="menu-text"> <?php echo ($vo["title"]); ?> </span>

								<b class="arrow fa fa-angle-down"></b>
							</a>

							<b class="arrow"></b>

							<ul class="submenu">
								<?php if(is_array($vo["childrens"])): foreach($vo["childrens"] as $key=>$v): ?><li <?php echo ((isset($v["active"]) && ($v["active"] !== ""))?($v["active"]):''); ?>>
										<a href="<?php echo U($v['url']);?>">
											<i class="menu-icon <?php echo ($v["icon"]); ?>"></i>
											<?php echo ($v["title"]); ?>
										</a>

										<b class="arrow"></b>
									</li><?php endforeach; endif; ?>								
							</ul>
						</li><?php endforeach; endif; ?>
				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					
						<div class="breadcrumbs ace-save-state" id="breadcrumbs">
							<ul class="breadcrumb">
								<li>
									<i class="ace-icon fa fa-home home-icon"></i>
									<a href="<?php echo U('Admin/Index/index');?>">后台首页</a>
								</li>
								<?php if(!empty($_parent_page_title)): ?><li>
										<a href="<?php echo ($_parent_page_href); ?>"><?php echo ($_parent_page_title); ?></a>
									</li><?php endif; ?>
								<li class="active"><?php echo ($_page_title); ?></li>
							</ul><!-- /.breadcrumb -->

							<!-- #section:basics/content.searchbox -->
							<div class="nav-search" id="nav-search">
								<form class="form-search">
									<span class="input-icon">
										<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
										<i class="ace-icon fa fa-search nav-search-icon"></i>
									</span>
								</form>
							</div><!-- /.nav-search -->

							<!-- /section:basics/content.searchbox -->
						</div>
					
					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn" style="width: 1.6rem;border-radius: 1.4rem 0 0 1.4rem;">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<!-- #section:settings.skins -->
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<!-- /section:settings.skins -->

									<!-- #section:settings.navbar -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<!-- /section:settings.navbar -->

									<!-- #section:settings.sidebar -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<!-- /section:settings.sidebar -->

									<!-- #section:settings.breadcrumbs -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<!-- /section:settings.breadcrumbs -->

									<!-- #section:settings.rtl -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<!-- /section:settings.rtl -->

									<!-- #section:settings.container -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>

									<!-- /section:settings.container -->
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<!-- #section:basics/sidebar.options -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>

									<!-- /section:basics/sidebar.options -->
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<!-- /section:settings.box -->
						<div class="row">
							<div class="col-xs-12">
								
									
<!-- S -->

<div class="widget-container-col" id="widget-container-col-11">
	<div class="widget-box widget-color-blue2" id="widget-box-11">
		<div class="widget-header">
			<h6 class="widget-title">
				<i class="menu-icon fa fa-user-plus"></i>&ensp;<?php echo ($_page_title); ?>
			</h6>

			<div class="widget-toolbar">
				<a title="返回列表" href="#" onclick='location.href="<?php echo U('index');?>"' data-action="settings">
					<i class="ace-icon fa fa-reply"></i>
				</a>

				<a href="#" data-action="fullscreen" class="orange2">
					<i class="ace-icon fa fa-expand"></i>
				</a>
			</div>
		</div>

		<div class="widget-body">
			<!-- 表单 开始 -->
			<form class="form-horizontal" method="POST" role="form" action="/index.php/Admin/Article/add.html" enctype="multipart/form-data">
			<!-- 主体 S -->
			<div class="widget-main">
				<div class="row">
				<div class="col-xs-12 col-sm-6">

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="field-title"> 文章标题 </label>
						<div class="col-sm-9">
							<input type="text" id="field-title" name="title" value="<?php echo ((isset($data["title"]) && ($data["title"] !== ""))?($data["title"]):''); ?>" placeholder="文章标题" class="col-xs-10 col-sm-10" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="field-cate_id"> 文章类型 </label>
						<div class="col-sm-9">
							<select name="cate_id" id="field-cate_id" class="col-xs-10 col-sm-10" placeholder="文章类型">
								<?php if(is_array($cateData)): foreach($cateData as $key=>$vo): if(!in_array(($vo["id"]), is_array($childrenData)?$childrenData:explode(',',$childrenData))): ?><option value="<?php echo ($vo["id"]); ?>" <?php if(($vo["id"]) == $data["cate_id"]): ?>selected<?php endif; ?>>
											<?php echo str_repeat('&ensp;', ($vo['level']-1) * 3); ?>|__ <?php echo ($vo["catename"]); ?>
										</option><?php endif; endforeach; endif; ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="field-clicknum"> 点&ensp;击&ensp;量 </label>
						<div class="col-sm-9">
							<input type="text" id="field-clicknum" name="clicknum" value="<?php echo ((isset($data["clicknum"]) && ($data["clicknum"] !== ""))?($data["clicknum"]):'0'); ?>" placeholder="点击量" class="col-xs-10 col-sm-10" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="field-looknum"> 浏&ensp;览&ensp;量 </label>
						<div class="col-sm-9">
							<input type="text" id="field-looknum" name="looknum" value="<?php echo ((isset($data["looknum"]) && ($data["looknum"] !== ""))?($data["looknum"]):'0'); ?>" placeholder="浏览量" class="col-xs-10 col-sm-10" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="field-pushtime"> 发布时间 </label>
						<div class="col-sm-9">
							<div class="input-group col-xs-10 col-sm-10">
								<input class="form-control date-picker" value="<?php echo isset($data['pushtime'])?$data['pushtime']:date('Y-m-d H:i:00');?>" id="field-pushtime" name="pushtime" placeholder="发布时间" type="text" data-date-format="YYYY-MM-DD HH:mm:00">
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="field-keywords"> 关&ensp;键&ensp;词 </label>
						<div class="col-sm-9">
							<textarea name="keywords" id="field-keywords" class="col-xs-10 col-sm-10" placeholder="关键词"><?php echo ((isset($data["keywords"]) && ($data["keywords"] !== ""))?($data["keywords"]):''); ?></textarea>
						
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="field-tag"> 标&emsp;&emsp;签 </label>
						<div class="col-sm-9 input-tag">
							<textarea name="tag" id="field-tag" class="col-xs-10 col-sm-10" placeholder="文章标签"></textarea>
						</div>
					</div>

				</div>
				<div class="col-xs-12 col-sm-6">

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="field-title"> 文章图片 </label>
						<div class="col-sm-9 input-file">
							<input accept="image/gif,image/jpeg,image/jpg,image/png,image/svg" type="file" class="input-sm col-xs-10 col-sm-10" id="inputfile" name="uploadfile">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="field-status"> 是否显示 </label>
						<div class="col-sm-9">
							<div class="col-sm-9">
								<input name="status" value="1" id="field-status" 
									<?php if(((isset($data["status"]) && ($data["status"] !== ""))?($data["status"]):'1') == "1"): ?>checked<?php endif; ?> class="ace ace-switch ace-switch-7" type="checkbox" />
									<span class="lbl"></span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="field-ishot"> 是否热门 </label>
						<div class="col-sm-9">
							<div class="col-sm-9">
								<input name="ishot" value="1" id="field-ishot" 
									<?php if(((isset($data["ishot"]) && ($data["ishot"] !== ""))?($data["ishot"]):'0') == "1"): ?>checked<?php endif; ?> class="ace ace-switch ace-switch-7" type="checkbox" />
									<span class="lbl"></span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="field-istop"> 是否置顶 </label>
						<div class="col-sm-9">
							<div class="col-sm-9">
								<input name="istop" value="1" id="field-istop" 
									<?php if(((isset($data["istop"]) && ($data["istop"] !== ""))?($data["istop"]):'0') == "1"): ?>checked<?php endif; ?> class="ace ace-switch ace-switch-7" type="checkbox" />
									<span class="lbl"></span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="field-iscopy"> 是否转载 </label>
						<div class="col-sm-9">
							<div class="col-sm-9">
								<input name="iscopy" value="1" id="field-iscopy" 
									<?php if(((isset($data["iscopy"]) && ($data["iscopy"] !== ""))?($data["iscopy"]):'0') == "1"): ?>checked<?php endif; ?> class="ace ace-switch ace-switch-7" type="checkbox" />
									<span class="lbl"></span>
							</div>
						</div>
					</div>
					
				</div>
				<div class="col-xs-12 col-sm-12">
					<div class="col-xs-12 col-sm-12">
						<label class="control-label"> 文章内容 </label>
					</div>
					<div class="col-xs-12 col-sm-12">
						<textarea id='field-content' name="content" title="文章内容"><?php echo ((isset($data["content"]) && ($data["content"] !== ""))?($data["content"]):''); ?></textarea>
					</div>
				</div>
				</div>
			</div>
			<!-- 主体 E -->
			<?php if(!empty($data["id"])): ?><input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
				<input type="hidden" name="old_image" value="<?php echo ($data["image"]); ?>">
				<input type="hidden" name="old_minimg" value="<?php echo ($data["minimg"]); ?>"><?php endif; ?>
			<!-- 底部 S -->
			<div class="widget-toolbox padding-8 clearfix">
				<div class="btn-group pull-left">
					<button type="submit" class="btn btn-sm btn-success btn-bold">
					<!-- <button type="submit" class="btn btn-sm btn-success btn-bold" data-toggle="button"> -->
						<i class="ace-icon fa fa-save"></i>
						保存
					</button> 
				</div>

				<div class="btn-group pull-right">
					<button type="reset" value="Reset" class="btn btn-sm btn-danger btn-bold">
						<i class="ace-icon fa fa-undo"></i>
						重置
					</button> 
				</div>
			</div>
			<!-- 底部 E -->
			</form>
			<!-- 表单 结束 -->
		</div>
	</div>
</div>

<!-- E -->

								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		
		<!--[if !IE]> -->
			<script src="/Public/static/components/jquery/dist/jquery.js"></script>
		<!-- <![endif]-->

		<!--[if IE]>
			<script src="/Public/static/components/jquery.1x/dist/jquery.js"></script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) 
			document.write("<script src='/Public/static/components/_mod/jquery.mobile.custom/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="/Public/static/components/bootstrap/dist/js/bootstrap.js"></script>
		
		<script src="/Public/static/components/jquery.gritter/js/jquery.gritter.js"></script>
		<script src="/Public/static/components/spin.js/spin.js"></script>

		<script type="text/javascript" src="/Public/static/admin/js/main.js"></script>
		
		
<script src="/Public/static/ace/js/ace-elements.js"></script>
<script src="/Public/static/components/_mod/bootstrap-tag/bootstrap-tag.min.js"></script>

<script src="/Public/static/components/moment/moment.min.js"></script>
<script src="/Public/static/components/bootstrap-daterangepicker/daterangepicker.min.js"></script>
<script src="/Public/static/components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript" src="/Public/static/components/UEditor-utf8/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/static/components/UEditor-utf8/ueditor.all.min.js"></script>
<script type="text/javascript" src="/Public/static/components/UEditor-utf8/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">
	$(function($) {

    });
</script>


		
		<script src="/Public/static/ace/js/src/elements.scroller.js"></script>
		<script src="/Public/static/ace/js/src/elements.colorpicker.js"></script>
		<script src="/Public/static/ace/js/src/elements.fileinput.js"></script>
		<script src="/Public/static/ace/js/src/elements.typeahead.js"></script>
		<script src="/Public/static/ace/js/src/elements.wysiwyg.js"></script>
		<script src="/Public/static/ace/js/src/elements.spinner.js"></script>
		<script src="/Public/static/ace/js/src/elements.treeview.js"></script>
		<script src="/Public/static/ace/js/src/elements.wizard.js"></script>
		<script src="/Public/static/ace/js/src/elements.aside.js"></script>
		<script src="/Public/static/ace/js/src/ace.js"></script>
		<script src="/Public/static/ace/js/src/ace.basics.js"></script>
		<script src="/Public/static/ace/js/src/ace.scrolltop.js"></script>
		<script src="/Public/static/ace/js/src/ace.ajax-content.js"></script>
		<script src="/Public/static/ace/js/src/ace.touch-drag.js"></script>
		<script src="/Public/static/ace/js/src/ace.sidebar.js"></script>
		<script src="/Public/static/ace/js/src/ace.sidebar-scroll-1.js"></script>
		<script src="/Public/static/ace/js/src/ace.submenu-hover.js"></script>
		<script src="/Public/static/ace/js/src/ace.widget-box.js"></script>
		<script src="/Public/static/ace/js/src/ace.settings.js"></script>
		<script src="/Public/static/ace/js/src/ace.settings-rtl.js"></script>
		<script src="/Public/static/ace/js/src/ace.settings-skin.js"></script>
		<script src="/Public/static/ace/js/src/ace.widget-on-reload.js"></script>
		<script src="/Public/static/ace/js/src/ace.searchbox-autocomplete.js"></script>
		
		
<script type="text/javascript">
$(function($) {
$('#inputfile').ace_file_input({
		style: 'well',
		btn_choose: '拖放文件，或单击以选择图片',
		btn_change: null,
		no_icon: 'ace-icon fa fa-cloud-upload',
		droppable: true,
		thumbnail: 'small'//large | fit
		//,icon_remove:null//set null, to hide remove/reset button
		/**,before_change:function(files, dropped) {
			//Check an example below
			//or examples/file-upload.html
			return true;
		}*/
		/**,before_remove : function() {
			return true;
		}*/
		,
		preview_error : function(filename, error_code) {
			//name of the file that failed
			//error_code values
			//1 = 'FILE_LOAD_FAILED',
			//2 = 'IMAGE_LOAD_FAILED',
			//3 = 'THUMBNAIL_FAILED'
			//alert(error_code);
		}

	}).on('change', function(){
		//console.log($(this).data('ace_input_files'));
		//console.log($(this).data('ace_input_method'));
});
// 设置input file 样式
$('.input-file .ace-file-input').addClass('col-xs-10 col-sm-10').css('padding',0);
// 设置标签
var tag_input = $('#field-tag');
	try{
		tag_input.tag(
		  {
			placeholder:tag_input.attr('placeholder'),
			//enable typeahead by specifying the source array
			// source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
			
			//or fetch data from database, fetch those that match "query"
			source: function(query, process) {
			  $.ajax({url: '<?php echo U("Tag/ajaxTag");?>?q='+encodeURIComponent(query)})
			  .done(function(result_items){
			  	result_items = eval("("+result_items+")");
				process(result_items);
			  });
			}
			
		  }
		)

		//programmatically add/remove a tag
		var $tag_obj = $('#field-tag').data('tag');
		// 设置默认值
		var tagVal = "<?php echo ((isset($data["tagname"]) && ($data["tagname"] !== ""))?($data["tagname"]):''); ?>";
		if (tagVal != '') {
			$(tagVal.split(',')).each(function(i, k) {
				$tag_obj.add(k);
			});
		}
		var index = $tag_obj.inValues('some tag');
		$tag_obj.remove(index);
	}
	catch(e) {
		//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
		tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
		//autosize($('#field-tag'));
	}
$('.input-tag .tags').addClass('col-xs-10 col-sm-10').css('width','83.33%');
// 时间
if(!ace.vars['old_ie']) {
	$('#field-pushtime').datetimepicker({
		 format: 'YYYY-MM-DD hh:mm:00',//use this option to display seconds
		 // defaultDate： '<?php echo ($data["pushtime"]); ?>',
		 sideBySide: true, //可以同时选择日期和时间
		 icons: {
			time: 'fa fa-clock-o',
			date: 'fa fa-calendar',
			up: 'fa fa-chevron-up',
			down: 'fa fa-chevron-down',
			previous: 'fa fa-chevron-left',
			next: 'fa fa-chevron-right',
			today: 'fa fa-arrows ',
			clear: 'fa fa-trash',
			close: 'fa fa-times'
		 }
	}).next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	// $('#field-pushtime').data('DateTimePicker').date(moment());
}
// 编辑框
	var ue = UE.getEditor('field-content', {
		"initialFrameWidth" : "100%",
		"initialFrameHeight" : 300,
		"elementPathEnabled" : false,
	});
});

</script>

	</body>
</html>