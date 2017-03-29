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

class CheckoutController extends CommonController {
	//步骤1：结算选项
	function login(){
		$this->display();
	}
	//验证登录
	function validate_login(){

		//是否已经登录
		$json=array();
		if (is_login()) {
			$json['redirect'] = U('/checkout');			
		}
		if (!$json) {
			$d=I('post.');
			$user=M('Member')->getByUname($d['uname']);	
			if(!$user){
				$user=M('Member')->getByEmail($d['uname']);	
			}
			//用户存在且可用
			if(!($user&&$user['status']==1)){			
				$json['error']['usering']='用户不存在或被禁用！！';
			}

			if(think_ucenter_encrypt($d['password'],C('PWD_KEY'))!=$user['pwd']){
				$json['error']['warning']='密码错误！！';
			}

			if(!check_verify(I('code'))){
	            $json['error']['codeing']='验证码错误！！';			
	        }
		}
		if (!$json) {
			 $auth = array(
			            'uid'             => $user['member_id'],
			            'username'        => $user['uname'],		      
						);			
					 	
		    session('user_auth', $auth);			
			
    		session('user_auth_sign', data_auth_sign($auth));					
		
	        $data = array();
	        $data['member_id']	=	$user['member_id'];
	        $data['last_login_time']	=	time();			

	        $data['login_count']		=	array('exp','login_count+1');
			$data['last_login_ip']	=	get_client_ip();
			
	        M('Member')->save($data);			
			
			storage_user_action($user['member_id'],$user['uname'],C('FRONTEND_USER'),'登录了网站');
			
			if($user['address_id']!=0){
				session('shipping_address_id',$user['address_id']);
			}
			
				//是否有货
			$cart=new \Lib\Cart();
			if ((!$cart->has_goods()) ) {
				$json['redirect'] = U('/cart');
				$this->ajaxReturn($json);
				die;
			}
			
			$json['redirect'] = U('/checkout');		
		}
		
		$this->ajaxReturn($json);
		die();
	}
	
	//选择是注册购买还是不注册购买
	function user(){
		
		if(I('u')=='register'){		
			
			$this->province=M('area')->where('area_parent_id=0')->select();
		
			$this->display('register');
		}
		if(I('u')=='guest'){
			
		}
		
	}








	//用户注册验证写入
	function register(){

		function random($length = 6 , $numeric = 0) {
            PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
            if($numeric) {
                $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
            } else {
                $hash = '';
                $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
                $max = strlen($chars) - 1;
                    for($i = 0; $i < $length; $i++) {
                    $hash .= $chars[mt_rand(0, $max)];
                }
            }
            return $hash;
        }
        $_SESSION['send_code'] = random(6,1);


		if(IS_POST){
			//未登录
			$json=array();
			if(!is_login()){
			
				//验证是否有货				
				$cart=new \Lib\Cart();
				if ((!$cart->has_goods())) {
					$json['redirect'] = U('/cart');
				}
				//验证最小商品数量
				$products = $cart->get_all_goods();

				foreach ($products as $product) {
					$product_total = 0;
		
					foreach ($products as $product_2) {
						if ($product_2['goods_id'] == $product['goods_id']) {
							$product_total += $product_2['quantity'];
						}
					}		
		
					if ($product['minimum'] > $product_total) {
						$json['redirect'] =U('/cart');
		
						break;
					}				
				}
				
				if (!$json) {
					$d=I('post.');
					if (!preg_match("/^[\x4E00-\x9FA5\w]{6,12}$/",$d['uname'])) {
						$json['error']['uname'] = '请输入中文,字母,数字,下划线,6-12个字符！';
					}
					if (M('Member')->getByUname($d['uname'])) {
						$json['error']['uname'] = '用户名已经存在！！';
					}

					if ((utf8_strlen($d['name']) <= 1) || (utf8_strlen($d['name']) > 5)) {
						$json['error']['name'] = '姓名长度必须大于1,小于5位！！';
					}

					if (!preg_match("/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/",$d['id_card']) && !preg_match("/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/",$d['id_card'])) {
						$json['error']['id_card'] = '请输入正确身份证';
					}
					if (M('Member')->getByIdCard($d['id_card'])) {
						$json['error']['id_card'] = '身份证已经存在！！';
					}

					if(empty($d['address']) || $d['loc_province'] == '省份' || $d['loc_city'] == '地级市' || $d['loc_town'] == '市、县、区'){
						$json['error']['address'] = '完成地址填写！！';
					}
					

					if(empty($d['email'])){
						$json['error']['email'] = 'email必填！！';
					}
					
					if(!empty($d['email'])){					
						if ((utf8_strlen($d['email']) > 96) || !preg_match('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/', $d['email'])) {
							$json['error']['email'] = 'email格式错误！！';
						}
						if (M('Member')->getByEmail($d['email'])) {
							$json['error']['email'] = 'email已经存在！！';
						}
					}					

					if (!preg_match("#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#",$d['telephone'])) {
						$json['error']['telephone'] = '请输入你的正确手机号！！';
					}	
					if (M('Member')->getByTelephone($d['telephone'])) {
						$json['error']['telephone'] = '手机号已经存在！！';
					}

					if ((utf8_strlen($d['password']) < 6) || (utf8_strlen($d['password']) > 20)) {
						$json['error']['password'] = '密码长度错误！！';
					}

					if ($d['confirm'] != $d['password']) {
						$json['error']['confirm'] = '两次密码输入不一致！！';
					}

					if(empty($d['idcadeimage1']) || empty($d['idcadeimage2']) || empty($d['addressimage'])){
						$json['error']['idcadeimage1'] = '证件必填！！';
					}

					if($_POST['telephone']!=$_SESSION['mobile'] or $_POST['mobile_code']!=$_SESSION['mobile_code'] or empty($_POST['telephone']) or empty($_POST['mobile_code'])){ 
		                $json['error']['mobile_code'] = '验证码错误！！';
		            }
					
				}

				if (!$json) {
					$uid=D('Member')->add_member();
								
					 $auth = array(
			            'uid'             => $uid,
			            'username'        => $d['uname'],		      
					 );			
					storage_user_action($uid,$d['uname'],C('FRONTEND_USER'),'注册成为会员');
					$email_content='您好,感谢您注册成为'.C('SITE_NAME').'会员<br />'.
					'您的账号是 '.$d['uname'].'<br />'.
					'邮箱是 '.$d['email'].'<br />'.
					'密码是 '.$d['password'].'<br />'.
					'您可以使用账号或者邮箱来进行网站的登录<a href="'.C('SITE_URL').U('/login').'">点此进行登录</a>';
					//发送邮件
					think_send_mail($d['email'],$d['uname'],C('SITE_NAME').'会员注册成功',$email_content);
				    session('user_auth', $auth);
		    		session('user_auth_sign', data_auth_sign($auth));					
					session('shipping_address_id', D('Member')->getAddress($uid));	
				}
				
			}else{
				$json['redirect'] = U('/checkout');
			}

			$this->ajaxReturn($json);
			die();
		}
		$this->display();
	}
	//收货地址
	function shipping_address(){
		$s=session('shipping_address_id');
		if (isset($s)) {
			$this->address_id=$s;
		} else {
			$this->address_id=D('Member')->get_address_id(session('user_auth.uid'));
		}
		
		$this->province=M('area')->where('area_parent_id=0')->select();
		
		$this->addresses=D('Member')->getAddress(session('user_auth.uid'));
	
		$this->display();
	}
	
	function validate($cart,$json){
		
		if (!is_login()) {
			$json['redirect'] = U('/checkout');
		}
		
		//验证是否需要运送 
		if (!$cart->has_shipping()) {
			$json['redirect'] = U('/checkout');
		}
		
		// 验证是否有货	
		if ((!$cart->has_goods() ) ) {
			$json['redirect'] = U('/cart');
		}	

		// 验证商品数量		
		$products = $cart->get_all_goods();
				
		foreach ($products as $product) {
			$product_total = 0;
				
			foreach ($products as $product_2) {
				if ($product_2['goods_id'] == $product['goods_id']) {
					$product_total += $product_2['quantity'];
				}
			}		
			
			if ($product['minimum'] > $product_total) {
				$json['redirect'] = U('/cart');
				
				break;
			}				
		}
	}
	
	//验证收货地址
	function validate_shipping_address(){
		$cart=new \Lib\Cart();
		$json=array();
		$this->validate($cart,$json);		
		
		$w=new \Lib\Weight();
		
		$weight=$w->format($cart->getWeight(), C('WEIGHT_ID'));
		
		session('weight',$weight['num']);		
		
		if (!$json) {
			$d=I('post.');
			if (isset($d['shipping_address']) && $d['shipping_address'] == 'existing') {
				if (empty($d['address_id'])) {
					$json['error']['warning'] ='请选择送货地址！！';
				} elseif (!in_array($d['address_id'], array_keys(D('Member')->getAddress(session('user_auth.uid'))))) {
					
					$json['error']['warning'] = '无效地址！！';
				}
				if (!$json) {
					session('shipping_address_id',$d['address_id']);
				
					$address_info = M('Address')->where('address_id='.$d['address_id'])->find();
					
					if ($address_info) {
						session('shipping_city_id',$address_info['city_id']);
						//session('postcode',$address_info['postcode']);
						session('shipping_name',$address_info['name']);					
										
					} else {
						session('shipping_city_id',null);
						//session('postcode',null);					
					}
					session('shipping_method',null);					
				}
			}	

			if ($d['shipping_address'] == 'new') {
		
				if ((utf8_strlen($d['name']) < 1) || (utf8_strlen($d['name']) > 5)) {
					$json['error']['name'] = '姓名必须大于1位,小于5位！！';
				}   

				// if (!preg_match("/^[\u4e00-\u9fa5]{2,4}$/",$d['name'])) {
				// 		$json['error']['name'] = '*该字符串必须是2-4位中文姓名！！';
				// }
		
				if (empty($d['address'])) {
					$json['error']['address'] = '地址必填！！';
				}
		
				if (!preg_match("#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#",$d['telephone'])) {
						$json['error']['telephone'] = '*请输入你的正确手机号！！';
				}	

				if (empty($d['invoice'])) {
					$json['error']['invoice'] = '发票抬头必填！！';
				}
		
				
				if (!$json) {						
			
					session('shipping_address_id',D('Member')->add_address());
					
					storage_user_action(session('user_auth.uid'),session('user_auth.username'),C('FRONTEND_USER'),'新增了收货地址');
					
					session('shipping_city_id',$d['city_id']);					
					session('shipping_method',null);										
					
				}
			}		


		}
		
		$this->ajaxReturn($json);
		die();
	}
	
	//订单备注
	function shipping_method(){
		session('comment',null); 
		$list=M('Transport')->select();
		if(isset($list)&&is_array($list)){
			foreach ($list as $k => $v) {
				$sm[$k]['id']=$v['id'];
				$sm[$k]['name']=$v['title'];
				$sm[$k]['info']=D('Transport')->calc_transport($v['id'], session('weight'), session('shipping_city_id') );
			}
		}
		$this->sm=$sm;

		$this->display();
	}	
	//订单备注方式
	function validate_shipping_method(){

		$cart=new \Lib\Cart();
		$json=array();
		$this->validate($cart,$json);
		if (!$json) {
			$d=I('post.');
			/*if (!isset($d['shipping_method'])) {
				$json['error']['warning'] = '请选择货运方式！！';
			} else {
				if ($d['shipping_method']!=$d['shipping_method']) {			
					$json['error']['warning'] ='非法操作！！';
				}
			}*/
			if (!$json) {
				session('shipping_method',$d['shipping_method']);
				session('comment',strip_tags($d['comment']));
			}		
		}		
		$this->ajaxReturn($json);
		die();		
	}	

	//支付方式
	function payment_method(){
		$this->list=M('payment')->where(array('payment_state'=>'1'))->select();
		$this->display();
	}
	
	function validate_payment_method(){
		$cart=new \Lib\Cart();
		$json=array();
		$this->validate($cart,$json);		
		if (!$json) {
			$d=I('post.');
			if (!isset($d['payment_method'])) {
				$json['error']['warning'] = '请选择支付方式！！';
			} elseif (!M('Payment')->where(array('payment_code'=>$d['payment_method']))->find()) {
				//支付方式不存在
				$json['error']['warning'] = '非法操作！！';
			}	
			
			if (!$json) {
				session('payment_method',$d['payment_method']);						
			}			
						
		}
		$this->ajaxReturn($json);
		die();
	}	


	function confirm(){
		$cart=new \Lib\Cart();
		
		$this->token=pay_token('token');
		
		//需要送货
		if ($cart->has_shipping()) {
			$address_id=session('shipping_address_id');
			if (is_login()&& isset($address_id)) {					
				$shipping_address = M('Address')->find($address_id);		
			} 

			if (empty($shipping_address)) {								
				$redirect =U('/checkout');
			}

			//是否选定了支付方式	
			// $shipping_method=session('shipping_method');
			// if (!isset($shipping_method)) {
			// 	$redirect =U('/checkout');
			// }			
		}else{
			session('shipping_method',null);
		}
		//是否有选择支付方法
		$payment_method=session('payment_method');
		if (!isset($payment_method)) {
			$redirect =U('/checkout');
		}
		// 验证是否有货	
		if ((!$cart->has_goods() ) ) {
			$redirect = U('/cart');
		}	
		
		// 验证商品数量		
		$products = $cart->get_all_goods();
				
		foreach ($products as $product) {
			$product_total = 0;
				
			foreach ($products as $product_2) {
				if ($product_2['goods_id'] == $product['goods_id']) {
					$product_total += $product_2['quantity'];
				}
			}		
			
			if ($product['minimum'] > $product_total) {
				$redirect = U('/cart');
				
				break;
			}				
		}			
		
		if (!isset($redirect)) {
			if($products){
						
			//运费
			// $sm=D('Transport')->calc_transport(session('shipping_method'),
			// session('weight'),
			// session('shipping_city_id'));
		
			// $this->sm=$sm;
			
			foreach ($products as $product) {
				
				$p[] = array(
						'key'                 => $product['key'],
						'image'               => $product['image'],
						'name'                => $product['name'],
						'model'               => $product['model'],						
						'quantity'            => $product['quantity'],
						'price'               => $product['price'],
						'total'               => $product['total'],						
						'goods_id'		  		=>$product['goods_id'],						
						'total_price'		  =>$product['total'],
						'option'			=>$product['option']
					);			
						
			}

			$this->products=$p;				

			}

		}
		
		$this->display();
	}	

	//获取地区
    function get_area(){
        $where['area_parent_id']=$_REQUEST['areaId'];
        $area=M('area')->where($where)->select();
        $this->ajaxReturn($area);
    }	
}