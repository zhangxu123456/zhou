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
class CodeyqmModel{
	public function show_code_page(){
		
		$count=M('Codeyqm')->count();
		$Page = new \Think\Page($count,C('BACK_PAGE_NUM'));
		$show  = $Page->show();// 分页显示输出	
		$list = M('Codeyqm')->order('codeyqm_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		return array(
			'empty'=>'<tr><td colspan="20">~~暂无数据</td></tr>',
			'list'=>$list,
			'page'=>$show
		);	
		
	}
	
	
	public function add_code($data){
			$data['content'] =str_replace('\"','"',$data['content'] );
			$r=M('Codeyqm')->add($data);
			if($r){
				return array(
				'status'=>'success',
				'message'=>'新增成功',
				'jump'=>U('Codeyqm/index')
				);
			}else{
				return array(
				'status'=>'fail',
				'message'=>'新增失败',
				'jump'=>U('Codeyqm/index')
				);
			}
		
		
	}
	
	public function edit_code($data){
			$r=M('Codeyqm')->save($data);
			if($r){
				return array(
				'status'=>'success',
				'message'=>'修改成功',
				'jump'=>U('Codeyqm/index')
				);
			}else{
				return array(
				'status'=>'fail',
				'message'=>'修改失败',
				'jump'=>U('Codeyqm/index')
				);
			}
		
		
	}
	
	public function del_code(){
		$r=M('Codeyqm')->where(array('codeyqm_id'=>I('codeyqm_id')))->delete();
		if($r){
				return array(
				'status'=>'success',
				'message'=>'删除成功',
				'jump'=>U('Codeyqm/index')
				);
			}else{
				return array(
				'status'=>'fail',
				'message'=>'删除失败',
				'jump'=>U('Codeyqm/index')
				);
			}
	}
	
}
?>











