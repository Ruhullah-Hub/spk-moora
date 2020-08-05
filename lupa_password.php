
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />


</head>
  <body class="login-body">
    <div class="container">

      <form class="form-signin" action="mail.php" method="POST">
        <h2 class="form-signin-heading">BEASISWA PPA UPP</h2>
        <div class="login-wrap">
        <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email Terdaftar" required>
           
            <button class="btn btn-lg btn-login btn-block" type="submit" name="login">Reset Password </button>
           <div align="center"><b><a href="login.php">Login Aplikasi</a></b> </div>
        </div>
      </form>

    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>