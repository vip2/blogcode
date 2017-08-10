<?php
namespace Admin\Model;
use Think\Model;

class MenuModel extends Model 
{
	protected $insertFields = array('title','icon','url','pid','sort','status');
	protected $updateFields = array('id','title','icon','url','pid','sort','status');
	protected $_validate = array(
		array('title', 'require', '菜单名称不能为空！', 1, 'regex', 3),
		array('title', '', '菜单名称已经存在！', 1, 'unique', 3),
		array('title', '1,30', '菜单名称的值最长不能超过 30 个字符！', 1, 'length', 3),
		array('icon', 'require', '菜单编号不能为空！', 1, 'regex', 3),
		array('icon', '1,30', '菜单编号的值最长不能超过 30 个字符！', 1, 'length', 3),
		array('url', '1,64', '菜单路径的值最长不能超过 64 个字符！', 2, 'length', 3),
		array('pid', 'number', '上级菜单的ID，0：代表顶级菜单必须是一个整数！', 2, 'regex', 3),
		array('sort', 'number', '菜单排序必须是一个整数！', 2, 'regex', 3),
		array('status', 'number', '菜单状态 1：启用0：禁用必须是一个整数！', 2, 'regex', 3),
	);
	// 获取树形菜单数据
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
	// 获取子菜单id
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

	}
	// 修改前
	public function _before_update(&$data,$options)
	{	
		// 处理编码
		$data['status'] = $data['status']?1:0;
	}
	// 删除前
	public function _before_delete($option)
	{
		// 判断是否有下级菜单
		$children = $this->getChildren($option['where']['id']);
		// 如果有下级菜单则不能删除
		if($children)
		{
			$this->error = '该菜单还有下级菜单，无法删除！';
			return FALSE;
		}
	}
	// 获取路径
	public function getSelectMenuUrl($id = '')
	{
		// 获取所有节点
		$nodeData = M('Node')->field(array('id','pid','name','title'))->order('sort ASC')->select();
		// 获取已选择的路劲
		$urlData = $this->field(array('id','url'))->where(array('pid'=>array('neq', 0), 'id'=>array('neq',$id)))->select();
		$tempUrlData = array();
		foreach ($urlData as $vv) {
			$tempUrlData[] = $vv['url'];
		}
		// 处理数据
		$menuUrl = array();
		foreach ($nodeData as $val) {
			if ($val['pid'] == 0) {
				foreach ($nodeData as $vo) {
					if ($val['id'] == $vo['pid']) {
						foreach ($nodeData as $v) {
							$tempUrl = $val['name'].'/'.$vo['name'].'/'.$v['name'];
							if ($vo['id'] == $v['pid'] && !in_array($tempUrl, $tempUrlData)) {
								$tempArr['url'] = $tempUrl;
								$tempArr['title'] = $v['title'];
								$menuUrl[$vo['title']][] = $tempArr;
							}
						}
					}
				}
			}
		}
		return $menuUrl;
	}
	// ajax修改状态
	public function setStatusVal($id, $isEdit = false)
	{	
		$info = $this->field(array('status','pid'))->find($id);
		$status = $isEdit?$info['status']:($info['status']?0:1);
		$ids = $status?array($info['pid']):$this->getChildren($id);
		$ids = $ids?implode(',', $ids).','.$id:$id;
		$ids = explode(',', $ids);
		$this->where(array('id'=>array('in',$ids)))->setField('status', $status);
	}
}