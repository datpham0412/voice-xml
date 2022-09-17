<?php 
include_once "connect-to-sql.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['student_id'])) {
		$attempt = $_POST;

		$flag = $connection->query("DELETE FROM attempts WHERE student_id = '".$attempt['student_id']. "'");
		header('Content-type: application/json');
		
		if($flag){
			echo json_encode(['is' => 'success', 'complete' => 'Done']);
		}
		else{
			echo json_encode(['is' => 'fails', 'uncomplete' => 'Error']);	
		}
	}
}
?>