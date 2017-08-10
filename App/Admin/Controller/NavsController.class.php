<?php
namespace Admin\Controller;
use \Admin\Controller\IndexController;

class NavsController extends IndexController 
{   
    // 导航列表
    public function index()
    {   
        $model = D('Admin/Navs');
        // 获取列表数据
        $listData = $model->getTree();
        $this->assign('data', $listData);
        $this->setPageBtn('导航列表');
        $this->display();
    }
    // 新增导航
    public function add()
    {   
    	if(IS_POST)
    	{  
            $model = D('Admin/Navs');//实例化模型
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
        $this->setPageBtn(array('导航列表','添加导航'),U('index'));
		$this->display('edit');
    }
    // 修改导航
    public function edit()
    {
    	$id = I('get.id');
    	if(IS_POST)
    	{
    		$model = D('Admin/Navs');
    		if($model->create(I('post.'), 2))
    		{
    			if($model->save() !== FALSE)
    			{    
                    $model->setStatusVal(I('post.id'), true);
    				$this->success('修改成功！', U('index',['type'=>I('type')]));
    				exit;
    			}
    		}
    		$this->error($model->getError());
    	}

    	$data = M('Navs')->find($id);
    	$this->assign('data', $data);
        $this->setPageBtn(array('导航列表','修改导航'),U('index'));
		$this->display();
    }
    // 删除导航
    public function del()
    {
    	$model = D('Admin/Navs');
    	if($model->delete(I('get.id', 0)) !== FALSE)
    	{
    		$this->success('删除成功！', U('index'));
    		exit;
    	}
    	else 
    	{
    		$this->error($model->getError());
    	}
    }
    // 修改导航状态
    public function setStatus()
    {
        $id = I('id/d');
        if ($id) {
            D('Admin/Navs')->setStatusVal($id);
            $this->success('修改成功！');
        } else {
            $this->error('参数错误！');
        }
    }
}