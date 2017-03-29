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
use Admin\Model\QuestionModel;

class QuestionController extends CommonController{
	
	protected function _initialize(){
		parent::_initialize();
			$this->breadcrumb1='问题';
			$this->breadcrumb2='常见问题';
	}
	
     public function index(){
     	
		$model=new QuestionModel();   
		
		$data=$model->show_page();		
		
		$this->assign('empty',$data['empty']);// 赋值数据集
		$this->assign('list',$data['list']);// 赋值数据集
		$this->assign('page',$data['page']);// 赋值分页输出	
		
    	$this->display();
	 }

	function add(){
		
		if(IS_POST){
			$model=new QuestionModel();  
			$data=I('post.');
			$return=$model->add_page($data);			
			$this->osc_alert($return);
		}
		$this->crumbs='新增';		
		$this->action=U('Question/add');
		$this->display('edit');
	}

	function edit(){
		if(IS_POST){
			$model=new QuestionModel();  
			$data=I('post.');
			$return=$model->edit_page($data);			
			$this->osc_alert($return);
		}
		$this->crumbs='编辑';		
		$this->action=U('Question/edit');
		$this->d=M('Question')->find(I('id'));
		$this->display('edit');		
	}

	 public function del(){
		$model=new QuestionModel();		
		$return=$model->del_page();			
		$this->osc_alert($return); 	
	 }
	 
}
?>