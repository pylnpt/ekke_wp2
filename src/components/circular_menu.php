<?php 
require_once "../Controller/LoginController.php";
    $loginController=LoginController::getInstance();
    // echo $_SESSION["username"];
?>


<div class="circular-menu-wrapper">
    <div class="circular-menu">
        <div class="toggler"><ion-icon name="add"></ion-icon></div>
            
            <?php if (!$loginController->IsUserLoggedIn()): ?>
            <li style="--i:0;">
                <a class="circular-menu-button"  id="homeBtn" href="#">
                    <span title="Home">
                        <ion-icon style="pointer-events:none" name="home"></ion-icon>
                    </span>
                </a>     
            </li>
            <li style="--i:1;">
                <a class="circular-menu-button"  id="loginBtn" href="#">
                    <span title="Log in">
                        <ion-icon style="pointer-events:none" name="log-in"></ion-icon>
                    </span>
                </a>
            </li>
            <li style="--i:2;">
                <a class="circular-menu-button" id="registerBtn" href="#">
                    <span title="Register">
                        <ion-icon style="pointer-events:none" name="person-add-sharp"></ion-icon>
                    </span>
                </a>
            </li>
            <li style="--i:3;">
                <a class="circular-menu-button" id="profileBtn" href="#">
                    <span title="Account">
                        <ion-icon style="pointer-events:none" name="person-circle"></ion-icon>
                    </span>
                </a>
            </li>
            <li style="--i:4;">
                <a class="circular-menu-button" id="errorAndSolutionBtn" href="#">
                    <span title="Errors & Solutions">
                        <ion-icon name="stats-chart-sharp"></ion-icon>
                    </span>
                <a>
            </li>
            <?php  endif; ?>

            <?php if ($loginController->IsUserLoggedIn()): ?>
            <li style="--i:-1;">
                <a class="circular-menu-button"  id="homeBtn" href="#">
                    <span title="Home">
                        <ion-icon style="pointer-events:none" name="home"></ion-icon>
                    </span>
                </a>     
            </li>
            <li style="--i:1;">
                <a class="circular-menu-button"  id="logoutBtn" href="../components/logout">
                    <span title="Log out">
                        <ion-icon name="log-out"></ion-icon>
                    </span>
                </a>
            </li>
            <li style="--i:3;">
                <a class="circular-menu-button" id="profileBtn" href="#">
                    <span title="Account">
                        <ion-icon style="pointer-events:none" name="person-circle"></ion-icon>
                    </span>
                </a>
            </li>
            <li style="--i:5;">
                <a class="circular-menu-button" id="errorAndSolutionBtn" href="#">
                    <span title="Errors & Solutions">
                        <ion-icon name="stats-chart-sharp"></ion-icon>
                    </span>
                <a>
            </li>
            <?php  endif; ?>

        </div>
    </div>
</div>
