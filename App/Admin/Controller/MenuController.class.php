<?php
namespace Admin\Controller;
use \Admin\Controller\IndexController;

class MenuController extends IndexController 
{   
    // 菜单列表
    public function index()
    {   
        $model = D('Admin/Menu');
        // 获取列表数据
        $listData = $model->getTree();
        $this->assign('data',$listData);
        $this->setPageBtn('菜单列表');
        $this->display();
    }
    // 新增菜单
    public function add()
    {   
        if(IS_POST)
        {  
            $model = D('Admin/Menu');//实例化模型
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
        // 如果是下级菜单，则获取对应的数据
        if ($pid = I('get.pid/d',0)) {
            $model = D('Admin/Menu');//实例化模型
            // 获取上级菜单名称
            $parentData = $model->field(array('id','title'))->find($pid);
            $this->assign('parentData', $parentData);
            // 获取URL
            $menuUrl = $model->getSelectMenuUrl();
            $this->assign('menuUrl', $menuUrl);
        }
        $this->setPageBtn(array('菜单列表','添加菜单'),U('index'));
        $this->display();
    }
    // 修改菜单
    public function edit()
    {
        $id = I('get.id');
        $model = D('Admin/Menu');//实例化模型
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
        // 获取当前菜单
        $data = $model->find($id);
        $this->assign('data', $data);

        // 如果是下级菜单，则获取对应的数据
        if ($pid = $data['pid']) {
            // 获取上级菜单名称
            $parentData = $model->field(array('id','title'))->find($pid);
            $this->assign('parentData', $parentGroup);
            // 获取URL
            $menuUrl = $model->getSelectMenuUrl($id);
            $this->assign('menuUrl', $menuUrl);
        }
        
        $this->setPageBtn(array('菜单列表','修改菜单'),U('index',['type'=>$data['type']]));
        $this->display();
    }
    // 删除菜单
    public function del()
    {
        if ($id = I('get.id/d', 0)) {
            $model = D('Admin/Menu');
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
            $this->error('该菜单不能删除');
        }
    }
    // 修改用户状态
    public function setStatus()
    {
        $id = I('id/d');
        if ($id) 
        {   
            D('Admin/Menu')->setStatusVal($id);
            $this->success('修改成功！');
        } 
        else 
        {
            $this->error('参数错误！');
        }
    }
}