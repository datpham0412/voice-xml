<?php
include_once "connect-to-sql.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $quiz = $_POST;

    $sql = "INSERT INTO quizs (content,answers,correct_answer,score,display_order,question_type) VALUES 
    ('".$quiz['content']."','".$quiz['answers']."','".$quiz['correct_answer']."',".$quiz['score'].",".$quiz['display_order'].",".$quiz['question_type'].")";
    header('Content-type: application/json');

    var_dump($sql);
    
    if ($connection->query($sql) === TRUE){
        echo json_encode(['is' => 'success', 'complete' => 'Done']);
    }
    else {
        echo json_encode(['is' => 'fails', 'uncomplete' => 'Error']);	
    }
}
?>