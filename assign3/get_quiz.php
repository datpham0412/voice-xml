<?php 
session_start();
$output = [];

include_once "connect-to-sql.php";

if(isset($_GET['id'])){
  $data = $connection->query("SELECT * FROM quizs WHERE id = '" .$_GET['id']. "'");
  if ($data->num_rows > 0) {
    $row = $data->fetch_assoc();
    $output['id'] = $row['id'];
    $output['display_order'] = $row['display_order'];
  }
} 
echo json_encode($output);
?>