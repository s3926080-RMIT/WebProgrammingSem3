<?php include_once "header.php" ?>
<!DOCTYPE html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Shopping Cart</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='cart.css'>
    <script type="text/javascript" src="cart2.js"></script>
</head>
<h1>Shopping Cart</h1>

<div class='shopping-cart'>
<?php
  $cartList = $_SESSION['cartArray'];
  shuffle($_SESSION['distributionHub']);

  if (isset($_POST['order'])){
    if (!empty($cartList)){
      createOrder();
    } 
  }
?>
  <form method='post' action='cart.php'>
    <?php
      $total_money = 0;
      for ($i = 0; $i < count($cartList); $i++){
        echo "<div class='product'>";
        echo "<div class='prodImg'>";
        $string = $cartList[$i][3];
        echo "<img src=$string>";
        echo "</div>";
        echo "<div class='prodName'>";
        echo $cartList[$i][1];
        echo "</div>";
        echo "<div class='prodDescription'>";
        echo $cartList[$i][5];
        echo "</div>";
        echo "<div class='prodPrice'>";
        echo $cartList[$i][2];
        echo "</div>";
        echo "<div class='prodQuant'>";
        echo "<input type='number' name='quantity[]' value='1' min='1'>";
        echo "</div>";
        echo "<div class='prodDel'>";
        echo "<button class='remove-product'>Remove</button>";
        echo "</div>";
        echo "</div>";
        echo "<div class='prodIndTotal'>";
        echo $cartList[$i][2];
        echo "</div>";
        echo "</div>";
        if (isset($_POST['quantity'])){
          $total_money += $cartList[$i][2] * $_POST['quantity'][$i];
        }
          
      }
    ?>
    <div class="totals">
      <div class="totalItems trueTotal">
        <label>Total</label>
        <div class="totalValue" id="total"><?php echo $total_money ?></div>
      </div>
    </div>
    <div class="orderBtnContainer">
      <input class="orderBtn" type='submit' name='order' value='Order'>
    </div>
  </form>


<?php
  function createOrder(){
    $orderFile = fopen("orders.txt", "a");
    $orderList = $_SESSION['cartArray'];
    for ($k = 0; $k < count($orderList); $k++){
      //          product ID                product name              product quantity             product price              product image
      $text = $orderList[$k][0] . "|" . $orderList[$k][1] . "|" .  $_POST['quantity'][$k] . "|" . $orderList[$k][2] . "|" . $orderList[$k][3] . "\n";
      fwrite($orderFile, $text . "");
    }

    fwrite($orderFile, "-----------\n");
    
    fclose($orderFile);
  }

  
?>
</div>

<?php include_once "footer.php" ?>