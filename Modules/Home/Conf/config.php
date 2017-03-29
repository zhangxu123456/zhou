<?php
return array(	
    'URL_CASE_INSENSITIVE' => true, 
    'URL_PATHINFO_DEPR'    => '/', 	
    'URL_MODEL'            => 2,
	
	'DEFAULT_THEME'			 => 'default', 
	'TMPL_TEMPLATE_SUFFIX'	 => '.html', 
	'VIEW_PATH'				 => './Themes/Home/',
	 'TMPL_PARSE_STRING'=>array(   
	'__PUBLIC__' => __ROOT__ . '/Common',
	'__RES__' => __ROOT__.'/Themes/'.MODULE_NAME.'/default/Public', 
    '__IMG__'=>__ROOT__.'/Themes/'.MODULE_NAME.'/default/Public/images',
    '__CSS__'=>__ROOT__.'/Themes/'.MODULE_NAME.'/default/Public/css',
    '__JS__'=> __ROOT__.'/Themes/'.MODULE_NAME.'/default/Public/js',
    ), 	
	
	'SESSION_PREFIX' => 'oscshop_s', 
    'COOKIE_PREFIX'  => 'oscshop_c_', 

  	'URL_ROUTER_ON'   => true, 
	'URL_ROUTE_RULES'=>array(

		/*公司简介 */
        '/^profile$/' => 'Profile/index',

        /*公司新闻 */
        '/^news$/' => 'News/index',
        '/^indexnews$/' => 'News/indexnews',
        'newsdetail/:news_id' => 'News/newsdetail',

        /* 公司产品 */
        '/^goods\/(\w+)$/'=>'Goods/goodsdetail?id=:1',	
        '/^goods$/' => 'Goods/goodsdetail',
        // '/^products\/(\d+)$/'=>'Goods/index?p=:1',
		// 'products'=>'goods/index',

        // '/^indexproduct$/' => 'Product/indexproduct',
        // '/^productdetail$/' => 'Product/productdetail',

        /*联系我们 */
        '/^contact$/' => 'Contact/index',

        'login'=>'Public/login',
		'register'=>'Public/register',
		'logout'=>'Public/logout',
		'forgot'=>'Public/forgot',
		'password'=>'Public/password',
		

		'checkout'=>'cart/checkout',
		'cart'=>'cart/show_cart_goods',
		'cart_add'=>'cart/add',
		'cart_update'=>'cart/update_quantity',
		'/^remove\/(\S+)$/'=>'cart/remove?data=:1',
		

		// '/^products\/(\d+)$/'=>'goods/all?p=:1',
		// 'products'=>'goods/all',
		// '/^category\/(\w+)$/'=>'goods/category?id=:1',
		// '/^category\/(\w+)\/p\/(\d+)$/'=>'goods/category?id=:1&p=:2',
		

		// '/^gallery\/(\w+)$/'=>'gallery/pshow?id=:1',		
		// '/^gallerys\/(\d+)$/'=>'gallery/all?p=:1',
		// 'gallerys'=>'gallery/all',
		// '/^gcategory\/(\w+)$/'=>'gallery/category?id=:1',
		// '/^gcategory\/(\w+)\/p\/(\d+)$/'=>'gallery/category?id=:1&p=:2',	
			
		
		// '/^blogc\/(\w+)$/'=>'blog/category?cid=:1',
		// '/^blogc\/(\w+)\/p\/(\d+)$/'=>'blog/category?cid=:1&p=:2',
		// 'blogs'=>'blog/index',		
		// '/^blog\/(\w+)$/'=>'blog/show_blog_content?id=:1',
		// 'reply'=>'form/reply',		
		// '/^replys\/(\w+)$/'=>'blog/show_reply?id=:1',
		// 'check_verify'=>'blog/check_verify',


		// 'about'=>'html/about',
		// 'contact'=>'html/contact',
		// 'comment'=>'form/comment',
		
		
		
		'c_login'=>'checkout/login',
		'/^c_user\/(\w+)$/'=>'checkout/user?u=:1',
		'c_register'=>'checkout/register',
		'confirm'=>'checkout/confirm',
		'c_getarea'=>'checkout/get_area',
		'shipping_method'=>'checkout/shipping_method',
		'shipping_address'=>'checkout/shipping_address',
		'validate_login'=>'checkout/validate_login',
		'payment_method'=>'checkout/payment_method',
		'validate_shipping_address'=>'checkout/validate_shipping_address',
		'validate_shipping_method'=>'checkout/validate_shipping_method',
		'validate_payment_method'=>'checkout/validate_payment_method',
		

		
		'order'=>'User/order',
		'changeAttr'=>'User/changeAttr',
		'alreadyGo'=>'User/alreadyGo',
		'getcode'=>'User/getcode',

		
		'information'=>'User/information',
		'/^order\/(\d+)$/'=>'user/order?p=:1',
		'password'=>'user/password',
		'address'=>'user/address',
		'add_address'=>'user/add_address',
		'/^edit_address\/(\w+)$/'=>'user/edit_address?id=:1',
		'edit_address'=>'user/edit_address',
		'/^delete_address\/(\w+)$/'=>'user/delete_address?id=:1',
		'/^info\/(\w+)$/'=>'user/info?id=:1',
		'/^cancel_order\/(\w+)$/'=>'user/cancel_order?id=:1',
		'account'=>'user/account',
		'pay_success'=>'user/pay_success',


		'sequence'=>'user/sequence_code',
		
	),  
	  	
);