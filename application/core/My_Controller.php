<?php defined('BASEPATH') OR exit('No direct script access allowed');
  
class MY_Controller extends CI_Controller
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public function sendMobileSms($params) {
        $mobileNumber= $params['to']; /*Separate mobile no with commas */
        $message= $params['message']; /* message */
        $senderId= "abcd"; /* Sender ID */
        $serverUrl="msg.msgclub.net";
        $authKey= ""; /* Authentication key (get from sms service provider)*/
        $route="1";
        $this->sendsmsGET($mobileNumber,$senderId,$route,$message,$serverUrl,$authKey);
    }
      public function sendsmsGET($mobileNumber,$senderId,$routeId,$message,$serverUrl,$authKey)
      {
          $route = "default";
          $getData = 'mobileNos='.$mobileNumber.'&message='.urlencode($message).'&senderId='.$senderId.'&routeId='.$routeId;
          /* API URL */
          $url="http://".$serverUrl."/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authKey."&".$getData;
          /* init the resource */
          $ch = curl_init();
          curl_setopt_array($ch, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_VERIFYHOST => 0,
           CURLOPT_SSL_VERIFYPEER => 0
          ));
          /* get response */
          $output = curl_exec($ch);
          /* Print error if any */
          if(curl_errno($ch))
          {
          echo 'error:' . curl_error($ch); 
          }
          curl_close($ch);
          return $output;
      }
 }
?> 