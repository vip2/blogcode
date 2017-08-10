<?php
namespace Admin\Controller;
use \Admin\Controller\IndexController;

class FileexcelController extends IndexController 
{   
    // 导入第一步
    public function step1()
    {   
        $module = I('get.type/s');
        if ($module) {
           $fileKey = MD5(date('Y-m-d H:i:s').session('admin.id'));
            $fileData = session($fileKey);
            $fileData['module'] = $module;
            $fileData['filekey'] = $fileKey;
            // 将数据存入session
            session($fileData['filekey'], $fileData);

            $this->assign($fileData);
            $this->setPageBtn('导入文件');
            $this->display();
        } else {
            $this->error('参数错误！');
        }
        
        
    }

    // 导入第一步
    public function step2()
    {   
        $fileKey = I('post.filekey/s');
        // 获取session中的数据
        $fileData = session($fileKey);
        $isCheck = file_exists($fileData['fileResult']['filePath']);
        if (IS_POST && $fileKey && ((isset($_FILES['uploadfile']) && $_FILES['uploadfile']['error'] == 0) || $isCheck)) {
            // 将文件上传信息保存到session中
            $ret = $isCheck?$fileData['fileResult']:uploadFileOne('uploadfile', 'Admin','excel', true);
            if ($ret['code'] == 1) {
                $sheet = getExcelData($ret['filePath']);
                if (is_array($sheet) && $sheet['code'] == 0) {
                    // 返回第一步
                    $this->error($sheet['msg'], U('step1', array('type'=>$fileData['module'])));
                    exit;
                }
                $demoData = array();
                foreach ($sheet->getRowIterator() as $row) {
                    if (($rowIndex = $row->getRowIndex()) < 4) {
                        foreach ($row->getCellIterator() as $cell) {
                            $value['col'] = $cell->getColumn();
                            $value['value'] = $cell->getValue();
                            $demoData[$rowIndex][] = $value;
                        }
                    }
                }
                $model = M($fileData['module']);
                $tableName = $model->getTableName();
                $tableType = explode(C('DB_PREFIX'), $tableName);
                // 获取字段
                $cols = M('Fields')->where(array('tablename'=>$tableType[1], 'isup'=>1))->select();
                $fileData['fileResult'] = $ret;
                $fileData['isHeader'] = I('post.isheader/d',0);
               if ($fileData['isHeader'] && count($demoData) < 2) {
                    // 返回第一步 
                   $this->error('文件中没数据，请重新上传！', U('step1', array('type'=>$fileData['module'])));
                   exit;
               }
               session($fileKey, $fileData);
               $this->assign($fileData);
               $this->assign('cols', $cols);
               $this->assign('demoData', $demoData);
               $this->assign('fornum', count($demoData[1]));
            } else {
                // 返回导入第一步
                $this->error('文件上传失败，请重新上传！', U('step1', array('type'=>$fileData['module'])));
                exit;
            }
            $this->setPageBtn('导入文件');
            $this->display();
        }        
    }

    // 写入数据
    public function step3()
    {   
        $fileKey = I('post.filekey/s');
        $fields = I('post.fieldcol/a', array());
        $fileData = session($fileKey);
        $isCheck = file_exists($fileData['fileResult']['filePath']) || isset($fileData['insertNum']);
        if ($fileKey && $fields && $isCheck) {
            if (!isset($fileData['insertNum'])) {
                // 获取sheet
                $sheet = getExcelData($fileData['fileResult']['filePath']);
                if (is_array($sheet) && $sheet['code'] == 0) {
                    $this->error($sheet['msg']);
                    exit;
                }
                // 在对于模型中插入数据
                $insertData = A($fileData['module'])->excelInsert($sheet, $fields, $fileData);
                // 删除对应的excel文件
                delDirs($fileData['fileResult']['filePath']);
                // 处理session数据
                $fileData['notNum'] = $insertData['notNum'];
                $fileData['insertNum'] = $insertData['insertNum'];
                session($fileKey, $fileData);
            }
            $this->assign($fileData);
            $this->display();
        } else {
            $this->error('参数错误！');
        }
    }

    // 导出忽略数据
    public function download()
    {
        $fileKey = I('filekey/s');
        $fileData = session($fileKey);
        downExcel(S($fileKey), '导出忽略数据('.$fileData['notNum'].')条', $fileData['isHeader'], true);
    }
}