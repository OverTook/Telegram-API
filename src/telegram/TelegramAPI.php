<?php
namespace telegram;

class TelegramAPI extends PluginBase implements Listener{
  private $tokens = [];
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $thread = new TelegramThread();
    $thread->start();
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
}
 ?>
