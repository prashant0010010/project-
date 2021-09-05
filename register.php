<!--<?php include('adminwork/user.php');
//guestsOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

 
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

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



  <script src="jquery.min.js"></script>

  <script src="js/scripts.js"></script>

  <script src="js/jsvalidation.js"></script>

</body>

</html>
-->
<?php
// Include config file
require_once "database/connection.php";
 
// Define variables and initialize with empty values
$fname = $lname = $email =$password ="";
$fname_err = $lname_err = $email_err = $password_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_fname = trim($_POST["username"]);
    if(empty($input_fname)){
        $fname_err = "Please enter a username.";
    } else{
        $fname = $input_fname;
    }
    
    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter the email.";     
    } else{
        $email = $input_email;
    }
    //dfs
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter the password.";     
    } else{
        $password = $input_password;
    }
    // Check input errors before inserting in database
    if(empty($fname_err) && empty($lname_err) && empty($email_err)&& empty($password_err)){
        $sql = "INSERT INTO `users` (`username`,`email`, `password`) VALUES (?, ?, ?);";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email,$param_password);
            
            // Set parameters
            $param_username = $fname;
            $param_email = $email;
            $param_password = md5($password);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create New Account</h2>
                    <p>Please fill this form and submit to add User record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>User Name</label>
            <input type="text" name="username" class="form-control <?php echo (!empty($fname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fname; ?>">
                            <span class="invalid-feedback"><?php echo $fname_err;?></span>
                        </div>
                        
                        <div class="form-group">
                            <label>Email</label>
     <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
     <input type="text" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                      
                        
                        
                    </form>
                </div>
            </div>        
        </div>
    </div>
    
</body>
</html>
