<?php
include_once "connect-to-sql.php";
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM supervisors WHERE username = '" . $username . "' AND password = '" . $password . "'";
  $result = $connection->query($sql);
  header('Content-type: application/json');
  if (isset($_SESSION['settime_allow']) && date('H:i:s') < $_SESSION['settime_allow']) {
    echo json_encode(['success' => false, 'message' => "You can access after 5 minutes"]);
  } else {
    if ($result->num_rows > 0) {
      $_SESSION['username'] = $username;
      $_SESSION['trylogin'] = 0;
      echo json_encode(['success' => true]);
    } else {
      if ($_SESSION['trylogin']) {
        $_SESSION['trylogin'] = $_SESSION['trylogin'] + 1;
      } else {
        $_SESSION['trylogin'] = 1;
      }

      if ($_SESSION['trylogin'] > 2) {
        $_SESSION['settime_allow'] = date('H:i:s', strtotime('+5 minutes'));
      }
      echo json_encode(['success' => false, 'message' => "Username or password is wrong"]);
    }
  }
}
