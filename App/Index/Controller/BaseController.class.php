<?php
namespace Index\Controller;

use Think\Controller;

class BaseController extends Controller {

	// 处理公共数据
	public function __construct()
	{  
        $webOpen = C('WEB_UPDATE_HTML');
        // 判断网站是否关闭
        if (!$webOpen && ACTION_NAME !== 'update') {
            redirect(U('update'));
        } elseif ($webOpen && ACTION_NAME === 'update' && CONTROLLER_NAME === 'Index') {
            redirect(U('index'));
        } else {
            // 先调用父类的构造函数
            parent::__construct();
            // 当网站开启时
            if ($webOpen || (ACTION_NAME !== 'update' && CONTROLLER_NAME !== 'Index')) {
                // 获取博客导航
                $this->getNavData();
                // 获取博客的排行榜
                $rankingData = $this->getRankingData();
                $this->assign('rankingData', $rankingData);
                // 获取标签云数据
                $tagCloudData = $this->getTagCloudData();
                $this->assign('tagCloudData', json_encode($tagCloudData));
                // 获取友情链接
                $linkData = $this->getLinks();
                $this->assign('linkData', $linkData);
            }
        }
	}

    /**
     * 获取排行榜数据
     *
     * @param  boolean  $clickArticle      点击排行
     * @param  boolean  $newArticle        最新文章
     * @param  boolean  $recommendArticle  站长推荐
     */
    public function getRankingData($clickArticle = true, $newArticle = true, $recommendArticle = true)
    {
        $articleNum = C('RANKING_DEFAULT_NUM', 10);// 获取显示条数
        $Article = D('Admin/Article');
        // 处理搜索条件
        $where['status'] = array('eq', 1);
        $where['pushtime'] = array('lt', date('Y-m-d H:i:s'));
        $fields = array('id', 'title', 'minimg');// 获取的字段
        $data = array();//返回数据
        // 获取点击排行文章 
        if ($clickArticle) {
            $data['click-sort'] = $Article->field($fields)->where($where)->order('clicknum DESC,pushtime DESC, iscopy ASC')
                                            ->limit($articleNum)->select();
        }
        // 获取最新文章
        if ($newArticle) {
            $data['new-article'] = $Article->field($fields)->where($where)->order('pushtime DESC, clicknum DESC, iscopy ASC')
                                          ->limit($articleNum)->select();
        }
        // 获取推荐文章
        if ($recommendArticle) {
            $data['admin-recommend'] = $Article->field($fields)->where($where)->order('istop DESC, pushtime DESC, clicknum DESC, iscopy ASC')
                                                ->limit($articleNum)->select();
        }
        return $data;
    }
    
    // 设置页面信息
    public function setPageInfo($title, $keywords, $description, $showNav=0, $css=array(), $js=array())
    {
    	$this->assign('page_keywords', $keywords);
    	$this->assign('page_description', $description);
    	$this->assign('page_title', $title);
    	$this->assign('show_nav', $showNav);
    	$this->assign('page_css', $css);
    	$this->assign('page_js', $js);
    }

    // 获取导航
    public function getNavData()
    {
    	$navData = D('Admin/Navs')->getTree();
    	// 处理导航数据 去掉状态为 0 的数据
    	$tempNavData = array();
    	foreach ($navData as $k => $val) {
    		if ($val['status'] == 1) {
                // 处理链接
                if (!$val['isurl']) {
                    $val['url'] = U($val['url']);
                }
                $tempNavData[$k] = $val;
    		}
    	}
    	$this->assign('navData', $tempNavData);
    }

    // 获取友情链接
    public function getLinks()
    {
        $linkData = D('Admin/Link')->field(array('title','minimg','url'))
                    ->where(array('status'=>1))->order('sort ASC,id ASC')->select();
        //处理url
        $tempLinkData = array();
        foreach ($linkData as $k => $val) {
            $url = parse_url($val['url']);
            $val['url'] = isset($url['scheme'])?$val['url']:'http://'.$val['url'];
            $tempLinkData[$k] = $val;
        }
        return $tempLinkData;
    }

    /**
     * 获取标签云数据
     *
     * @param  integer  $tagNum  标签云数量
     *
     * @return  [type]   [description]
     */
    public function getTagCloudData($tagNum = 50, $target = '_self')
    {
        $tagModel = D('Admin/Tag');
        $tagData = $tagModel->alias('a')->field(array('a.id','a.tagname','COUNT(b.tag_id) as count'))
                    ->join(" LEFT JOIN `".C('DB_PREFIX')."article_tag` b ON a.`id` = b.`tag_id`")
                    ->group('a.id')->order('count DESC, a.id ASC')->limit($tagNum)->select();
        // 处理标签数据
        $data = array();
        foreach ($tagData as $k => $val) {
            $data[$k]['label']  = $val['tagname'];
            $data[$k]['url']    = $val['id'];
            $data[$k]['target'] = $target;
        }
        return $data;
    }

    // 升级页面
    public function update()
    {
        $this->display();
    }
}