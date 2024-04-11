<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

</head>
<body>
    <form class="login container-fluid" action="index.php?page=login" method="POST" id="login-user">
        <div class="form">
          <?php
          if(isset($_GET['error']) && $_GET['error'] === 'InvalidCredentials') {
              echo "<p class='text-center p-2 rounded' style='color: red; background-color: #FEE0DF'>Invalid username or password!</p>";
          }
          ?>
            <div class="mb-3">
                <div class="form-header"><h1 class="text-center mb-3">Login Form</h1></div>
              <label class="form-label">Username</label>
              <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
              <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <div class="bottom-but w-100 d-flex align-content-center justify-content-center">
                <button class="btn btn-primary mt-2" type="submit" value="login">SIGN IN</button>
            </div>
        </div>
      </form>

</body>

</html>