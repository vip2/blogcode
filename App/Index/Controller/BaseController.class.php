<?php
namespace Index\Controller;

use Think\Controller;

class BaseController extends Controller {

	// 处理公共数据
	public function __construct()
	{  
        $webOpen = C('WEB_UPDATE_HTML');
        // 判断网站是否关闭
        if (!$webOpen && ACTION_NAME !== 'update') {
            redirect(U('update'));
        } elseif ($webOpen && ACTION_NAME === 'update' && CONTROLLER_NAME === 'Index') {
            redirect(U('index'));
        } else {
            // 先调用父类的构造函数
            parent::__construct();
            // 当网站开启时
            if ($webOpen || (ACTION_NAME !== 'update' && CONTROLLER_NAME !== 'Index')) {
                // 获取博客导航
                $this->getNavData();
                // 获取友情链接
                $this->getLinks();
            }
        }
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
    	$navData = D('Admin/Navs')->getTree();
    	// 处理导航数据 去掉状态为 0 的数据
    	$tempNavData = array();
    	foreach ($navData as $k => $val) {
    		if ($val['status'] == 1) {
                // 处理链接
                if (!$val['isurl']) {
                    $val['url'] = U($val['url']);
                }
                $tempNavData[$k] = $val;
    		}
    	}
    	$this->assign('navData', $tempNavData);
    }

    // 获取友情链接
    public function getLinks()
    {
        $linkData = D('Admin/Link')->field(array('title','minimg','url'))
                    ->where(array('status'=>1))->order('sort ASC,id ASC')->select();
        //处理url
        $tempLinkData = array();
        foreach ($linkData as $k => $val) {
            $url = parse_url($val['url']);
            $val['url'] = isset($url['scheme'])?$val['url']:'http://'.$val['url'];
            $tempLinkData[$k] = $val;
        }
        $this->assign('linkData', $tempLinkData);
    }

    // 升级页面
    public function update()
    {
        $this->display();
    }
}