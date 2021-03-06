<?php
namespace telegram;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Utils;
use telegram\Event\TelegramSendEvent;

class TelegramAPI extends PluginBase implements Listener{
  private $tokens = [];
  public function onLoad(){
    $thread = new TelegramThread();
    $this->getServer()->getScheduler()->scheduleRepeatingTask($thread, 20);
  }
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  public static function SendMessage($userid, $msg, $token){
    Utils::getURL("https://api.telegram.org/bot" . $token ."/sendMessage?chat_id=".$userid."&text=".$msg);
    $a->getServer()->getPluginManager()->callEvent(new TelegramSendEvent($userid, $bottoken, $msg));
  }
  public function registerToken($token){
    array_push($this->tokens, $token);
  }
  public function getTokens() : array{
    return $this->tokens;
  }
  public function Event($userid, $username, $bottoken, $msg, $msid){
    $this->getServer()->getPluginManager()->callEvent(new TelegramRecieveEvent($userid, $username, $bottoken, $msg, $msid));
  }
}
 ?>
