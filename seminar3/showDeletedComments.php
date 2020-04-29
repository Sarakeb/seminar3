<?php
use classes\Controller\Controller;
require_once 'resources/fragments/init.php';
if(isset($_POST['Delete'])){  //om det är delete
    $timestamp = $_POST['timestamp'];
    $display = $_POST['holderMod'];
    $ctr = Controller::accessController();
    $ctr->commentDel($timestamp, $_POST['holderMod']);
    
    if ($display === meatball)
        include 'resources/views/kottbullar.php';
    
    if ($display === pancake)
        include 'resources/views/pankakor.php';
}