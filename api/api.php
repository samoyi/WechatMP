﻿<pre><?php


include('../configration.php'); // 公众号配置文件
include('../publicFunctions.php'); // 公共函数  TODO 这个文件依赖configration.php
include('../WechatPushed.php'); // 获取微信后台推送信息



if( isset($_GET["store_list"]) )
{
	require "../class/Store.class.php";
	$StoreManager = new StoreManager();
	json_encode( $StoreManager->queryStoreList() );
}

?></pre>