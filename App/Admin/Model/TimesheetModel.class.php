<?php
namespace Admin\Model;
use Think\Model;

class TimesheetModel extends Model 
{	
	protected $insertFields = array('admin_id','thismonth','paiddays','ycqts','holidays','paid_holidays','maternity_leave','personal_leave','sickdays','absenteeism','late_leaveearly','nonentry_quit');
	protected $updateFields = array('id','admin_id','thismonth','paiddays','ycqts','holidays','paid_holidays','maternity_leave','personal_leave','sickdays','absenteeism','late_leaveearly','nonentry_quit');
	// 模板替换变量
	public $emailVar = array('thismonth'=>'考勤月份','paiddays'=>'计薪天数','ycqts'=>'出勤天数',
		'holidays'=>'节假日','paid_holidays'=>'带薪假期','maternity_leave'=>'产假天数',
		'personal_leave'=>'事假天数','sickdays'=>'病假天数','absenteeism'=>'旷工天数',
		'nonentry_quit'=>'未入职/离职','late_leaveearly'=>'扣迟到/早退折合天数',
		'groupname'=>'部门名称','groupno'=>'部门编号','adminuser'=>'用户账号','nickname'=>'用户昵称',
		'adminno'=>'用户编号','email'=>'用户邮箱','mobile'=>'用户手机号','integral'=>'用户积分',
		'basepay'=>'基本工资');

	// 添加修改
	protected $_validate = array(
		array('admin_id', 'require', '用户不能为空！', 1, 'regex', 3),
		array('admin_id', 'number', '用户的ID必须是一个整数！', 1, 'regex', 3),
		array('thismonth', 'require', '考勤月份不能为空！', 1, 'regex', 3),
		array('thismonth', '/^[1-9]\d{3}-[0-1]\d(-[0-3][0-9])?$/', '考勤月份必须为有效日期！', 1, 'regex', 3),
		array('admin_id,thismonth,id', 'checkMonthData', '用户所选月份的考勤数据已存在！', 1, 'callback', 3),
		array('paiddays', 'currency', '用户计薪天数必须是数字！', 2, 'regex', 3),
		array('ycqts', 'currency', '用户出勤天数必须是数字！', 2, 'regex', 3),
		array('holidays', 'currency', '用户节假日天数必须是数字！', 2, 'regex', 3),
		array('paid_holidays', 'currency', '用户带薪假期天数必须是数字！', 2, 'regex', 3),
		array('maternity_leave', 'currency', '用户产假天数必须是数字！', 2, 'regex', 3),
		array('personal_leave', 'currency', '用户事假天数必须是数字！', 2, 'regex', 3),
		array('sickdays', 'currency', '用户病假天数必须是数字！', 2, 'regex', 3),
		array('absenteeism', 'currency', '用户旷工天数必须是数字！', 2, 'regex', 3),
		array('late_leaveearly', 'currency', '用户扣迟到/早退折合天数必须是数字！', 2, 'regex', 3),
		array('nonentry_quit', 'currency', '用户未入职/离职必须是数字！', 2, 'regex', 3),
	);

	// 验证唯一性
	protected function checkMonthData($value='', $bb)
	{	
		// 处理条件
		$where['admin_id'] = array('eq', $value['admin_id']);
		$where['thismonth'] = array('eq', date('Y-m-01', strtotime($value['thismonth'])));
		if ($value['id'])  $where['id'] = array('neq', $value['id']);
		// 查重
		$count = $this->where($where)->count();
		return $count?false:true;
	}
	
	// 列表
	public function search($pageSize = 0)
	{	
		// 收索
		$where = array();
		$map = array();
		if ($keywords = I('get.keyword/s')) {
			switch (I('get.fledname/s')) {
				case '用户名称':
					$where['b.`adminuser`'] = array('like', "%$keywords%");
					break;

				case '用户昵称':
					$where['b.`nickname`'] = array('like', "%$keywords%");
					break;
				
				default:
					$where['b.`adminuser`'] = array('like', "%$keywords%");
					$where['b.`nickname`'] = array('like', "%$keywords%");
					$where['_logic'] = 'OR';
					break;
			}
			$map['_complex'] = $where;	
		}
		// 处理考勤月份
		if ($thisMonth = I('get.thismonth/s')) {
			$thisMonth = date('Y-m-01', strtotime($thisMonth));
			$map['thismonth'] = array('eq', $thisMonth);
		}

		// 翻页
		$count = $this->alias('a')->join(" LEFT JOIN `".C('DB_PREFIX')."admin` b ON a.`admin_id` = b.`id`")->where($map)->count();
		// 处理当前页数
		$pageSize = $pageSize?$pageSize:getPaegNum();
		// 处理页数
		if (ceil($count/$pageSize) < I('get.p/d')) $_GET['p'] = ceil($count/$pageSize);
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$page->setConfig('header', '共%TOTAL_ROW%条');
		$page->setConfig('theme','%HEADER% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
		$data['page'] = $page->show();
		// 获取数据
		$data['data'] = $this->alias('a')->field(array('a.*','b.`adminuser`','b.`nickname`','b.`basepay`'))
						->join(" LEFT JOIN `".C('DB_PREFIX')."admin` b ON a.`admin_id` = b.`id`")
						->where($map)->group('a.id')->limit($page->firstRow.','.$page->listRows)->select();
		$data['data'] = $this->thisMonthPaid($data['data']);
		return $data;
	}

	// 添加前
	protected function _before_insert(&$data,$options)
	{	
		// 操作人ID
		$data['create_id'] = $data['update_id'] = session('admin.id');
		//  处理考勤月份
		$data['thismonth'] = date('Y-m-01', strtotime($data['thismonth']));
		// 处理创建修改时间
		$data['update_time'] = $data['create_time'] = date('Y-m-d H:i:s');
	}
	
	// 修改前
	protected function _before_update(&$data,$options)
	{	
		// 操作人ID
		$data['update_id'] = session('admin.id');
		//  处理考勤月份
		$data['thismonth'] = date('Y-m-01', strtotime($data['thismonth']));
		// 修改时间
		$data['update_time'] = date('Y-m-d H:i:s');
	}

	// 计算本月的工资
	protected function thisMonthPaid($data)
	{	
		foreach ($data as $k => $val) {
			// 处理日期
			$temp['v0'] = $val['basepay']/$val['paiddays'];
			// 扣除工资
			$temp['v1'] = $val['personal_leave']+$val['maternity_leave']+$val['nonentry_quit'];
			$temp['v1']+= ($val['sickdays']*0.2)+$val['absenteeism']+$val['late_leaveearly'];
			$data[$k]['monthpaid'] = sprintf('%.2f',($val['basepay'] - ($temp['v1']*$temp['v0'])));
			$data[$k]['thismonth'] = date('Y年m月', strtotime($val['thismonth']));
		}
		return $data;
	}

	// 发送工资邮件
	public function sendSalary($ids)
	{	
		// 获取需要发送的数据及其相关信息
		$data = $this->alias('a')->field(array_keys($this->emailVar))
				->join(" LEFT JOIN `".C('DB_PREFIX')."admin` b ON a.`admin_id` = b.`id`")
				->join(" LEFT JOIN `".C('DB_PREFIX')."group` c ON b.`group_id` = c.`id`")
				->where(array('a.id'=>array('in', $ids)))->select();
		$return = array('success'=>0, 'error'=>0);
		if ($data) {
			// 处理工资计算
			$data = $this->thisMonthPaid($data);
			// 获取工资模板
			$salaryTitle = C('MAIL_TPL_TITLE');
			$salaryTplContent = myFr('MAIL_TPL_CONTENT', 'data-tpl/salarytpl', C('FILE_STATIC_PATH'));
			// 单个发送邮件
			foreach ($data as $val) {
				$thisTpl = '';
				$thisTitle = '';
				$searchArr = array();
				$replaceArr = array();
				// 替换模板内容
				foreach ($val as $k => $v) {
					$searchArr[] = '{$'.strtoupper($k).'$}';
					$replaceArr[] = $v;
				}
				$thisTpl = str_replace($searchArr, $replaceArr, $salaryTplContent);
				$thisTitle = $salaryTitle?str_replace($searchArr, $replaceArr, $salaryTitle):$val['thismonth'].' 工资';
				// 发送邮件
				sendMail($val['email'], $thisTitle, html_entity_decode($thisTpl))? $return['success']++:$return['error']++;
			}
		}
		return $return;
	}

	//  导入数据
	public function excelInsert($sheet, $fields, $fileData)
	{	
		// 保存忽略数据
        $notData = array();$insertNum = 0;$emptyNum = 0;
        // 循环插入数据
        foreach ($sheet->getRowIterator() as $row) {
        	$data = array();
            $i = $row->getRowIndex();
            $thisNotAdd = false;
            if ($i > $fileData['isHeader']) {
            	foreach ($fields as $k => $col) {
                    // 获取单元格值
                    $value = $sheet->getCell($k.$i)->getValue();
                    if ($col == 'admin_id') {//处理用户昵称
                    	$newValue = getNickNameId($value);
                    	$tempValue = $value;
                    	$thisNotAdd = $newValue?false:true;
                    	$value = $newValue?:$value;
                    }
                    $data[$col] = $value;
                }
                if($thisNotAdd === false){
                	// 重置数据
                	$this->error = '';
                    // 检验数据
                    if ($this->create($data, 1)) {
                    	// 插入数据
                    	if ($this->add()) {
                            $insertNum++;continue;
                        }
                    }
                    $data['msg'] = $this->getError();
                } else {
            		$data['msg'] = '没有相应的用户！';
                }
                $data['admin_id'] = $tempValue;
                if ($tempValue != '' && $data['thismonth'] ) {
                	$notData[] = $data;
                } else {
                	$emptyNum ++;
                }
                $insertNum++;//统计忽略或插入数据数量
            } else {
            	foreach ($fields as $k => $col) {
                    $notData[0][$col] = $sheet->getCell($k.'1')->getValue();
                }
            }
        }
        //  将忽略数据缓存
        S($fileData['filekey'], $notData);
        // 计算忽略的数据量
        $notInsertNum = count($notData);
        $insertNum-= $emptyNum;
        return array(
        	'insertNum' => $insertNum-($notInsertNum-$fileData['isHeader']),
        	'notNum' => $notInsertNum-$fileData['isHeader']
        	);
	}
}