<?php
namespace Home\Model;
use Think\Model;
class MemberModel extends Model{
	//结算页面中新增用户
	function add_member(){  
		$member = M('Member');
		$d['uname']=I('uname');
		$d['name']=I('name');
		$d['email']=I('email');
		$d['id_card']=I('id_card');
		$d['referee_code']=I('referee_code');
		$d['address']=I('address');
		$d['pwd']  =think_ucenter_encrypt($_POST['password'],C('PWD_KEY'));
		$d['telephone']=I('telephone');
		$d['status']=0;
		$d['create_time']=time();
		$d['loc_province']=I('loc_province');
		$d['loc_city']=I('loc_city');
		$d['loc_town']=I('loc_town');
		$d['isread']=I('isread');
		$d['addressall'] = $d['loc_province'].$d['loc_city'].$d['loc_town'].$d['address'];
		$d['idcadeimage1']=I('idcadeimage1');
		$d['idcadeimage2']=I('idcadeimage2');
		$d['addressimage']=I('addressimage');
		
		$im = explode('Uploads/image/regimage/', $d['idcadeimage1']);
        if ($im[1]) {
            $d['idcadeimage1'] = $im[1];
        }

        $im2 = explode('Uploads/image/regimage/', $d['idcadeimage2']);
        if ($im2[1]) {
            $d['idcadeimage2'] = $im2[1];
        }

        $im3 = explode('Uploads/image/regimage/', $d['addressimage']);
        if ($im3[1]) {
            $d['addressimage'] = $im3[1];
        }

		$where_c['invite_code'] = $d['referee_code'];
        if ($aut = $member->where($where_c)->find()) {
            $d['pid'] = $aut['member_id'];
        } 

        $where_loc['loc_province'] = $d['loc_province'];
        $where_loc['lv'] = 1;
        if($loc = $member->where($where_loc)->find()){
            $d['sid'] = $loc['member_id'];
        }

		$d['lv'] = 0;
        $d['invite_code'] = 'XMTZ'.substr(time(),3);
        $d['last_login_ip']	=	get_client_ip();

		$id=$this->add($d);
		
		// if($id){
		// //写入地址表
		// 	$a['member_id']=$id;
		// 	$a['address']=I('address');
		// 	$a['loc_province']=I('loc_province');
		// 	$a['loc_city']=I('loc_city');
		// 	$a['loc_town']=I('loc_town');
		// 	$a['addressall'] = $a['loc_province'].$a['loc_city'].$a['loc_town'].$a['address'];
		// 	$a['name']=I('name');
		// 	$a['telephone']=I('telephone');
		// 	$a['city_id']=I('city_id');
		// 	$a['country_id']=I('country_id');
		// 	$a['province_id']=I('province_id');
		// 	$aid=M('Address')->add($a);		
		// 	//会员表更新地址
		// 	if($aid){
		// 		$address['address_id']=$aid;
		// 		$address['member_id']=$id;
		// 		$this->save($address);
		// 	}	
		// }
		return $id;
	}
	
	function add_address(){
		//写入地址表
		$a['member_id']=session('user_auth.uid');
		$a['address']=I('address');
		$a['city_id']=I('city_id');
		$a['name']=I('name');
		$a['invoice']=I('invoice');
		$a['telephone']=I('telephone');
		$a['country_id']=I('country_id');
		$a['province_id']=I('province_id');
		$aid=M('Address')->add($a);		
		//会员表更新地址
		if($aid){
			$address['address_id']=$aid;
			$address['member_id']=session('user_auth.uid');
			M('Member')->save($address);
		}	
		return $aid;		
	}
	
	function get_address_id($uid){
		$aid=$this->field('address_id')->where('member_id='.$uid)->find();
		return $aid['address_id'];
	}
	
	function getAddress($uid) {
				if(!isset($uid)){
			return false;
		}
		 
		$sql="SELECT DISTINCT province_id,city_id,country_id FROM ".C('DB_PREFIX')."address WHERE member_id=".$uid;
		
		$area_id=M()->query($sql);
		
		foreach ($area_id as $k => $v) {
			foreach ($v as $key => $value) {
				$area[]=$value;
			}
		}
		if(!isset($area)){
			return;
		}
	
		// 地区的id,去除重复的
		$arr=array_unique($area);
		$aid=implode(',',$arr);
		
		$sql="SELECT area_name,area_id FROM ".C('DB_PREFIX')."area WHERE area_id IN (".$aid.")";
		//地区的名字
		$area_name=M()->query($sql);
	
		//取得会员的所有地址
		$address=M('Address')->where('member_id='.$uid)->select();
		
		foreach ($address as $key => $v) {
			$a[$v['address_id']]=$v;
		}
	
		// foreach ($a as $k => $v) {
		// 	foreach ($area_name as $key => $value) {
		// 		if($v['province_id']==$value['area_id']){
		// 			$a[$k]['province']=$value['area_name'];
		// 		}
		// 		if($v['city_id']==$value['area_id']){
		// 			$a[$k]['city']=$value['area_name'];
		// 		}
		// 		if($v['country_id']==$value['area_id']){
		// 			$a[$k]['country']=$value['area_name'];
		// 		}
		// 	}
			
		// }
		return $a;
		
	} 
}