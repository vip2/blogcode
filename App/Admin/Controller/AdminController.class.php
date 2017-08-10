<?php
namespace Admin\Controller;
use \Admin\Controller\IndexController;

class AdminController extends IndexController 
{   
    // 用户列表
    public function index()
    {   
        $model = D('Admin/Admin');
        $data = $model->search();
        $data['get'] = I();
        $this->assign($data);
        $this->setPageBtn('用户列表');
        $this->display();
    }
    // 新增用户
    public function add()
    {   
    	if(IS_POST)
    	{  
            $model = D('Admin/Admin');//实例化模型
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
        // 获取部门数据
        $groupData = D('Admin/Group')->getTree();
        $this->assign('groupData', $groupData);
        // 获取角色数据
        $roleData = D('Admin/Role')->search(100);
        $this->assign('roleData', $roleData['data']);

        $this->setPageBtn(array('用户列表','添加用户'),U('index'));
		$this->display();
    }
    // 修改用户
    public function edit()
    {
    	$id = I('get.id');
    	if(IS_POST)
    	{
    		$model = D('Admin/Admin');
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
        // 获取当前修改用户数据
    	$model = M('Admin');
    	$data = $model->find($id);
    	$this->assign('data', $data);
        // 获取部门数据
        $groupData = D('Admin/Group')->getTree();
        $this->assign('groupData', $groupData);
        // 获取角色数据
        $roleData = D('Admin/Role')->search(100);
        $this->assign('roleData', $roleData['data']);
        // 获取当前用户所属角色
        $nowRole = M('AdminRole')->field('GROUP_CONCAT(`role_id`) as `role_id`')->where(array('admin_id'=>$id))->find();
        $this->assign('nowRole', $nowRole);

        $this->setPageBtn(array('用户列表','修改用户'),U('index'));
		$this->display();
    }
    // 删除用户
    public function del()
    {
    	$model = D('Admin/Admin');
    	if($model->delete(I('get.id/d', 0)) !== FALSE)
    	{
    		$this->success('删除成功！', U('index'));
    		exit;
    	}
    	else 
    	{
    		$this->error($model->getError());
    	}
    }
    // 修改用户状态
    public function setStatus()
    {
        $id = I('id/d');
        if ($id) 
        {   
            if ($id == 1) {
                $this->error('超级管理员不能修改！');
            } else {
                $myid = session('admin.id');
                if ($id != $myid && $myid > 1) {
                    $this->error('你不是超级管理员,不能修改别人的启用状态!');
                } else {
                    $model = M('Admin');
                    $info = $model->field('status')->find($id);
                    $status = $info['status']?0:1;
                    $model->where(array('id'=>$id))->setField('status',$status);
                    $this->success('修改成功！');
                }
            }
        } 
        else 
        {
            $this->error('参数错误！');
        }
    }
    // 查看用户详情
    public function info()
    {
        $id = I('get.id');
        if ($id) {
            $info = D('Admin/Admin')->getInfo($id);
            $this->assign('data', $info);
            $this->setPageBtn(array('用户列表','用户详情'),U('index'));
            $this->display();
        } else {
            $this->redirect(U('index'));
        }
    }
}