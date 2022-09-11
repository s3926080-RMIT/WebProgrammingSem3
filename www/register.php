<?php
    include_once'header.php'    
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Regisster Page Form</title>
   <link rel="stylesheet" href="styles.css">

</head>
<body>
   
<div class="form-container">
   <form action="includes/register.inc.php" method="post" enctype="multipart/form-data">
        <h3>Register</h3>
        <?php
   if (isset($_GET["error"])) {
      if ($_GET["error"] == "none") {
         echo "<p> Successfully registered </p>";
      }
      else if ($_GET["error"] == "passwordnotmatch") {
         echo "<p> Password does not match </p>";
      }
      else if ($_GET["error"] == "usernameexists") {
         echo "<p> Username might have been taken </p>";
      }
      else if ($_GET["error"] == "invalidUsername") {
         echo "<p> Only letters/numbers and 8 to 15 letters</p>";
      }
      else if ($_GET["error"] == "nouppercase") {
         echo "<p> Username need to have an uppercase character </p>";
      }
      else if ($_GET["error"] == "nolowercase") {
         echo "<p> Username need to have a lowercase character </p>";
      }
      else if ($_GET["error"] == "pnolowercase") {
         echo "<p> Password need to have a lowercase character </p>";
      }
      else if ($_GET["error"] == "pnouppercase") {
         echo "<p> Password need to have a uppercase character </p>";
      }
      else if ($_GET["error"] == "pnospecialchar") {
         echo "<p> Password need to have a special character </p>";
      }
      else if ($_GET["error"] == "invalidpasswordlength") {
         echo "<p> Password length needs to be between 8 and 20 characters</p>";
      }
      else if ($_GET["error"] == "invalidaddresslength") {
         echo "<p> Address length needs to be longer than 5 characters</p>";
      }
   }
   ?>
   </br>
      <input type="text" name="name" required placeholder="Enter your name">
      <input type="text" name="username" required placeholder="Enter your username" required>
      <input type="text" name="address" required placeholder="Enter your address">
      <input type="password" name="password" required placeholder="Enter your password" required>
      <input type="password" name="cpassword" required placeholder="Confirm your password" required>
      <input type="file" name = "profilepic" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="Register now" class="form-btn">
      <p>Already have an account? <a href="login.php">Login here</a></p>
   </form>
</div>

</body>
<?php
    include_once'footer.php'
?>
</html>

