<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo ((isset($web_title) && ($web_title !== ""))?($web_title):'后台管理'); ?> - <?php echo ((isset($_page_title) && ($_page_title !== ""))?($_page_title):'操作页面'); ?></title>

		<meta name="keywords" content="<?php echo ((isset($web_title) && ($web_title !== ""))?($web_title):'后台管理'); ?>|<?php echo ((isset($_page_title) && ($_page_title !== ""))?($_page_title):'操作页面'); ?>|<?php echo ($web_keywords); ?>"/>
		<meta name="description" content="<?php echo ((isset($web_title) && ($web_title !== ""))?($web_title):'后台管理'); ?>|<?php echo ((isset($_page_title) && ($_page_title !== ""))?($_page_title):'操作页面'); ?>|<?php echo ($web_description); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		
		<link rel="stylesheet" href="/public/static/ace/css/bootstrap.css" />
		<link rel="stylesheet" href="/public/static/components/font-awesome/css/font-awesome.css" />
		
		<link rel="stylesheet" href="/public/static/components/jquery.gritter/css/jquery.gritter.css" />

		
		
		<link rel="stylesheet" href="/public/static/ace/css/ace-fonts.css" />
		

		
		<link rel="stylesheet" href="/public/static/ace/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/public/static/ace/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="/public/static/ace/css/ace-skins.css" />
		<link rel="stylesheet" href="/public/static/ace/css/ace-rtl.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/public/static/ace/css/ace-ie.css" />
		<![endif]-->
		
		<link rel="stylesheet" href="/public/static/admin/css/main.css" />
		
		
<link rel="stylesheet" type="text/css" href="/public/static/components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" type="text/css" href="/public/static/components/bootstrap-daterangepicker/daterangepicker.min.css">
<style type="text/css">
	#my-table-tool .search-select{
		margin-bottom: 2px;
	}
	#my-table-tool .search-btn{
		margin-bottom: 3px;
		line-height: .9em;
	}
	#data-table .td-img{
		padding: 2px;
	}
	#data-table .cursor-pointer span{
		cursor: pointer;
	}
</style>


		<link rel="stylesheet" href="/public/static/ace/css/ace-rtl.css" />
		
		
		<script src="/public/static/ace/js/ace-extra.js"></script>

		
		<!--[if lte IE 8]>
			<script src="/public/static/components/html5shiv/dist/html5shiv.min.js"></script>
			<script src="/public/static/components/respond/dest/respond.min.js"></script>
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
												<img src="/public/static/ace/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
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
												<img src="/public/static/ace/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
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
												<img src="/public/static/ace/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
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
												<img src="/public/static/ace/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
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
												<img src="/public/static/ace/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
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
								<img class="nav-user-photo" src="/public/static/ace/avatars/user.jpg" alt="Jason's Photo" />
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
<form class="form-horizontal form-search" role="form" method="get" action="/index.php/Admin/Article/recycleBin.html">
	<div class="my-table-tool" id="my-table-tool">
		<select name="fledname" class="nav-search-input input-select input-sm search-select">
			<option value="title" <?php if(($_GET['fledname']) == "title"): ?>selected<?php endif; ?>>标题</option>
			<option value="catename" <?php if(($_GET['fledname']) == "catename"): ?>selected<?php endif; ?>>类型</option>
			<option value="keywords" <?php if(($_GET['fledname']) == "keywords"): ?>selected<?php endif; ?>>关键词</option>
		</select>
		<input type="text" name="keyword" value="<?php echo ((isset($_GET['keyword']) && ($_GET['keyword'] !== ""))?($_GET['keyword']):''); ?>" placeholder="请输入" class="nav-search-input input-sm" id="nav-search-input" autocomplete="off"">
		&ensp;
		发布时间
		<input type="text" placeholder="发布时间" name="pushtime" value="<?php echo ($_GET['pushtime']); ?>" class="nav-search-input input-sm" id="field-pushtime" autocomplete="off" style="width: 180px;"">
		<button type="submit" class="btn btn-inverse btn-white input-sm nav-search-input search-btn">
			<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
			搜索
		</button>
	</div>
	<div class="widget-container-col" id="widget-container-col-11">
		<div class="widget-box widget-color-blue2" id="widget-box-content">
			<div class="widget-body">
				<!-- #section:custom/scrollbar -->
				<div class="widget-main no-padding scrollable" data-size="125">
					<!-- 表单 开始 -->
					<table id="data-table" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th class="center detail-col">
									<label class="pos-rel">
										<input type="checkbox" class="ace">
										<span class="lbl"></span>
									</label>
								</th>
								<th class="center hidden-320">文章标题</th>
								<th class="center">文章图片</th>
								<th class="center">发布时间</th>
								<th class="center">文章类型</th>
								<th class="center">点击量</th>
								<th class="center">浏览量</th>
								<th class="center">是否显示</th>
								<th class="center">是否热门</th>
								<th class="center">是否置顶</th>
								<th class="center">是否转载</th>
								<?php if(($isRecycle) == "is"): ?><th class="center">是否还原</th><?php endif; ?>
								<th class="center hidden-320">操作</th>
							</tr>
						</thead>
						<tbody>
							<?php if(empty($data)): ?><tr>
									<td class="center" colspan ="100">
										没有相关数据！
									</td>
								</tr>
							<?php else: ?> 
							<?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
									<td class="center">
										<label class="pos-rel">
											<input type="checkbox" class="ace" value="<?php echo ($vo["id"]); ?>">
											<span class="lbl"></span>
										</label>
									</td>
									<td class="center">
										<a title="<?php echo ($vo["title"]); ?>" href="<?php echo U('info',array('id'=>$vo['id']));?>"><?php echo (cutStr($vo["title"],20)); ?></a>
									</td>
									<td class="center td-img"><?php echo showImage($vo['minimg'], 60, 45);?></td>
									<td class="center"><?php echo ($vo["pushtime"]); ?></td>
									<td class="center"><?php echo ($vo["catename"]); ?></td>
									<td class="center"><?php echo ($vo["clicknum"]); ?></td>
									<td class="center"><?php echo ($vo["looknum"]); ?></td>
									<td class="center cursor-pointer">
										<span data-field="status" data-id="<?php echo ($vo["id"]); ?>" class="label label-sm 
											<?php if(($vo["status"]) == "1"): ?>label-success">显示<?php else: ?>label-grey">隐藏<?php endif; ?>
										</span>
									</td>
									<td class="center cursor-pointer">
										<span data-field="ishot" data-id="<?php echo ($vo["id"]); ?>" class="label label-sm 
											<?php if(($vo["ishot"]) == "1"): ?>label-danger">热门<?php else: ?>label-success">正常<?php endif; ?>
										</span>
									</td>
									<td class="center cursor-pointer">
										<span data-field="istop" data-id="<?php echo ($vo["id"]); ?>" class="label label-sm 
											<?php if(($vo["istop"]) == "1"): ?>label-warning">置顶<?php else: ?>label-success">正常<?php endif; ?>
										</span>
									</td>
									<td class="center cursor-pointer">
										<span data-field="iscopy" data-id="<?php echo ($vo["id"]); ?>" class="label label-sm 
											<?php if(($vo["iscopy"]) == "1"): ?>label-grey">转载<?php else: ?>label-success">原创<?php endif; ?>
										</span>
									</td>
									<?php if(($isRecycle) == "is"): ?><td class="center cursor-pointer">
											<span data-field="deleted" data-id="<?php echo ($vo["id"]); ?>" class="label label-sm label-success">还原</span>
										</td><?php endif; ?>
									<td class="center">
										<div class="action-buttons">
											<a class="blue info" title="查看详情" href="<?php echo U('info',array('id'=>$vo['id']));?>">
												<i class="ace-icon fa fa-search-plus bigger-110"></i>
											</a>
											<a class="blue edit" title="修改" href="<?php echo U('edit',array('id'=>$vo['id']));?>">
												<i class="ace-icon fa fa-pencil bigger-110"></i>
											</a>
											<a class="red del" title="删除" href="<?php echo U($isRecycle.'del',array('id'=>$vo['id']));?>">
												<i class="ace-icon glyphicon glyphicon-remove bigger-110"></i>
											</a>
										</div>
									</td>
								</tr><?php endforeach; endif; endif; ?>
						</tbody>
					</table>
					<!-- <table id="nodes-table"></table> -->
					<!-- 表单 结束 -->
				</div>
				<!-- /section:custom/scrollbar -->
				<div class="widget-toolbox padding-4 clearfix my-footer-tool">
					<div class="pull-left">
						<div class="btn-group">
							<button type="button" class="btn btn-white btn-sm btn-danger btn-bold alldel">
								<i class="ace-icon fa fa-trash-o bigger-120 orange"></i> 删除
							</button>
							<a href="<?php echo U('add');?>" class="btn btn-white btn-sm btn-primary btn-bold">
								<i class="ace-icon fa fa-plus bigger-120 blue"></i> 新增
							</a>
							<select name="pnum" class="btn btn-white btn-sm btn-primary btn-bold select-num" onchange="$('.form-search').submit();">
								<?php if(is_array(C("PAGE_LIST_NUM"))): foreach(C("PAGE_LIST_NUM") as $key=>$vo): ?><option value="<?php echo ($vo); ?>" <?php echo I('get.pnum', getPaegNum())==$vo?'selected':''; ?>>每页显示 <?php echo ($vo); ?> 条</option><?php endforeach; endif; ?>
							</select>
						</div>
					</div>
					<div class="pull-right"><div class="my-page"><?php echo ($page); ?></div></div>
				</div>
			</div>
		</div>
	</div>
</form>
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
			<script src="/public/static/components/jquery/dist/jquery.js"></script>
		<!-- <![endif]-->

		<!--[if IE]>
			<script src="/public/static/components/jquery.1x/dist/jquery.js"></script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) 
			document.write("<script src='/public/static/components/_mod/jquery.mobile.custom/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="/public/static/components/bootstrap/dist/js/bootstrap.js"></script>
		
		<script src="/public/static/components/jquery.gritter/js/jquery.gritter.js"></script>
		<script src="/public/static/components/spin.js/spin.js"></script>

		<script type="text/javascript" src="/public/static/admin/js/main.js"></script>
		
		
<script src="/public/static/components/moment/moment.min.js"></script>
<script src="/public/static/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<script src="/public/static/components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.zh-CN.min.js"></script>
<script src="/public/static/components/bootstrap-daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">
	$('#my-table-tool input[name=pushtime]').daterangepicker({
		'applyClass' : 'btn-sm btn-success',
		'cancelClass' : 'btn-sm btn-default',
		locale: {
			format: 'MM-DD-YYYY',
			separator: ' 至 ',
			applyLabel: '确认',
			cancelLabel: '取消',
			daysOfWeek:["日","一","二","三","四","五","六"],
			monthNames: ["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
		}
	})
	.prev().on(ace.click_event, function(){
		$(this).next().focus();
	});


    jQuery(function ($) {
        $('#birthday').datepicker({
            format: 'yyyy-mm',
            autoclose: true,
            startView: 1, // 初始显示视图
            maxViewMode: 3,//视图选择范围
         	minViewMode:1,
            forceParse: false,
            todayBtn: 'linked',
            language: 'zh-CN'
        });

        var active_class = 'active';
        $('#data-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
			var th_checked = this.checked;//checkbox inside "TH" table header
			
			$(this).closest('table').find('tbody > tr').each(function(){
				var row = this;
				if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
				else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
			});
		});
		
		//select/deselect a row when the checkbox is checked/unchecked
		$('#data-table').on('click', 'td input[type=checkbox]' , function(){
			var $row = $(this).closest('tr');
			if($row.is('.detail-row ')) return;
			if(this.checked) $row.addClass(active_class);
			else $row.removeClass(active_class);
		});

		// 批量删除
		$('.my-footer-tool').on('click', '.alldel', function() {
			// 获取已选择的数据
			var inputs = $('td input[type=checkbox]:checked');
			if (inputs.length && confirm('确定删除已选择的数据？')) {
				var ids = new Array();
				inputs.each(function(i,k) {
					ids[i] = k.value;
				});
				ids = ids.join(',');
				// 将数据传到后台处理
				$.ajax({
					url: "<?php echo U($isRecycle.'del',array('type'=>'alldel'));?>",
					type: 'GET',
					data: {"id": ids},
					dataype: 'json',
					success: function(data) {
						if (data.status == 0) {
							alert(data.info);
						}
						window.location.reload();
					}
				});
			}
		});
		// 设置对应的状态
		$('#data-table .cursor-pointer span').on('click',function(){
			var id = $(this).data('id');
			var field = $(this).data('field');
			if (id && field) {
				$.ajax({
					url: "<?php echo U('setStatus');?>",
					type: 'POST',
					data: {"id": id, "field": field},
					dataype: 'json',
					success: function(data) {
						window.location.reload();
					}
				});
			}
		});


		$("#gritter-remove").on(ace.click_event, function(){
			$.gritter.removeAll();
			return false;
		});
    });

</script>


		
		<script src="/public/static/ace/js/src/elements.scroller.js"></script>
		<script src="/public/static/ace/js/src/elements.colorpicker.js"></script>
		<script src="/public/static/ace/js/src/elements.fileinput.js"></script>
		<script src="/public/static/ace/js/src/elements.typeahead.js"></script>
		<script src="/public/static/ace/js/src/elements.wysiwyg.js"></script>
		<script src="/public/static/ace/js/src/elements.spinner.js"></script>
		<script src="/public/static/ace/js/src/elements.treeview.js"></script>
		<script src="/public/static/ace/js/src/elements.wizard.js"></script>
		<script src="/public/static/ace/js/src/elements.aside.js"></script>
		<script src="/public/static/ace/js/src/ace.js"></script>
		<script src="/public/static/ace/js/src/ace.basics.js"></script>
		<script src="/public/static/ace/js/src/ace.scrolltop.js"></script>
		<script src="/public/static/ace/js/src/ace.ajax-content.js"></script>
		<script src="/public/static/ace/js/src/ace.touch-drag.js"></script>
		<script src="/public/static/ace/js/src/ace.sidebar.js"></script>
		<script src="/public/static/ace/js/src/ace.sidebar-scroll-1.js"></script>
		<script src="/public/static/ace/js/src/ace.submenu-hover.js"></script>
		<script src="/public/static/ace/js/src/ace.widget-box.js"></script>
		<script src="/public/static/ace/js/src/ace.settings.js"></script>
		<script src="/public/static/ace/js/src/ace.settings-rtl.js"></script>
		<script src="/public/static/ace/js/src/ace.settings-skin.js"></script>
		<script src="/public/static/ace/js/src/ace.widget-on-reload.js"></script>
		<script src="/public/static/ace/js/src/ace.searchbox-autocomplete.js"></script>
		
		
	</body>
</html>