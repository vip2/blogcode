<?php
namespace Admin\Controller;
use \Admin\Controller\IndexController;
use Think\Cache;

class SystemController extends IndexController 
{   
    // 系统设置页面
    public function index()
    {   
        $menus = C('SYSTEM_MENUS');
        $onType = I('get.type', 'webconfig');
        // 获取所有的配置
        $data = C();
        // 处理图片后缀数据
        $data['IMG_EXTS'] = implode('|', $data['IMG_EXTS']);

        if ($onType == 'salarytpl') {
            $varData = D('Admin/Timesheet')->emailVar;
           $this->assign('varData', $varData);
        }

        $this->assign('data', $data);
        $this->assign('systemMenus', $menus);
        $this->assign('onType', $onType);
        $this->setPageBtn('系统设置');
        $this->display($onType);
    }
    // 保存后台设置
    public function webconfig()
    {   
        // 配置名称
        $fileName = C('MY_SYSTEM_NAME');
        // 读取所有的配置
        $systemData = myFr('', $fileName);
        // 重写配置
        $systemData['ADMIN_TXT']['web_title'] = I('post.web_title/s', '3KHOT后台管理系统');
        $systemData['ADMIN_TXT']['web_icon'] = I('post.web_icon/s', 'fa fa-paper-plane-o');
        $systemData['ADMIN_TXT']['web_keywords'] = I('post.web_keywords/s', '3KHOT后台管理系统');
        $systemData['ADMIN_TXT']['web_description'] = I('post.web_description/s', '3KHOT后台管理系统');
        // 调试
        $systemData['SHOW_PAGE_TRACE'] = I('post.SHOW_PAGE_TRACE', false)?true:false;
        $systemData['TOKEN_ON'] = I('post.TOKEN_ON', false)?true:false;
        // 写入文件
        myFw($fileName, $systemData);
        // 跳转到设置页面
        $this->success('保存成功！', U('index',array('type' => ACTION_NAME)));
    }

    // 保存后台邮箱参数
    public function emailconfig()
    {   
        // 配置名称
        $fileName = C('MY_SYSTEM_NAME');
        // 读取所有的配置
        $systemData = myFr('', $fileName);
        // 重写配置
        $systemData['MAIL_ADDRESS'] = I('post.MAIL_ADDRESS');
        $systemData['MAIL_FROM'] = I('post.MAIL_FROM');
        $systemData['MAIL_SMTP'] = I('post.MAIL_SMTP');
        $systemData['MAIL_LOGINNAME'] = I('post.MAIL_LOGINNAME');
        $systemData['MAIL_PASSWORD'] = I('post.MAIL_PASSWORD');
        // 写入文件
        myFw($fileName, $systemData);
        // 跳转到设置页面
        $this->success('保存成功！', U('index',array('type' => ACTION_NAME)));
    }
    
    // 保存后台参数设置
    public function dataconfig()
    {   
        // 配置名称
        $fileName = C('MY_SYSTEM_NAME');
        // 读取所有的配置
        $systemData = myFr('', $fileName);
        // 重写配置
        $systemData['AUTO_CODE_CAPITAL'] = I('post.AUTO_CODE_CAPITAL', 'upper');
        // 处理 编号自动转换 值
        $systemData['AUTO_CODE_CAPITAL'] = $systemData['AUTO_CODE_CAPITAL'] === 'false'?false:$systemData['AUTO_CODE_CAPITAL'];
        $systemData['AUTO_CODE_LENGTH'] = I('post.AUTO_CODE_LENGTH/d', 6);
        $systemData['AUTO_ADMIN_CODE'] = I('post.AUTO_ADMIN_CODE', 'U');

        // 图片设置
        $systemData['IMG_MAX_SIZE'] = I('post.IMG_MAX_SIZE/d', 3);
        $systemData['IMG_EXTS'] = I('post.IMG_EXTS',array('jpg', 'pjpeg', 'bmp', 'gif', 'png', 'jpeg'));
        $systemData['IMG_EXTS'] = is_array($systemData['IMG_EXTS'])?$systemData['IMG_EXTS']:explode('|', $systemData['IMG_EXTS']);
        // 图片上传目录
        $systemData['IMG_ROOT_PATH'] = I('post.IMG_ROOT_PATH/s', './Public/static/Uploads/');
        // 验证码设置
        $systemData['YZM_CODE_LENGTH'] = I('post.YZM_CODE_LENGTH/d', 2);
        $systemData['YZM_CODE_LENGTH'] = $systemData['YZM_CODE_LENGTH']?$systemData['YZM_CODE_LENGTH']:1;
        $systemData['YZM_USE_NOISE'] = I('post.YZM_USE_NOISE', false)?true:false;
        $systemData['YZM_USE_CURVE'] = I('post.YZM_USE_CURVE', false)?true:false;
        $systemData['YZM_CODE_SET'] = I('post.YZM_CODE_SET/s', '0123456789');
        $systemData['YZM_CODE_W'] = I('post.YZM_CODE_W/d', 116);
        $systemData['YZM_CODE_W'] = $systemData['YZM_CODE_W']?$systemData['YZM_CODE_W']:100;
        $systemData['YZM_CODE_H'] = I('post.YZM_CODE_H/d', 33);
        $systemData['YZM_CODE_H'] = $systemData['YZM_CODE_H']?$systemData['YZM_CODE_H']:30;
        $systemData['YZM_FONT_SIZE'] = I('post.YZM_FONT_SIZE/d', 16);
        $systemData['YZM_FONT_SIZE'] = $systemData['YZM_FONT_SIZE']?$systemData['YZM_FONT_SIZE']:16;
        // 默认显示条数
        $systemData['PAGE_DEFAULT_NUM'] = I('post.PAGE_DEFAULT_NUM/d', 20);
        $systemData['PAGE_DEFAULT_NUM'] = $systemData['PAGE_DEFAULT_NUM']?$systemData['PAGE_DEFAULT_NUM']:20;

        // 写入文件
        myFw($fileName, $systemData);
        // 跳转到设置页面
        $this->success('保存成功！', U('index',array('type' => ACTION_NAME)));
    }

    // 保存文件设置
    public function fileconfig()
    {
        # code...
    }

    // 保存工资模板
    public function salarytpl()
    {
        // 配置名称
        $fileName = C('MY_SYSTEM_NAME');
        // 读取所有的配置
        $systemData = myFr('', $fileName);
        // 重写模板标题
        $systemData['MAIL_TPL_TITLE'] = I('post.MAIL_TPL_TITLE', '');
        $MailTplContent['MAIL_TPL_CONTENT'] = I('post.MAIL_TPL_CONTENT', '');
        // 将模板内容写入文件
        myFw('data-tpl/salarytpl', $MailTplContent, C('FILE_STATIC_PATH'));
        // 写入文件
        myFw($fileName, $systemData);
        // 跳转到设置页面
        $this->success('保存成功！', U('index',array('type' => ACTION_NAME)));
    }

    // 清除缓存
    public function cleardata()
    {
        // 系统缓存类 清除缓存
        $Cache = Cache::getInstance()->clear();
  
        // 删除缓存文件（RUNTIME）
        if (delDirs(RUNTIME_PATH)) {
            // 关闭网页
            echo "<script type='text/javascript'>document.onload = window.close();</script>"; 
        } else {
           $this->error('缓存清除失败，请重新操作！');
        }
    }
}