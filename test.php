﻿<pre><?php

include('configration.php'); // 公众号配置文件
include('publicFunctions.php'); // 公共函数  TODO 这个文件依赖configration.php
include('WechatPushed.php'); // 获取微信后台推送信息



echo urldecode('%E6%B5%8B%E8%AF%95%E5%9B%9E%E5%A4%8D314');
require 'class/MySQLiController.class.php';
$MySQLiController = new MySQLiController( $dbr );


echo $dbr->real_escape_string('<h1></h1>');
/*$aRow = array('0, ' . 'USERID' . ', ' . 'CONTENT_FROM_USER');

<<<<<<< HEAD
/*include('class/ProductManager.class.php');
$productManager = new ProductManager();

$result = $productManager->modifyProduct("pkV_gjsTaeMWcNxzoVNWLXBRQlhM", 537074298);*/

include('class/UserManager.class.php');
$UserManager = new UserManager();
$result = $UserManager->getOpenIDArray();
$result = array_chunk($result, 500);

$result = $UserManager->getUserInfoBatch( $result[0] );

$aFilterAssociativeArray = array("sex"=>2, "city"=>"Xinyang");
$result = $UserManager->filterUserInfoArray( $result, $aFilterAssociativeArray );
$result1 = $UserManager->getUserInfoPropertyArray($result, "headimgurl");
$result2 = $UserManager->getUserInfoPropertyArray($result, "nickname");
print_r( $result );
foreach($result1 as $key=>$value)
{
	echo '<img src="' . $value . '" /><br />' . $result2[$key] . '<br /><br />';
}




//print_r( $result );
//file_put_contents("err.txt", json_encode($result) );
=======
$aValue = array('0, "li", "17", ""');
var_dump( $MySQLiController->insertRow(DB_TABLE, $aValue) );
$dbr->close();*/
>>>>>>> 1cf267c5f6a537158d13a2a3489b2eb7c8788b9f

?></pre>