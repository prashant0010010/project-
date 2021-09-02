<?php include('adminwork/user.php');
guestsOnly();
?>
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

  <title>Register</title>
</head>

<body>
<header>
    <a href="index.php" class="logo">
      <h1 class="logo-text">The<span>Blog</span>Sites</h1>
    </a>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="services.php">Services</a></li>

      <?php if (isset($_SESSION['id'])): ?>
        <li>
          <a href="register.php">
            <i class="fa fa-user"></i>
            <?php echo $_SESSION['username']; ?>
            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
          </a>
          <ul>
            <?php if($_SESSION['admin']): ?>
              <li><a href="<?php echo 'admin/dashboard.php' ?>">Dashboard</a></li>
            <?php endif; ?>
            <li><a href="<?php echo 'logout.php' ?>" class="logout">Logout</a></li>
          </ul>
        </li>
      <?php else: ?>
        <li><a href="<?php echo 'register.php' ?>">Sign Up</a></li>
        <li><a href="<?php echo 'login.php' ?>">Login</a></li>
      <?php endif; ?>
    </ul>
</header>

  <div class="auth-content">

    <form action="register.php" method="post" name="login">
      <h2 class="form-title">Register</h2>
      <?php include('validations/formErrors.php'); ?>

      <!-- <div class="msg error">
        <li>Username required</li>
      </div> -->

      <div>
        <label>Username</label>
        <input type="text" name="username" class="text-input">
        <span id="err_username" class="error_message"></span>
      </div>
      <div>
        <label>Email</label>
        <input type="email" name="email" class="text-input">
        <span id="err_email" class="error_message"></span>
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" class="text-input">
        <span id="err_password" class="error_message"></span>
      </div>
      <div>
        <label>Password Confirmation</label>
        <input type="password" name="passwordConf" class="text-input">
        <span id="err_passwordConf" class="error_message"></span>
      </div>
      <div>
        <button type="submit" name="register-btn" class="btn btn-big">Register</button>
      </div>
      <p>Or <a href="login.php">Sign In</a></p>
    </form>

  </div>


  <!-- JQuery -->
  <script src="jquery.min.js"></script>

  <!-- Custom Script -->
  <script src="js/scripts.js"></script>

  <script src="js/jsvalidation.js"></script>

</body>

</html>