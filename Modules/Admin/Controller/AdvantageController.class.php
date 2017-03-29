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
use Admin\Model\AdvantageModel;
class AdvantageController extends CommonController{
	
	protected function _initialize(){
		parent::_initialize();
		$this->breadcrumb1='简介';
		$this->breadcrumb2='三大优势';
	}
	
	public function index(){
		
		$model=new AdvantageModel();   
		$data=$model->show_page();		

		$this->assign('empty',$data['empty']);// 赋值数据集
		$this->assign('list',$data['list']);// 赋值数据集
		$this->assign('page',$data['page']);// 赋值分页输出	
		/**/
		$this->display();
	}
	function add(){
		
		if(IS_POST){
			
			$model=new AdvantageModel();  
			$data=I('post.');
			$return=$model->add_page($data);			
			$this->osc_alert($return);
		}
		$this->action=U('Advantage/add');
		$this->crumbs='新增';
		$this->display('edit');
	}
	
	function edit(){
		
		$model=new AdvantageModel();  
		
		if(IS_POST){
			
			$data=I('post.');
			$return=$model->edit_page($data);		
		
			$this->osc_alert($return);
		}
		$this->crumbs='编辑';		
		$this->action=U('Advantage/edit');
		
		$this->blog=$model->get_data(I('id'));
		
		$this->blog_images=$model->get_image_data(I('id'));
		
		// $this->blog_categories=$model->get_category_data(I('id'));
		
		$this->display('edit');		
	}
	

	function del(){
		$model=new AdvantageModel();  
		$return=$model->del_page(I('get.id'));			
		$this->osc_alert($return); 	
	}	
}
?>