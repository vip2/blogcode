<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller
{	
	// 后台权限验证
	public function __construct()
	{
		// 先调用父类的构造函数
		parent::__construct();
		// 获取当前管理员的ID
		$adminId = session('admin.id');
		// 验证登录
		if(!$adminId) redirect(U('Admin/Login/index'));
		// 获取所有访问的数组
		$allNodes = $this->getThisAllNode();
		// 获取左侧菜单
		$leftMenus = $this->getLeftMenus($allNodes);
		$this->assign('leftMenus', $leftMenus);
		// 当前路径
		$nowUrl = MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
		$this->assign('nowUrl', $nowUrl);

		// 超级管理员和后台首页不用判断
		if ($adminId == 1 || CONTROLLER_NAME == 'Index') {
			return true;
		// 判断权限
		} elseif (! in_array($nowUrl, $allNodes)) {
			$this ->error('您没有权限访问!!!');
			return false;
		}
	}

	// 后台首页
    public function index()
    {
       // p(sendMail('470409928@qq.com', '我的邮件--s','dasdasdas'));
       $this->display();
    }
    // 设置面包屑导航
    public function setPageBtn($title, $pHref = 'javaScript:void(0);')
	{	
		if (is_array($title) && count($title) > 1) {
			$this->assign('_parent_page_title', $title[0]);
			$this->assign('_parent_page_href', $pHref);
			$title = $title[1];
		} else {
			$title = is_array($title)?$title[0]:$title;
		}
		$this->assign('_page_title', $title);
		// 后台设置数据
		$this->assign(C('ADMIN_TXT'));
	}

	// 获取所有访问的权限
	public function getThisAllNode()
	{
		$dbPrefix = C('DB_PREFIX');
		$nodes = M('AdminRole')->alias('a')->field(array('d.`id`','d.`pid`','d.`name`'))
				 ->join(" LEFT JOIN `".$dbPrefix."role` b ON a.`admin_id` = b.`id`")
				 ->join(" LEFT JOIN `".$dbPrefix."role_node` c ON b.`id` = c.`role_id`")
				 ->join(" LEFT JOIN `".$dbPrefix."node` d ON d.`id` = c.`node_id`")
				 ->where(array('a.`admin_id`'=> session('admin.id'), 'b.`status`'=>1, 'd.`status`'=>1))
				 ->select();
		$roleNodes = array();
		// 处理权限数据
		foreach ($nodes as $k => $val) {
			if ($val['pid'] == 0) {//处理模块
				foreach ($nodes as $k1 => $val1) {//控制器
					if ($val1['pid'] == $val['id']) {
						foreach ($nodes as $k2 => $val2) {//操作
							if ($val2['pid'] == $val1['id']) {
								$roleNodes[] = $val['name'].'/'.$val1['name'].'/'.$val2['name'];
								unset($nodes[$k2]);
							}
						}
						unset($nodes[$k1]);
					}
				}
				unset($nodes[$k]);
			}
		}
		// 返回访问权限
		return $roleNodes;
	}

	// 获取访问菜单
	public function getLeftMenus($allNodes)
	{	
		$isSuper = (session('admin.id') == 1 || session('admin.issuper'))?true:false;
		$nowMenu = MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
		// 获取所有的菜单数据
		$menus = M('Menu')->field(array('id','title','icon','url','pid'))
				 ->where(array('status'=>1))->order('sort ASC')->select();
		$menusData = array();
		// 处理菜单数据
		foreach ($menus as $k => $v) {
			if ($v['pid'] == 0) {
				foreach ($menus as $kk => $val) {
					if ($val['pid'] == $v['id']) {
						if (in_array($val['url'], $allNodes) || $isSuper) {
							if ($nowMenu == $val['url']) {
								$v['active'] = ' class="open active" ';
								$val['active'] = ' class="active" ';
							}
							$v['childrens'][] = $val;
							$menusData[$k] = $v;
							unset($menus[$kk]);//删除已处理的数据
						}
					}
				}
				unset($menus[$k]);//删除已处理的数据
			}
		}
		// 返回菜单数组
		return $menusData;
	}

	// 获取每页条数
	public function getPaegNum()
	{
		pd(I());
	}
}