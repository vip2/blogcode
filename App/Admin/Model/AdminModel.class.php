<?php
namespace Admin\Model;
use Think\Model;

class AdminModel extends Model 
{	
	protected $insertFields = array('adminuser','nickname','adminno','password','pwd','status','integral','basepay','email','mobile','group_id');
	protected $updateFields = array('id','adminuser','nickname','adminno','pwd','password','status','integral','basepay','email','mobile','group_id');

	// 登录时表单验证的规则 
	public $_login_validate = array(
		array('adminuser', 'require', '用户名不能为空！', 1),
		array('password', 'require', '密码不能为空！', 1),
		array('captcha', 'require', '验证码不能为空！', 1),
		array('captcha', 'chk_captcha', '验证码不正确！', 1, 'callback'),
	);
	// 添加修改管理员时用
	protected $_validate = array(
		array('adminuser', 'require', '账号不能为空！', 1, 'regex', 3),
		array('adminuser', '1,30', '账号的值最长不能超过 30 个字符！', 1, 'length', 3),
		array('adminuser', '', '账号已经存在！', 1, 'unique', 3),
		array('nickname', '1,16', '用户昵称的值最长不能超过 16 个字符！', 2, 'length', 3),
		array('adminno', 'require', '用户编号不能为空！', 1, 'regex', 3),
		array('adminno', '1,30', '用户编号的值最长不能超过 30 个字符！', 1, 'length', 3),
		array('adminno', '', '用户编号已经存在！', 1, 'unique', 3),
		// 下面的规则只有添加时生效，修改时不生效，第六个参数代表什么时候验证：1：添加时验证 2：修改时 3：所有情况都验证
		array('password', 'require', '密码不能为空！', 1, 'regex', 1),
		array('pwd', 'password', '两次密码输入不一致！', 1, 'confirm', 3),
		array('integral', 'number', '用户积分必须是一个整数！', 2, 'regex', 3),
		array('basepay', 'currency', '基本工资必须是货币格式！', 2, 'regex', 3),
		array('status', 'number', '是否启用 1：启用0：禁用必须是一个整数！', 2, 'regex', 3),
		array('email','email','邮箱格式不正确', 2, 'regex', 3),
		array('email','','邮箱已经存在！', 2, 'unique', 3),
		array('mobile','/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/','手机号码错误！',2,'regex',3),
		array('mobile','','手机号已经存在！', 2, 'unique', 3),
	);
	// 验证码验证
	public function chk_captcha($code)
	{
		 $verify = new \Think\Verify();
		 return $verify->check($code);
	}
	// 登录验证
	public function login()
	{	
		// 获取表单中的用户名密码
		$adminuser = $this->adminuser;
		$password = $this->password;
		// 先查询数据库有没有这个账号
		$user = $this->alias('a')->where(array('adminuser' => $adminuser))->find();
		// 判断有没有账号
		if($user)
		{
			// 判断是否启用(超级管理员不能禁用）
			if($user['id'] == 1 || $user['status'] == 1)
			{	
				// 判断密码
				if($user['password'] == emd5($password))
				{	
					unset($user['password']);
					// 把用户信息存到session中
					session('admin', $user);
					return TRUE;
				}
				else 
				{
					$this->error = '密码不正确！';
					return FALSE;
				}
			}
			else 
			{
				$this->error = '账号被禁用！';
				return FALSE;
			}
		}
		else 
		{
			$this->error = '用户名不存在！';
			return FALSE;
		}
	}
	// 获取用户列表
	public function search($pageSize = 20)
	{
		// 收索
		$where = array();
		$map = array();
		if($keywords = I('keywords'))
		{
			$where['adminuser'] = array('like', "%$keywords%");
			$where['nickname'] = array('like', "%$keywords%");
			$where['_logic'] = 'OR';
			$map['_complex'] = $where;
		}
		$status = I('status','全部');
		if(in_array($status, array(1,0)) && $status != '全部')
		{	
			$map['status'] = array('eq', intval($status));
		}
		// 翻页
		$count = $this->where($map)->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$page->setConfig('header', '共%TOTAL_ROW%条');
		$page->setConfig('theme','%HEADER% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
		$data['page'] = $page->show();
		// 获取数据
		$data['data'] = $this->alias('a')->where($map)->group('a.id')->limit($page->firstRow.','.$page->listRows)->select();
		$data['_status'] = $status;
		return $data;
	}
	// 添加前
	public function _before_insert(&$data,$options)
	{	
		// 处理编码
		$data['adminno'] = getAutoCode('Admin',$data['adminno']);
		$data['password'] = emd5($data['password']);
		$data['create_time'] = date('Y-m-d H:i:s');
		$data['update_time'] = date('Y-m-d H:i:s');
	}
	// 添加后
	protected function _after_insert($data, $option)
	{
		$roleId = I('post.role_id');
		if($roleId)
		{
			$arModel = M('AdminRole');
			foreach ($roleId as $v)
			{
				$arModel->add(array(
					'admin_id' => $data['id'],
					'role_id' => $v,
				));
			}
		}
	}
	// 修改前
	public function _before_update(&$data,$options)
	{	
		// 处理编码
		$data['adminno'] = getAutoCode('Admin',$data['adminno']);
		$data['update_time'] = date('Y-m-d H:i:s');
		$data['status'] = $data['status']?1:0;
		// 判断密码为空就不修改这个字段
		if(empty($data['password'])){
			unset($data['password']);
		} else {
			$data['password'] = emd5($data['password']);
		}
		// 如果是超级管理员必须是启用的
		if($options['where']['id'] == 1){
			$data['status'] = 1;         // 直接设置为启用状态
		}
			
		$roleId = I('post.role_id');
		// 先清除原来的数据
		$arModel = M('AdminRole');
		$arModel->where(array('admin_id'=>array('eq', $options['where']['id'])))->delete();
		if($roleId) {
			foreach ($roleId as $v) {
				$arModel->add(array(
					'admin_id' => $options['where']['id'],
					'role_id' => $v,
				));
			}
		}
	}
	// 删除前
	protected function _before_delete($option)
	{
		if($option['where']['id'] == 1)
		{
			$this->error = '超级管理员不能被删除！';
			return FALSE;
		}
		// 在删除admin表中管理员的信息之前先删除admin_role表中这个管理员对应的数据s
		$arModel = M('AdminRole');
		$arModel->where(array('admin_id'=>array('eq', $option['where']['id'])))->delete();
	}

	// 获取用户详情
	public function getInfo($id)
	{
		$data = $this->alias('a')
				->where(array('a.id'=>$id))->find();
		if ($data) {
			// 获取对应的角色
			$roles = M('AdminRole')->alias('a')->field(array('b.`title`','a.`role_id`'))
					->join("LEFT JOIN `".C('DB_PREFIX')."role` b ON a.`role_id` = b.`id`")
					->where(array('a.`admin_id`'=>$id))->order('b.`sort` ASC')->select();
			$data['roles'] = $roles;
		}
		return $data;
	}
}