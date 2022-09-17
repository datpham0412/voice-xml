<?php
include_once "connect-to-sql.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $attempt = $_POST;
    $sql = "UPDATE attempts SET score = " . $attempt['score'] . " WHERE id = " . $attempt['id'] . "";
    header('Content-type: application/json');
    
    if ($connection->query($sql) === TRUE){
        echo json_encode(['is' => 'success', 'complete' => 'Done']);
    }
    else {
        echo json_encode(['is' => 'fails', 'uncomplete' => 'Error']);	
    }
}
?>