<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\Model;

use classes\Integration\DBH;

class Login_Model {
    private $handleDatabase;  ///skapar variablen handleDatabase
    
    public function __construct() {
        $this->handleDatabase = new DBH();
    }
    
    public function logUser($userN, $passW) {  ///behöver userN och passw
        $infoLogin = $this->handleDatabase->loginInfo();
        ///ctype_print — Check for printable character(s)
        $checkUsername = ctype_print($userN);
        $checkPassword = ctype_print($passW);
        
        if(($checkUsername && $checkPassword) === TRUE) {   
            foreach ($infoLogin as $linje) {
                list($username, $password) = explode(',', $linje);
                $info[trim($username)] = trim($password);
            }
//array_key_exists — Checks if the given key or index exists in the array
//   password_verify — Verifies that a password matches a hash
           
            if (isset($userN, $info) && password_verify($passW, $info[$userN])) {
                return TRUE;
            } 

            else {
                return FALSE;
            }
        }
    }
    
 
}





/*
    */
