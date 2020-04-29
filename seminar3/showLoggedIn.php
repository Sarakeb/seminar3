<?php
use classes\Controller\Controller;
require_once 'resources/fragments/init.php';
if (isset($_POST['userN']) && isset($_POST['passW'])) {
    $ctr = Controller::setController();
    $userN = htmlentities($_POST['userN'], ENT_QUOTES);
    $passW = htmlentities($_POST['passW'], ENT_QUOTES);
    $value = $ctr->loginID($userN, $passW);   
   
    /*if (empty($_POST['userN'])){
       //  echo("user name required");
          include 'resources/views/fel.html';
     }
     elseif(!filter_var($_post["userN"], FILTER_VALIDATE_EMAIL)){
          //  echo("user name required");    
          include 'resources/views/fel.html';
         
     }
     else{
         //include 'resources/views/loginSuccesfull.php';
           
     }*/
    
    if (empty($_POST['userN']) && empty($_POST['passW'])) {  //om båda är toma visa att det är fel
    include 'resources/views/fel.html';
}   
    if($value === true) {   //om det stämmer visa att login är succesfull
        $ctr->setUsername($userN);    
        Controller::storeController($ctr);
        include 'resources/views/loginSuccesfull.php';
    }  
     if($value === false) {         //om det inte stämmer så visa att är fel
        include 'resources/views/fel.html';
    }   
    
      
    //value=value
}



