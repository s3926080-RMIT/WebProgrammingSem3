<?php
//vendor
if (isset($_POST["submit"])) {

    $vendorname = $_POST['username'];
    $vpassword = $_POST['password'];

    require_once 'functions.inc.php';
    $vendorlist = file('vendor_accounts.txt');

    if (loginVendor($vendorname, $vpassword) !== true) {
        header("location: ../vlogin.php?error=wrongvinput");
        exit();
    }
    else {
        header("location: ..//vendor_page.php");
    }

}
else{
    header("location: ../vlogin.php");
    exit();
}