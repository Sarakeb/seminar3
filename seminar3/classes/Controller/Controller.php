//saraD
<?php

namespace classes\Controller;
use classes\Model\Login_Model;
use classes\Model\Comment_Model;
use classes\Model\Registry_Model;

class Controller {
    private $username;    
    
    public function setUsername($username) {
        $this->username = $username;
    }

    public function getUsername() {
        return $this->username;
    }    
    
    //login ID
    public function loginID($userN, $passW) {
        $loginManager = new Login_Model();
        $return = $loginManager->logUser($userN, $passW);        
        return $return;
    }
    
 ///beroende på om det är pankakor eller köttbullar
    public function  commentAdd($namn, $kommentar, $holderMod) {  
        $manageComm = new Comment_Model();
        $manageComm-> commentAdd($namn, $kommentar, $holderMod);
    }
    
    ///för att kunna tabort meddelanden behövs timestamp och holder.
    public function commentDel($timestamp, $holder) {  
        $commentDel = new Comment_Model();
        $commentDel->commentDel($timestamp, $holder);
    }
    
    
    ///ladda användarens kommentarer 
    public function getInfo($holder) {
        $entry = new Comment_Model();
        $info = $entry->getInfo($holder, $this->username);
        
        return $info;
    }
    ///för att ladda kommentarer på hemsidan
   public function getcommentInfo ($holder) {
        $entry = new Comment_Model();
        $commentInfo = $entry->getcommentInfo($holder);        
        return $commentInfo;
    }
    
    //för att registra nya användare
    public function userRegister($userN, $passW) {
        $handleRegistration = new Registry_Model();  //Registary
        $handleRegistration->userRegistration($userN, $passW);
    }
        
    
    //bygga upp controller
    
     public static function setController() { 
        return new Controller(); // //skapas
    }
    
    public static function accessController() {  
        return unserialize($_SESSION['controller']);  //get access
    }
    
    public static function storeController($controller) {  
        $_SESSION['controller'] = serialize($controller);  //sparas
    }
}




