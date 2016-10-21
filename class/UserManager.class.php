﻿<?php

class UserManager
{

    //获得推送信息
    protected $userOpenID;
    protected $userNickname;
    protected $userSex;
    protected $userAge;
    protected $userCity;
    protected $userSentMessageType;
    protected $userSentMessageContent;

    function __get( $property )
    {
        if( 'nTotalUserNumber' === $property )
        {
            $oUserList = json_decode( $this->getUserList() );
            return $oUserList->total;
        }
    }

    // 获取关注者的openID数组，每次最多获得一万条
    protected function getUserList($sNextOpenID="")
    {
        $sNextOpenIDPara = $sNextOpenID ? "&next_openid=$sNextOpenID" : "";
        $url = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token=' . ACCESS_TOKEN . $sNextOpenIDPara;
        return json_decode( $result = httpGet($url) );
    }




    public function getUserInfo($sOpenID)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=' . ACCESS_TOKEN . '&openid=' . $sOpenID . '&lang=zh_CN';
        return json_decode( $result = httpGet($url) );
    }

    // 批量获取用户信息
    public function getUserInfoBatch($aOpenID)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=' . ACCESS_TOKEN;
        $aOpenIDChunk = array_chunk($aOpenID, 100); // 该接口一次最多查询100个
       
        $aUserInfoChunk = array();
        $aUserList = array();
        $aUserInfoList = array();
        foreach($aOpenIDChunk as $value)
        {
            foreach($value as $innerValue)
            {
                $aUserList[] = json_decode('{"openid": "' . $innerValue . '", "lang": "zh-CN"}');
            }
            $data = '{
                "user_list": ' . json_encode($aUserList) . '
            }';

            $result = json_decode(request_post($url, $data));
            $aUserInfoList = array_merge($aUserInfoList, $result->user_info_list);
            unset( $aUserList );
        }
        return $aUserInfoList;
    }

    
    public function getOpenIDArray()
    {
        $aOpenIDArray = array();
        $sNextOpenID = "";
        do
        {
            $aPartialUserList = $this->getUserList($sNextOpenID);
            $aPartialOpenID = $aPartialUserList->data->openid; 
            if(!$aPartialOpenID) // 已经获取完了
            {
                break;
            }
            $aOpenIDArray = array_merge($aOpenIDArray, $aPartialOpenID);
            $sNextOpenID = $aPartialUserList->next_openid;
        }
        while( $aPartialUserList->count > 0);
        
        return $aOpenIDArray;
    }

    public function getCountruDistribution()
    {
        $aCountry = array();
        $aOpenIDArray = $this->getOpenIDArray();
        foreach($aOpenIDArray as $value)
        {
            $thisCountry = $this->getUserInfo($value)->country;
            if( array_key_exists($thisCountry, $aCountry) )
            {
                $aCountry[$thisCountry] = $aCountry[$thisCountry]++;
            }
            else
            {
                $aCountry[$thisCountry] = 1;
            }
        }
        return $aCountry;
    }

    public function getCityDistribution()
    {

    }

}


?>