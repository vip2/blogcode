<?php
namespace Admin\Controller;
use \Admin\Controller\IndexController;

class TagController extends IndexController 
{   
    // 标签列表
    public function index()
    {   
        $model = D('Admin/Tag');
        // 获取列表数据
        $listData = $model->search();
        $this->assign($listData);
        $this->setPageBtn('标签列表');
        $this->display();
    }
    // 新增标签
    public function add()
    {   
        if(IS_POST)
        {   
            $model = D('Admin/Tag');//实例化模型
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
        $this->setPageBtn(array('标签列表','添加标签'),U('index'));
        $this->display('edit');
    }
    // 修改标签
    public function edit()
    {
        if(IS_POST)
        {   
            $model = D('Admin/Tag');
            if($model->create(I('post.'), 2))
            {
                if($model->save() !== FALSE)
                {    
                    $this->success('修改成功！', U('index',['p'=>I('p/d')]));
                    exit;
                }
            }
            $this->error($model->getError());
        }
        $id = I('get.id/d');
        // 获取当前标签
        $data = M('Tag')->find($id);
        $this->assign('data', $data);
        $this->setPageBtn(array('标签列表','修改标签'),U('index'));
        $this->display();
    }
    // 删除标签
    public function del()
    {
        $id = I('get.id', 0);
        if ($id > 0 ) {
            $model = D('Admin/Tag');
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
            $this->error('参数错误');
        }
    }
    // 获取输入表标签
    public function ajaxTag()
    {   
        $tagname = I('q');
        $data = array();
        if ($tagname) {
            $result = M('Tag')->field(array('tagname'))
                      ->where(array('tagname'=>array('like',"$tagname%")))->limit(6)->select();
            if ($result) {
                foreach ($result as $k => $v) {
                    $data[$k] = $v['tagname'];
                }
            }
        }
        echo json_encode($data);
    }
}