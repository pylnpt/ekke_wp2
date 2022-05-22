<?php

class ErrorsAndSolutionController {
    function getErrors(){
        require_once "DbController.php";
        $dbfunctions=DbController::getInstance();
        $connection=$dbfunctions->connectToDatabase();
        $errors=$dbfunctions->getList("SELECT * FROM `errors`");
        return $errors;
    }

    function getSolutions(){
        require_once "DbController.php";
        $dbfunctions=DbController::getInstance();
        $connection=$dbfunctions->connectToDatabase();
        $solutions=$dbfunctions->getList("SELECT * FROM `solutions`");
        
        return $solutions;
    }

    function deleteError($error_id){
        require_once "DbController.php";
        $dbfunctions=DbController::getInstance();
        $connection=$dbfunctions->connectToDatabase();
        $result=$dbfunctions->executeDML("
        DELETE FROM errors WHERE id = {$error_id}
        ", 
        $connection);
        
        return $result;
    }

    function deleteSolution($solution_id){
        require_once "DbController.php";
        $dbfunctions=DbController::getInstance();
        $connection=$dbfunctions->connectToDatabase();
        $result=$dbfunctions->executeDML("
        DELETE FROM solutions WHERE id = {$solution_id}
        ", 
        $connection);
        
        return $result;
    }

    function updateError($data){
        require_once "DbController.php";
        $dbfunctions=DbController::getInstance();
        $connection=$dbfunctions->connectToDatabase();   
        $params = [
            ':error_name'=> $data["error_name"],
            ':error_level' => $data["error_level"],
            ':error_type' => $data["error_type"],
            ':has_solution' => $data["has_solution"],
            ':error_id' => $data["id"] 
        ];
        
        $sql="UPDATE errors SET error_name=:error_name, error_level=:error_level, error_type=:error_type, has_solution=:has_solution WHERE error_id=:error_id ";
        
        
        
        $updatedError=$dbfunctions->executeDML($sql,$connection, $params);
        return $updatedError;
    }

    function updateSolution($data, $id){
        require_once "DbController.php";
        $dbfunctions=DbController::getInstance();
        $connection=$dbfunctions->connectToDatabase();
        $sql="UPDATE `solutions` SET 
                    `solution_name`= {$data["solution_name"]},
                    `solution_type`= {$data["solution_type"]},
                    `solution_description`= {$data["solution_description"]},
                    WHERE `id`={$id}";
    
        $updatedSolution=$dbfunctions->executeDML($sql,$connection);

        
        return $updatedSolution;
    }
}
?>