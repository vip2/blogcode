<?php
namespace Index\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('this Index index','utf-8');
    }
}