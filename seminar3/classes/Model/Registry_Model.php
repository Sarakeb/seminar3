<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\Model;
use classes\Controller\Controller;
use classes\Integration\DBH;

require_once 'resources/fragments/init.php';

class Registry_Model {
   private $handleDatabase;
    
    public function __construct() {
        $this->handleDatabase = new DBH();
    }
    
    public function userRegistration($userN, $passW) {
        //ctype_print — Check for printable character(s)
        $checkUsername = ctype_print($userN);
        $checkPassword = ctype_print($passW);
        
        //password_hash — Creates a password hash
        $passW = password_hash($passW, PASSWORD_DEFAULT);
        
        if(($checkUsername && checkPassword) === TRUE) {
            $this->handleDatabase->registrering($userN, $passW);
        }
    
    }  
}