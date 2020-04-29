<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\Model;
require_once 'resources/fragments/init.php';
use classes\Integration\DBH;

class Comment_Model {
    private $handleDatabase;
    
    public function __construct() {
        $this->handleDatabase = new DBH();
    }
    
    //lägger till kommentarer.
    public function commentAdd($namn, $kommentar, $holder) {        
        if(($holder === 'meatball') && (ctype_print($kommentar) === TRUE)) { //ctype_print — Check s if there is a printable character.
            $this->handleDatabase->commentKottbular($namn, $kommentar);
        }
        
        if(($holder === 'pancake') && (ctype_print($kommentar) === TRUE)) { //ctype_print — Check s if there is a printable character.
            $this->handleDatabase->commentPankaka($namn, $kommentar);
        }        
    }
    //tabort komentarer.
    public function commentDel ($timestamp, $holder) {
        if($holder === 'pancake') {
             $infoComm = $this->handleDatabase->kommentarerPK();
            $this->handleDatabase->tabortPK();
        }              
        
        if($holder === 'meatball') {
             $infoComm = $this->handleDatabase->kommentarerKB();
            $this->handleDatabase->tabortKB();
        }
        
        
       //tabort den linjen man väljer
        foreach( $infoComm as $linje) {
            if(strpos($linje, $timestamp) === false) {
                if($holder === 'pancake') {
                    $this->handleDatabase->tabortPKcomm($linje);
                }
                
                if($holder === 'meatball') {
                    $this->handleDatabase->tabortKBcomm($linje);
                }
            }
        }
    }
    
  //ladda alla kommentarer från DB
    public function getcommentInfo ($holder) {
        if($holder === 'meatballs') {
             $infoComm = $this->handleDatabase->kommentarerKB();
        }        
        if($holder === 'pancakes') {
             $infoComm = $this->handleDatabase->kommentarerPK();
        }        
        return  $infoComm;
    }
    
    
    //få info då då datan är tagen fram, kommentarer sparas
    public function getinfo($holder, $userN){
        $infoComm = $this->getcommentInfo($holder);
        $k = 0;
        foreach ( $infoComm as $linje) {
            if(strpos($linje, $userN) !== false) {
                list($kommentar, $user) = explode('hidden>', $linje);  //en lista av kommetarer och user
                $info[$k++] = trim($user);  //tas bort genom att trimma
            }
        }        
        return $info;   
    }
  
}
