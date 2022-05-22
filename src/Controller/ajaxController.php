<?php
switch($_POST['whichFunction'])
{
    case "deleteError":         
        echo deleteError($_POST["data"]);
        break;
    case "updateError":
        echo json_encode(updateError($_POST["data"]));
        break;
    default:
    break;
}


function updateError($data){
    require_once "ErrorsAndSolutionController.php";
    
    $controller = new ErrorsAndSolutionController();
    return $controller->updateError($data);
}

function deleteError($data){
    require_once "ErrorsAndSolutionController.php";
    
    $controller = new ErrorsAndSolutionController();
    return $controller->deleteError($data);
}


?>