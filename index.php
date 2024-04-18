<?php
require_once("controllers/index.php");
//conditional to request method in controls
 if(isset($_GET["m"])){
    if(method_exists("userController",$_GET['m'])){
      userController::{$_GET['m']}();
    }
 }elseif(!empty($_REQUEST["user_login"])){
   if(method_exists("userController","login")){
      userController::login();
    }else{
      userController::index();
    }
 }else{
    userController::index();
 }
?>


