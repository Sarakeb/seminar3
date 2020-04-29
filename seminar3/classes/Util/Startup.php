<?php 
namespace classes\Util;

// initialiserar php request.

class Startup {
    public static function initRequest() {
        session_start();
        self::loadPrograms();
    }

    private static function loadPrograms() {
        require_once 'classes/Model/Registry_Model.php';
        require_once 'classes/Model/Comment_Model.php';
        require_once 'classes/Controller/Controller.php';
        require_once 'classes/Model/Login_Model.php';       
        require_once 'classes/Integration/DBH.php';  
    }
}

