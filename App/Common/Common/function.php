<?php

// 加密
function emd5($pwd)
{	
	return base64_encode(strrev(C('MD5_KEY').strrev($pwd)));
}
// 解密
function dmd5($pwd)
{

}

// 自动生成编号
function getAutoCode($module, $code='', $field = '')
{	
	// 获取编码字段
	$field = $field?$field:strtolower($module).'no';
	if ($code == '自动生成') {
		$data = M($module)->field("REVERSE(REVERSE(`$field`)+0)+1 AS `_nonum`")->order('`_nonum` DESC')->find();
		// 获取生成数字
		$nowCode = $data['_nonum']?$data['_nonum']:1;
		// 拼接编号
		$code = C(strtoupper("AUTO_".$module."_CODE")).str_pad($nowCode,C('AUTO_CODE_LENGTH'),'0',STR_PAD_LEFT);
	}
	// 处理大小写
	$autoCodeCapital = strtolower(C('AUTO_CODE_CAPITAL'));
	// 大写
	if ($autoCodeCapital == 'upper') {
		$code = strtoupper($code);
	// 小写
	} elseif ($autoCodeCapital == 'lower') {
		$code = strtolower($code);
	}
	return $code;
}

// 写入配置文件
function myFw($fileName, $fileVal='', $filePath=CONF_PATH)
{	
	$filePath = rtrim($filePath, '\\/').'/'.$fileName.'.php';
	if (!is_file($filePath)) {
		fopen($filePath, 'w+');
	}
	return file_put_contents($filePath, "<?php \r\n/* 系统配置文件 */\r\nreturn ".var_export($fileVal, true).";\r\n?>");
}

// 读取配置文件	二级读取
function myFr($key, $fileName, $filePath=CONF_PATH)
{
	// 拼接文件路径
	$filePath = rtrim($filePath, '\\/').'/'.$fileName.'.php';
	if (!is_file($filePath)) {
		return NULL;
	}
	// 获取配置文件所有数据
	$allData = require $filePath;
	$key = trim($key, ' .');
	if ($key) {
		$key = explode('.', $key, 4);
		switch (count($key)) {
			case 1:
				return $allData[$key[0]];
				break;

			case 2:
				return $allData[$key[0]][$key[1]];
				break;

			case 3:
				return $allData[$key[0]][$key[1]][$key[2]];
				break;

			default:
				return $allData[$key[0]][$key[1]][$key[2]][$key[3]];
				break;
		}
	} else {
		return $allData;
	}
}

/**
 * 删除文件夹内容
 * @param  string $filePath    文件路径
 */
function delDirs($filePath)
{	
	// 检查文件或目录是否存在
	if (!file_exists($filePath)) {
        return false;
    }
    // 删除文件
    if (is_file($filePath) || is_link($filePath)) {
    	$data = unlink($filePath); //删除文件
    	clearstatcache(); //清除本次的缓存
        return $data;
    }
    // 删除文件夹类容
    $dir = dir($filePath);//打开目录
    if ($dir) {
    	while (false !== $entry = $dir->read()) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            //递归
           delDirs(trim($filePath, '/\\') . DIRECTORY_SEPARATOR . $entry);
        }
    }
    $dir->close(); //关闭文件资源
    clearstatcache(); //清除本次的缓存
    return rmdir($filePath);
}

// 删除图片：参数：一维数组：所有要删除的图片的路径
function deleteImage($images)
{
	// 先取出图片所在目录
	$rp = C('IMG_ROOT_PATH');
	foreach ($images as $v) {
		// @错误抵制符：忽略掉错误,一般在删除文件时都添加上这个
		@unlink($rp . $v);
	}
}

// 显示图片
function showImage($url, $width='', $height='')
{
	if(empty($url))
		return ;
	$url = ltrim(C('IMG_ROOT_PATH'), '.').$url;
	if($width)
		$width = "width='$width'";
	if($height)
		$height = "height='$height'";
	echo "<img src='$url' $width $height />";
}

/**
 * 发送邮件
 * @param  string $to      接收人邮箱账号
 * @param  string $title   邮件标题
 * @param  string $content 邮件内容
 * @return [type]          [description]
 */
function sendMail($to, $title, $content)
{	
	require_cache(VENDOR_PATH.'phpmailer/phpmailer/PHPMailerAutoload.php');
    $mail = new PHPMailer();
    // 设置为要发邮件
    $mail->IsSMTP();
    // 是否允许发送HTML代码做为邮件的内容
    $mail->IsHTML(TRUE);
    // 是否需要身份验证
    $mail->SMTPAuth=TRUE;
    $mail->CharSet='UTF-8';
    /*  邮件服务器上的账号是什么 */
    $mail->From=C('MAIL_ADDRESS');
    $mail->FromName=C('MAIL_FROM');
    $mail->Host=C('MAIL_SMTP');
    $mail->Username=C('MAIL_LOGINNAME');
    $mail->Password=C('MAIL_PASSWORD');
    // 发邮件端口号默认25
    $mail->Port = 25;
    // 收件人
    $mail->AddAddress($to);
    // 邮件标题
    $mail->Subject=$title;
    // 邮件内容
    $mail->Body=$content;
    return($mail->Send());
}
// 获取excel对象
function getExcelData($filePath)
{	
	if (!file_exists($filePath)) {
		return array('code'=>0, 'msg'=>'文件不存在！');
	}

	require_cache(VENDOR_PATH.'phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php');
	$type = strtolower( pathinfo($file, PATHINFO_EXTENSION) );
	$fileType = PHPExcel_IOFactory::identify($filePath);
	$PHPObj = PHPExcel_IOFactory::createReader($fileType);
	$EXCELObj = $PHPObj->load($filePath);
	return $EXCELObj->getSheet(0);
}
/**
 * 导出Excel
 * @param  array   $data      导出数据
 * @param  string   $fileName  导出文件名称
 * @param  boolean  $isHeader  是否有标题
 * @param  boolean  $isMsg     是否有提示信息
 * @return  [type]   [description]
 */
function downExcel($data, $fileName, $isHeader=true, $isMsg=false)
{	
	$ABC = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','','S','T','U','V','','W','X','Y','Z');
	// 获取当前用户信息
	$adminInfo = session('admin');
	require_cache(VENDOR_PATH.'phpoffice/phpexcel/Classes/PHPExcel.php');
	$objPHPExcel = new PHPExcel();//新建Excel
	$objPHPExcel->getProperties()
				->setCreator($adminInfo['adminuser'])//创建人
				->setLastModifiedBy($adminInfo['adminuser'])//修改人
				->setTitle($adminInfo['adminuser'].$fileName)
				->setSubject($adminInfo['adminuser'].$fileName)
				->setDescription($adminInfo['adminuser'].$fileName)
				->setKeywords($adminInfo['adminuser'].$fileName)
				->setCategory($adminInfo['adminuser'].$fileName);
	$onSheet = $objPHPExcel->setActiveSheetIndex(0);//设置当前的sheet
	$objPHPExcel->getActiveSheet()->setTitle($fileName);//设置sheet的name
	// 设置Excel的值
	$i = 1;$msgCol = '';
	foreach ($data as $k => $v) {
		$j = 0;
		if ($isHeader && $i == 1) {
			foreach ($v as $val) {
				$onSheet->setCellValue($ABC[$j].$i, $val);//设置值
				// 设置样式
				$thisStyle = $onSheet->getStyle($ABC[$j].$i);
				$thisStyle->getFont()->setSize(12)->setBold(true);
				$thisStyle->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$j++;
			}
			if ($isMsg) {
				$msgCol = $ABC[$j];
				$onSheet->setCellValue($msgCol.$i, '错误信息');
				// 设置样式
				$thisStyle = $onSheet->getStyle($msgCol.$i);
				$thisStyle->getFont()->setSize(12)->setBold(true);
				$thisStyle->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			}
		} else {
			foreach ($v as $k => $val) {
				$onSheet->getColumnDimension($ABC[$j])->setWidth(18);
				$onSheet->setCellValue($ABC[$j].$i, $val);
				$j++;
			}
			if ($isMsg) {
				$msgCol = $msgCol?:$ABC[count($v)];
				$onSheet->getStyle($msgCol.$i)->getFont()->getColor()->setARGB('FFFF3300');
			}
		}
		$i++;
	}

	$fileName = $fileName?:date('Y-m-dHi').'Excel';
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.$fileName.'.xls"');
	header('Cache-Control: max-age=0');
	header('Cache-Control: max-age=1');
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
}

// 获取每页条数
function getPaegNum()
{	
	$pageKey = MD5(MODULE_NAME.CONTROLLER_NAME.ACTION_NAME.'_'.session('admin.id'));
	$pageNum = I('get.pnum/d',0);
	if (!$pageNum) {
		$pageNum = S("pageNum.$pageKey");
		$pageNum = $pageNum?$pageNum:C('PAGE_DEFAULT_NUM');
	}
	// 将每页条数存入缓存
	S("pageNum.$pageKey", $pageNum);
	return $pageNum;
}

// 获取用户名称
function getAdminUser($id, $adminUser = false)
{	
	$key = MD5(intval($adminUser).'adminUserName'.$id);
	$data = M('Admin')->cache($key,100)->field(array('adminuser','nickname'))->where(array('id'=>$id))->find($id);
	return $adminUser?$data['nickname']:$data['adminuser'];
}

// 上传文件
function uploadFileOne($fileName, $dirName, $type = '', $allPath = false)
{	
	if (isset($_FILES[$fileName]) && $_FILES[$fileName]['error'] == 0) {
		if (strtolower($type)=='excel') {
			$conf['rootPath'] = C('FILE_EXCEL_ROOT_PATH');
			$conf['maxSize'] = (int)C('EXCEL_MAX_SIZE');
			$conf['exts'] = C('EXCEL_FILE_EXTS');
		} else {
			$conf['rootPath'] = C('IMG_ROOT_PATH');
			$conf['maxSize'] = (int)C('IMG_MAX_SIZE');
			$conf['exts'] = C('UPLOAD_FILE_EXTS');
		}
		$conf['maxSize'] = $conf['maxSize'] * 1024 * 1024;
		$conf['savePath'] = $dirName . '/';

		$allPathStr = $allPath?$conf['rootPath']:'';

		$upload = new \Think\Upload($conf);// 实例化上传类
		$upload->saveName = date('Y-m-d-H').MD5($_FILES[$fileName]['name']);
		 // 上传单个文件 
    	$info   =   $upload->uploadOne($_FILES[$fileName]);

    	if(!$info) {// 上传错误提示错误信息
	        return array(
				'code' => 0,
				'msg' => $upload->getError(),
			);
	    }else{// 上传成功 获取上传文件信息
	    	return array(
				'code' => 1,
				'filePath' => $allPathStr.$info['savepath'].$info['savename'],
			);
	    }
	}
}

/**
 * 上传图片并生成缩略图
 * 用法：
 * $ret = uploadOne('logo', 'Goods', array(
			array(600, 600),
			array(300, 300),
			array(100, 100),
		));
	返回值：
	if($ret['ok'] == 1)
		{
			$ret['images'][0];   // 原图地址
			$ret['images'][1];   // 第一个缩略图地址
			$ret['images'][2];   // 第二个缩略图地址
			$ret['images'][3];   // 第三个缩略图地址
		}
		else 
		{
			$this->error = $ret['error'];
			return FALSE;
		}
 *
 */
function uploadOne($imgName, $dirName, $thumb = array())
{
	// 上传LOGO
	if(isset($_FILES[$imgName]) && $_FILES[$imgName]['error'] == 0)
	{
		$rootPath = C('IMG_ROOT_PATH');
		$upload = new \Think\Upload(array(
			'rootPath' => $rootPath,
		));// 实例化上传类
		$upload->maxSize = (int)C('IMG_MAX_SIZE') * 1024 * 1024;// 设置附件上传大小
		$upload->exts = C('IMG_EXTS');// 设置附件上传类型
		$upload->savePath = $dirName . '/'; // 图片二级目录的名称
		// 上传文件 
		// 上传时指定一个要上传的图片的名称，否则会把表单中所有的图片都处理，之后再想其他图片时就再找不到图片了
		$info   =   $upload->upload(array($imgName=>$_FILES[$imgName]));
		if (!$info) {
			return array(
				'ok' => 0,
				'error' => $upload->getError(),
			);
		} else {
			$ret['ok'] = 1;
		    $ret['images'][0] = $baseImg = $info[$imgName]['savepath'] . $info[$imgName]['savename'];
		    // 判断是否生成缩略图
		    if ($thumb) {
		    	$image = new \Think\Image();
		    	// 循环生成缩略图
		    	foreach ($thumb as $k => $v) {
		    		$ret['images'][$k+1] = $info[$imgName]['savepath'] . 'thumb_'.$v[0].'X'.$v[1].'_' .$info[$imgName]['savename'];
		    		// 打开要处理的图片
				    $image->open($rootPath.$baseImg);
				    $image->thumb($v[0], $v[1])->save($rootPath.$ret['images'][$k+1]);
		    	}
		    }
		    return $ret;
		}
	}
}

// 根据用户昵称获取用户ID
function getNickNameId($nickName)
{
	if ($nickName) {
		$data = M('Admin')->cache('get_nickname_id')->field(array('id'))->where(array('nickname'=>$nickName))->find();
	}
	return $data?$data['id']:0;
}

/**
 * 截取字符串
 * @param  string   $string  要截取的字符串
 * @param  integer  $sublen  截取长度
 * @param  integer  $start   开始的位数
 * @param  string   $code    字符编码 默认 'UTF-8' 'GB2312'
 * @return  string  截取后的字符串
 */
function cutStr($string, $sublen, $start =0, $code ='UTF-8'){
	if($code =='UTF-8'){
		$pa ="/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
		preg_match_all($pa, $string, $t_string);if(count($t_string[0])- $start > $sublen)return join('', array_slice($t_string[0], $start, $sublen))."...";
		return join('', array_slice($t_string[0], $start, $sublen));
	} else {
		$start = $start*2;
		$sublen = $sublen*2;
		$strlen = strlen($string);
		$tmpstr ='';
		for($i=0; $i<$strlen; $i++) {
			if($i>=$start && $i<($start+$sublen)) {
				if(ord(substr($string, $i,1))>129) {
					$tmpstr.= substr($string, $i,2);
				} else {
					$tmpstr.= substr($string, $i,1);
				}
			}
			if(ord(substr($string, $i,1))>129) $i++;
		}
		if(strlen($tmpstr)<$strlen ) $tmpstr.="...";
		return $tmpstr;
	}
}

// 打印数据
function p($arr)
{
	echo "<pre>";
	var_dump($arr);
	echo "</pre>";
}

// 打印数据并结束掉
function pd($arr)
{
	p($arr);die;
}