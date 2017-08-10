<?php
namespace Admin\Controller;
use \Admin\Controller\IndexController;

class RoleController extends IndexController 
{   
    // 角色列表
    public function index()
    {   
        $model = D('Admin/Role');
        $data = $model->search();
        $this->assign($data);
        $this->setPageBtn('角色列表');
        $this->display();
    }
    // 新增角色
    public function add()
    {   
    	if(IS_POST)
    	{  
            $model = D('Admin/Role');//实例化模型
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
        $this->setPageBtn(array('角色列表','添加角色'),U('index'));
		$this->display();
    }
    // 修改角色
    public function edit()
    {
    	$id = I('get.id');
    	if(IS_POST)
    	{
    		$model = D('Admin/Role');
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
    	$model = M('Role');
    	$data = $model->find($id);
    	$this->assign('data', $data);
        $this->setPageBtn(array('角色列表','修改角色'),U('index'));
		$this->display();
    }
    // 删除角色
    public function del()
    {
    	$model = D('Admin/Role');
    	if($model->delete(I('get.id/d', 0)) !== FALSE)
    	{
    		$this->success('删除成功！', U('index', ['type'=>I('type')]));
    		exit;
    	}
    	else 
    	{
    		$this->error($model->getError());
    	}
    }
    // 修改角色状态
    public function setStatus()
    {
        $id = I('id/d');
        if ($id) 
        {
            $model = M('Role');
            $info = $model->field('status')->find($id);
            $status = $info['status']?0:1;
            $model->where(array('id'=>$id))->setField('status',$status);
            $this->success('修改成功！');
        } 
        else 
        {
            $this->error('参数错误！');
        }
    }
    // 设置权限
    public function roleNode()
    {   
        $roleId = I('get.id/d');
        if (IS_POST) 
        {
            $model = D('Admin/Role');
            $model->saveRoleNode(I('post.'));
            $this->success('权限分配成功！', U('roleNode', array('id'=>I('post.role_id'))));
            exit;
        }
        // 获取角色名称
        $DATA['roleInfo'] = M('Role')->field(array('title','id'))->find($roleId);
        // 获取所有的权限
        $DATA['allNode'] = D('Admin/Node')->getTree('admin');
        // 获取角色已有的权限
        $DATA['useNode'] = M('RoleNode')->field('GROUP_CONCAT(`node_id`) AS `node_id`')->where(array('role_id'=>$roleId))->find();

        $this->assign($DATA);
        $this->setPageBtn(array('角色列表','设置权限'),U('index'));
        $this->display();
    }
}