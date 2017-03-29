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

class ProfileController extends CommonController {
	
    public function index(){
       // $this->title='关于我们-';		   	
       // $this->meta_keywords=C('SITE_KEYWORDS');
       // $this->meta_description=C('SITE_DESCRIPTION');

      $profile = M('Profile');
      $profile_image = M('Profile_image');
      $file = $profile->select();
      foreach ($file as $k1 => $v1) {
          $proWhere['mid'] = $v1['page_id'];
          $crr=$profile_image->where($proWhere)->select();
          $file[$k1]['lv2'] = $crr;
      }
      $this->assign('file',$file);
      $this->display();
    }
	
}