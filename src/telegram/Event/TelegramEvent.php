<?php
namespace telegram\Event;

class TelegramEvent extends Event{
  private $userid;
  private $username;
  private $bottoken;
  public function __construct($userid, $username, $bottoken){
    $this->userid = $userid;
    $this->username = $username;
    $this->bottoken = $bottoken;
  }
  public function getUserId(){
    return $this->userid;
  }
  public function getUserName(){
    return $this->username;
  }
  public function getBotToken(){
    return $this->bottoken;
  }
}
 ?>
