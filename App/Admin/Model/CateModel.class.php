<?php
namespace Admin\Model;
use Think\Model;

class CateModel extends Model 
{
	protected $insertFields = array('catename','keywords','description','status','pid','sort');
	protected $updateFields = array('id','catename','keywords','description','status','pid','sort');
	protected $_validate = array(
		array('catename', 'require', '文章分类不能为空！', 1, 'regex', 3),
		array('catename', '', '文章分类已经存在！', 1, 'unique', 3),
		array('catename', '1,30', '文章分类的值最长不能超过 30 个字符！', 1, 'length', 3),
		array('keywords', '1,120', '分类描述的值最长不能超过 120 个字符！', 2, 'length', 3),
		array('description', '1,255', '分类描述的值最长不能超过 255 个字符！', 2, 'length', 3),
		array('pid', 'number', '上级分类的ID，0：代表顶级分类必须是一个整数！', 2, 'regex', 3),
		array('sort', 'number', '分类排序必须是一个整数！', 2, 'regex', 3),
		array('status', 'number', '分类状态 1：启用0：禁用必须是一个整数！', 2, 'regex', 3),
	);
	// 获取树形分类数据
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
	// 获取子分类id
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
		// 操作人ID
		$data['create_id'] = $data['update_id'] = session('admin.id');
		// 处理创建修改时间
		$data['update_time'] = $data['create_time'] = date('Y-m-d H:i:s');
	}
	// 修改前
	public function _before_update(&$data,$options)
	{	
		// 操作人ID
		$data['update_id'] = session('admin.id');
		// 修改时间
		$data['update_time'] = date('Y-m-d H:i:s');
	}
	// 删除前
	public function _before_delete($option)
	{
		// 判断是否有下级分类
		$children = $this->getChildren($option['where']['id']);
		// 如果有下级分类则不能删除
		if($children)
		{
			$this->error = '该分类还有下级分类，无法删除！';
			return FALSE;
		} else {
			// 判断是否有文章属于该分类
			$count = M('Article')->where(array('cate_id'=>$option['where']['id']))->count();
			if ($count > 0) {
				$this->error = '有文章属于该分类，无法删除！';
				return FALSE;
			}
		}
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