<?php


// 必填配置 ---------------------------------------------------------------------

// 公众号配置
define("TOKEN", ""); // 自定义。与公众平台网页上填写的相同。参考 开发文档——接入指南
define("APPID", ""); // 公众平台开发者ID
define("APPSECRET", ""); // 公众平台开发者密码


// 某些地方需要使用绝对路径
// 如下示例， 结尾的斜线不能省略
define("PROJECT_ROOT", "/data/home/hmu196265/htdocs/wechat/");


 // 管理功能的验证密码 安全性能不高
define('MANAGE_PASSWORD', 123);


// 选填配置 ---------------------------------------------------------------------

 // 一次性订阅消息模板。如果需要使用该功能则填写
define('SUB_MSG_TEMPLATE_ID', '');


?>
