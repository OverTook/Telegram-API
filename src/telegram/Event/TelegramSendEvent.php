<?php
namespace telegram\Event;

class TelegramRecieveEvent extends TelegramEvent{
  private $msg;

  public function __construct($userid, $bottoken, $msg){
    parent::__construct($userid, $bottoken);
    $this->msg = $msg;
  }
  public function getMessage(){
    return $this->msg;
  }
}
 ?>
