<?php
include_once "connect-to-sql.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $quiz = $_POST;
    $sql = "UPDATE quizs SET display_order = " . $quiz['display_order'] . " WHERE id = " . $quiz['id'] . "";
    header('Content-type: application/json');
    
    if ($connection->query($sql) === TRUE){
        echo json_encode(['is' => 'success', 'complete' => 'Done']);
    }
    else {
        echo json_encode(['is' => 'fails', 'uncomplete' => 'Error']);	
    }
}
?>