<?php require "adminwork/posts.php";
if (isset($_GET['id'])) {
  $post = selectOne('posts', ['id' => $_GET['id']]);
}
$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);

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

  <title>Single Post</title>
</head>

<body>
  <!-- Facebook Page Plugin SDK -->
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=285071545181837&autoLogAppEvents=1">
  </script>
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

  <!-- Page Wrapper -->
  <div class="page-wrapper">

    <!-- Content -->
    <div class="content clearfix">

      <!-- Main Content Wrapper -->
      <div class="main-content-wrapper">
        <div class="main-content single">
          <h1 class="post-title"><?php echo $post['title']; ?></h1>

          <div class="post-content">
            <?php echo html_entity_decode($post['body']); ?>
          </div>

        </div>
      </div>
      <!-- // Main Content -->
     
      <!-- Sidebar -->
      <div class="sidebar single">

      <div class="section popular">
          <h2 class="section-title">Popular</h2>

          <?php foreach ($posts as $p): ?>
            <div class="post clearfix">
              <img src="<?php echo 'images/' . $p['image']; ?>" alt="">
              <a href="" class="title">
                <h4><?php echo $p['title'] ?></h4>
              </a>
            </div>
          <?php endforeach; ?>
          

        </div>

        <div class="section topics">
          <h2 class="section-title">Topics</h2>
          <ul>
            <?php foreach ($topics as $topic): ?>
              <li><a href="<?php echo 'index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
            <?php endforeach; ?>

          </ul>
        </div>
      </div>
      <!-- // Sidebar -->

    </div>
    <!-- // Content -->

  </div>
  <!-- // Page Wrapper -->

  <!-- footer -->
  <div class="footer">
    <div class="footer-content">

      <div class="footer-section about">
        <h1 class="logo-text">The<span>Blog</span>Site</h1>
        <p>
         PMC College project. A CRUD project.
        </p>
        <div class="contact">
          <span><i class="fas fa-phone"></i> &nbsp; 98454545</span>
          <span><i class="fas fa-envelope"></i> &nbsp; info@pacific.com</span>
        </div>
        <div class="socials">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>

      <div class="footer-section links">
        <h2>Quick Links</h2>
        <br>
        <ul>
          <a href="#">
            <li>Events</li>
          </a>
          <a href="#">
            <li>Team</li>
          </a>
          <a href="#">
            <li>Mentores</li>
          </a>
          <a href="#">
            <li>Gallery</li>
          </a>
          <a href="#">
            <li>Terms and Conditions</li>
          </a>
        </ul>
      </div>

      <div class="footer-section contact-form">
        <h2>Contact us</h2>
        <br>
        <form action="index.html" method="post">
          <input type="email" name="email" class="text-input contact-input" placeholder="Your email address...">
          <textarea rows="4" name="message" class="text-input contact-input" placeholder="Your message..."></textarea>
          <button type="submit" class="btn btn-big contact-btn">
            <i class="fas fa-envelope"></i>
            Send
          </button>
        </form>
      </div>

    </div>

    <div class="footer-bottom">
      &copy; prashant123.com.np | Designed by Prashant Subedi
    </div>
  </div>
  <!-- // footer -->


  <!-- JQuery -->
  <script src="js/jquery.min.js"></script>

  <!-- Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Custom Script -->
  <script src="js/scripts.js"></script>

</body>

</html>