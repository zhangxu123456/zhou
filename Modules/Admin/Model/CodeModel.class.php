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
namespace Admin\Model;
class CodeModel{
	/**
	 *显示长度单位分页	 
	 */
	public function show_code_page(){
		
		$count=M('Code')->count();
		$Page = new \Think\Page($count,C('BACK_PAGE_NUM'));
		$show  = $Page->show();// 分页显示输出	
		$list = M('Code')->order('code_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		return array(
			'empty'=>'<tr><td colspan="20">~~暂无数据</td></tr>',
			'list'=>$list,
			'page'=>$show
		);	
		
	}
	
	
	public function add_code($data){
			$data['content'] =str_replace('\"','"',$data['content'] );
			$r=M('Code')->add($data);
			if($r){
				return array(
				'status'=>'success',
				'message'=>'新增成功',
				'jump'=>U('Code/index')
				);
			}else{
				return array(
				'status'=>'fail',
				'message'=>'新增失败',
				'jump'=>U('Code/index')
				);
			}
		
		
	}
	
	public function edit_code($data){
			$r=M('Code')->save($data);
			if($r){
				return array(
				'status'=>'success',
				'message'=>'修改成功',
				'jump'=>U('Code/index')
				);
			}else{
				return array(
				'status'=>'fail',
				'message'=>'修改失败',
				'jump'=>U('Code/index')
				);
			}
		
		
	}
	
	public function del_code(){
		$r=M('Code')->where(array('code_id'=>I('id')))->delete();
		if($r){
				return array(
				'status'=>'success',
				'message'=>'删除成功',
				'jump'=>U('Code/index')
				);
			}else{
				return array(
				'status'=>'fail',
				'message'=>'删除失败',
				'jump'=>U('Code/index')
				);
			}
	}
	
}
?>











