<?php
class LoginController{

    private static $instance = null;
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new LoginController();
        }

        return self::$instance;
    }
    function IsUserLoggedIn() {
        return $_SESSION != null;
    }
    
    function UserLogout() {
        session_unset();
        session_destroy();
        header('Location: ../View/index.php');
        echo $_SESSION["username"];
    } 

    function UserLogin($username, $token) {
        $params = [
            ':username' => $username,
            ':token' => sha1($token)
        ];
        $query = "SELECT id, username, token  FROM users WHERE username = :username AND token = :token";

        require_once "DbController.php";
        $dbfunctions = DbController::getInstance();
        $connection = $dbfunctions->connectToDatabase();

        $record = $dbfunctions->getRecord($query, $params);
        if (!empty($record)) {
            $_SESSION['id'] = $record["id"];
            $_SESSION['username'] = $record['username'];   
            header('Location: ./index.php');
            return true;
        }
        return false;
    }

    function GeUserRole($id){
        require_once "DbController.php";
        $params = [ ':id' => $id ];
        $query = "SELECT role FROM users WHERE id = :id";
        
        $dbfunctions = DbController::getInstance();
        $connection = $dbfunctions->connectToDatabase();
        $record = $dbfunctions->getRecord($query, $params);
        return $record["role"];
    }
        
}