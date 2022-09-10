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
<h1>Live Orders</h1>
<?php
    $file = file_get_contents('orders.txt'); 
    $file = explode("-----------", $file);
    unset($file[count($file) - 1]); 

    foreach ( $file as $order1 ) {
        $liveOrders[] = array_filter(array_map("trim", explode("\n", $order1)));
    }

    foreach ($liveOrders as $bulkIndex => $bulks) {
        foreach ($bulks as $lineIndex => $line) {
            $liveOrders[$bulkIndex][$lineIndex] = explode('|', $line);
        }
    }
    
    foreach ($liveOrders as $firstLayer => $layerIndex) {
        echo "<div class='userOrders'>";
        foreach ($layerIndex as $secondLayer => $deeperLayer) {
            echo "<div class='orderContainers'>";
            foreach ($deeperLayer as $thirdLayer => $finalLayer){
                echo "<p>";
                echo $liveOrders[$firstLayer][$secondLayer][$thirdLayer];
                echo "</p>";
            }
            echo "</div>";
        }
        
        echo "<div class = buttonContainer>";
        echo "<form method='post' action='shipper.php'>";
        echo "<input type='submit' name='submit' value='Delivered'>";
        echo "<input type='submit' name='submit' value='Cancelled'>";
        echo "<input type='hidden' name='orderNumber' value=$firstLayer>";
        echo "<input type='hidden' name='numberOfItems' value=$secondLayer>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "<br>";
    }  

?> 

<?php
    if(isset($_POST['orderNumber'])){
        deleteItem();
    }

    function deleteItem() {
        $updatedOrders = array();
        $updatedOrders = $liveOrders;
        unset($updatedOrders[$_POST['orderNumber']]);

        foreach ($updatedOrders as $b => $c) {
            foreach ($c as $d => $e) {
                $updatedOrders[$b][$d] = implode('|', $e);
            }
        }

        foreach ($updatedOrders as $g => $h) {
            $updatedOrders[$g] = implode("\n", $h);
        }

        $updatedOrders = implode("-----------", $liveOrders); 

        file_put_contents('orders.txt', $updatedOrders);
    }
    

?>

<?php
// counts the number of orders in text file
    $file = 'orders.txt';
    $fp = fopen($file, 'r');
    $size = filesize($file);
    $content = fread($fp, $size);
    
    $lines = preg_split('/\n/', $content);
    
    $count = 0;
    foreach($lines as $line) {
        if(stristr($line, '-----------')) {
            $count++;
        }
    }
?>
<?php include_once "footer.php" ?>