<?php
namespace telegram;

class TelegramThread extends Thread{
  private $lastinfo;
  public function start(){
    while(true){
    $json;
    $json = json_decode($json, true);
    $json = json_decode($json['result'], true);
    $json2 = json_decode($json[count($json) - 1] ['message'], true);
    $msid = $json2['message_id'];
    if($msid <= $this->lastinfo) continue;
    $from = json_decode($json2['from'], true);
    $userid = $from['id'];
    $username = $from['username'];
    $msg = $json2['text'];
  }
}
}
 ?>
