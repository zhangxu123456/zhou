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

class IndexController extends CommonController {
    public function index(){
	 	
	    C('SITE_TITLE','');	  
	    $this->title=C('SITE_NAME');
        $this->meta_keywords=C('META_KEYWORDS');
        $this->meta_description=C('META_DESCRIPTION');

        $principle = M('Principle');
        $principle_image = M('Principle_image');
        $princ = $principle->select();
        foreach ($princ as $k1 => $v1) {
            $priWhere['mid'] = $v1['page_id'];
            $crr=$principle_image->where($priWhere)->select();
            $princ[$k1]['lv1'] = $crr;
        }
        $this->assign('princ',$princ);

        $advantage = M('Advantage');
        $advan = $advantage->select();
        $this->assign('advan',$advan);

        $this->display();
	 
    }
}