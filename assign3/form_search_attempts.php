<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: form_login.php");
} 
include_once "connect-to-sql.php";
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
  $condition = $_GET;
  if ($condition['filter'] == 1) {
    $sql = "SELECT * FROM attempts WHERE student_id = '" . $condition['id_or_name'] . "' OR first_name = '" . $condition['id_or_name'] . "' OR last_name = '"  . $condition['id_or_name'] . "'";
  }
  else if ($condition['filter'] == 2) {
    $sql = "SELECT * FROM attempts WHERE score = 100 AND number_of_attempt = 1";
  }
  else if ($condition['filter'] == 3) {
    $sql = "SELECT * FROM attempts WHERE score < 50 AND number_of_attempt = 2";
  }
  $data = $connection->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="public/css/datatables.min.css" />
</head>

<body>
  <nav class="navbar navbar-inverse container-fluid">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="">Attempts Management</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="index_ad.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["Admin"]; ?> </a></li> -->
        <li><a href="logout.php"><span style="padding-right: 10px;" class="glyphicon glyphicon-log-out"></span>Logout</a></li>
      </ul>
    </div>
  </nav>
  <hr>
  <div class="col-md-12">
    <h2 class="text-center text-primary"><b>Results</b></h2>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-striped dataTable" id="myTable">
          <thead>
            <tr>
              <th class="text-center">Student ID</th>
              <th class="text-center">First Name</th>
              <th class="text-center">Last Name</th>
              <?php 
              if($condition['id_or_name']!=''){
              ?>
              <th class="text-center">Time of the attempt</th>
              <th class="text-center">Score</th>
              <th class="text-center">Number of the attempt</th>
              <?php
              }
              ?>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-center">Student ID</th>
              <th class="text-center">First Name</th>
              <th class="text-center">Last Name</th>
              <?php 
              if($condition['id_or_name']!=''){
              ?>
              <th class="text-center">Time of the attempt</th>
              <th class="text-center">Score</th>
              <th class="text-center">Number of the attempt</th>
              <?php
              }
              ?>
            </tr>
          </tfoot>
          <tbody>
            <?php
            if ($data->num_rows > 0) {
              while ($row = $data->fetch_assoc()) { ?>
                <tr>
                  <td class="text-center"><?= $row['student_id'] ?></td>
                  <td class="text-center"><?= $row['first_name'] ?></td>
                  <td class="text-center"><?= $row['last_name'] ?></td>
                  <?php 
                  if($condition['id_or_name']!=''){
                  ?>
                  <td class="text-center"><?= $row['date_and_time'] ?></td>
                  <td class="text-center"><?= $row['score'] ?></td>
                  <td class="text-center"><?= $row['number_of_attempt'] ?></td>
                  <?php
                  }
                  ?>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-12">
            <a href="manage_attempt.php" class="btn btn-danger" style="margin-top: 25px;">Back</a>
          </div>
    </div>
  </div>
</body>
<script src="public/js/sweetalert.min.js"></script>
<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/datatables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#myTable').DataTable({
      "lengthMenu": [
        [15, 25, 50, -1],
        [15, 25, 50, "All"]
      ],
      "searching": false,
      "language": {
        "decimal": "",
        "emptyTable": "No data available in table",
        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
        "infoEmpty": "Showing 0 to 0 of 0 entries",
        "infoFiltered": "(filtered from _MAX_ total entries)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Show _MENU_ entries",
        "loadingRecords": "Loading...",
        "processing": "",
        "search": "Search:",
        "zeroRecords": "No matching records found",
        "paginate": {
          "first": "First",
          "last": "Last",
          "next": "Next",
          "previous": "Previous"
        },
        "aria": {
          "sortAscending": ": activate to sort column ascending",
          "sortDescending": ": activate to sort column descending"
        }
      }
    });
  });
</script>
</html>