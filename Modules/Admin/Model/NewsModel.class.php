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
class NewsModel extends Model{
	
	
	//修改时，取得博客图片
	public function get_news_data($id){
		$d=M('News')->find($id);
		$d['thumb_image']=resize($d['image'], 100, 100);
		return $d;
		
	}
	//修改时，取得博客图册图片
	public function get_news_image_data($id){
		
		$d=M('news_image')->where(array('news_id'=>$id))->select();
		
		foreach ($d as $k => $v) {
			$d[$k]['thumb']=resize($v['image'], 100, 100);
		}
		
		return $d;
		
	}
	//修改时，取得博客分类
	public function get_blog_category_data($id){
		
		$sql='SELECT bc.title,bc.id FROM '.C('DB_PREFIX').'news_category bc,'
		.C('DB_PREFIX').'news b WHERE bc.id=b.category_id AND b.news_id='.$id;

		$d=M()->query($sql);		
		
		return $d[0];
		
	}
	
	public function show_news_page(){

		// $sql='SELECT n.news_id,n.category_id,n.meta_title,n.meta_keywords,n.meta_description,n.title,n.image,n.author,n.read_num,n.create_time,n.update_time,n.status,n.reply,n.allow_reply,n.content,n.date,n.summary,c.title ctitle FROM '.C('DB_PREFIX').'news n,'.C('DB_PREFIX').'news_category c WHERE n.category_id=c.id';

		$sql='SELECT * FROM '.C('DB_PREFIX').'news';
		
		$Page = new \Think\Page($count,C('BACK_PAGE_NUM'));
		
		$show  = $Page->show();// 分页显示输出	
		
		$sql.=' order by date desc LIMIT '.$Page->firstRow.','.$Page->listRows;
		
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
		public function validate($data){

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
	}
		
	public function edit_news($data){
		// $error=$this->validate($data);
		// if($error){
		// 	return $error;
		// }
		
		$news_id=$data['news_id'];	
		$data['category_id']=$data['news_category'];	
		$data['update_time']=date('Y-m-d H:i:s',time());
		$data['content'] =str_replace('\"','"',$data['content'] );
		$data['content'] =str_replace("/<(.*?)>/",'',htmlspecialchars_decode($data['content']));
		$r=M('News')->save($data);

		if($r){				
			try{
				M('news_image')->where(array('news_id'=>$news_id))->delete();	
				if (isset($data['blog_images'])) {						
					foreach ($data['blog_images'] as $blog_image) {
						$this->execute("INSERT INTO " . C('DB_PREFIX') . "news_image SET news_id = '" . (int)$news_id . "', image = '" . $blog_image['image']. "', title = '" . $blog_image['title'] . "', sort_order = '" . (int)$blog_image['sort_order'] . "'");
					}
				}
				
				return array(
					'status'=>'success',
					'message'=>'修改成功',
					'jump'=>U('News/index')
				);
			}catch(Exception $e){
				return array(
				'status'=>'fail',
				'message'=>'修改失败,未知异常',
				'jump'=>U('News/index')
				);
			}
			
		}else{
			return array(
			'status'=>'fail',
			'message'=>'修改失败',
			'jump'=>U('News/index')
			);
		}
			
	}	
		
	 function add_news($data){
		// $error=$this->validate($data);
		// if($error){
		// 	return $error;
		// }			
		$data['category_id']=$data['news_category'];
		$data['create_time']=date('Y-m-d H:i:s',time());
		$data['content'] =str_replace('\"','"',$data['content'] );
		$data['content'] =str_replace("/<(.*?)>/",'',htmlspecialchars_decode($data['content']));
		$news_id=M('News')->add($data);
		
		if($news_id){
			try{
				if (isset($data['blog_images'])) {
					foreach ($data['blog_images'] as $blog_image) {
						$this->execute("INSERT INTO " . C('DB_PREFIX') . "news_image SET news_id = '" . (int)$news_id . "', image = '" . $blog_image['image']. "', title = '" . $blog_image['title'] . "', sort_order = '" . (int)$blog_image['sort_order'] . "'");
					}
				}


				return array(
					'status'=>'success',
					'message'=>'新增成功',
					'jump'=>U('News/index')
				);
			}catch(Exception $e){
				return array(
				'status'=>'fail',
				'message'=>'新增失败',
				'jump'=>U('News/index')
				);
			}
		}else{
			return array(
			'status'=>'fail',
			'message'=>'新增失败',
			'jump'=>U('News/index')
			);
		}
	}


	public function del_news($id){
		try{
			$image=M('News')->where(array('news_id'=>$id))->field('image')->find();			
			if(!empty($image)){
				A('Image')->del_image('blog',$image['image'],'blog');
			}

			$gallery=M('news_image')->where(array('news_id'=>$id))->field('image')->select();
			if(!empty($gallery)){
				foreach ($gallery as $key => $value) {
					A('Image')->del_image('blog_gallery',$value['image'],'blog_gallery');
				}
			}

			M('News')->where(array('news_id'=>$id))->delete();
			// M('news_content')->where(array('news_id'=>$id))->delete();
			M('news_image')->where(array('news_id'=>$id))->delete();

			return array(
				'status'=>'success',
				'message'=>'删除成功',
				'jump'=>U('News/index')
				);
		}catch(Exception $e){
			return array(
				'status'=>'fail',
				'message'=>'删除失败,未知异常',
				'jump'=>U('News/index')
			);
		}
	}	
}
?>