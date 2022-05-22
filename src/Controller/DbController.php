<?php
class DbController
{
    private static $instance = null;
    private $conn;


    private function __construct()
    {
        require_once "../../dotEnv.php";
        (new DotEnv( '../../.env'))->load();
        $this->conn = new PDO(
            $_ENV['DATABASE_DNS'],
            $_ENV['DATABASE_USER'],
            $_ENV['DATABASE_PASSWORD'],
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
            ));
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DbController();
        }

        return self::$instance;
    }

    public function connectToDatabase()
    {
        return $this->conn;
    }


    function getRecord($queryString, $queryParams = [])
    {

        $connection = $this->connectToDatabase();
        $statement = $connection->prepare($queryString);
        $success = $statement->execute($queryParams);
        $result = $success ? $statement->fetch(PDO::FETCH_ASSOC) : [];
        $statement->closeCursor();
        $connection = null;
        return $result;
    }

    function getList($queryString, $queryParams = [])
    {
        $connection = $this->connectToDatabase();
        $statement = $connection->prepare($queryString);
        $success = $statement->execute($queryParams);
        $result = $success ? $statement->fetchAll(PDO::FETCH_ASSOC) : [];
        $statement->closeCursor();
        $connection = null;
        return $result;
    }

    function executeDML($queryString, $connection, $queryParams = [])
    {
        $statement = $connection->prepare($queryString);
        $success = $statement->execute($queryParams);
        $statement->closeCursor();
        $connection = null;

        // echo $queryString;
        return $success;
    }
}

?>