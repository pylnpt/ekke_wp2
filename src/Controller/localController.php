<?php
switch($_POST["whichFunction"])
{
    case "getUserById":         
        echo json_encode(getUserById($_POST["id"]));
        break;
    case "updatePassword":        
        echo updatePassword($_POST["id"], $_POST["password"]);   
        break;
        default:
    break;
}

function getUserById($id){
    require_once "DbController.php";
    $dbfunctions = DbController::getInstance();
    $connection = $dbfunctions->connectToDatabase();
    $query = "SELECT * FROM users WHERE id = '{$id}'";
    $user = $dbfunctions->getRecord($query);
    return $user;
}

function updatePassword($id, $password, $new_password, $re_password){
    require_once "DbController.php";
    $dbfunctions=DbController::getInstance();
    $connection=$dbfunctions->connectToDatabase();
    $correct_record = false;
    
    $token = sha1($password);
    $query = "SELECT token FROM users WHERE token = '{$token}'";
    $user = $dbfunctions->getRecord($query);
    
    if (!empty($user)) {
        $correct_record = true;
    } else {
        $correct_record = false;
    }
    
    if($correct_record){
        if($new_password == $re_password){
            $new_token=sha1($new_password);
            $sql="UPDATE `users` SET `token`='{$new_token}' WHERE `id`={$id}";
            $updatedPassword=$dbfunctions->executeDML($sql,$connection);

            return $updatedPassword;
        }
    }
    else echo "Something went wrong...";
}
?>