<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: form_login.php");
} 
include_once "connect-to-sql.php";
$data = $connection->query("SELECT * FROM quizs ORDER BY display_order ASC"); ?>
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
        <a class="navbar-brand" href="">Quizs Management</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="index_ad.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["Admin"]; ?> </a></li> -->
        <li><a href="logout.php"><span style="padding-right: 10px;" class="glyphicon glyphicon-log-out"></span>Logout</a></li>
      </ul>
    </div>
  </nav>
  <hr>
  <div class="col-md-12">
    <h2 class="text-center text-primary"><b>List quizs</b></h2>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div style="margin-bottom: 50px; margin-top: 50px;">
          <a href="form_create_quiz.php" class="btn btn-primary btn-user btn-block">
            Add Quiz
          </a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-striped dataTable" id="myTable">
          <thead>
            <tr>
              <th class="text-center">Content</th>
              <th class="text-center">Answers</th>
              <th class="text-center">Correct Answer</th>
              <th class="text-center">Score</th>
              <th class="text-center">Display Order</th>
              <th class="text-center">Question Type</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-center">Content</th>
              <th class="text-center">Answers</th>
              <th class="text-center">Correct Answer</th>
              <th class="text-center">Score</th>
              <th class="text-center">Display Order</th>
              <th class="text-center">Question Type</th>
              <th class="text-center">Actions</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            if ($data->num_rows > 0) {
              while ($row = $data->fetch_assoc()) { ?>
                <tr>
                  <td class="text-center"><?= $row['content'] ?></td>
                  <td class="text-center"><?= $row['answers'] ?></td>
                  <td class="text-center"><?= $row['correct_answer'] ?></td>
                  <td class="text-center"><?= $row['score'] ?></td>
                  <td class="text-center"><?= $row['display_order'] ?></td>
                  <td class="text-center"><?= $row['question_type'] ?></td>
                  <td class="text-center">
                    <a href="#" type="button" data-id="<?= $row['id'] ?>" class="btn btn-warning btn-edit" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                  </td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- modal edit -->
  <div class="col-xs-12">
    <div class="modal fade" id="editAttempt" tabindex="-1" role="dialog" aria-labelledby="formManufacture" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius : 10px;">
          <div class="modal-header">
            <h4 class="modal-title">Change the display order for quiz</h4>
          </div>
          <form action="" id="formEditAttempt">
            <div class="modal-body">
              <input name="id" type="hidden" class="form-control" id="id"><br>
              <input id="display_order" name="display_order" class="form-control" required="" type="number" placeholder="Enter display order" min="0" max="100"><br>
            </div>

            <div class="modal-footer">
              <button type="button" id="btn-update" class="btn btn-primary">Update</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
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

  $('.btn-edit').click(function() {
    var id = $(this).attr('data-id');
    $.ajax({
      type: "get",
      url: "get_quiz.php",
      data: {
        id,
        _token: $('[name="_token"]').val(),
      },
      success: function(response) {
        try {
          response = JSON.parse(response);
        } catch (error) {
          response = {};
        }
        $('#id').val(response.id);
        $('#display_order').val(response.display_order);
      }
    });

    $('#editAttempt').modal('show');
  });

  $('#btn-update').click(function() {
    var form_data = new FormData();
    form_data.append("display_order", $('#display_order').val());
    form_data.append("id", $('#id').val());
    $.ajax({
      type: 'POST',
      url: 'change_quiz.php',
      data: form_data,
      dataType: 'json',
      contentType: false,
      processData: false,
      success: function(response) {
        if (response.is === 'success') {
          window.location.href = 'manage_quiz.php';
        } else {
          swal({
            title: "Error",
            text: "Can not change the display for quiz",
            icon: "error",
            buttons: false,
            timer: 2000,
          })
        }
      }
    });
  });
</script>

</html>