<?php
namespace telegram;

use pocketmine\utils\Utils;
use telegram\Event\TelegramRecieveEvent;

class TelegramThread extends Thread{
  private $lastinfo;
  public function start(){
    $a = new TelegramAPI();
    $lists = $a->getTokens();
    while(true){
      for ($i=0; $i >=  count($lists); $i++) {
    $json = Utils::getURL("https://api.telegram.org/bot" . $lists[$i] ."/getUpdates");
    $json = json_decode($json, true);
    $json = json_decode($json['result'], true);
    $json2 = json_decode($json[count($json) - 1] ['message'], true);
    $msid = $json2['message_id'];
    if($msid <= $this->lastinfo) continue;
    $from = json_decode($json2['from'], true);
    $userid = $from['id'];
    $username = $from['username'];
    $msg = $json2['text'];
    $a->getServer()->getPluginManager()->callEvent(new TelegramRecieveEvent($userid, $username, $bottoken, $msg, $msid));
  }
  }
}
}
 ?>
