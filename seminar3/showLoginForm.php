 <?php
include 'resources/views/loginForm.php';
use classes\Controller\Controller;
require_once 'resources/fragments/init.php';
$ctr = Controller::accessController();


if(!empty($ctr))
    session_destroy();  //för att kunna logga ut nu.





