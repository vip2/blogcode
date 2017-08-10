<?php
return array(
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'qdm106622232.my3w.com',
	'DB_NAME'=>'qdm106622232_db',
	'DB_USER'=>'qdm106622232',
	'DB_PWD'=>'zz208823',
	'DB_PREFIX'=>'zsf_',
	'DB_CHARSET'=>'utf8',
	'DB_PORT'=>'3306',
	/********** 图片相关的配置 ************/
	'IMG_maxSize' => '3M',
	'IMG_exts' => array('jpg', 'pjpeg', 'bmp', 'gif', 'png', 'jpeg'),
	'IMG_rootPath' => './Public/Uploads/',
	'IMG_URL' => '/Public/Uploads/',
	/*************************** 页面提示 ****************************************/
	// 'TMPL_ACTION_ERROR'     =>  './Application/dispatch_jump.tpl', // 默认错误跳转对应的模板文件
 	// 'TMPL_ACTION_SUCCESS'   =>  './Application/dispatch_jump.tpl', // 默认成功跳转对应的模板文件
	/********** 修改I函数底层过滤时使用的函数 ***********/
	// 'DEFAULT_FILTER' => 'trim,removeXSS',
	/********* MD5时用来复杂化的 ****************/
	'MD5_KEY' => 'fdsa#@90#_jl329$9lfds!129',
	/************** 发邮件的配置 ***************/
	'MAIL_ADDRESS' => 'q470409928@163.com',   // 发货人的email
	'MAIL_FROM' => '我乃张真人',      // 发货人姓名
	'MAIL_SMTP' => 'smtp.163.com',      // 邮件服务器的地址
	'MAIL_LOGINNAME' => 'q470409928@163.com',   
	'MAIL_PASSWORD' => 'mycode208823',
	/************* 设置配置 ******************/
	'DEFAULT_MODULE'        =>  'Index',  // 默认模块 
	'TMPL_L_DELIM'           => '<{', // 模板引擎普通标签开始标记
    'TMPL_R_DELIM'           => '}>', // 模板引擎普通标签结束标记
    'MD5_KEY'                => '!@#$%^HG&*()FD_T$OTG', // 密钥
    'TMPL_PARSE_STRING'      => array(
        // ace 框架
        '__ACE__'            => __ROOT__.'/Public/static/ace/',
        // ace 扩展插件
        '__COMPONENTS__'     => __ROOT__.'/Public/static/components/',
        '__ADMIN__'          => __ROOT__.'/Public/static/admin/',
    ),
    'LOAD_EXT_CONFIG'        => 'system', // 加载扩展配置文件
    'ROLE_NODE_CACHE_NAME'   => 'role_node_cache_name', // RABC权限缓存名称
    'FILE_EXCEL_ROOT_PATH'   => './Public/static/data-excel/', 
    'FILE_STATIC_PATH'   => './Public/static/', 
    'EXCEL_MAX_SIZE'   => 5, 
    'EXCEL_FILE_EXTS'        => array('xls','xlsx','csv'),
    'UPLOAD_FILE_EXTS'       => array('xls','xlsx','csv','jpg', 'pjpeg', 'bmp', 'gif', 'png', 'jpeg'),
    'WEEKS'                  => array('日','一','二','三', '四', '五', '六'),
    'PAGE_LIST_NUM'          => array(1,2,5,10,15,20,30,40,50,100,150,200,250,300,500), //列表分页的条数
);