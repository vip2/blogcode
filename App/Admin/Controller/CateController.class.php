<?php
namespace Admin\Controller;
use \Admin\Controller\IndexController;

class CateController extends IndexController 
{   
    // 文章分类列表
    public function index()
    {   
        $model = D('Admin/Cate');
        // 获取列表数据
        $listData = $model->getTree();
        $this->assign('data',$listData);
        $this->setPageBtn('文章分类列表');
        $this->display();
    }
    // 新增文章分类
    public function add()
    {   
        $model = D('Admin/Cate');//实例化模型
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
        // 获取上级文章分类
        $parentGroup = $model->getTree();
        $this->assign('parentData', $parentGroup);
        $this->setPageBtn(array('文章分类列表','添加文章分类'),U('index'));
        $this->display('edit');
    }
    // 修改文章分类
    public function edit()
    {
        $id = I('get.id');
        $model = D('Admin/Cate');
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
        // 获取当前文章分类
        $data = $model->find($id);
        // 获取上级文章分类
        $parentGroup = $model->getTree();
        // 获取下级文章分类ID
        $childrenIds = $model->getChildren($id);
        $childrenIds = $childrenIds?implode(',', $childrenIds).','.$id:$id;
        $this->assign('data', $data);
        $this->assign('parentData', $parentGroup);
        $this->assign('childrenData', $childrenIds);
        $this->setPageBtn(array('文章分类列表','修改文章分类'),U('index',['type'=>$data['type']]));
        $this->display();
    }
    // 删除文章分类
    public function del()
    {
        $model = D('Admin/Cate');
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
            $this->error('该文章分类不能删除');
        }
    }
    // 修改分类状态
    public function setStatus()
    {
        $id = I('id/d');
        if ($id) 
        {   
            D('Admin/Cate')->setStatusVal($id);
            $this->success('修改成功！');
        } 
        else 
        {
            $this->error('参数错误！');
        }
    }
}