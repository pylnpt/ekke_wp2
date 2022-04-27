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
        header('Location: index.php');
    } 

    function UserLogin($username, $token) {
        $params = [
            ':username' => $username,
            ':token' => sha1($password)
        ];
        $query = "SELECT id, name,  password  FROM user WHERE username = :username AND token = :token";

        require_once "DbController.php";
        $dbfunctions = DbController::getInstance();
        $connection = $dbfunctions->connectToDatabase();

        $record = $dbfunctions->getRecord($query, $params);
        if ($record['is_verify']!=="1"){return "activate";}
        if (!empty($record)) {
            $_SESSION['user_id'] = $record["id_user"];
            $_SESSION['name'] = $record['name'];   
            header('Location: index.php');
            return true;
        }
        return false;
    }




}