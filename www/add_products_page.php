<?php include_once "header.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Products</title>
    <link rel='stylesheet' type='text/css' media='screen' href='add_product.css'>
</head>
<body>
    <br><br>
    <h1>Add New Product</h1>
    <!-- <div class='container'>
        <div class='row'>
            <form action='add_products_page.php' method='post'>
                <span>Enter product name: </span>
                <input type='text' id='name' name='name' minlength='10' maxlength='20'><br>
                <span>Enter price: </span>
                <input type='number' id='price' name='price' min='0'><br>
                <span>Select product image: </span>
                <input type='file' id='img' name='img' accept='image/*'><br>
                <span>Enter product despcriptions: </span>
                <textarea name='descriptions' id='descriptions' cols='30' rows='10' maxlength='500'></textarea><br>
                <input type='submit'>
            </form>
        </div>
    </div> -->
    <?php
        if (isset($_SESSION["vendorname"])){
            echo "<div class='container'>\n";
            echo "<div class='row'>\n";
            echo "<form action='add_products_page.php' method='post'>\n";
            echo "<span>Enter product name: </span>\n";
            echo "<input type='text' id='name' name='name' minlength='10' maxlength='20'><br>\n";
            echo "<span>Enter price: </span>\n";
            echo "<input type='number' id='price' name='price' min='0'><br>\n";
            echo "<span>Select product image: </span>\n";
            echo "<input type='file' id='img' name='img' accept='image/*'><br>\n";
            echo "<span>Enter product despcriptions: </span>\n";
            echo "<textarea name='descriptions' id='descriptions' cols='30' rows='10' maxlength='500'></textarea><br>\n";
            echo "<input type='submit'>\n";
            echo "</form>\n";
            echo "</div>\n";
            echo "</div>\n";
            $username = $_SESSION["vendorname"];
            $products_file = fopen("products.txt", "a+") or die("Unable to open file!");
            $id_list = array();
            while(!feof($products_file)) {
                array_push($id_list, substr(fgets($products_file),0,1));
            }

            if (isset($_SESSION["vendorname"])){
                $username = $_SESSION["vendorname"];
                if(isset($_POST["name"], $_POST["price"], $_POST["img"], $_POST["descriptions"])){
                    $pNewInfoString = strval(count($id_list)) . "| " . $_POST["name"] . "|" . strval($_POST["price"]) . "|" . $_POST["img"] . "|" . $_POST["descriptions"] . "|" . $username . "\n";
                    fwrite($products_file, $pNewInfoString);
                }
            }
        }else{
            echo "<div class='login_options'>";
            echo "<a href='register.php'>Sign up</a>";
            echo "<a href='login.php'>Login</a>";
            echo "</div>";
            echo "<br>";
            echo "<br>";
        }
    ?>
</body>
<?php include_once "footer.php" ?>
</html>