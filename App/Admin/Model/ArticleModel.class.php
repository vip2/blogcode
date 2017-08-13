<?php
namespace Admin\Model;
use Think\Model;

class ArticleModel extends Model 
{	
	protected $insertFields = array('title','keywords','content','cate_id','clicknum','looknum','status','ishot','istop','iscopy','pushtime');
	protected $updateFields = array('id','title','keywords','content','cate_id','clicknum','looknum','status','ishot','istop','iscopy','pushtime');

	// 添加修改
	protected $_validate = array(
		array('title', 'require', '文章标题不能为空！', 1, 'regex', 3),
		array('title', '1,45', '文章标题的值最长不能超过 45 个字符！', 1, 'length', 3),
		array('cate_id', 'require', '分类的id不能为空！', 1, 'regex', 3),
		array('cate_id', 'number', '分类的id必须是一个整数！', 1, 'regex', 3),
		array('keywords', '1,120', 'seo优化_关键词的值最长不能超过 120 个字符！', 2, 'length', 3),
		array('pushtime', 'require', '发布时间不能为空！', 1, 'regex', 3),
		array('pushtime', '/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/', '发布时间必须为时间类型！', 1, 'regex', 3),
		array('clicknum', 'number', '点击量必须是一个整数！', 2, 'regex', 3),
		array('looknum', 'number', '浏览量必须是一个整数！', 2, 'regex', 3),
		array('status', 'number', '是否显示必须是一个整数！', 2, 'regex', 3),
		array('ishot', 'number', '是否热门必须是一个整数！', 2, 'regex', 3),
		array('istop', 'number', '是否置顶必须是一个整数！', 2, 'regex', 3),
		array('iscopy', 'number', '是否转载必须是一个整数！', 2, 'regex', 3),
	);
	
	// 列表
	public function search($pageSize = 0, $isDel = 0)
	{	
		// 收索
		$where['deleted'] = array('eq', $isDel);
		// $map = array();
		// if ($keywords = I('get.keyword/s')) {
		// 	switch (I('get.fledname/s')) {
		// 		case '用户名称':
		// 			$where['b.`adminuser`'] = array('like', "%$keywords%");
		// 			break;

		// 		case '用户昵称':
		// 			$where['b.`nickname`'] = array('like', "%$keywords%");
		// 			break;
				
		// 		default:
		// 			$where['b.`adminuser`'] = array('like', "%$keywords%");
		// 			$where['b.`nickname`'] = array('like', "%$keywords%");
		// 			$where['_logic'] = 'OR';
		// 			break;
		// 	}
		// 	$map['_complex'] = $where;	
		// }

		// 翻页
		$count = $this->alias('a')->join(" LEFT JOIN `".C('DB_PREFIX')."cate` b ON a.`cate_id` = b.`id`")->where($where)->count();
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
		$data['data'] = $this->alias('a')->field(array('a.*','b.catename'))
						->join(" LEFT JOIN `".C('DB_PREFIX')."cate` b ON a.`cate_id` = b.`id`")
						->where($where)
						->order('istop DESC,ishot DESC,pushtime DESC')
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
		// 处理发布时间
		$data['pushtime'] = date('Y-m-d H:i:00', strtotime($data['pushtime']));
		// 操作人ID
		$data['create_id'] = $data['update_id'] = session('admin.id');
		// 处理创建修改时间
		$data['update_time'] = $data['create_time'] = date('Y-m-d H:i:s');
	}

	// 添加后
	protected function _after_insert($data, $option)
	{	
		// 处理文章标签
		$tags = explode(',', trim(I('post.tag/s'), ','));
		// 处理标签左右空格
		$tags = $this->arrayTrim($tags);
		if ($tags) {
			$Tag = M('Tag');
			$ArticleTag = M('ArticleTag');
			// 获取已有的标签
			$tagData = $Tag->where(array('tagname'=>array('in', $tags)))->select();  
			$tags = array_flip($tags);
			foreach ($tagData as $v) {
				// 插入数据
				$ArticleTag->add(array('article_id' => $data['id'], 'tag_id'	=> $v['id']));
				unset($tags[$v['tagname']]);
			}
			if ($tags) {
				foreach ($tags as $k => $val) {
					// 新增标签
					$newId = $Tag->add(array('tagname' => trim($k)));
					// 新增关联
					$ArticleTag->add(array('article_id' => $data['id'],'tag_id'	=> $newId ));
				}
			}
		}
	}

	// 修改后
	protected function _after_update($data, $option)
	{	
		$ArticleTag = M('ArticleTag');
		// 删除已有的标签
		$ArticleTag->where(array('article_id'=>$option['where']['id']))->delete();
		// 处理文章标签
		$tags = explode(',', trim(I('post.tag/s'), ','));
		// 处理标签左右空格
		$tags = $this->arrayTrim($tags);
		if ($tags) {
			$Tag = M('Tag');
			// 获取已有的标签
			$tagData = $Tag->where(array('tagname'=>array('in', $tags)))->select();  
			$tags = array_flip($tags);
			foreach ($tagData as $v) {
				// 插入数据
				$ArticleTag->add(array('article_id' => $option['where']['id'], 'tag_id'	=> $v['id']));
				unset($tags[$v['tagname']]);
			}
			if ($tags) {
				foreach ($tags as $k => $val) {
					// 新增标签
					$newId = $Tag->add(array('tagname' => $k));
					// 新增关联
					$ArticleTag->add(array('article_id' => $option['where']['id'],'tag_id'	=> $newId ));
				}
			}
		}
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
		// 处理发布时间
		$data['pushtime'] = date('Y-m-d H:i:00', strtotime($data['pushtime']));
		// 操作人ID
		$data['update_id'] = session('admin.id');
		// 修改时间
		$data['update_time'] = date('Y-m-d H:i:s');
	}

	// 删除前
	protected function _before_delete($data)
	{	
		// 获取删除的信息
		$infos = $this->field(array('image', 'minimg', 'content'))->where(array('id'=>array('in', $data['where']['id'])))->select();
		if ($infos) {
			$reg = '/<img[^>]+?src="([^"]+)"[^>]+>/Uims';
			foreach ($infos as $val) {
				// 删除文章显示图片
				deleteImage(array($val['image'], $val['minimg']));
				// // 匹配文章内容中的图片路径
				// preg_match_all($reg, htmlspecialchars_decode($val['content']), $imgArr);
				// // 删除文章内容中的图片
				// deleteImage($imgArr[1]);
			}
		}
		// 删除文章标签关联
		M('ArticleTag')->where(array('article_id'=>array('in', $data['where']['id'])))->delete();
	}

	// 获取详情
	public function getOne($id)
	{
		$info = $this->alias('a')->field(array('a.*','b.`catename`','GROUP_CONCAT(d.`tagname`) AS tagname'))
                ->join(" LEFT JOIN `".C('DB_PREFIX')."cate` b ON a.`cate_id` = b.`id`")
                ->join(" LEFT JOIN `".C('DB_PREFIX')."article_tag` c ON c.`article_id` = a.`id`")
                ->join(" LEFT JOIN `".C('DB_PREFIX')."tag` d ON c.`tag_id` = d.`id`")
                ->where(array('a.id'=>$id))
                ->group('a.id')->find();
        return $info;
	}

	/**
	 * 去除标签数组值左右空格
	 *
	 * @param  array  $tags  需要处理的数组
	 *
	 * @return  array  返回处理后的数组
	 */
	protected function arrayTrim($tags)
	{
		if ($tags) {
			foreach ($tags as $k => $v) {
				$v = trim($v); //去除左右空格
				if ($v) {
					$tags[$k] = $v;
				} else {
					unset($tags[$k]);//标签值为空时，删除标签
				}
			}
		}
		return $tags;
	}
}