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
   <form action="includes/sregister.inc.php" method="post">
      <h3>Register</h3>
      <?php
   if (isset($_GET["error"])) {
      if ($_GET["error"] == "none") {
         echo "<p> Successfully registered </p>";
      }
      else if ($_GET["error"] == "passwordnotmatch") {
         echo "<p> Password does not match </p>";
      }
      else if ($_GET["error"] == "shipperpasswordnotmatch") {
         echo "<p> Password doesn't match </p>";
      }
      else if ($_GET["error"] == "shippernameexists") {
         echo "<p> Shippername has already taken </p>";
      }
      else if ($_GET["error"] == "shippernamenouppercase") {
         echo "<p> Shippername missing an uppercase letter </p>";
      } 
      else if ($_GET["error"] == "shippernamenolowercase") {
         echo "<p> Shippername missing a lowercase letter</p>";
      }
      else if ($_GET["error"] == "shipperpassnolowercase") {
         echo "<p> Shipper password missing a lowercase letter </p>";
      }
      else if ($_GET["error"] == "shipperpassnouppercase") {
         echo "<p> Shipper password missing an uppercase letter </p>";
      }
      else if ($_GET["error"] == "shipperpassnospecialchar") {
         echo "<p> Shipper password missing a special character </p>";
      }
      else if ($_GET["error"] == "shipperpassnonum") {
         echo "<p> Shipper password missing a number </p>";
      }
      else if ($_GET["error"] == "invalidshipperpasslength") {
         echo "<p> Shipper password must be between 8 and 16 characters </p>";
      }
   }
   ?>
      <input type="text" name="shippername" required placeholder="Enter your username">
      <input type="password" name="spassword" required placeholder="Enter your password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      <select name="distribution_hub">
         <option value="deliverA">Distribution Hub A</option>
         <option value="deliverB">Distribution Hub B</option>
         <option value="deliverC">Distribution Hub C</option> 
         <input type="submit" name="submit" value="register now" class="form-btn">
      </select>
      <p>Already have an account? <a href="shipper_login.php">Login here</a></p>
   </form>
</div>
</body>
<?php
    include_once'footer.php'
?>
</html>