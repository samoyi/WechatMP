﻿<pre><?php


include('../configuration.php'); // 公众号配置文件
include('../publicFunctions.php'); // 公共函数  TODO 这个文件依赖configuration.php
include('../WechatPushed.php'); // 获取微信后台推送信息



/* if( isset($_GET["store_list"]) )
{
	require "../class/Store.class.php";
	$StoreManager = new StoreManager();
	$StoreManager->queryStoreList();
}

require "../class/Store.class.php";
	$StoreManager = new StoreManager();
	print_r( $StoreManager->queryStoreList() ); */

if( $_GET["act"] === 'sendCard' && !empty($_GET['openid']) && !empty($_GET['cardid']) )
{
	require "../class/CardMessager.class.php";
	$CardMessager = new CardMessager();
	$result = $CardMessager->sendCardByOpenID($_GET['cardid'], $_GET['openid']);
	echo json_encode($result );
}
file_put_contents(PROJECT_ROOT."api/apiMointor.txt", date('Y-m-d H:i')."\n", FILE_APPEND);


?></pre>