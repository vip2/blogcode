<?php
namespace Admin\Model;
use Think\Model;

class TagModel extends Model 
{
	protected $insertFields = array('tagname');
	protected $updateFields = array('id','tagname');
	protected $_validate = array(
		array('tagname', 'require', '标签名称不能为空！', 1, 'regex', 3),
		array('tagname', '', '标签名称已经存在！', 1, 'unique', 3),
		array('tagname', '1,30', '标签名称的值最长不能超过 30 个字符！', 1, 'length', 3),
	);
	// 获取标签列表
	public function search($pageSize = 0)
	{
		// 收索
		$where = array();
		if($keywords = I('keywords'))
		{
			$where['tagname'] = array('like', "%$keywords%");
		}

		// 翻页
		$count = $this->where($where)->count();
		// 处理当前页数
		$pageSize = $pageSize?$pageSize:getPaegNum();
		// 处理页数
		if (ceil($count/$pageSize) < I('get.p/d')) $_GET['p'] = ceil($count/$pageSize);
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$page->setConfig('header', '共%TOTAL_ROW%条');
		$page->setConfig('theme','%HEADER% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
		$data['page'] = $page->show();
		// 获取数据
		$data['data'] = $this->field(array('tagname','id'))
						->where($where)->order('tagname ASC')
						->limit($page->firstRow.','.$page->listRows)->select();
		return $data;
	}

	// 删除前
	protected function _before_delete($option)
	{	
		// 判断是否有文章属于该标签
		$count = M('ArticleTag')->where(array('tag_id'=>$option['where']['id']))->count();
		if ($count > 0) {
			$this->error = '有文章属于该标签，无法删除！';
			return FALSE;
		}
	}
}