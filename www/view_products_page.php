<?php include_once "header.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Products</title>
    <link rel='stylesheet' type='text/css' media='screen' href='view_product.css'>
</head>
<body>
    <br><br>
    <h1>My Products</h1>
    <?php
        if (isset($_SESSION["vendorname"])){
            $username = $_SESSION["vendorname"];
        }else{
            $username = "";
            echo "<div class='login_options'>";
            echo "<a href='index.php' class='button' id='fbuttons'>Sign up</a>";
            echo "<a href='index.php' class='button' id='fbuttons'>Login</a>";
            echo "</div>";
            echo "<br>";
            echo "<br>";
        }
        class Product{
            public $pID;
            public $pName;
            public $pPrice;
            public $pImage;
            public $pDescriptions;
            public $pVendor;

            function __construct($prID, $prName, $prPrice, $prImage, $prDescriptions, $prVendor){
                $this->pID = $prID;
                $this->pName = $prName;
                $this->pPrice = $prPrice;
                $this->pImage = $prImage;
                $this->pDescriptions = $prDescriptions;
                $this->pVendor = $prVendor;
            }
        }

        $products_file = fopen("products.txt", "r") or die("Unable to open file!");
        $products_list = array();
        while(!feof($products_file)) {
            $pInfoString = fgets($products_file);
            if(strlen($pInfoString)>2){
                $pInfoArray = explode("|",$pInfoString);
                array_push($products_list, new Product($pInfoArray[0], trim($pInfoArray[1]), intval($pInfoArray[2]), $pInfoArray[3], $pInfoArray[4], $pInfoArray[5]));
            }
        }

        echo "<div class='item-container'>";
        foreach ($products_list as $p){
            if($p->pVendor == $username . "\n"){
                echo "<div class='item'>\n";
                echo "<img src=product_images/$p->pImage>\n";
                echo "<div class= 'item-description'>";
                echo "<p class='itemID'>  ID: ", $p->pID, "</p>\n";
                echo "<h3 class='itemName'> Name: ", $p->pName, "</h3>\n";
                echo "<p class ='itemPrice'>  Price: ", $p->pPrice, " VNĐ</p>\n";
                echo "<p class ='itemDesc'>  Descriptions: ", $p->pDescriptions, "</p>\n";
                echo "</div>";

                echo "</div>\n";
            }
        }
        echo "</div>";
        fclose($products_file);
    ?>
</body>
<?php include_once "footer.php" ?>
</html>