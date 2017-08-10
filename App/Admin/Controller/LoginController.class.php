<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller 
{
	public function index()
	{
		if(IS_POST)
		{	
			$model = D('Admin');
			if($model->validate($model->_login_validate)->create('',  7))
			{
				if(TRUE === $model->login())
					redirect(U('Admin/Index/index')); // 直接跳转可以不提示信息
			}
			$this->error($model->getError());
		}
		$this->display();
	}
	
	// 生成验证码的图片
	public function chkcode()
	{
		$Verify = new \Think\Verify(array(
			'length' => C('YZM_CODE_LENGTH'),
			'useNoise' => C('YZM_USE_NOISE'),
			'imageW' => C('YZM_CODE_W'),
			'imageH' => C('YZM_CODE_H'),
			'fontSize' => C('YZM_FONT_SIZE'),
			'useCurve' => C('YZM_USE_CURVE'),
		));
		$codeSet = C('YZM_CODE_SET');
		if ($codeSet) {
			$Verify->codeSet = $codeSet;
		}
		$Verify->entry();
	}
	// 退出登录
	public function loginOut()
	{	
		// 将SESSION中的用户信息删除
		session(null);
		unset($_SESSION);
		session_unset();
		session_destroy();

		$this->redirect('Login/index');//跳转到登录页
	}
}