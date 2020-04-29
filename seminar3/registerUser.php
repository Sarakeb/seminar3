<?php
require_once 'resources/fragments/init.php';
use classes\Controller\Controller;
include 'resources/views/UserRegister.php';
if (count($_POST) && !empty($_POST['userN']) && !empty($_POST['passW']))
{
    $userN = htmlentities($_POST['userN'], ENT_QUOTES);    
    $password = htmlentities($_POST['passW'], ENT_QUOTES);
    $ctr = Controller::setController();
    $ctr->userRegister($userN, $password);
   }

