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

class QuestionController extends CommonController {
	//结算
	function index(){
		$question = M('Question');
		$ques = $question->select();
		$this->assign('ques',$ques);
		$this->display();
	}

}