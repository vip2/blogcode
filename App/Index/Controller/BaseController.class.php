<?php
namespace Index\Controller;

use Think\Controller;

class BaseController extends Controller {

	// 处理公共数据
	public function __construct()
	{
		// 先调用父类的构造函数
		parent::__construct();
		// 获取博客导航
		$this->getNavData();
	}
    
    // 设置页面信息
    public function setPageInfo($title, $keywords, $description, $showNav=0, $css=array(), $js=array())
    {
    	$this->assign('page_keywords', $keywords);
    	$this->assign('page_description', $description);
    	$this->assign('page_title', $title);
    	$this->assign('show_nav', $showNav);
    	$this->assign('page_css', $css);
    	$this->assign('page_js', $js);
    }

    // 获取导航
    public function getNavData()
    {
    	$navModel = D('Admin/Navs');
    	$navData = $navModel->getTree();
    	// 处理导航数据 去掉状态为 0 的数据
    	$tempNavData = array();
    	foreach ($navData as $k => $val) {
    		if ($val['status'] == 1) {
    			$tempNavData[$k] = $val;
    		}
    	}
    	$this->assign('navData', $tempNavData);
    }
}