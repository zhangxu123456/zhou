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
class MemberModel{
	/**
	 *显示分页	 
	 */
	public function show_member_page($search){
		$member = M('Member');
		$sql="select * from ".C('DB_PREFIX')."member where 1 ";
		
		if(isset($search['name'])){
			$sql.=" and uname like '%".$search['name']."%'";
		}
		if(isset($search['email'])){
			$sql.=" and email='".$search['email']."'";
		}
		if(isset($search['tel'])){
			$sql.=" and telephone='".$search['tel']."'";
		}
		
		$count=count(M()->query($sql));
		
		$Page = new \Think\Page($count,C('BACK_PAGE_NUM'));
		$show  = $Page->show();// 分页显示输出	
		
		$sql.=' order by member_id desc LIMIT '.$Page->firstRow.','.$Page->listRows;

		$list=M()->query($sql);	

		$status_haoArr = array("<span class='red bold'>禁用</span>", "<span class='green bold'>启用</span>");

		foreach ($list as $k => $v) {
				$where_s['pid'] = $v['member_id'];
				$where_s['sid'] = $v['member_id'];
				$where_s['_logic'] = 'OR';
                $num = $member->where($where_s)->count();
                if ($num > 0) {
                    $list[$k]['num'] = '1';
                }
                $list[$k]['status'] = $status_haoArr[$v['status']];
            }
		
		return array(
			'empty'=>'<tr><td colspan="20">~~暂无数据</td></tr>',
			'list'=>$list,
			'page'=>$show
		);	
	}


	public function show_member_erjipage($search){
		$member_id = $_GET['member_id'];
		$sql="select * from ".C('DB_PREFIX')."member where pid = $member_id or sid = $member_id ";
		
		if(isset($search['name'])){
			$sql.=" and uname like '%".$search['name']."%'";
		}
		if(isset($search['email'])){
			$sql.=" and email='".$search['email']."'";
		}
		if(isset($search['tel'])){
			$sql.=" and telephone='".$search['tel']."'";
		}
		
		$count=count(M()->query($sql));
		
		$Page = new \Think\Page($count,C('BACK_PAGE_NUM'));
		$show  = $Page->show();	
		
		$sql.=' order by member_id desc LIMIT '.$Page->firstRow.','.$Page->listRows;

		$list=M()->query($sql);	

		$status_haoArr = array("<span class='red bold'>禁用</span>", "<span class='green bold'>启用</span>");

		foreach ($list as $k => $v) {
                $list[$k]['status'] = $status_haoArr[$v['status']];
            }
		
		return array(
			'empty'=>'<tr><td colspan="20">~~暂无数据</td></tr>',
			'list'=>$list,
			'page'=>$show
		);	
	}


	/*也可以用*/
	// public function del_member($id) {
 //        if (!$id) {
 //            return false;
 //        }
 //        $m_member = M('Member');
 //        $map['member_id'] = $id;
 //        if ($m_member->where($map)->delete()) {
 //            // $this->success('删除成功');
 //            echo "<script>
 //                    alert('删除成功!');
 //                    location.href='admin.php?s=/Member/index';
 //                </script>";
 //        } else {
 //            // $this->error('删除失败');
 //            echo "<script>
 //                    alert('删除失败!');
 //                    location.href='admin.php?s=/Member/index';
 //                </script>";
 //        }
 //    }



	public function del_member($id){
		try{
			$image=M('member')->where(array('member_id'=>$id))->field('idcadeimage1,idcadeimage2,addressimage')->find();		
			if(!empty($image)){
				// A('Image')->del_image('member',$image['idcadeimage1'],'member');
				$filePath = $_SERVER['DOCUMENT_ROOT'].__ROOT__."/Uploads/image/regimage/".$image['idcadeimage1'];
				$filePath2 = $_SERVER['DOCUMENT_ROOT'].__ROOT__."/Uploads/image/regimage/".$image['idcadeimage2'];
				$filePath3 = $_SERVER['DOCUMENT_ROOT'].__ROOT__."/Uploads/image/regimage/".$image['addressimage'];
			}
			
			M('member')->where(array('member_id'=>$id))->delete();
			@unlink($filePath);	
			@unlink($filePath2);	
			@unlink($filePath3);					
			return array(
				'status'=>'success',
				'message'=>'删除成功',
				'jump'=>U('Member/index')
				);
			
		}catch(Exception $e){
			return array(
				'status'=>'fail',
				'message'=>'删除失败,未知异常',
				'jump'=>U('Member/index')
			);
		}
	}



	
	function add_member($data){
			$code = M('Code');
			if(empty($data['uname'])){
				$error="用户名不能为空！！";				
			}elseif(M('Member')->getByUname(trim($data['uname']))){
				$error="用户名已经存在！！";				
			}elseif(empty($data['email'])){
				$error="邮箱不能为空！！";				
			}elseif(M('Member')->getByEmail($data['email'])){
				$error="邮箱已经存在！！";				
			}elseif(empty($data['pwd'])){
				$error="密码不能为空！！";				
			}elseif(M('Member')->getByInviteCode(trim($data['invite_code']))){
				$error="邀请码已经使用！！";				
			}


			$where_c['code'] = $data['invite_code'];
            if ($shi_arr=$code->where($where_c)->find()) {
                $shi_arr['state']=1;
                $code->save($shi_arr);
            } 

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

            $data['lv'] = 1;
			$data['addressall'] = $data['loc_province'].$data['loc_city'].$data['loc_town'].$data['address'];

            $where_loc['invite_code'] = $data['referee_code'];
            if ($shi_loc=M('Member')->where($where_loc)->find()) {
                $data['pid'] = $shi_loc['member_id'];
                $data['lv'] = 2;
                $data['invite_code'] = 'QD'.substr(time(),3);
            } 

			if($error){		
				return array(
					'status'=>'back',
					'message'=>$error				
				);
			}
			
			$data['pwd']  =think_ucenter_encrypt($data['pwd'],C('PWD_KEY'));
			$data['create_time']  =time();
			$data['status']  =1;
			if(M('member')->add($data)){
				return array(
				'status'=>'success',
				'message'=>'新增成功',
				'jump'=>U('Member/index')
				);
			}else{
				return array(
				'status'=>'back',
				'message'=>'新增失败'
				
				);
			}
	}
	
	function info($id){
		$member=M('member')->find($id);
		$address=M('address')->where(array('member_id'=>$id))->select();
		
		return array(
			'info'=>$member,
			'address'=>$address
		);
	}
	
	function edit_info($d){
		$data=$d;

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

        $data['addressall'] = $data['loc_province'].$data['loc_city'].$data['loc_town'].$data['address'];
        
		$data['pwd']=think_ucenter_encrypt($d['pwd'],C('PWD_KEY'));
		
		$r=M('member')->where(array('member_id'=>$d['member_id']))->save($data);

		if($r){				
			return array(
				'status'=>'success',
				'message'=>'修改成功',
				'jump'=>U('Member/index')
				);	
		}else{
			return array(
				'status'=>'fail',
				'message'=>'修改失败',
				'jump'=>U('Member/index')
			);
		}
		
	}
	
}
?>