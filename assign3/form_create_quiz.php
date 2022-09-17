<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: form_login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-inverse container-fluid">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="">Quizs Management</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="index_ad.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["Admin"]; ?></a></li> -->
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center text-primary"><b>Add new quiz</b></h3>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-md-12">
                <form class="form-horizontal" enctype="multipart/form-data">
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="content">Question</label>
                            <div class="col-md-6">
                                <textarea id="content" name="correct_answer" class="form-control input-md"
                                required="" rows="10" cols="50"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="answers">Answers</label>
                            <div class="col-md-6">
                                <textarea id="answers" name="answers" class="form-control input-md"
                                required="" rows="10" cols="50"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="correct_answer">Correct answer</label>
                            <div class="col-md-6">
                                <textarea id="correct_answer" name="correct_answer" class="form-control input-md"
                                required="" rows="10" cols="50"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="score">Score</label>
                            <div class="col-md-6">
                                <input id="score" name="score" class="form-control input-md"
                                required="" type="number" min="0" max="100">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="display_order">Display order</label>
                            <div class="col-md-6">
                                <input id="display_order" name="display_order" class="form-control input-md"
                                    required="" type="number" min="1" max="5">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="question_type">Type of question</label>
                            <div class="col-md-6">
                                <select id="question_type" name="question_type" class="form-control">                               
                                    <option value="1">Single Choice</option>
                                    <option value="2">Multi Choice</option>
                                    <option value="3">Checkbox</option>
                                    <option value="4">Input text</option>
                                </select>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <div class="col-md-offset-6 col-md-6">
                                <button type="button" class="btn btn-primary" id="btn-create">Save</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="public/js/sweetalert.min.js"></script>
<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script>
    $('#btn-create').click(function(){
        var _this = $(this);
        var form_data = new FormData();
        form_data.append("content", $('#content').val());
        form_data.append("answers", $('#answers').val());
        form_data.append("correct_answer", $('#correct_answer').val());
        form_data.append("score", $('#score').val());
        form_data.append("display_order", $('#display_order').val());
        form_data.append("question_type", $('#question_type').val());
        $.ajax({
            type: 'POST',
            url: 'create_quiz.php',
            data: form_data,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response){
                if(response.is === 'success'){
                  swal({
                    title: "Success",
                    text: "Add new quiz successfully",
                    icon: "success"
                })
              }
              if(response.is === 'fails'){
                  swal({
                    title: "Error",
                    text: "Can not add new quiz",
                    icon: "error"
                })
              }
          }
      })
    })
</script>
</html>



