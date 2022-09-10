<?php

//shipper
if (isset($_POST["submit"])) {

    $shippername = $_POST['username'];
    $spassword = $_POST['password'];

    require_once 'functions.inc.php';
    $shipperlist = file('ship_accounts.txt');

    if (loginShipper($shippername, $spassword) !== true) {
        header("location: ../shipper_login.php?error=wrongsinput");
        exit();
    }
    else {
        echo'shipper login successful';
        //insert vendor page here
    }

}
else{
    header("location: ../slogin.php");
    exit();
}
