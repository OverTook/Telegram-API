<?php
namespace telegram;

class TelegramAPI extends PluginBase implements Listener{
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $thread = new TelegramThread();
    $thread->start();
  }
}
 ?>
