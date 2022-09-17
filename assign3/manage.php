<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: form_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Supervisor</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom styles for this template-->
  <link href="public/css/sb-admin-2.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
  <div class="container" style="margin-top: 100px;">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h2 text-gray-900 mb-2"><strong>Menu</strong></h1>
                  </div>
                  <br>
                  <form class="user">
                    <a href="manage_attempt.php" class="btn btn-primary btn-user btn-block">
                      Attempts Management 
                    </a>
                    <hr>
                    <!-- <a href="manage_quiz.php" class="btn btn-primary btn-user btn-block">
                      Quizs Management 
                    </a> -->
                    <hr>
                    <a href="manage_quiz.php" class="btn btn-primary btn-user btn-block">
                      Quizs Management 
                    </a>
                    <hr>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>