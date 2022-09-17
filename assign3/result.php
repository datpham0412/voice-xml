<?php
session_start();
include_once "connect-to-sql.php";
$student_id = $_GET['student_id'];
$sql = "SELECT * FROM attempts WHERE student_id = '" . $student_id . "' ORDER BY id DESC LIMIT 1";
$data = $connection->query($sql)->fetch_assoc(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'header.inc'; ?>
</head>

<body>
<?php include 'menu.inc'; ?>

<canvas id="canvas"></canvas>

<div class="fieldset">
  <h2 class = "light_red">QUIZ RESULT</h2>
  <p class = "light_blue">Your Name: <span id="full_name"><?php echo $data['first_name'] . " " . $data['last_name']; ?></span></p>
  <p class = "light_blue">Your ID: <span id="submit_id"><?php echo $data['student_id']; ?></span></p>
  <p class = "light_blue">Your Score: <span id="final_score"><?php echo $data['score']; ?></span></p>
  <p class = "light_blue">Your attempts: <span id="total_attempts"><?php echo $data['number_of_attempt']; ?></span></p>
  <p class = "light_blue"><a href="quiz.php" id="retake">Try again</a></p>

  <input type="hidden" name="givenname" id="givenname" />
  <input type="hidden" name="familyname" id="familyname" />
  <input type="hidden" name="id" id="id" />
  <input type="hidden" name="score" id="score"/>
  <input type="hidden" name="attempt" id="attempt"/>
</div>


<footer>
<?php include 'footer.inc'; ?>
</footer>

</body>
</html>