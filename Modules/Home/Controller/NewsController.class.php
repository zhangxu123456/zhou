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
namespace Home\Controller;

class NewsController extends CommonController {
	//步骤
	function index(){
		$news = M('News');
        import("ORG.Util.AjaxPage");
        $count = $news->count(); 
        $limitRows = 4; 
        $p = new \Org\Util\AjaxPage($count, $limitRows,"user"); 
        $limit_value = $p->firstRow . "," . $p->listRows;
        $p->setConfig('theme', ' %upPage%  %linkPage%  %downPage%');
        $page = $p->show();
        $this->assign('page',$page);
        $ne = $news->order('date desc')->limit($limit_value)->select();
        $this->assign('ne',$ne);
		$this->display();
	}



	function indexnews(){
		$news = M('News');
        import("ORG.Util.AjaxPage");
        $count = $news->count(); 
        $limitRows = 4; 
        $p = new \Org\Util\AjaxPage($count, $limitRows,"user"); 
        $limit_value = $p->firstRow . "," . $p->listRows;
        $p->setConfig('theme', ' %upPage%  %linkPage%  %downPage%');
        $page = $p->show();
        $this->assign('page',$page);
        $ne = $news->order('date desc')->limit($limit_value)->select();
        $this->assign('ne',$ne);
		$this->display();
	}




	public function newsdetail() {
        $this->assign('webtitles', '新闻资讯详情');
        
        $news = M('News');
        $news_id=$_GET['news_id'];
        $where2['news_id'] = array('eq',$news_id);
        $nedetail = $news->where($where2)->find();
        $click=$news->where($where2)->setInc('click',1);
        $this->assign('nedetail',$nedetail);

        // /*推荐*/
        // // $whererec['is_recommend'] = 1;
        // $whererec['news_id'] = array('neq', $nedetail['news_id']);
        // $nerec = $news->where($whererec)->order('date desc')->limit(5)->select();
        // $this->assign('nerec',$nerec);

        // // $seo = M('News')->where('news_id = '.$nedetail['news_id'])->Field('name,seotitle,keywords,description')->select();
        // // $seo[0]['title'] = $seo[0]['name'];
        // // $this->assign('seo',$seo);

        //上一个
        // $fro['cid'] = array('eq', $nedetail['cid']);
        $fro['news_id'] = array('lt',$news_id);
        $front=$news->field('news_id,title')->where($fro)->order('news_id desc')->limit(1)->select();
        $this->assign('front',$front);

         // 下一个
        // $wherenext['cid'] = array('eq', $nedetail['cid']);
        $wherenext['news_id'] = array('gt',$news_id);
        $next = $news->field('news_id,title')->where($wherenext)->order('news_id')->limit(1)->select();
        $this->assign('next',$next);

        $this->display();
    }


}