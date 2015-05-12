<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class LawController extends BaseController {

    public function index() {
        $this->assign('webtitle',L('T_LAW'));
        $this->flsm = M('Page')->where("unique_id = 'flsm' AND display = 1")->order('id')->field('id,page_name,content')->select();
        $this->display();
    }

}