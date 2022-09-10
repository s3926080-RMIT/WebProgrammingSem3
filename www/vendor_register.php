<?php
    include_once'header.php'    
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Vendor Register Page Form</title>
   <link rel="stylesheet" href="styles.css">

</head>
<body>
   
<div class="form-container">

   <form action="includes/vregister.inc.php" method="post">
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
         echo "<p> Vendor username might have been taken </p>";
      }
      else if ($_GET["error"] == "businessnameexists") {
         echo "<p> Business address might have been taken </p>";
      }
      else if ($_GET["error"] == "invalidUsername") {
         echo "<p> Wrong Vendor username </p>";
      }
      else if ($_GET["error"] == "vnamenouppercase") {
         echo "<p> Vendor username needs to have an uppercase </p>";
      } 
      else if ($_GET["error"] == "vnamenolowercase") {
         echo "<p> Vendor username needs to have a lowercase</p>";
      }
      else if ($_GET["error"] == "vpasswordinvalid") {
         echo "<p> Password only contains letters/numbers and 5-20 characters </p>";
      }
      else if ($_GET["error"] == "vpassnolowercase") {
         echo "<p> Password needs to have a lowercase </p>";
      }
      else if ($_GET["error"] == "vpassnouppercase") {
         echo "<p> Password needs to have a uppercase </p>";
      }
      else if ($_GET["error"] == "vpassnospecialchar") {
         echo "<p> Password needs to have a special character </p>";
      }
      else if ($_GET["error"] == "invalidbaddress") {
         echo "<p> Business address must be equal or longer than 5 letters </p>";
      }
      else if ($_GET["error"] == "vpassnonum") {
         echo "<p> Password needs to have a number</p>";
      }
      else if ($_GET["error"] == "invalidvpasslength") {
         echo "<p> Password length needs to be between 8 and 20 characters</p>";
      }
   }
   ?>
      <input type="text" name="vendorname" required placeholder="Enter your username">
      <input type="text" name="businessname" required placeholder="Enter your business name">
      <input type="text" name="businessaddress" required placeholder="Enter your businesss address">
      <input type="password" name="vpassword" required placeholder="Enter your password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Already have an account? <a href="vlogin.php">Login here</a></p>
   </form>

</div>

</body>
<?php
    include_once'footer.php'
?>
</html>