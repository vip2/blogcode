<?php
namespace Admin\Model;
use Think\Model;

class LinkModel extends Model 
{	
	protected $insertFields = array('title','url','clicknum','status');
	protected $updateFields = array('id','title','url','clicknum','status');

	// 添加修改
	protected $_validate = array(
		array('title', 'require', '文章标题不能为空！', 1, 'regex', 3),
		array('title', '1,15', '文章标题的值最长不能超过 15 个字符！', 1, 'length', 3),
		array('url', '0,255', '网站链接的值最长不能超过 255 个字符！', 2, 'length', 3),
		array('clicknum', 'number', '点击量必须是一个整数！', 2, 'regex', 3),
		array('status', 'number', '是否显示必须是一个整数！', 2, 'regex', 3)
	);
	
	// 列表
	public function search($pageSize = 0)
	{	
		// 收索
		$where = array();
		if ($keywords = I('get.keyword/s')) {
			$where['title'] = array('like', "%$keywords%");
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
		$data['data'] = $this->where($where)
						->order('sort ASC')
						->limit($page->firstRow.','.$page->listRows)
						->select();
		return $data;
	}

	// 添加前
	protected function _before_insert(&$data,$options)
	{	
		// 处理图片
		if (isset($_FILES['uploadfile']) && $_FILES['uploadfile']['error'] == 0) {
			$ret = uploadOne('uploadfile', 'Article', array(C('ARTICLE_LOGO_THUMB')));
			if ($ret['ok'] == 1) {
				$data['image'] = $ret['images'][0];
				$data['minimg'] = $ret['images'][1];
			} else {
				$this->error = $ret['error'];
				return FALSE;
			}
		}
		// 操作人ID
		$data['create_id'] = $data['update_id'] = session('admin.id');
		// 处理创建修改时间
		$data['update_time'] = $data['create_time'] = date('Y-m-d H:i:s');
	}
	
	// 修改前
	protected function _before_update(&$data,$options)
	{	
		// 处理图片
		if (isset($_FILES['uploadfile']) && $_FILES['uploadfile']['error'] == 0) {
			$ret = uploadOne('uploadfile', 'Article', array(C('ARTICLE_LOGO_THUMB')));
			if ($ret['ok'] == 1) {
				$data['image'] = $ret['images'][0];
				$data['minimg'] = $ret['images'][1];
			} else {
				$this->error = $ret['error'];
				return FALSE;
			}
			// 删除原有的图片
			deleteImage(array(I('post.old_image'), I('post.old_minimg')));
		}
		// 操作人ID
		$data['update_id'] = session('admin.id');
		// 修改时间
		$data['update_time'] = date('Y-m-d H:i:s');
	}
}