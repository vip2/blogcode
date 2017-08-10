<?php
namespace Admin\Controller;
use \Admin\Controller\IndexController;

class NodeController extends IndexController 
{   
    // 权限列表
    public function index()
    {   
        $model = D('Admin/Node');
        // 获取列表数据
        $listData = $model->getTree();
        $this->assign('data', $listData);
        $this->setPageBtn('权限列表');
        $this->display();
    }
    // 新增权限
    public function add()
    {   
        $data = I();//接受数据
        $data['level'] = $data['level']?$data['level']:1;
        $data['level'] = C('NODELEVEL.'.$data['level']); //获取对应的操作名称

    	if(IS_POST)
    	{  
            $model = D('Admin/Node');//实例化模型
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

		$this->assign('data', $data);
        $this->setPageBtn(array('权限列表','添加权限'),U('index'));
		$this->display();
    }
    // 修改权限
    public function edit()
    {
    	$id = I('get.id');
    	if(IS_POST)
    	{
    		$model = D('Admin/Node');
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
        $levelName = C('NODELEVEL.'.I('get.level/d',1)); //获取对应的操作名称
        $levelName = $levelName?"[$levelName]":'权限';
        $this->assign('levelName', $levelName);

    	$model = M('Node');
    	$data = $model->find($id);
    	$this->assign('data', $data);
        $this->setPageBtn(array('权限列表','修改权限'),U('index'));
		$this->display();
    }
    // 删除权限
    public function del()
    {
    	$model = D('Admin/Node');
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
    // 修改权限状态
    public function setStatus()
    {
        $id = I('id/d');
        if ($id) {
            $model = D('Admin/Node');
            $model->setStatusVal($id);
            $this->success('修改成功！');
        } else {
            $this->error('参数错误！');
        }
    }
}