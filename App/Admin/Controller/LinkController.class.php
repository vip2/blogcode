<?php
namespace Admin\Controller;
use \Admin\Controller\IndexController;

class LinkController extends IndexController 
{   
    // 友情链接列表
    public function index()
    {   
        $model = D('Admin/Link');
        $data = $model->search();
        $this->assign($data);
        $this->setPageBtn('友情链接列表');
        $this->display();
    }
    // 新增
    public function add()
    {   
    	if(IS_POST)
    	{  
            $model = D('Admin/Link');//实例化模型
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

        // 获取友情链接类型
        $cateData = D('Admin/Cate')->getTree();
        $this->assign('cateData', $cateData);

        $this->setPageBtn(array('友情链接列表','添加友情链接'),U('index'));
		$this->display('edit');
    }
    // 修改
    public function edit()
    {
    	$id = I('get.id/d');
    	if(IS_POST)
    	{  
            $model = D('Admin/Link');
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
    	$data = M('Link')->find($id);
    	$this->assign('data', $data);

        $this->setPageBtn(array('友情链接列表','修改友情链接'),U('index'));
		$this->display();
    }
    // 删除友情链接
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
    // 查看友情链接详情
    public function info()
    {
        $id = I('get.id');
        if ($id) {
            $info = M('Link')->find($id);
            $this->assign('data', $info);
            $this->setPageBtn(array('友情链接列表','友情链接详情'),U('index'));
            $this->display();
        } else {
            $this->redirect(U('index'));
        }
    }
    // 修改友情链接状态
    public function setStatus()
    {
        $id = I('post.id/d');
        if ($id) {
            $model = M('Link');
            $data = $model->field('status')->find($id);
            $val = $data['status']?0:1;
            $model->where(array('id'=>$id))->setField('status',$val);
            $this->success('修改成功！');
        } else {
            $this->error('参数错误！');
        }   
    }
}