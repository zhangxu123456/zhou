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

class PublicController extends CommonController {
    /*短信验证码测试*/
    public function sms(){
        header("Content-type:text/html; charset=UTF-8");
        session_start();
        function Post($curlPost,$url){
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_NOBODY, true);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
                $return_str = curl_exec($curl);
                curl_close($curl);
                return $return_str;
        }
        function xml_to_array($xml){
            $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
            if(preg_match_all($reg, $xml, $matches)){
                $count = count($matches[0]);
                for($i = 0; $i < $count; $i++){
                $subxml= $matches[2][$i];
                $key = $matches[1][$i];
                    if(preg_match( $reg, $subxml )){
                        $arr[$key] = xml_to_array( $subxml );
                    }else{
                        $arr[$key] = $subxml;
                    }
                }
            }
            return $arr;
        }
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
        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";

        $mobile = $_POST['mobile'];
        $send_code = $_POST['send_code'];
        $mobile_code = random(4,1);
        if(empty($mobile)){
            exit('手机号码不能为空');
        }

        if(empty($_SESSION['send_code']) or $send_code!=$_SESSION['send_code']){
            //防用户恶意请求
            exit('请求超时，请刷新页面后重试');
        }

        $post_data = "account=cf_xmtz&password=c84664d0cdbaf670b6cfee318fba80c1&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
        //查看密码请登录用户中心->验证码、通知短信->帐户及签名设置->APIKEY
        $gets =  xml_to_array(Post($post_data, $target));
        if($gets['SubmitResult']['code']==2){
            $_SESSION['mobile'] = $mobile;
            $_SESSION['mobile_code'] = $mobile_code;
        }
        echo $gets['SubmitResult']['msg'];
    }



    /* 注册页面 */
	public function register(){
		session_start();
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
			$member = M('Member');
			$data = $_POST;
            $data['create_time'] = time();
            $data['uname']=trim($_POST['uname']);
			$data['pwd']  =think_ucenter_encrypt($_POST['pwd'],C('PWD_KEY'));

   			if(!preg_match("/^[\x4E00-\x9FA5\w]{6,12}$/",$data['uname'])){
				$this->error_uname="请输入中文,字母,数字,下划线,6-12个字符！";				
				$this->display();die();
			}elseif(M('Member')->getByUname(trim($data['uname']))){
				$this->error_uname="用户名已经存在！！";
				$this->display();die();
			}elseif(!preg_match("#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#",$data['telephone'])){
				$this->error_telephone="请输入你的正确手机号";				
				$this->display();die();
			}elseif(!preg_match("/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/",$data['id_card']) && !preg_match("/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/",$data['id_card'])){
				$this->error_id_card="请输入正确身份证";				
				$this->display();die();
			}elseif(M('Member')->getByIdCard($data['id_card'])){
				$this->error_id_card="身份证已经存在！！";
				$this->display();die();
			}elseif(empty($data['address'])){
				$this->error_address="居住地址不能为空！！";
				$this->display();die();
			}elseif(!preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/",$data['email'])){
				$this->error_email="请输入你的正确邮箱！！";
				$this->display();die();
			}elseif(M('Member')->getByEmail($data['email'])){
				$this->error_email="邮箱已经存在！！";
				$this->display();die();
			}elseif(empty($data['pwd'])){
				$this->error_pwd="密码不能为空！！";
				$this->display();die();
			}elseif(empty($data['repwd'])){
				$this->error_repwd="确认密码不能为空！！";
				$this->display();die();
			}elseif($data['pwd']!=$data['repwd']){
				$this->error_repwd="两次密码输入不一致！！";
				$this->display();die();
			}elseif(empty($data['isread'])){
				$this->error_isread="请阅读《用户注册协议》！！";
				$this->display();die();
			}

			$data['addressall'] = $data['loc_province'].$data['loc_city'].$data['loc_town'].$data['address'];

            $im = explode('Uploads/image/regimage/', $data['idcadeimage1']);
            if ($im[1]) {
                $data['idcadeimage1'] = $im[1];
            }

            $im2 = explode('Uploads/image/regimage/', $data['idcadeimage2']);
            if ($im2[1]) {
                $data['idcadeimage2'] = $im2[1];
            }

            $im3 = explode('Uploads/image/regimage/', $data['addressimage']);
            if ($im3[1]) {
                $data['addressimage'] = $im3[1];
            }

            $where_c['invite_code'] = $data['referee_code'];
            if ($aut = $member->where($where_c)->find()) {
                $data['pid'] = $aut['member_id'];
            } 

            $where_loc['loc_province'] = $data['loc_province'];
            $where_loc['lv'] = 1;
            if($loc = $member->where($where_loc)->find()){
                $data['sid'] = $loc['member_id'];
            }
            
            $data['lv'] = 0;
            $data['invite_code'] = 'XMTZ'.substr(time(),3);
            $data['last_login_ip']	=	get_client_ip();


            if($_POST['telephone']!=$_SESSION['mobile'] or $_POST['mobile_code']!=$_SESSION['mobile_code'] or empty($_POST['telephone']) or empty($_POST['mobile_code'])){
                // exit('手机验证码输入错误。'); 
                echo "<script>
                    alert('手机验证码输入错误!');
                    location.href='register';
                </script>";
                exit;
            }

            if ($arr = $member->add($data)) {
                echo "<script>
                    alert('注册成功!');
                    location.href='register';
                </script>";
            } else {
                echo "<script>
                    alert('注册失败!');
                    location.href='register';
                </script>";
            }

		}
		/**/
		// $this->title='用户注册-';
		// $this->meta_keywords=C('SITE_KEYWORDS');
		// $this->meta_description=C('SITE_DESCRIPTION');		
		
        $this->display();

	}




	 function forgot(){
	 	session_start();
        var_dump();
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
			$json=array();
			$d=I('post.');
			$member = M('Member');
            $mob['uname'] = $d['uname'];
            $mob2['telephone'] = $d['telephone'];
            $datauname = $member->field('uname')->where($mob)->find();
            $dataphone = $member->field('telephone')->where($mob2)->find();
            $pwd['pwd']=think_ucenter_encrypt($d['password'],C('PWD_KEY'));
			if(!$datauname){
				$json['error']['uname'] = '用户名不存在！！';
			}
			if (empty($d['uname'])) {
				$json['error']['uname'] = '用户名必填！！';
			}
			if(!$dataphone){
				$json['error']['telephone'] = '手机号不存在！！';
			}
			if (empty($d['telephone'])) {
				$json['error']['telephone'] = '手机号必填！！';
			}

			if (empty($d['password'])) {
				$json['error']['password'] = '密码必填！！';
			}
			
			if (empty($d['password_re'])) {		
				$json['error']['password_re'] = '确认密码必填！！';
			}		
			
			if($d['password']!=$d['password_re']){
				$json['error']['password_re'] = '两次密码输入不一致！！';
			}

			if($_POST['telephone']!=$_SESSION['mobile'] or $_POST['mobile_code']!=$_SESSION['mobile_code'] or empty($_POST['telephone']) or empty($_POST['mobile_code'])){ 
                $json['error']['mobile_code'] = '手机验证码输入错误！！';
            }
			
			if($json){
				$this->ajaxReturn($json);
				die;			
			}
			$r = $member->where(array('uname'=>$d['uname'],'telephone'=>$d['telephone']))->save($pwd);
			if($r){				
				$json['redirect'] = U('/login');
				$this->ajaxReturn($json);
				die;
			}
		
		}
		$this->action=U('/forgot');
		$this->display();
	}

	/* 登录页面 */
	public function login(){

		if(IS_POST){
			if(!check_verify(I('code'))){
	            $this->error='验证码输入错误！';
				$this->display();
				die();			
	        }
			    		
			if(empty($_POST['uname'])){
				$this->error="用户名不能为空!!";
				$this->display();die();
			}elseif(empty($_POST['pwd'])){
				$this->error="密码不能为空!!";
				$this->display();die();
			}
			$user=M('Member')->getByUname($_POST['uname']);	
			if(!$user){
				$user=M('Member')->getByEmail($_POST['uname']);	
			}
			//用户存在且可用
			if($user&&$user['status']==1){			
				//验证密码
				if(think_ucenter_encrypt($_POST['pwd'],C('PWD_KEY'))==$user['pwd']){
					
			        $auth = array(
			            'uid'             => $user['member_id'],
			            'username'        => $user['uname'],		     
			            'status'		  => $user['status'] 
					 );			
					 	
				    session('user_auth', $auth);
		    		session('user_auth_sign', data_auth_sign($auth));					
				
					if($user['address_id']!=0){
						session('shipping_address_id',$user['address_id']);
					}
					storage_user_action($user['member_id'],$user['uname'],C('FRONTEND_USER'),'登录了网站');
					
			        $data = array();
			        $data['member_id']	=	$user['member_id'];
		
			        $data['last_login_time']	=	time();				
			        $data['login_count']		=	array('exp','login_count+1');
					$data['last_login_ip']	=	get_client_ip();
					$tip=new \Lib\Taobaoip();
					$ip_region=$tip->getLocation($data['last_login_ip']);
					
					$data['last_ip_region']=$ip_region['region'].'-'.$ip_region['city'];
					
			        M('Member')->save($data);
					
					$this->redirect('/information');
					
				}else{
					$this->error='密码错误！！';
					$this->display();die();
				}
			}else{
				$this->error="用户不存在或被禁用！！";
				$this->display();die();
			}				
	
	        } else {
				$this->title='用户登录-';
				$this->meta_keywords=C('SITE_KEYWORDS');
				$this->meta_description=C('SITE_DESCRIPTION');	
	        	
	            if(is_login()){
	                $this->redirect('/information');
	            }else{			
	                $this->display();
	            }
        }
	}

	/* 退出登录 */
	public function logout(){
		session('[destroy]');
     	$this->redirect('/login');
        
	}

    public function verify(){
        $verify = new \Think\Verify();
		$verify->codeSet = '2345689'; 
		$verify->fontSize = 30;
		$verify->length   = 4;
		$verify->useCurve = false;
		$verify->useNoise = true;
        $verify->entry(1);
    }





}
