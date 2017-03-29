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
use Think\Model;
class AdvantageModel extends Model{
	
	//修改时，取得博客图片
	public function get_data($id){
		$d=M('Advantage')->find($id);
		$d['thumb_image']=resize($d['image'], 100, 100);
		return $d;
		
	}
	//修改时，取得博客图册图片
	public function get_image_data($id){
		$d=M('Advantage_image')->where(array('mid'=>$id))->select();
		foreach ($d as $k => $v) {
			$d[$k]['thumb']=resize($v['image'], 100, 100);
		}
		return $d;
		
	}

	//修改时，取得博客分类
	/*public function get_category_data($id){
		$sql='SELECT bc.title,bc.id FROM '.C('DB_PREFIX').'news_category bc,'
		.C('DB_PREFIX').'news b WHERE bc.id=b.category_id AND b.news_id='.$id;
		$d=M()->query($sql);		
		return $d[0];
	}*/
	
	public function show_page(){

		$sql='SELECT * FROM '.C('DB_PREFIX').'advantage';
		
		$count=count(M()->query($sql));
		
		$Page = new \Think\Page($count,C('BACK_PAGE_NUM'));
		
		$show  = $Page->show();// 分页显示输出	
		
		$sql.=' order by page_id desc LIMIT '.$Page->firstRow.','.$Page->listRows;
		
		$list=M()->query($sql);

		foreach ($list as $key => $value) {
			$list[$key]['image']=resize($value['image'], 100, 100);
		}
		return array(
			'empty'=>'<tr><td colspan="20">~~暂无数据</td></tr>',
			'list'=>$list,
			'page'=>$show
		);	
		
	}	

	/*public function validate($data){
		$error=array();
		if(empty($data['title'])){
			$error='博客标题必填';
		}
		if($error){
			return array(
				'status'=>'back',
				'message'=>$error				
			);
		}
	}*/
		
	public function edit_page($data){
		// $error=$this->validate($data);
		// if($error){
		// 	return $error;
		// }
		// $data['category_id']=$data['news_category'];	

		$page_id=$data['page_id'];	
		$data['update_time']=date('Y-m-d H:i:s',time());
		$data['content'] =str_replace('\"','"',$data['content'] );
		$data['content'] =str_replace("/<(.*?)>/",'',htmlspecialchars_decode($data['content']));
		$r=M('Advantage')->save($data);

		if($r){				
			try{
				M('advantage_image')->where(array('mid'=>$page_id))->delete();	
				if (isset($data['blog_images'])) {						
					foreach ($data['blog_images'] as $blog_image) {
						$this->execute("INSERT INTO " . C('DB_PREFIX') . "advantage_image SET mid = '" . (int)$page_id . "', image = '" . $blog_image['image']. "', title = '" . $blog_image['title'] . "', sort_order = '" . (int)$blog_image['sort_order'] . "'");
					}
				}
				
				return array(
					'status'=>'success',
					'message'=>'修改成功',
					'jump'=>U('Advantage/index')
				);
			}catch(Exception $e){
				return array(
				'status'=>'fail',
				'message'=>'修改失败,未知异常',
				'jump'=>U('Advantage/index')
				);
			}
			
		}else{
			return array(
			'status'=>'fail',
			'message'=>'修改失败',
			'jump'=>U('Advantage/index')
			);
		}
			
	}	
		
	 function add_page($data){
		// $error=$this->validate($data);
		// if($error){
		// 	return $error;
		// }			
		// $data['category_id']=$data['news_category'];

		$data['create_time']=date('Y-m-d H:i:s',time());
		$data['content'] =str_replace('\"','"',$data['content'] );
		$data['content'] =str_replace("/<(.*?)>/",'',htmlspecialchars_decode($data['content']));
		$page_id=M('Advantage')->add($data);
		
		if($page_id){
			try{
				if (isset($data['blog_images'])) {
					foreach ($data['blog_images'] as $blog_image) {
						$this->execute("INSERT INTO " . C('DB_PREFIX') . "advantage_image SET mid = '" . (int)$page_id . "', image = '" . $blog_image['image']. "', title = '" . $blog_image['title'] . "', sort_order = '" . (int)$blog_image['sort_order'] . "'");
					}
				}


				return array(
					'status'=>'success',
					'message'=>'新增成功',
					'jump'=>U('Advantage/index')
				);
			}catch(Exception $e){
				return array(
				'status'=>'fail',
				'message'=>'新增失败',
				'jump'=>U('Advantage/index')
				);
			}
		}else{
			return array(
			'status'=>'fail',
			'message'=>'新增失败',
			'jump'=>U('Advantage/index')
			);
		}
	}


	public function del_page($id){
		try{
			$image=M('Advantage')->where(array('page_id'=>$id))->field('image')->find();			
			if(!empty($image)){
				A('Image')->del_image('blog',$image['image'],'blog');
			}

			$gallery=M('advantage_image')->where(array('mid'=>$id))->field('image')->select();
			if(!empty($gallery)){
				foreach ($gallery as $key => $value) {
					A('Image')->del_image('blog_gallery',$value['image'],'blog_gallery');
				}
			}

			M('Advantage')->where(array('page_id'=>$id))->delete();
			// M('news_content')->where(array('news_id'=>$id))->delete();
			M('advantage_image')->where(array('mid'=>$id))->delete();

			return array(
				'status'=>'success',
				'message'=>'删除成功',
				'jump'=>U('Advantage/index')
				);
		}catch(Exception $e){
			return array(
				'status'=>'fail',
				'message'=>'删除失败,未知异常',
				'jump'=>U('Advantage/index')
			);
		}
	}	
}
?>