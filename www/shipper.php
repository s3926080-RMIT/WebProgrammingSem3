<?php include_once "header.php" ?>

<!DOCTYPE html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Shopping Cart</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='shipper.css'>
    <script type="text/javascript" src="cart2.js"></script>
</head>
<br><br>
<h1>Live Orders</h1>
<?php
    $file = file_get_contents('orders.txt'); 
    $file = explode("-----------", $file);
    unset($file[count($file) - 1]); 
    if (empty($file)){
        echo "No available orders.";
    } else{
        
        foreach ( $file as $order1 ) {
            $liveOrders[] = array_filter(array_map("trim", explode("\n", $order1)));
        }
    
        foreach ($liveOrders as $bulkIndex => $bulks) {
            foreach ($bulks as $lineIndex => $line) {
                $liveOrders[$bulkIndex][$lineIndex] = explode('|', $line);
            }
        }
        $updatedOrders = array();
        $updatedOrders = $liveOrders;
        $hubArray = $_SESSION['distributionHub'];

        
        if (empty($_SESSION['indexArray'])){
            foreach ($liveOrders as $firstLayer => $layerIndex) {
                array_push($_SESSION['indexArray'], $hubArray[array_rand($hubArray)]);
            }
        }
        $indexArray = $_SESSION['indexArray'];
        
        foreach ($indexArray as $index => $disHub){
            echo "<div class='userOrders'>";
            
            if ($disHub == $_SESSION['shipperHub']) {
                foreach ($liveOrders[$index] as $secondLayer => $deeperLayer)
                    echo "<div class='orderContainers'>";
                    foreach ($deeperLayer as $thirdLayer => $finalLayer){
                        echo "<p>";
                        echo $liveOrders[$index][$secondLayer][$thirdLayer];
                        echo "</p>";
                    }
                echo "</div>";
                echo "<div class = buttonContainer>";
                echo "<form method='post' action='shipper.php'>";
                echo "<input type='submit' name='submit' value='Delivered'>";
                echo "<input type='submit' name='submit' value='Cancelled'>";
                echo "<input type='hidden' name='orderNumber' value=$index>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "<br>";
                }
       if (empty($indexArray)){
            echo "No available orders.";
        }
    }
}
        
            
        
    ?> 
    
    <?php
        if(isset($_POST['orderNumber'])){
            unset($updatedOrders[$_POST['orderNumber']]);
                
    
            if(!empty($updatedOrders)){
                foreach ($updatedOrders as $b => $c) {
                    foreach ($c as $d => $e) {
                        $updatedOrders[$b][$d] = implode('|', $e);
                    }
                }
    
                foreach ($updatedOrders as $g => $h) {
                    $updatedOrders[$g] = implode("\n", $h);
                }
                
                $updatedOrders = implode("\n-----------\n", $updatedOrders);
                $updatedOrders = $updatedOrders . "\n-----------\n";
    
                file_put_contents('orders.txt', $updatedOrders);
            } else{
                file_put_contents('orders.txt', '');
            }
        }
    
    ?>
    
<?php include_once "footer.php" ?>