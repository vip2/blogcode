<?php
namespace Admin\Model;
use Think\Model;

class RoleModel extends Model 
{
	protected $insertFields = array('title','sort','status','remark');
	protected $updateFields = array('id','title','sort','status','remark');
	protected $_validate = array(
		array('title', 'require', '角色名称不能为空！', 1, 'regex', 3),
		array('title', '1,30', '角色名称的值最长不能超过 30 个字符！', 1, 'length', 3),
		array('remark', '1,60', '角色描述的值最长不能超过 60 个字符！', 2, 'length', 3),
		array('sort', 'number', '角色排序必须是一个整数！', 2, 'regex', 3),
		array('status', 'number', '角色状态 1：启用0：禁用必须是一个整数！', 2, 'regex', 3),
	);
	public function search($pageSize = 20)
	{
		// 翻页
		$count = $this->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$page->setConfig('header', '共%TOTAL_ROW%条');
		$page->setConfig('theme','%HEADER% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
		$data['page'] = $page->show();
		// 取数据
		$data['data'] = $this->order('sort ASC')->limit($page->firstRow.','.$page->listRows)->select();
		return $data;
	}
	// 修改前
	protected function _before_update(&$data, $option)
	{
		$data['status'] = $data['status']?1:0;
	}
	// 删除前
	protected function _before_delete($option)
	{
		// 先判断有没有管理员属性这个角色-要读管理员角色表
		$arModel = M('AdminRole');
		$has = $arModel->where(array('role_id'=>array('eq', $option['where']['id'])))->count();
		if($has > 0)
		{
			$this->error = '有管理员属于这个角色，无法删除！';
			return FALSE;
		}
		// 把这个角色所拥有的权限的数据也一起删除
		$rpModel = M('RoleNode');
		$rpModel->where(array('role_id'=>array('eq', $option['where']['id'])))->delete();
	}
	// 保存角色权限
	public function saveRoleNode($data)
	{	
		$model = M('RoleNode');
		// 删除原有的权限
		$model->where(array('role_id'=>$data['role_id']))->delete();
		// 保存新数据
		foreach ($data['node_id'] as $v) {
			$model->add(array('role_id'=>$data['role_id'], 'node_id'=>$v));
		}
	}
}