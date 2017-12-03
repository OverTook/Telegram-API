<?php
namespace telegram;

use pocketmine\utils\Utils;
use telegram\Event\TelegramRecieveEvent;
use pocketmine\scheduler\Task;

class TelegramThread extends Task{
  private $lastinfo;
  public function onRun(int $currenttick){
    $a = new TelegramAPI();
    $lists = $a->getTokens();
      echo "start";
      if(count($lists) <= 0) return true;
      for ($i=0; $i >=  count($lists); $i++) {
    $json = Utils::getURL("https://api.telegram.org/bot" . $lists[$i] ."/getUpdates"); echo "Yeah";
    $json = json_decode($json, true);
    $json = json_decode($json['result'], true);
    $json2 = json_decode($json[count($json) - 1] ['message'], true);
    $msid = $json2['message_id'];
    if($msid <= $this->lastinfo){
    $from = json_decode($json2['from'], true);
    $userid = $from['id'];
    $username = $from['username'];
    $msg = $json2['text'];
    $a->Event($userid, $username, $bottoken, $msg, $msid); echo "Okay!";
  }
  }
}
}
 ?>
