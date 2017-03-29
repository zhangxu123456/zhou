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
use Admin\Model\ContactModel;

class ContactController extends CommonController{
	
	protected function _initialize(){
		parent::_initialize();
			$this->breadcrumb1='用户';
			$this->breadcrumb2='留言信息';
	}
	
     public function index(){
     	
		$model=new ContactModel();   
		
		$data=$model->show_code_page();		
		
		$this->assign('empty',$data['empty']);// 赋值数据集
		$this->assign('list',$data['list']);// 赋值数据集
		$this->assign('page',$data['page']);// 赋值分页输出	
		
    	$this->display();
	 }

	function add(){
		
		if(IS_POST){
			$model=new ContactModel();  
			$data=I('post.');
			$return=$model->add_code($data);			
			$this->osc_alert($return);
		}
		
		$this->crumbs='新增';		
		$this->action=U('Contact/add');
		$this->display('edit');
	}

	function edit(){
		if(IS_POST){
			$model=new ContactModel();  
			$data=I('post.');
			$return=$model->edit_code($data);			
			$this->osc_alert($return);
		}
		$this->crumbs='编辑';		
		$this->action=U('Contact/edit');
		$this->d=M('Contact')->find(I('id'));
		$this->display('edit');		
	}

	 public function del(){
		$model=new ContactModel();		
		$return=$model->del_code();			
		$this->osc_alert($return); 	
	 }
	 
}
?>