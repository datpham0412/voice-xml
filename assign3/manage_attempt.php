<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: form_login.php");
} 
include_once "connect-to-sql.php";
$data = $connection->query("SELECT * FROM attempts"); ?>
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
    <h2 class="text-center text-primary"><b>List attempts</b></h2>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div style="margin-bottom: 30px; margin-top: 50px;">
          <div class="col-md-4">
            <label for="">Please type student ID or name</label>
            <input name="id_or_name" type="text" class="form-control" id="id_or_name">
          </div>
          <div class="col-md-4">
            <label for="">Please select conditions to filter</label>
            <select name="conditions[]" id="select-state-condition" class="form-control" style="width: 100%; margin-top: 0px;">
              <option selected class="isblue" value=1>All attempts</option>
              <option class="isblue" value=2>100% on first attempt</option>
              <option class="isblue" value=3>Less than 50% on second attempt</option>
            </select><br>
            <script>
              $('#select-state-condition').selectize({
                maxItems: 1,
                closeAfterSelect: true,
                highlight: true,
                selectOnTab: true,
              });
            </script>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-info btn-search" style="margin-top: 25px; margin-right: 20px;">Search</button>
            <button type="button" class="btn btn-danger btn-delete" style="margin-top: 25px;">Delete By Student ID</button>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-striped dataTable" id="myTable">
          <thead>
            <tr>
              <th class="text-center">Student ID</th>
              <th class="text-center">First Name</th>
              <th class="text-center">Last Name</th>
              <th class="text-center">Time of the attempt</th>
              <th class="text-center">Score</th>
              <th class="text-center">Number of the attempt</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-center">Student ID</th>
              <th class="text-center">First Name</th>
              <th class="text-center">Last Name</th>
              <th class="text-center">Time of the attempt</th>
              <th class="text-center">Score</th>
              <th class="text-center">Number of the attempt</th>
              <th class="text-center">Actions</th>
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
                  <td class="text-center"><?= $row['date_and_time'] ?></td>
                  <td class="text-center"><?= $row['score'] ?></td>
                  <td class="text-center"><?= $row['number_of_attempt'] ?></td>
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
						<h4 class="modal-title">Change the score for a quiz attempt</h4>
					</div>
					<form action="" id="formEditAttempt">
						<div class="modal-body">
              <input name="id" type="hidden" class="form-control" id="id"><br>

							<input name="student_id" type="text" class="form-control" id="student_id" disabled><br>

							<input name="first_name" type="text" class="form-control" id="first_name" disabled><br>

							<input name="last_name" type="text" class="form-control" id="last_name" disabled><br>

              <input name="date_and_time" type="text" class="form-control" id="date_and_time" disabled><br>

              <input id="score" name="score" class="form-control" required="" type="number" placeholder="enter score" min="0" max="100"><br>

							<input name="number_of_attempt" type="text" class="form-control" id="number_of_attempt" disabled><br>
						</div>

						<div class="modal-footer">
              <button type="button" id ="btn-update" class="btn btn-primary">Update</button>
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

  $('.btn-edit').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
      type : "get",
      url : "get_attempt.php",
      data : {
        id,
        _token :$('[name="_token"]').val(),
      },
      success : function(response){
        try {
          response = JSON.parse(response);
        } catch (error) {
          response = {};
        }
        $('#id').val(response.id);
        $('#student_id').val(response.student_id);
        $('#first_name').val(response.first_name);
        $('#last_name').val(response.last_name);
        $('#date_and_time').val(response.date_and_time);
        $('#score').val(response.score);
        $('#number_of_attempt').val(response.number_of_attempt);
      }
    });

    $('#editAttempt').modal('show');
  });

  $('#btn-update').click(function(){
    var form_data = new FormData();
    form_data.append("score", $('#score').val());
    form_data.append("id", $('#id').val());
    $.ajax({
      type: 'POST',
      url: 'change_attempt.php',
      data: form_data,
      dataType: 'json',
      contentType: false,
      processData: false,
      success: function(response){
        if (response.is === 'success') {
          window.location.href = 'manage_attempt.php';
        } else {
          swal({
            title: "Error",
            text: "Can not change the score for quiz attempt",
            icon: "error",
            buttons: false,
            timer: 2000,
          })
        }
      }
    });
  });

  $('.btn-search').click(function(){
    var id_or_name = $('input[name="id_or_name"]').val();
    var filter = $('select[name="conditions[]"]').val();
    window.location.href = `form_search_attempts.php?id_or_name=${id_or_name}&filter=${filter}`; 
  });

  $('.btn-delete').click(function(){
      var form_data = new FormData();
      form_data.append("student_id", $('#id_or_name').val());
      swal({
        title: "Confirmation",
        text: "Do you really want to delete?",
        icon: "warning",
        buttons: true,
        buttons: ["Cancel", "OK"]
      })
      .then(confirm => {
        if(confirm){
          $.ajax({
            type: 'POST',
            url : 'delete_attempts.php',
            data: form_data,
            contentType: false,
            processData: false,
            success: function (response) {
              if(response.is == 'success'){
                swal({
                  title: response.complete,
                  text: "Delete attempts successfully",
                  icon: "success"
                })
                setTimeout(function () {
                    window.location.href = '';
                },500);
              }
              if(response.is === 'fails'){
                swal({
                  title: response.uncomplete,
                  text: "Can not delete attempts",
                  icon: "error"
                })
              }
            }
          })
        }
      })
    });
</script>

</html>