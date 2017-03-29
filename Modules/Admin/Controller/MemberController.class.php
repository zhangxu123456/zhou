<?php
/**
 * oscshop 电子商务系统
 *
 * ==========================================================================
 * @link      http://www.oscshop.cn/
 * @copyright Copyright (c) 2015 oscshop.cn. 
 * @license   http://www.oscshop.cn/license.html License
 * ==========================================================================
 *
 * @author    李梓钿
 *
 */
namespace Admin\Controller;
use Admin\Model\MemberModel;

class MemberController extends CommonController{
	
	protected function _initialize(){
		parent::_initialize();
			$this->breadcrumb1='用户';
			$this->breadcrumb2='前台用户';
	}
	
     public function index(){
     	
		$model=new MemberModel();   
		
		$filter=I('get.');
		
		$search=array();
		
		if(isset($filter['name'])){
			$search['name']=$filter['name'];		
		}
		if(isset($filter['email'])){
			$search['email']=$filter['email'];					
		}
		if(isset($filter['tel'])){
			$search['tel']=$filter['tel'];			
		}

		$data=$model->show_member_page($search);

		$this->assign('empty',$data['empty']);// 赋值数据集
		$this->assign('list',$data['list']);// 赋值数据集
		$this->assign('page',$data['page']);// 赋值分页输出	
		
    	$this->display();
	 }


	 public function erji(){
     	
		$model=new MemberModel();   
		
		$filter=I('get.');
		
		$search=array();
		
		if(isset($filter['name'])){
			$search['name']=$filter['name'];		
		}
		if(isset($filter['email'])){
			$search['email']=$filter['email'];					
		}
		if(isset($filter['tel'])){
			$search['tel']=$filter['tel'];			
		}

		$data=$model->show_member_erjipage($search);

		$this->assign('empty',$data['empty']);// 赋值数据集
		$this->assign('list',$data['list']);// 赋值数据集
		$this->assign('page',$data['page']);// 赋值分页输出	
		
    	$this->display();
	 }

	 public function changestatus_vip() {
        $member_id = $_GET['member_id'];
        $m_news = M("Member");
        $map['member_id'] = $member_id;
        $status = $m_news->where($map)->getField('status');
        $data['status'] = abs($status - 1);
        $status_haoArr = array("<span class='red bold'>禁用</span>", "<span class='green bold'>启用</span>");
        if ($m_news->where($map)->save($data)) {
            echo json_encode(array("status" => 1, "info" => $status_haoArr[$data['status']]));
            //echo '<img src="../Public/Img/action_'.$data['is_recommend'].'.png" border="0">';
            exit;
        }
        return false;
    }

    function del(){
		$model=new MemberModel();  
		$return=$model->del_member(I('get.id'));			
		$this->osc_alert($return); 	
	}

	

	
	function add(){
		$model=new MemberModel();
		if(IS_POST){			  
			$data=I('post.');
			$return=$model->add_member($data);			
			$this->osc_alert($return);
		}
		$this->crumbs='新增';		
		
		$this->display();		
	}
	
	function info(){
		$model=new MemberModel();
		if(IS_POST){			  
			$data=I('post.');
			$return=$model->edit_info($data);			
			$this->osc_alert($return);
		}
		$this->crumbs='编辑';		
		$this->action=U('Member/info');
		$this->data=$model->info(I('id'));
	
		$this->display();		
	}
	 
}
?>