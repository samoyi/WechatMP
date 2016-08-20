﻿<?php

/*
 * 微信后台将消息、事件等推送到该文件
 *
 */


include('publicFunctions.php'); // 公共函数
include('configration.php'); // 公众号配置文件
include('WechatPushed.php'); // 获取微信后台推送信息




//获取订单付款推送信息------------------------------------------------------------
//$fetchedMsgProductId = trim($fetchedMsgXML->ProductId);//TODO 


//设置自定义菜单------------------------------------------------------------------
//每次设置完后关闭，否则只要运行该文件就会重复设置
//include('module/setCustomMenuData.php');

//上传图片测试区域
include('class/MaterialManager.class.php');    
$MaterialManager = new MaterialManager();  
$image_info = array(
    'filename'=>'/images/1.png',  //国片相对于网站根目录的路径
    'content-type'=>'image/png',  //文件类型
    'filelength'=>'156023'         //图文大小
);                                  
file_put_contents("err.txt", $MaterialManager->addImage($image_info) );
//上传图片测试区域结束


//关键词自动回复和事件推送回复
//该部分最后会跳出程序，下面这行应该是放在最后
include('module/messageAutoReply.php');




?>