<?php
namespace Admin\Model;
use Think\Model;

class GroupModel extends Model 
{
	protected $insertFields = array('groupname','groupno','remark','pid','sort');
	protected $updateFields = array('id','groupname','groupno','remark','pid','sort');
	protected $_validate = array(
		array('groupname', 'require', '部门名称不能为空！', 1, 'regex', 3),
		array('groupname', '', '部门名称已经存在！', 1, 'unique', 3),
		array('groupname', '1,30', '部门名称的值最长不能超过 30 个字符！', 1, 'length', 3),
		array('groupno', 'require', '部门编号不能为空！', 1, 'regex', 3),
		array('groupno', '', '部门编号已经存在！', 1, 'unique', 3),
		array('groupno', '1,16', '部门编号的值最长不能超过 16 个字符！', 1, 'length', 3),
		array('remark', '1,60', '部门描述的值最长不能超过 60 个字符！', 2, 'length', 3),
		array('pid', 'number', '上级部门的ID，0：代表顶级部门必须是一个整数！', 2, 'regex', 3),
		array('sort', 'number', '部门排序必须是一个整数！', 2, 'regex', 3),
	);
	// 获取树形部门数据
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
	// 获取子部门id
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
	// 添加前
	public function _before_insert(&$data,$options)
	{	
		// 处理编码
		$data['groupno'] = getAutoCode('Group',$data['groupno']);
	}
	// 修改前
	public function _before_update(&$data,$options)
	{	
		// 处理编码
		$data['groupno'] = getAutoCode('Group',$data['groupno']);
	}
	// 删除前
	public function _before_delete($option)
	{
		// 判断是否有下级部门
		$children = $this->getChildren($option['where']['id']);
		// 如果有下级部门则不能删除
		if($children)
		{
			$this->error = '该部门还有下级部门，无法删除！';
			return FALSE;
		} else {
			// 判断是否有管理员属于该部门
			$count = M('Admin')->where(array('group_id'=>$option['where']['id']))->count();
			if ($count > 0) {
				$this->error = '有管理员属于该部门，无法删除！';
				return FALSE;
			}
		}
	}
}