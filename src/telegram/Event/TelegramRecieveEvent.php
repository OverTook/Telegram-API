 <?php
namespace telegram\Event;

class TelegramRecieveEvent extends TelegramEvent{
  private $msg;
  private $msgid;
  private $username;
  
  public static $handlerList = null;

  public function __construct($userid, $username, $bottoken, $msg, $msgid){
    parent::__construct($userid, $bottoken);
    $this->username = $username;
    $this->msg = $msg;
    $this->msgid = $msgid;
  }
  public function getMessage(){
    return $this->msg;
  }
  public function getMessageId(){
    return $this->msgid;
  }
  public function getUserName(){
    return $this->username;
  }
}
 ?>
