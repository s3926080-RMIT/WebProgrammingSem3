<?php include_once "header.php" ?>
<?php
    $_SESSION['cartArray'] = array();
    $_SESSION['orderArray'] = array();
    $_SESSION['distributionHub'] = array();
    $_SESSION['distributionHub'] = file("distribution.txt");
?>
<!DOCTYPE html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='customer.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='customer_script.js'></script>
</head>
<body>
    <div class="top">
        <h1>List of Products</h1>
        <form action="customer.php" method="get">
            <input class="search-bar" type="text" name="searchTerm" placeholder="Search for products">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

<?php
    
    $productList = array();
    $handle = fopen("products.txt", "r");
    if ($handle) {
        $i=0;
        while (($line = fgets($handle)) !== false) {
            if(strlen($line)>2){
                $data = explode("|", $line);
                $productList[$i] = array(
                0 => $data[0],
                1 => $data[1],
                2 => $data[2],
                3 => $data[3],
                4 => $data[4],
                5 => $data[5]
                );
                $i++;
            }
        }
        fclose($handle);
    } else {
        echo "Failed to open file.";
    }

    $count = count($productList);
    

    if (isset($_GET["searchTerm"]) === false){
        for ($i = 0; $i < $count; $i++){
            echo "<div class='product-containers'>";
            for ($k = 0; $k < 6; $k++){
                echo "<div class='productElements'>";
                echo $productList[$i][$k];
                echo "</div>";
            }
            echo "<form method='post'> <input class='addtocartBtn' type='submit' name='submit' value='Add to Cart'> <input type='hidden' name='addCart' value=$i> </form>";
            echo "</div>";
            echo "<br>";
        }
    }

    

    if (isset($_GET["searchTerm"]) == true){
        for ($m = 0; $m < $count; $m++){
            $pos = strpos(strtolower($productList[$m][2]),strtolower($_GET["searchTerm"]));
            echo "<div class='product-containers'>";
            if ($pos == true){
                for ($n = 0; $n < 6; $n++){
                    echo "<div class='productElements'>";
                    echo $productList[$m][$n];
                    echo "</div>";
                }
            echo "</div>";
            }
        }
    }
    if(isset($_POST['addCart'])){
        
            if (in_array($productList[$_POST['addCart']], $_SESSION['cartArray'])){
                echo "Item already in cart. You can change the quantity you wish to purchase in the shopping cart.";
                echo "<br>";
            } else{
                array_push($_SESSION['cartArray'], $productList[$_POST['addCart']]);
                echo "Item added to shopping cart.";
            }
        }
?>

</body>

<?php include_once "footer.php" ?>
