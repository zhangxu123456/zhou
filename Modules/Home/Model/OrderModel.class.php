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
namespace Home\Model;
use Think\Model;
use Lib\Taobaoip;
class OrderModel extends Model{
	
	function get_all_address($uid){
		
		$list=M('address')->where(array('member_id'=>$uid))->select();
		
		$hashids = new \Lib\Hashids(C('PWD_KEY'), C('URL_ID'));
		
		if(!empty($list)){		
			foreach ($list as $k => $v) {						
				$list[$k]['address_id']=$hashids->encode($v['address_id']); 
			}
		}
		
		return $list;
	}
	
	
	function order_info($order_id){
		//订单信息
		$order_sql='select * from '.C('DB_PREFIX').'order where order_id='.$order_id;
		$order=M()->query($order_sql);
		//收货地址
		$address=M('Address')->find($order[0]['address_id']);
		//商品详情
		$goods=M('OrderGoods')->where(array('order_id'=>$order_id))->select();
		//商品选项
		// $option=M('OrderOption')->where(array('order_id'=>$order_id))->select();
		//总计
		$total=M('OrderTotal')->where(array('order_id'=>$order_id))->select();
		//订单历史
		$history=M('OrderHistory')->where(array('order_id'=>$order_id))->select();
		
		return array(
			'order'=>$order,
			'address'=>$address,
			//'option'=>$option,
			'goods'=>$goods,
			'total'=>$total,
			'history'=>$history
		);
	}
	
	
	function show_order_page($member_id){
		
		$count=M('order')->where(array('member_id'=>$member_id))->count();
		
		$Page = new \Think\Page($count,C('FRONT_PAGE_NUM'));
		
		$show  = $Page->show();// 分页显示输出	
		
		$show=str_replace("/user/order/p/","/order/", $show);
		
		$sql='SELECT o.order_num_alias as alias,o.order_id,o.name,o.date_added,o.total,os.name as status FROM '.C('DB_PREFIX').'order o,'.C('DB_PREFIX')
		."order_status os where o.order_status_id=os.order_status_id and o.member_id=".$member_id.' order by o.order_id desc LIMIT '.$Page->firstRow.','.$Page->listRows;
		$list=M()->query($sql);	


		$order=M('order');  //订单表
		$order_goods=M('order_goods'); //商品表
		$order_code=M('code');    //序列号表
		$data1['state'] = '1';
		$data3['zhuang_state'] = '1';    //订单表的状态码
		$data4=array();

		if(!empty($list)){   //订单是否为空

			foreach ($list as $item => $v){
				$order_num=$list[$item]['order_id'];  //订单号

				$order_dan=$order->where(array('order_id'=>$order_num,'order_status_id' => 1))->find(); 

				$order_cun=$order->where(array('order_id'=>$order_num,'zhuang_state'=>1))->getField('xuliemas');  

				if($order_cun){        
					$strture=strstr($order_cun,'|'); 
					if(!$strture){  //如果没有直接返回
						$xunlei=$order_cun;
					}else{			//如果有|需要分割
						$xunlei=explode('|',$order_cun);
					}


				}else{//通过表关联取得序列码
					if(!empty($order_dan)){  //订单号不为空
						$quantity=$order_goods->where(array('order_id'=>$order_dan['order_id']))->getField('quantity'); //商品表中取出购买商品的数量
						$xunlei=$order_code->where(array('state'=>0))->getField('code',$quantity);       //去序列码表中取出同样数量的序列码
						if(is_string($xunlei)){
							$zifu=$xunlei;   //将取出序列码
							$order_code->where(array('code'=>$xunlei))->data($data1)->save();
						}else{
							foreach ($xunlei as $item1 =>$v1){   //循环将每个取出的序列码状态改变
								$order_code->where(array('code'=>$xunlei[$item1]))->data($data1)->save();
							}
							$zifu=join('|',$xunlei);   //将取出序列码分割成字符串
						};
						$data2['xuliemas']=$zifu;  //序列码存入数组
						$xulieid=$order->where(array('order_id'=>$order_num,'order_status_id' => 1))->save($data2); //序列码存入order表xuliemas字段中
						if(!empty($xulieid)){
							$order->where(array('order_id'=>$order_num,'order_status_id' => 1))->save($data3);
						}
					}
				};
				$data4[]=$xunlei;
			}
		} 


		$hashids = new \Lib\Hashids(C('PWD_KEY'), C('URL_ID'));
		if(!empty($list)){		
			foreach ($list as $k => $v) {							
				$list[$k]['order_id']=$hashids->encode($v['order_id']); 
			}
		}
		
		return array(
			'empty'=>'<tr><td colspan="20">~~暂无数据</td></tr>',
			'list'=>$list,
			'page'=>$show,
			'xunlei'=>$data4
		);	

	}

		
	function addOrder($data) {	
		
		$order['member_id']=$data['member_id'];			
		$order['order_num_alias']=$data['order_num_alias'];
		$order['name']=$data['name'];
		$order['email']=$data['email'];
		$order['telephone']=$data['telephone'];
		$order['shipping_name']=$data['shipping_name'];		
		$order['shipping_address']=$data['shipping_address'];
		$order['shipping_city_id']=$data['shipping_city_id'];
		
		$order['shipping_country_id']=$data['shipping_country_id'];
		$order['shipping_province_id']=$data['shipping_province_id'];
		$order['shipping_tel']=$data['shipping_tel'];	
		$order['comment']=$data['comment'];		
		$order['order_status_id']=C('default_order_status_id');
		$order['ip']=get_client_ip();
		
		$tip=new Taobaoip();
		$ip_region=$tip->getLocation($order['ip']);
		$order['ip_region']=$ip_region['region'].'-'.$ip_region['city'];
		
		$order['date_added'] =time();
		$order['total'] =$data['total'];
		$order['user_agent']=$data['user_agent'];
		
		$order['shipping_method']=$data['shipping_method'];
		$order['payment_code']=$data['payment_method'];
		
		$order['address_id']=$data['address_id'];
		
		$order_id=M('Order')->add($order);
		
		$hashids = new \Lib\Hashids(C('PWD_KEY'), C('URL_ID'));		

		if(isset($data['goodss'])){
			foreach ($data['goodss'] as $goods) {
				$goods_id=$hashids->decode($goods['goods_id']); 
				
				$this->execute("INSERT INTO ".C('DB_PREFIX')."order_goods SET order_id = '" .$order_id
				."',goods_id='".$goods_id[0]."'"
				.",name='".$goods['name']."'"
				.",model='".$goods['model']."'"
				.",quantity='".(int)$goods['quantity']."'"
				.",price='".(float)$goods['price']."'"
				.",total='".(float)$goods['total']."'"
				);
				$order_goods_id=$this->getLastInsID();
				
				foreach ($goods['option'] as $option) {
					$this->execute("INSERT INTO ".C('DB_PREFIX')."order_option SET order_id = '" .$order_id
					."',order_goods_id='".$order_goods_id."'"
					.",goods_option_id='".(int)$option['goods_option_id']."'"
					.",goods_option_value_id='".(int)$option['goods_option_value_id']."'"
					.",name='".$option['name']."'"
					.",value='".$option['value']."'"
					.",type='".$option['type']."'"
					);				
				}				
				//扣除库存
				$this->execute("UPDATE " . C('DB_PREFIX') . "goods SET quantity = (quantity - " . (int)$goods['quantity'] . ") WHERE goods_id = '" . $goods_id[0] . "' AND subtract = '1'");
			}
		}		
		if(isset($data['totals'])){
			foreach ($data['totals'] as $total) {
				$this->execute("INSERT INTO ".C('DB_PREFIX')."order_total SET order_id = '" .$order_id				
				."',code='".$total['code']."'"
				.",title='".$total['title']."'"
				.",text='".$total['text']."'"
				.",value='".(float)$total['value']."'");
			}	
		}

		// $ordergoods = M('OrderGoods');
        // $code = M('code');
        // $showsnum = $ordergoods->where($whereoid)->getField('quantity');
        // $coo = $code->where('state = 0')->getField('code',$showsnum);
        // $coostr = implode(',', $coo);
        // var_dump($coo);
        // $oh['getcode']=$coostr;

		$oh['order_id']=$order_id;
		$oh['comment']=$data['comment'];
		$oh['date_added']=time();
		$oh_id=M('OrderHistory')->add($oh);

        // foreach ($coo as $k => $v) {
        // 	var_dump($v);exit;
	       //  $wherecoo['code'] = $v['code'];
	       //  $get_state = $code->where($wherecoo)->setField('state',1);
	       // 	// echo $code->getLastSql();exit;
        // }

		// $cooarr = explode(',', $coostr);
		// var_dump($slicearr);
		// $wherecode['code'] = $coostr;
		// $get_state = $code->where($wherecode)->setField('state',1);
		// echo $code->getLastSql();
		// var_dump($get_state);exit;
		
		storage_user_action(session('user_auth.uid'),session('user_auth.username'),C('FRONTEND_USER'),'下了订单 '.$data['order_num_alias'].' 未支付');
		
		return $order_id;
	}

	function cancel_order($order_id){
		//设置订单状态	
		$this->execute("UPDATE " . C('DB_PREFIX') . "order SET 	order_status_id = ".C('cancel_order_status_id').' where order_id='.$order_id);
		//写人订单历史
		$this->execute("INSERT INTO " . C('DB_PREFIX') . "order_history SET order_status_id = ".C('cancel_order_status_id').',order_id='.$order_id.",comment='用户取消了订单',date_added=".time());
		//订单商品
		$goods=M('order_goods')->where(array('order_id'=>$order_id))->select();
		
		if(isset($goods)){
			foreach ($goods as $key => $value) {
				$this->execute("UPDATE " . C('DB_PREFIX') . "goods SET quantity = (quantity + " . (int)$value['quantity'] . ") WHERE goods_id = '" . $value['goods_id'] . "' AND subtract = '1'");
			}
		}
		
	}
}