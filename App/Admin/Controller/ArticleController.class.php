<?php
namespace Admin\Controller;
use \Admin\Controller\IndexController;

class ArticleController extends IndexController 
{   
    // 文章列表
    public function index()
    {   
        $model = D('Admin/Article');
        $data = $model->search();
        $this->assign($data);
        $this->setPageBtn('文章列表');
        $this->display();
    }
    // 新增
    public function add()
    {   
    	if(IS_POST)
    	{  
            $model = D('Admin/Article');//实例化模型
    		if($model->create(I('post.'), 1))
    		{
    			if($id = $model->add())
    			{    
    				$this->success('添加成功！', U('index'));
    				exit;
    			}
    		}
    		$this->error($model->getError());
    	}

        // 获取文章类型
        $cateData = D('Admin/Cate')->getTree();
        $this->assign('cateData', $cateData);

        $this->setPageBtn(array('文章列表','添加文章'),U('index'));
		$this->display('edit');
    }
    // 修改
    public function edit()
    {
    	$id = I('get.id');
        $model = D('Admin/Article');
    	if(IS_POST)
    	{
    		if($model->create(I('post.'), 2))
    		{
    			if($model->save() !== FALSE)
    			{
    				$this->success('修改成功！', U('index'));
    				exit;
    			}
    		}
    		$this->error($model->getError());
    	}
        // 获取当前修改数据
    	$data = $model->getOne($id);
    	$this->assign('data', $data);
        
         // 获取文章类型
        $cateData = D('Admin/Cate')->getTree();
        $this->assign('cateData', $cateData);

        $this->setPageBtn(array('文章列表','修改文章'),U('index'));
		$this->display();
    }
    // 删除文章
    public function del()
    {
    	$id = I('get.id', 0);
        if ($id) {
            M('Article')->where(array('id'=>array('in',$id)))->setField('deleted', 1);
            $this->success('删除成功！', U('index'));
        } else {
            $this->error('参数错误！');
        }
    }
    // 查看文章详情
    public function info()
    {
        $id = I('get.id');
        if ($id) {
            $info = M('Article')->alias('a')->field(array('a.*','b.`catename`','GROUP_CONCAT(d.`tagname`) AS tagname'))
                    ->join(" LEFT JOIN `".C('DB_PREFIX')."cate` b ON a.`cate_id` = b.`id`")
                    ->join(" LEFT JOIN `".C('DB_PREFIX')."article_tag` c ON c.`article_id` = a.`id`")
                    ->join(" LEFT JOIN `".C('DB_PREFIX')."tag` d ON c.`tag_id` = d.`id`")
                    ->where(array('a.id'=>$id))
                    ->group('a.id')->find();

            $this->assign('data', $info);
            $this->setPageBtn(array('文章列表','月文章详情'),U('index'));
            $this->display();
        } else {
            $this->redirect(U('index'));
        }
    }
    // 修改文章状态
    public function setStatus()
    {
        $id = I('post.id/');
        $field = I('post.field/s');
        if ($id && $field) {
            $model = M('Article');
            $data = $model->field($field)->find($id);
            $val = $data[$field]?0:1;
            if ($model->where(array('id'=>$id))->setField($field,$val) !== false) {
                $this->success('修改成功！', U('index'));
            } else {
                $this->error($model->getError());
            }
        } else {
            $this->error('参数错误！');
        }     
    }
    // 回收站
    public function recycleBin()
    {   
        $model = D('Admin/Article');
        $data = $model->search(0, 1);
        $this->assign($data);
        $this->assign('isRecycle', 'is');
        $this->setPageBtn(array('文章列表','回收站'),U('index'));
        $this->display();
    }

    // 彻底删除文章
    public function isdel()
    {
        $id = I('get.id', 0);
        $model = D('Admin/Article');
        if ($model->where(array('id'=>array('in',$id)))->delete() !== false) {
            $this->success('删除成功！', U('recycleBin'));
        } else {
            $this->error($model->getError());
        }
    }
}