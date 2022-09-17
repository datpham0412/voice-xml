<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom styles for this template-->
  <link href="public/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <div class="container" style="margin-top: 100px;">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-12">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Supervisors</h1>
                  </div>
                  <form class="user" action="">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Please type username">
                      <div class="input-username-message"></div>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Please type password">
                      <div class="input-password-message"></div>
                    </div>
                    <div class="form-group text-center">
                      <button id="btn-login" type="button" class="btn btn-primary">Login</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
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
  function generateMessage(text) {
    return `<p>${text}</p>`;
  }

  $('#btn-login').click(function() {
    $(".input-username-message, .input-password-message").empty();
    const _this = $(this);
    const form_data = new FormData();
    const username = $('#username').val();
    const password = $('#password').val();
    if (!username) {
      $(".input-username-message").append(generateMessage('This username field is required'));
    }
    if (!password) {
      $(".input-password-message").append(generateMessage('This password field is required'));
    }
    if (!username || !password) {
      return;
    }
    form_data.append("username", username.trim());
    form_data.append("password", password.trim());
    $.ajax({
      type: "POST",
      url: "login.php",
      data: form_data,
      contentType: false,
      processData: false,
      success: function(response) {
        if (response.success) {
          window.location.href = 'manage.php';
        } else {
          swal({
            title: "Fail!",
            text: response.message || "Username or password is wrong",
            icon: "error",
            buttons: false,
            timer: 0,
          })
        }
      }
    })
  })
</script>

</html>