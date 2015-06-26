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

        $this->assign("ad_info", $this->getAd('bottom'));
        //团队名称
        $T = M('Team');
        $Tbar = $T -> field('id,title') -> where('status=1') -> order('id ASC') -> select();
        $this -> assign('Tbar', $Tbar);
        /*$id=I('get.id');
        $map['id']=$id;
        if(!$id){
            $map['id']=$Tbar[0]['id'];
        }*/
        /*if(!$id){$this->_empty($id);}*/
        /*if($info=$T->where($map)->find()) {
            if ($info['status'] == 0) {
                $this->_empty($id);
            }
            $this->assign('list', $list);
        }*/
        $list = $T -> where('status=1') -> order('id ASC') -> select();
        $this->assign('list', $list);
        $this->display();


    }
}