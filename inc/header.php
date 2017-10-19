<?php
    session_start();
?>

<html>
    <body>
        <nav class="navbar navbar-inverse" style="margin-bottom: 0px;">
          <div class="container-fluid">
            <div class="navbar-header">
                <span class="navbar-brand">Code Maniac</span>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="http://www.codemaniac.tk">Home</a></li>
              <li><a href="http://www.codemaniac.tk/posts.php">Posts</a></li>
              <li><a href="http://www.codemaniac.tk/vids.php">Video Courses</a></li>
              <li><a href="http://www.codemaniac.tk/users?id=me">Profile</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <?php if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
				  $username = $_SESSION['username'];
				  echo "<li><span class='navbar-brand'>Hello, $username!</span></li>";
                  echo '<li><a href="http://www.codemaniac.tk/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
              } else {
				  echo '<li><a href="http://www.codemaniac.tk/register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>';
                  echo '<li><a href="http://www.codemaniac.tk/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
              }?>
            </ul>
          </div>
        </nav>
    </body>
</html>
