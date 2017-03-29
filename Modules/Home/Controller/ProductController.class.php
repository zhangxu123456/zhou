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

class ProductController extends CommonController {
	//显示全部产品
	public function index(){
		$goods = M('Goods');
		$gos = $goods->where('goods_id = 3')->find();
		$this->assign('gos',$gos);
		
		$this->display();
	}

}