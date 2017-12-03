<?php
namespace telegram\Event;

class TelegramEvent extends Event{
  private $userid;
  private $username;
  private $bottoken;
  public function __construct($userid, $bottoken){
    $this->userid = $userid;
    $this->bottoken = $bottoken;
  }
  public function getUserId(){
    return $this->userid;
  }
  public function getBotToken(){
    return $this->bottoken;
  }
}
 ?>
