<?php include_once "header.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Page</title>
    <link rel='stylesheet' type='text/css' media='screen' href='vendor.css'>
</head>
<body>
    <br><br>
    <h1>Vendor Page</h1>
    <?php
        if (isset($_SESSION["vendorname"])){
            $username = $_SESSION["vendorname"];
            echo "<div>";
            echo "<a href='view_products_page.php' class='button' id='fbuttons'>View My Products</a>";
            echo "<a href='add_products_page.php' class='button' id='fbuttons'>Add New Products</a>";
            echo "</div>";
        }else{
            echo "<div>";
            echo "<a href='register.php' class='button' id='fbuttons'>Sign up</a>";
            echo "<a href='login.php' class='button' id='fbuttons'>Login</a>";
            echo "</div>";
        }
    ?>
    <br>
    <br>
</body>
<?php include_once "footer.php" ?>
</html>