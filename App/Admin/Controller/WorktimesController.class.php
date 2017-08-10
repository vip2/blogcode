<?php
namespace Admin\Controller;
use \Admin\Controller\IndexController;

class WorktimesController extends IndexController 
{   
    // 考勤列表
    public function index()
    {   
        $model = D('Admin/Worktimes');
        $data = $model->search();
        $this->assign($data);
        $this->setPageBtn('考勤列表');
        $this->display();
    }
    // 新增
    public function add()
    {   
    	if(IS_POST)
    	{  
            $model = D('Admin/Timesheet');//实例化模型
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

        // 获取用户数据
        $userData = M('Admin')->field(array('id','adminuser','nickname'))->order('nickname ASC')->select();
        $this->assign('userData', $userData);

        // 当前用户
        $onAdminId = I('get.admin_id/d');
        $onAdminId =  $onAdminId?$onAdminId:session('admin.id');
        $this->assign('onAdminId', $onAdminId);

        $this->setPageBtn(array('月考勤列表','添加考勤'),U('index'));
		$this->display('edit');
    }
    // 修改
    public function edit()
    {
    	$id = I('get.id');
    	if(IS_POST)
    	{
    		$model = D('Admin/Timesheet');
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
    	$data = M('Timesheet')->find($id);
    	$this->assign('data', $data);
        
         // 获取用户数据
        $userData = M('Admin')->field(array('id','adminuser','nickname'))->order('nickname ASC')->select();
        $this->assign('userData', $userData);

        $this->setPageBtn(array('月考勤列表','修改考勤'),U('index'));
		$this->display();
    }
    // 删除考勤
    public function del()
    {
    	$model = D('Admin/Timesheet');
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
    // 查看考勤详情
    public function info()
    {
        $id = I('get.id');
        if ($id) {
            $info = D('Admin/Timesheet')->find($id);
            $this->assign('data', $info);
            $this->setPageBtn(array('月考勤列表','月考勤详情'),U('index'));
            $this->display();
        } else {
            $this->redirect(U('index'));
        }
    }
    // 发送工资邮件
    public function sendsalary()
    {   
        $ids = I('post.id');
        if ($ids) {
            $data = D('Admin/Timesheet')->sendSalary($ids);
            echo json_encode($data);
        } else {
            $this->error('参数错误！');
        }
    }

    // 导入数据
    public function excelInsert($sheet, $fields, $fileData)
    {
        return D('Admin/Timesheet')->excelInsert($sheet, $fields, $fileData);
    }
}