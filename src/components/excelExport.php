<?php
require_once "../Controller/ErrorsAndSolutionController.php";

function filterData(&$string){
    $string = preg_replace("/\t/", "\\t", $string);
    $string = preg_replace("/\r?\n/", "\\n", $string);
    if(strstr($string, '"')) {
        $string = '"' . str_replace('"', '""', $string) . '"';
    } 
}


$errorsAndSolutionController = new ErrorsAndSolutionController();
$rows = $errorsAndSolutionController->getErrors();

$file_name = "error_data" . date('Y-m-d') . ".xls";
$fields = array(
    'ID', 'ERROR NAME', 'ERROR LEVEL', 'ERROR TYPE', 'HAS SOLUTION'
);
    

$excel_data = implode("\t", array_values($fields)) . "\n";
    foreach($rows as $row_id => $content){
        $line_data = array(
            $content['error_id'],
            $content['error_name'],
            $content['error_level'],
            $content['error_type'],
            $content['has_solution']
        );
        
        array_walk($line_data, 'filterData');
        $excel_data .= implode("\t", array_values($line_data)) . "\n";
    }
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$file_name\"");

echo $excel_data;
?>