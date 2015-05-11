<?php
/**
 * Created by PhpStorm.
 * User: cony
 * Date: 14-3-7
 * Time: 下午3:21
 */
namespace Home\Controller;
use Think\Controller;
class TeamController extends BaseController {
    /**
     * 列表页
     */
    public function index(){

        $this->assign('webtitle',L('T_TEAM'));
        $this->display();
    }
}