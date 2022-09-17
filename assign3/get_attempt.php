<?php 
session_start();
$output = [];

include_once "connect-to-sql.php";

if(isset($_GET['id'])){
  $data = $connection->query("SELECT * FROM attempts WHERE id = '" .$_GET['id']. "'");
  if ($data->num_rows > 0) {
    $row = $data->fetch_assoc();
    $output['id'] = $row['id'];
    $output['student_id'] = $row['student_id'];
    $output['first_name'] = $row['first_name'];
    $output['last_name'] = $row['last_name'];
    $output['date_and_time'] = $row['date_and_time'];
    $output['score'] = $row['score'];
    $output['number_of_attempt'] = $row['number_of_attempt'];
  }
} 
echo json_encode($output);
?>