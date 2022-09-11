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
    <?php
        if (isset($_SESSION["vendorname"])){
            echo "<div class='container'>";
            echo "<div class='row'>";
            echo "<form enctype='multipart/form-data' action='add_products_page.php' method='POST'>";
            echo "<span>Enter product name: </span>";
            echo "<input type='text' id='name' name='name' minlength='10' maxlength='20'><br>";
            echo "<span>Enter price: </span>";
            echo "<input type='number' id='price' name='price' min='0'><br>";
            echo "<span>Select product image: </span>";
            echo "<input type='file' id='img' name='img' accept='image/*'><br>";
            echo "<span>Enter product despcriptions: </span>";
            echo "<textarea name='descriptions' id='descriptions' cols='30' rows='10' maxlength='500'></textarea><br>";
            echo "<input type='submit' name='submitbutton'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            $username = $_SESSION["vendorname"];
            $products_file = fopen("products.txt", "a+") or die("Unable to open file!");
            $id_list = array();
            while(!feof($products_file)) {
                array_push($id_list, substr(fgets($products_file),0,1));
            }

            if (isset($_SESSION["vendorname"])){
                $username = $_SESSION["vendorname"];
                if(isset($_POST["submitbutton"])){
                    $pNewInfoString = strval(count($id_list)) . "| " . $_POST["name"] . "|" . strval($_POST["price"]) . "|" . $_FILES['img']['name'] . "|" . $_POST["descriptions"] . "|" . $username . "\n";
                    fwrite($products_file, $pNewInfoString);

                    $uploaddir = 'product_images/';
                    $uploadfile = $uploaddir . basename($_FILES['img']['name']);
                    move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
                }
            }
        }else{
            echo "<div class='login_options'>";
            echo "<a href='register.php' class='button' id='fbuttons'>Sign up</a>";
            echo "<a href='login.php' class='button' id='fbuttons'>Login</a>";
            echo "</div>";
            echo "<br>";
            echo "<br>";
        }
    ?>
</body>
<?php include_once "footer.php" ?>
</html>