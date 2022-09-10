<?php
	require_once('header.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shipper Login Page</title>
        <link rel="stylesheet" href="styles.css">
    </head>
<body>

<ssection class="signup-form">    
<div class="form-container">
   <form action="includes/slogin.inc.php" method="post">
      <h3>Login </h3>
      <?php
      if (isset($_GET["error"])) {
            if ($_GET["error"] == "none") {
                echo "<p> Successfully Login </p>";
      } else if ($_GET["error"] == "wrongsinput") {
        echo "<p> Wrong Shipper username or password </p>";
  } 
    }
      ?>
      <input type="text" name="username" required placeholder="Enter your Shipper username">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login " class="form-btn">
      <p>Don't have an account? <a href="choose_type.php">Register now</a></p>
   </form>
   
</div>
</section>
</body>
<?php
    include_once'footer.php'
?>
</html>