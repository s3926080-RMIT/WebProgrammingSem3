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
        $file = 'ship_accounts.txt';
        $contents = file_get_contents($file);
        $pattern = preg_quote($shippername, '/');
        $pattern = "/^.*$pattern.*\$/m";
        preg_match_all($pattern, $contents, $matches);
        $str = implode("\n", $matches[0]);
        $str = explode('|', $str);
        unset($str[count($str) - 1]);
        $shipperHub = $str[count($str) - 1];
        $_SESSION['shipperHub'] = $shipperHub;
        $_SESSION['indexArray'] = array();
        $_SESSION['distributionHub'] = file("distribution.txt");
        header("location: ../shipper.php");
        //insert vendor page here
    }

}
else{
    header("location: ../slogin.php");
    exit();
}
