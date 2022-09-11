<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lazado</title>
    <link rel="stylesheet" href="header_footer.css">

    <!--
        Import Font-Awsome
    -->
    <script src="https://kit.fontawesome.com/1057ac855e.js" crossorigin="anonymous"></script>
</head>
<body>
    <section id="landing">
        <nav>
            <div class="nav__container">
                <figure class="logo">
                    <img src="logo.png" alt="logo">
                </figure>

                <div class="search_wrap search_wrap_1">
                    <div class="search_box">
                        <input type="text" class="input" placeholder="Search">
                        <div class="btn btn_common">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
                <ul class="nav__links">
                <?php
                    if(isset($_SESSION["username"])) {
                        $username = $_SESSION["username"];
                        echo "<li class='welcome_message'>Hi $username</li>";
                        echo "<li><a  href='userprofile.php'>My Account</a></li>";
                        echo "<li><a  href='cart.php'>View Cart</a></li>"; 
                        echo "<li><a  href='includes/logout.inc.php'>Log Out</a></li>";                   
                    }
                    else if (isset($_SESSION["shippername"])) {
                        $username = $_SESSION["shippername"];
                        echo "<li class='welcome_message'>Hi $username</li>";
                        echo "<li><a  href='userprofile.php'>Shipper Account</a></li>";
                        echo "<li><a  href='shipper.php'> Shipper </a></li>"; 
                        echo "<li><a  href='includes/logout.inc.php'>Log Out</a></li>";                   
                    }
                    else if (isset($_SESSION["vendorname"])) {
                        $username = $_SESSION["vendorname"];
                        echo "<li class='welcome_message'>Hi $username</li>";
                        echo "<li><a  href='add_products_page.php'> Add products </a></li>"; 
                        echo "<li><a  href='view_products_page.php'> View products </a></li>";
                        echo "<li><a  href='includes/logout.inc.php'>Log Out</a></li>";               
                    }

                    else{
                        echo "<li><a  href='index.php'>Sign up</a></li>";
                        echo "<li><a  href='index.php'>Login</a></li>";
                    }
                ?>

                </ul>
            </div>
        </nav>
    </section>

</body>
</html>