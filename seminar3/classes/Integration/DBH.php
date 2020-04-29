<?php

namespace classes\Integration;

class DBH {  //database handler
    
     public function loginInfo() {
        $infoLogin = file('classes/Database/users.txt');        
        return $infoLogin;
    }
    
      public function commentPankaka($namn, $kommentar) {
        $tid=time();
        $manage = fopen("classes/Database/pankakorDB.html", "a");
        fwrite($manage, "<b>". $namn ." ".gmdate("Y-m-d",$tid)."</b>:<br>".$kommentar."<p hidden>".time().",". $namn ."</p><br><br>"."\n");
        fclose($manage);
    }
    
    //kommntarerna för köttbullar i databasen
    public function kommentarerKB() {
        $infoComm = file('classes/Database/kottbullarDB.html');        
        return $infoComm;
    }
    
    
      public function commentKottbular($namn, $kommentar) {
        $tid=time();
        $manage = fopen("classes/Database/kottbullarDB.html", "a");
        fwrite($manage, "<b>". $namn ." ".gmdate("Y-m-d",$tid)."</b>:<br>".$kommentar."<p hidden>".time().",". $namn ."</p><br><br>"."\n");
        fclose($manage);
    }
    
   
     //kommntarerna för pankakor i databasen
    public function kommentarerPK() {
        $infoComm = file('classes/Database/pankakorDB.html');        
        return $infoComm;
    }   
  
    public function tabortKBcomm ($linje) {  /// för att kunna tabort meddelnaden på köttbullar, baserat på linje.
        $manage = fopen("classes/Database/kottbullarDB.html", "a");
        fwrite($manage, $linje);
        fclose($manage);
    }
    
      public function tabortPKcomm ($linje) {
        $manage = fopen("classes/Database/pankakorDB.html", "a");
        fwrite($manage, $linje);
        fclose($manage);
    }
  
    //dessa tabort hela kommntarer
  
     ///file_put_contents — Write data to a file
    public function tabortKB () {  /// för att kunna tabort meddelnaden på köttbullar
        file_put_contents('classes/Database/kottbullarDB.html','');
    }
    
    public function tabortPK() { /// för att kunna tabort meddelnaden på pankakor
        file_put_contents('classes/Database/pankakorDB.html','');
    }
     
    
     public function registrering($userN, $passW) {
        $manage = fopen("classes/Database/users.txt", "a");
        fwrite($manage,"\n".$userN.','.$passW);
        fclose($manage); 
    }
}
