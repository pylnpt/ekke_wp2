<?php

class RegisterController
{
    function insertUser($username, $token, $email, $first_name, $last_name, $role, $img_path)
    {
        require_once "DbController.php";
        
        $dbfunctions = DbController::getInstance();
        $connection = $dbfunctions->connectToDatabase();
        

        $hashedtoken = sha1($token);
        
        

    if(!isset($connection))
        {   
            die("Hiba:".mysqli_errno($connection));
        }

        try {
            $newUser = $dbfunctions->executeDML("
                INSERT INTO `users`( `username`, `token`, `email`,`first_name`, `last_name`,`role`, `img_path`)
                VALUES ('$username','$hashedtoken','$email', '$first_name','$last_name', '$role', '$img_path')",
            $connection);
            
            // echo "Sikeres regisztráció!";
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return true;
    }

    function checkIfUserExists($username)
    {
        require_once "DbController.php";
        $dbfunctions = DbController::getInstance();
        $connection = $dbfunctions->connectToDatabase();

        $params = [':username' => $username];
        $query = "SELECT id FROM users WHERE username = :username";
        $check = $dbfunctions->getRecord($query, $params);

        if (!empty($check)) {
            return true;
        } else {
            return false;
        }

    }
}