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
use Admin\Model\NewsModel;
class NewsController extends CommonController{
	
	protected function _initialize(){
		parent::_initialize();
		$this->breadcrumb1='公告';
		$this->breadcrumb2='公司公告';
	}
	
	public function index(){
		
		$model=new NewsModel();   
		$data=$model->show_news_page();		

		$this->assign('empty',$data['empty']);// 赋值数据集
		$this->assign('list',$data['list']);// 赋值数据集
		$this->assign('page',$data['page']);// 赋值分页输出	
		/**/
		$this->display();
	}
	function add(){
		
		if(IS_POST){
			
			$model=new NewsModel();  
			$data=I('post.');
			$return=$model->add_news($data);			
			$this->osc_alert($return);
		}
		$this->action=U('News/add');
		$this->crumbs='新增';
		$this->display('edit');
	}
	
	function edit(){
		
		$model=new NewsModel();  
		
		if(IS_POST){
			
			$data=I('post.');
			$return=$model->edit_news($data);		
		
			$this->osc_alert($return);
		}
		$this->crumbs='编辑';		
		$this->action=U('News/edit');
		
		$this->blog=$model->get_news_data(I('id'));
		
		$this->blog_images=$model->get_news_image_data(I('id'));
		
		$this->blog_categories=$model->get_blog_category_data(I('id'));
		
		$this->display('edit');		
	}
	

	function del(){
		$model=new NewsModel();  
		$return=$model->del_news(I('get.id'));			
		$this->osc_alert($return); 	
	}	
}
?>