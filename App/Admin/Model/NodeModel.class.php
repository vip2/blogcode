<?php
namespace Admin\Model;
use Think\Model;

class NodeModel extends Model 
{
	protected $insertFields = array('title','name','pid','sort','status');
	protected $updateFields = array('id','title','name','pid','sort','status');
	protected $_validate = array(
		array('title', 'require', '权限名称不能为空！', 1, 'regex', 3),
		array('title', '1,30', '权限名称的值最长不能超过 30 个字符！', 1, 'length', 3),
		array('name', 'require', '模块、控制器、操作不能为空！', 1, 'regex', 3),
		array('name', '1,30', '模块、控制器、操作的值最长不能超过 30 个字符！', 1, 'length', 3),
		array('pid', 'number', '上级权限的ID，0：代表顶级权限必须是一个整数！', 2, 'regex', 3),
		array('sort', 'number', '权限排序必须是一个整数！', 2, 'regex', 3),
		array('status', 'number', '权限状态 1：启用0：禁用必须是一个整数！', 2, 'regex', 3),
	);
	// 获取树形权限数据
	public function getTree()
	{
		$data = $this->order('sort ASC')->select();
		return $this->_reSort($data);
	}
	// 数据排序
	private function _reSort($data, $pid=0, $level=1, $isClear=TRUE)
	{
		static $ret = array();
		if($isClear)
			$ret = array();
		foreach ($data as $k => $v)
		{
			if($v['pid'] == $pid)
			{
				$v['level'] = $level;
				$ret[] = $v;
				$this->_reSort($data, $v['id'], $level+1, FALSE);
			}
		}
		return $ret;
	}
	// 获取子权限id
	public function getChildren($id)
	{
		$data = $this->select();
		return $this->_children($data, $id);
	}
	private function _children($data, $pid=0, $isClear=TRUE)
	{
		static $ret = array();
		if($isClear)
			$ret = array();
		foreach ($data as $k => $v)
		{
			if($v['pid'] == $pid)
			{
				$ret[] = $v['id'];
				$this->_children($data, $v['id'], FALSE);
			}
		}
		return $ret;
	}
	// 获取父节点
	public function getParent($pid)
	{
		$data = $this->select();
		return $this->_parnt($data, $pid);
	}
	private function _parnt($data, $pid=0, $isClear=TRUE)
	{	
		static $ret = array();
		if($isClear) $ret = array();
		foreach ($data as $k => $v)
		{
			if($v['id'] == $pid)
			{
				$ret[] = $v['id'];
				$this->_parnt($data, $v['pid'], FALSE);
			}
		}
		return $ret;
	}
	// 设置状态值
	public function _before_update(&$data,$options)
	{	
		$data['status'] = $data['status']?1:0;
	}
	// 删除前
	public function _before_delete($option)
	{
		// 先找出所有的子分类
		$children = $this->getChildren($option['where']['id']);
		// 如果有子分类都删除掉
		if($children)
		{
			$children = implode(',', $children);
			$this->where(array('id'=>array('in',$children)))->delete();
		}
	}
	// ajax修改状态
	public function setStatusVal($id, $isEdit = false)
	{	
		$info = $this->field(array('status','pid'))->find($id);
		$status = $isEdit?$info['status']:($info['status']?0:1);
		$ids = $status?$this->getParent($info['pid']):$this->getChildren($id);
		$ids = $ids?implode(',', $ids).','.$id:$id;
		$this->where(array('id'=>array('in',$ids)))->setField('status', $status);
	}
}