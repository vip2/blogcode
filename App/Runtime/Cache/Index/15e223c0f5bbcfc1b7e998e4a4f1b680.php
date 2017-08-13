<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>博客首页</title>
    <!-- Bootstrap -->
    <link href="/Public/static/components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="/Public/static/components/html5.shim.respond/html5shiv-3.7.3-min.js"></script>
      <script src="/Public/static/components/html5.shim.respond/respond-1.4.2-min.js"></script>
    <![endif]-->
    <link href="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/css/main.css" rel="stylesheet">
    <link href="/Public/static/components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
  </head>
  <body class="home-body">
    <!-- 网站头部 S -->
    <header class="main-header">
    	<div class="container">
    		<h1>哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈</h1>
    	</div>
    </header>
    <!-- 网站头部 E -->
    
    <!-- 网站导航 S -->
    <nav class="main-nav navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand logo"><img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/logo.png" alt="瓢城企训网"></a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
                    <?php if(is_array($navData)): foreach($navData as $key=>$vo): if(($vo["pid"]) == "0"): ?><li>
                                <a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><!-- <span class="glyphicon glyphicon-home"></span> --> <?php echo ($vo["title"]); ?></a>
                            </li><?php endif; endforeach; endif; ?>
				</ul>	
			</div>
		</div>
	</nav>
    <!-- 网站导航 E -->
	
    <!-- 网站内容 S -->
    <section class="main-content">
        
        	<div class="container">
        		<div class="row">
        			<div class="col-md-8">
        				<div id="myCarousel" class="carousel slide">
        					<ol class="carousel-indicators">
        						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        						<li data-target="#myCarousel" data-slide-to="1"></li>
        						<li data-target="#myCarousel" data-slide-to="2"></li>
        					</ol>
        					<div class="carousel-inner">
        						<div class="item active" style="background:#223240">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/slide1.png" alt="第一张">
        							<div class="carousel-caption">广电总局发布TVOS2.0 华为阿里参与研发</div>
        						</div>
        						<div class="item" style="background:#F5E4DC;">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/slide2.png" alt="第二张">
        							<div class="carousel-caption">苹果四寸手机为何要配置强大的A9处理器？</div>
        						</div>
        						<div class="item" style="background:#DE2A2D;">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/slide3.png" alt="第三张">
        							<div class="carousel-caption">六家互联网公司发声明 抵制流量劫持等违法行为</div>
        						</div>
        					</div>
        					<a href="#myCarousel" data-slide="prev" class="carousel-control left">
        						<span class="glyphicon glyphicon-chevron-left"></span>
        					</a>
        					<a href="#myCarousel" data-slide="next" class="carousel-control right">
        						<span class="glyphicon glyphicon-chevron-right"></span>
        					</a>
        				</div>

        				<div class="container-fluid" style="padding:0;">
        					<a href="#">
        					<div class="row info-content">
        						<div class="col-md-4 col-sm-4 col-xs-4">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info1.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 right-txt">
        							<h4>广电总局发布TVOS2.0 华为阿里参与研发</h4>
        							<p class="min-info">
        								<span><i class="glyphicon glyphicon-user"></i> 我乃张真人</span>
        								<span><i class="glyphicon glyphicon-time"></i> 2017-08-07</span>
        								<span class="hidden-xs"><i class="fa fa-eye"></i> 2135浏览</span>
        							</p>
        							<p class="hidden-xs">TVOS2.0是在TVOS1.0与华为MediaOS及阿里巴巴YunOS融合的基础上，打造的新一代智能电视操作系统。华为主要承担开发工作，内置的电视购物商城由阿里方面负责。TVOS2.0是在TVOS1.0与华为MediaOS及阿里巴巴YunOS融合的基础上，打造的新一代智能电视操作系统。华为主要承担开发工作，内置的电视购物商城由阿里方面负责。</p>
        						</div>
        					</div></a>
        					<div class="row info-content">
        						<div class="col-md-4 col-sm-4 col-xs-4">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info2.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 right-txt">
        							<h4>苹果四寸手机为何要配置强大的A9处理器？</h4>
        							<p class="min-info">
        								<span><i class="glyphicon glyphicon-user"></i> 我乃张真人</span>
        								<span><i class="glyphicon glyphicon-time"></i> 2017-08-07</span>
        								<span class="hidden-xs"><i class="fa fa-eye"></i> 2135浏览</span>
        							</p>
        							<p class="hidden-xs">苹果明年初有可能对外发布一款经过升级的四英寸手机，相当于iPhone 5s。该手机将会配置苹果在2015年旗舰手机中采用的A9处理器。配置性能如此强大的应用处理器？TVOS2.0是在TVOS1.0与华为MediaOS及阿里巴巴YunOS融合的基础上，打造的新一代智能电视操作系统。华为主要承担开发工作，内置的电视购物商城由阿里方面负责。</p>
        						</div>
        					</div>
        					<div class="row info-content">
        						<div class="col-md-4 col-sm-4 col-xs-4">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info3.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 right-txt">
        							<h4>六家互联网公司发声明 抵制流量劫持等违法行为</h4>
        							<p class="min-info">
        								<span><i class="glyphicon glyphicon-user"></i> 我乃张真人</span>
        								<span><i class="glyphicon glyphicon-time"></i> 2017-08-07</span>
        								<span class="hidden-xs"><i class="fa fa-eye"></i> 2135浏览</span>
        							</p>
        							<p class="hidden-xs">六家互联网公司（今日头条、美团大众点评网、360、腾讯、微博、小米科技）发布联合声明，呼吁有关运营商打击流量劫持，重视互联网公司被流量劫持，可能导致的严重后果。配置性能如此强大的应用处理器？TVOS2.0是在TVOS1.0与华为MediaOS及阿里巴巴YunOS融合的基础上，打造的新一代智能电视操作系统。华为主要承担开发工作，内置的电视购物商城由阿里方面负责。</p>
        						</div>
        					</div>
        					<div class="row info-content">
        						<div class="col-md-4 col-sm-4 col-xs-4">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info1.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 right-txt">
        							<h4>广电总局发布TVOS2.0 华为阿里参与研发</h4>
        							<p class="min-info">
        								<span><i class="glyphicon glyphicon-user"></i> 我乃张真人</span>
        								<span><i class="glyphicon glyphicon-time"></i> 2017-08-07</span>
        								<span class="hidden-xs"><i class="fa fa-eye"></i> 2135浏览</span>
        							</p>
        							<p class="hidden-xs">TVOS2.0是在TVOS1.0与华为MediaOS及阿里巴巴YunOS融合的基础上，打造的新一代智能电视操作系统。华为主要承担开发工作，内置的电视购物商城由阿里方面负责。TVOS2.0是在TVOS1.0与华为MediaOS及阿里巴巴YunOS融合的基础上，打造的新一代智能电视操作系统。华为主要承担开发工作，内置的电视购物商城由阿里方面负责。</p>
        						</div>
        					</div>
        					<div class="row info-content">
        						<div class="col-md-4 col-sm-4 col-xs-4">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info2.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 right-txt">
        							<h4>苹果四寸手机为何要配置强大的A9处理器？</h4>
        							<p class="min-info">
        								<span><i class="glyphicon glyphicon-user"></i> 我乃张真人</span>
        								<span><i class="glyphicon glyphicon-time"></i> 2017-08-07</span>
        								<span class="hidden-xs"><i class="fa fa-eye"></i> 2135浏览</span>
        							</p>
        							<p class="hidden-xs">苹果明年初有可能对外发布一款经过升级的四英寸手机，相当于iPhone 5s。该手机将会配置苹果在2015年旗舰手机中采用的A9处理器。配置性能如此强大的应用处理器？TVOS2.0是在TVOS1.0与华为MediaOS及阿里巴巴YunOS融合的基础上，打造的新一代智能电视操作系统。华为主要承担开发工作，内置的电视购物商城由阿里方面负责。</p>
        						</div>
        					</div>
        					<div class="row info-content">
        						<div class="col-md-4 col-sm-4 col-xs-4">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info3.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 right-txt">
        							<h4>六家互联网公司发声明 抵制流量劫持等违法行为</h4>
        							<p class="min-info">
        								<span><i class="glyphicon glyphicon-user"></i> 我乃张真人</span>
        								<span><i class="glyphicon glyphicon-time"></i> 2017-08-07</span>
        								<span class="hidden-xs"><i class="fa fa-eye"></i> 2135浏览</span>
        							</p>
        							<p class="hidden-xs">六家互联网公司（今日头条、美团大众点评网、360、腾讯、微博、小米科技）发布联合声明，呼吁有关运营商打击流量劫持，重视互联网公司被流量劫持，可能导致的严重后果。配置性能如此强大的应用处理器？TVOS2.0是在TVOS1.0与华为MediaOS及阿里巴巴YunOS融合的基础上，打造的新一代智能电视操作系统。华为主要承担开发工作，内置的电视购物商城由阿里方面负责。</p>
        						</div>
        					</div>
        					<div class="row info-content">
        						<div class="col-md-4 col-sm-4 col-xs-4">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info1.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 right-txt">
        							<h4>广电总局发布TVOS2.0 华为阿里参与研发</h4>
        							<p class="min-info">
        								<span><i class="glyphicon glyphicon-user"></i> 我乃张真人</span>
        								<span><i class="glyphicon glyphicon-time"></i> 2017-08-07</span>
        								<span class="hidden-xs"><i class="fa fa-eye"></i> 2135浏览</span>
        							</p>
        							<p class="hidden-xs">TVOS2.0是在TVOS1.0与华为MediaOS及阿里巴巴YunOS融合的基础上，打造的新一代智能电视操作系统。华为主要承担开发工作，内置的电视购物商城由阿里方面负责。TVOS2.0是在TVOS1.0与华为MediaOS及阿里巴巴YunOS融合的基础上，打造的新一代智能电视操作系统。华为主要承担开发工作，内置的电视购物商城由阿里方面负责。</p>
        						</div>
        					</div>
        					<div class="row info-content">
        						<div class="col-md-4 col-sm-4 col-xs-4">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info2.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 right-txt">
        							<h4>苹果四寸手机为何要配置强大的A9处理器？</h4>
        							<p class="min-info">
        								<span><i class="glyphicon glyphicon-user"></i> 我乃张真人</span>
        								<span><i class="glyphicon glyphicon-time"></i> 2017-08-07</span>
        								<span class="hidden-xs"><i class="fa fa-eye"></i> 2135浏览</span>
        							</p>
        							<p class="hidden-xs">苹果明年初有可能对外发布一款经过升级的四英寸手机，相当于iPhone 5s。该手机将会配置苹果在2015年旗舰手机中采用的A9处理器。配置性能如此强大的应用处理器？TVOS2.0是在TVOS1.0与华为MediaOS及阿里巴巴YunOS融合的基础上，打造的新一代智能电视操作系统。华为主要承担开发工作，内置的电视购物商城由阿里方面负责。</p>
        						</div>
        					</div>
        					<div class="row info-content">
        						<div class="col-md-4 col-sm-4 col-xs-4">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info3.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 right-txt">
        							<h4>六家互联网公司发声明 抵制流量劫持等违法行为</h4>
        							<p class="min-info">
        								<span><i class="glyphicon glyphicon-user"></i> 我乃张真人</span>
        								<span><i class="glyphicon glyphicon-time"></i> 2017-08-07</span>
        								<span class="hidden-xs"><i class="fa fa-eye"></i> 2135浏览</span>
        							</p>
        							<p class="hidden-xs">六家互联网公司（今日头条、美团大众点评网、360、腾讯、微博、小米科技）发布联合声明，呼吁有关运营商打击流量劫持，重视互联网公司被流量劫持，可能导致的严重后果。配置性能如此强大的应用处理器？TVOS2.0是在TVOS1.0与华为MediaOS及阿里巴巴YunOS融合的基础上，打造的新一代智能电视操作系统。华为主要承担开发工作，内置的电视购物商城由阿里方面负责。</p>
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="col-md-4 info-right hidden-xs hidden-sm">
        				<!-- 博客简介 -->
        				<blockquote>
        					<h2>关于本站</h2>
        				</blockquote>
        				<div class="container-fluid">
        					<div class="row">
        						<div class="col-md-4 col-sm-4 col-xs-4 list-l">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info1.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 list-r">
        							<h4>广电总局发布TVOS2.0 华为阿里参与研发</h4>
        							<h4>广电总局发布TVOS2.0 华为阿里参与研发</h4>
        						</div>
        					</div>
        				</div>
        				<!-- 博客简介 -->
        				<blockquote>
        					<h2>图文推荐</h2>
        				</blockquote>
        				<div class="container-fluid list-img">
        					<div class="row">
        						<div class="col-md-4 col-sm-4 col-xs-4 list-l">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info2.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 list-r">
        							<h4><a href="#" class="href-a">苹果四寸手机为何要配置强大的A9处理器？</a></h4>
        							
        							<p class="min-p">
        								<span class="fa fa-bookmark-o"> WEB前段</span><span class="fa fa-calendar"> 2015-11-10</span>
        							</p>
        						</div>
        					</div>
        					<div class="row">
        						<div class="col-md-4 col-sm-4 col-xs-4 list-l">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info1.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 list-r">
        							<h4>广电总局发布TVOS2.0 华为阿里参与研发</h4>
        							<p class="min-p">
        								<span class="fa fa-bookmark-o"> WEB前段</span><span class="fa fa-calendar"> 2015-11-10</span>
        							</p>
        						</div>
        					</div>
        					<div class="row">
        						<div class="col-md-4 col-sm-4 col-xs-4 list-l">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info3.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 list-r">
        							<h4>六家互联网公司发声明 抵制流量劫持等违法行为</h4>
        							<p class="min-p">
        								<span class="fa fa-bookmark-o"> WEB前段</span><span class="fa fa-calendar"> 2015-11-10</span>
        							</p>
        						</div>
        					</div>
        					<div class="row">
        						<div class="col-md-4 col-sm-4 col-xs-4 list-l">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info1.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 list-r">
        							<h4>广电总局发布TVOS2.0 华为阿里参与研发</h4>
        							<p class="min-p">
        								<span class="fa fa-bookmark-o"> WEB前段</span><span class="fa fa-calendar"> 2015-11-10</span>
        							</p>
        						</div>
        					</div>
        					<div class="row">
        						<div class="col-md-4 col-sm-4 col-xs-4 list-l">
        							<img src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/img/info3.jpg" class="img-responsive" alt="">
        						</div>
        						<div class="col-md-8 col-sm-8 col-xs-8 list-r">
        							<h4>六家互联网公司发声明 抵制流量劫持等违法行为</h4>
        							<p class="min-p">
        								<span class="fa fa-bookmark-o"> WEB前段</span><span class="fa fa-calendar"> 2015-11-10</span>
        							</p>
        						</div>
        					</div>
        				</div>
        				<!-- 排行 -->
        				<nav class="right-nav nav nav-tabs">
        					<li class="active">
    							<a href="#click-sort" data-toggle="tab">
    								 点击排行
    							</a>
    						</li>
    						<li>
    							<a href="#new-article" data-toggle="tab">
    								 最新文章
    							</a>
    						</li>
    						<li>
    							<a href="#admin-recommend" data-toggle="tab">
    								 站长推荐
    							</a>
    						</li>
        				</nav>
        				<div class="tab-content right-nav-content">
    						<ul class="tab-pane fade in active" id="click-sort">
    							<li><span class="li-num num-1">1</span> <a href="#">11原来以为，一个人的勇敢是，删掉他的手机号码...</a></li>
    							<li><span class="li-num num-2">2</span> <a href="#">模拟朋友圈数据存储原理</a></li>
    							<li><span class="li-num num-3">3</span> <a href="#">CSS省略号text-overflow超出溢出显示省略号</a></li>
    							<li><span class="li-num num-4">4</span> <a href="#">DIV+CSS虚线边框|CSS虚线下划线及虚线列表教程</a></li>
    							<li><span class="li-num num-5">5</span> <a href="#">开发DIV+CSS的工具集合</a></li>
    							<li><span class="li-num num-6">6</span> <a href="#">DIV+CSS与TABLE的网页优势何在？</a></li>
    							<li><span class="li-num num-7">7</span> <a href="#">padding_css padding用法详解</a></li>
    							<li><span class="li-num num-8">8</span> <a href="#">DIV+CSS规范命名大全集合</a></li>
    							<li><span class="li-num num-9">9</span> <a href="#">虚拟主机相关知识</a></li>
    							<li><span class="li-num num-10">10</span> <a href="#">个人博客如何减少跳出提高流量</a></li>
    						</ul>
    						<ul class="tab-pane fade" id="new-article">
    							<li><span class="li-num num-1">1</span> <a href="#">22原来以为，一个人的勇敢是，删掉他的手机号码...</a></li>
    							<li><span class="li-num num-2">2</span> <a href="#">模拟朋友圈数据存储原理</a></li>
    							<li><span class="li-num num-3">3</span> <a href="#">CSS省略号text-overflow超出溢出显示省略号</a></li>
    							<li><span class="li-num num-4">4</span> <a href="#">DIV+CSS虚线边框|CSS虚线下划线及虚线列表教程</a></li>
    							<li><span class="li-num num-5">5</span> <a href="#">开发DIV+CSS的工具集合</a></li>
    							<li><span class="li-num num-6">6</span> <a href="#">DIV+CSS与TABLE的网页优势何在？</a></li>
    							<li><span class="li-num num-7">7</span> <a href="#">padding_css padding用法详解</a></li>
    							<li><span class="li-num num-8">8</span> <a href="#">DIV+CSS规范命名大全集合</a></li>
    							<li><span class="li-num num-9">9</span> <a href="#">虚拟主机相关知识</a></li>
    							<li><span class="li-num num-10">10</span> <a href="#">个人博客如何减少跳出提高流量</a></li>
    						</ul>
    						<ul class="tab-pane fade" id="admin-recommend">
    							<li><span class="li-num num-1">1</span> <a href="#">33原来以为，一个人的勇敢是，删掉他的手机号码...</a></li>
    							<li><span class="li-num num-2">2</span> <a href="#">模拟朋友圈数据存储原理</a></li>
    							<li><span class="li-num num-3">3</span> <a href="#">CSS省略号text-overflow超出溢出显示省略号</a></li>
    							<li><span class="li-num num-4">4</span> <a href="#">DIV+CSS虚线边框|CSS虚线下划线及虚线列表教程</a></li>
    							<li><span class="li-num num-5">5</span> <a href="#">开发DIV+CSS的工具集合</a></li>
    							<li><span class="li-num num-6">6</span> <a href="#">DIV+CSS与TABLE的网页优势何在？</a></li>
    							<li><span class="li-num num-7">7</span> <a href="#">padding_css padding用法详解</a></li>
    							<li><span class="li-num num-8">8</span> <a href="#">DIV+CSS规范命名大全集合</a></li>
    							<li><span class="li-num num-9">9</span> <a href="#">虚拟主机相关知识</a></li>
    							<li><span class="li-num num-10">10</span> <a href="#">个人博客如何减少跳出提高流量</a></li>
    						</ul>
    					</div>
    					<!-- 排行 -->
    					<!-- 标签云 -->
    					<blockquote class="cloud-title">
        					<h2>标签云</h2>
        				</blockquote>
        				<div class="container-fluid tags-content">
        					<div id='tag-cloud'></div>
        				</div>
    					<!-- 标签云 -->
        				<blockquote>
        					<h2>友情链接</h2>
        				</blockquote>
        				<div class="container-fluid links-a">
        					<div class="row">
                                <?php if(is_array($linkData)): foreach($linkData as $key=>$vo): ?><a class="col-md-4 col-sm-6 col-xs-12" target="_blank" href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a><?php endforeach; endif; ?>
                                <a class="col-md-4 col-sm-6 col-xs-12 exchange-link" href="#" title="交换友链">交换友链</a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        
    </section>
    <!-- 网站内容 E -->

    <!-- 网站底部 S -->
    <footer class="main-footer">
      
    </footer>
    <!-- 网站底部 E -->

    <!-- 网站版权 -->
    <div class="copyright">
 		<div class="container">
 			<p>蜀ICP备16008903号. © 2009-2016 真人个人博客</p>
 		</div>
    </div>
  </body>
  <script src="/Public/static/components/jquery/dist/jquery.min.js"></script>
  <script src="/Public/static/components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="/Public/static/components/jquery.cloud/jquery.svg3dtagcloud.min.js"></script>
  <script src="/Public/static/index/<?php echo (C("DEFAULT_THEME")); ?>/js/main.js"></script>
  <script>
  	// 处理标签云
  	var entries = [ 
  		{ label: 'Back to top', url: '#', target: '_top' },
  		{ label: 'Bootstrap', url: '#', target: '_top' },
  		{ label: 'Carousel', url: '#', target: '_top' },
  		{ label: 'Countdown', url: '#', target: '_top' },
  		{ label: 'Dropdown Menu', url: '#', target: '_top' },
  		{ label: 'CodePen', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'three.js', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'Form Validation', url: '#', target: '_top' },
  		{ label: 'JS Compress', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'TinyPNG', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'Can I Use', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'URL shortener', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'Grid Layout', url: '#', target: '_top' },
  		{ label: 'Twitter', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'deviantART', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'Gulp', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'Browsersync', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'GitHub', url: 'https://github.com/', target: '_top' },
  		{ label: 'Shadertoy', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'Tree View', url: '#', target: '_top' },
  		{ label: 'jsPerf', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'Foundation', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'CreateJS', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'Velocity.js', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'TweenLite', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'jQuery', url: 'http://sc.chinaz.com/', target: '_top' },
  		{ label: 'Notification', url: '#', target: '_top' },
  		{ label: 'Parallax', url: '#', target: '_top' }
  	];
  	var cloudId = $( '#tag-cloud' );
  	var cloudW = cloudId.width()*0.8;
  	var settings = {
	  		entries: entries,
	  		width: '100%',
	  		height: '100%',
	  		radius: '75%',
	  		radiusMin: 75,
	  		bgDraw: true,
	  		bgColor: 'rgba(255, 255, 255, 0)',
	  		opacityOver: 1.00,
	  		opacityOut: 0.05,
	  		opacitySpeed: 6,
	  		fov: 800,
	  		speed: 1,
	  		fontFamily: 'Oswald, Arial, sans-serif',
	  		fontSize: '15',
	  		fontColor: 'rgb(247, 120, 37)',
	  		fontWeight: 'normal',//bold
	  		fontStyle: 'normal',//italic 
	  		fontStretch: 'normal',
	  		fontToUpperCase: true
	  	};
  		cloudId.svg3DTagCloud( settings );
  </script>
  
<script>
	//轮播自动播放
	$('#myCarousel').carousel({
		//自动4秒播放
		interval : 4000,
	});
</script>

</html>