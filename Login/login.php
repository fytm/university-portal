


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../assets/css/login.css">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>
    
<!-- login page -->
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="../assets/img/login.jpg" alt="login" class="login-card-img">
          </div>

          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="../assets/img/favicon.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Sign into your account</p>

              <form method="post" action="./loginprocess.php" id="form">

                  <div class="form-group">
                  <?php if (isset($_GET['error'])) { ?>
     					        <p class="error"><?php echo $_GET['error']; ?></p>
     				      <?php } ?>
                    
                    <label for="email" class="sr-only">Email</label>
                    <!-- <input type="text" name="email" id="email" class="form-control" placeholder="Email address" > -->

                    <input type="text" name="email" id="email" placeholder="Email">
                    <div id='email_error' class="val_error"></div>

                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="********">
                    <div id='password_error' class="val_error"></div>
                  </div>

                  <!-- pattern="/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/" -->

                  <button name="addButton" id="login" class="btn btn-block login-btn" type="submit" value="Login">Login</button>

              </form>


                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Don't have an account? <a href="./register.html" class="text-reset">Register here</a></p>

                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="../Js/main.js"></script>
</html>