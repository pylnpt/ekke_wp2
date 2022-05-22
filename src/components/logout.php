<?php
    include "head.php";
    require_once "../Controller/LoginController.php";
    $loginController = LoginController::getInstance();
    $loginController->UserLogout();
?>