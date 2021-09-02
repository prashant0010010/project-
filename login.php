<?php include('adminwork/user.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="css/style.css">

  <title>Login</title>
</head>

<body>
<header>
    <a href="<?php echo 'index.php' ?>" class="logo">
      <h1 class="logo-text">The <span>Blog</span>Site</h1>
    </a>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="services.php">Services</a></li>

      <?php if (isset($_SESSION['id'])): ?>
        <li>
          <a href="index.php">
            <i class="fa fa-user"></i>
            <?php echo $_SESSION['username']; ?>
            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
          </a>
          <ul>
            <?php if($_SESSION['admin']): ?>
              <li><a href="admin/dashboard.php">Dashboard</a></li>
            <?php endif; ?>
            <li><a href="logout.php" class="logout">Logout</a></li>
          </ul>
        </li>
      <?php else: ?>
        <li><a href="<?php echo 'register.php' ?>">Sign Up</a></li>
        <li><a href="<?php echo 'login.php' ?>">Login</a></li>
      <?php endif; ?>
    </ul>
</header>

  <div class="auth-content">

    <form action="login.php" method="post" name="login">
      <h2 class="form-title">Login</h2>
      <?php include('validations/formErrors.php'); ?>

      <div>
        <label>Username</label>
        <input type="text" name="username" class="text-input">
        <span id="err_username" class="error_message"></span>
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" class="text-input">
        <span id="err_password" class="error_message"></span>
      </div>
      <div>
        <button type="submit" name="login-btn" class="btn btn-big">Login</button>
      </div>
      <p>Or <a href="register.php">Sign Up</a></p>
    </form>

  </div>


  <!-- JQuery -->
  <script src="js/jquery.min.js"></script>

  

  <!-- Custom Script -->
  <script src="js/scripts.js"></script>

  <script src="js/jsvalidation.js"></script>

</body>

</html>