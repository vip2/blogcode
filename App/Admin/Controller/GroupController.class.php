<?php
namespace Admin\Controller;
use \Admin\Controller\IndexController;

class GroupController extends IndexController 
{   
    // 部门列表
    public function index()
    {   
        $model = D('Admin/Group');
        // 获取列表数据
        $listData = $model->getTree();
        $this->assign('data',$listData);
        $this->setPageBtn('部门列表');
        $this->display();
    }
    // 新增部门
    public function add()
    {   
        $model = D('Admin/Group');//实例化模型
        if(IS_POST)
        {  
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
        // 获取上级部门
        $parentGroup = $model->getTree();
        $this->assign('parentData', $parentGroup);
        $this->setPageBtn(array('部门列表','添加部门'),U('index'));
        $this->display();
    }
    // 修改部门
    public function edit()
    {
        $id = I('get.id');
        $model = D('Admin/Group');
        if(IS_POST)
        {
            if($model->create(I('post.'), 2))
            {
                if($model->save() !== FALSE)
                {    
                    $this->success('修改成功！', U('index',['type'=>I('type')]));
                    exit;
                }
            }
            $this->error($model->getError());
        }
        // 获取当前部门
        $data = $model->find($id);
        // 获取上级部门
        $parentGroup = $model->getTree();
        // 获取下级部门ID
        $childrenIds = $model->getChildren($id);
        $childrenIds = $childrenIds?implode(',', $childrenIds).','.$id:$id;
        $this->assign('data', $data);
        $this->assign('parentData', $parentGroup);
        $this->assign('childrenData', $childrenIds);
        $this->setPageBtn(array('部门列表','修改部门'),U('index',['type'=>$data['type']]));
        $this->display();
    }
    // 删除部门
    public function del()
    {
        $model = D('Admin/Group');
        $id = I('get.id/d', 0);
        if ($id != 1) {
            if($model->delete($id) !== FALSE)
            {
                $this->success('删除成功！', U('index'));
                exit;
            }
            else 
            {
                $this->error($model->getError());
            }
        } else {
            $this->error('该部门不能删除');
        }
    }
}